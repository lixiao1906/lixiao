<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/9/3
 * Time: 20:45
 */

namespace app\api\service;


use app\lib\exception\TokenException;
use app\lib\exception\WeChatException;
use think\Exception;
use app\api\model\User as UserModel;


class UserToken extends BaseToken
{
    // 成员变量
    protected $code;//微信的code
    protected $wxAppID;//前端appid
    protected $wxAppSecrect;//前端app密钥
    protected $wxLoginUrl;

    function __construct($code)
    {
        $this->code = $code;
        $this->wxAppID = config('wx.app_id');
        $this->wxAppSecrect = config('wx.app_secret');
        $this->wxLoginUrl = sprintf(config('wx.login_url'),
            $this->wxAppID, $this->wxAppSecrect, $this->code);
    }

    public function get()
    {
        $result = curl_get($this->wxLoginUrl);
        $wxResult = json_decode($result, true);
        if (empty($wxResult)) {
            throw new Exception('获取session_key及openid异常，微信内部错误');
        } else {
            $loginFail = array_key_exists('errcode', $wxResult);
            if ($loginFail) {
                // 抛出具体的微信异常
                throw new WeChatException([
                    'msg' => $wxResult['errmsg'],
                    'errorCode' => $wxResult['errcode']
                ]);
            } else {
                // 颁发令牌
                return $this->grantToken($wxResult);
            }
        }
    }

    /**
     * 颁发令牌也需要一个参数，这个参数就是我们从微信获取的用户信息
     * 方法我们定义为私有的，因为这个方法只是它自己在用，别人不会用
     */
    private function grantToken($wxResult)
    {
        // 1.拿到用户的openid去数据库中校验，是否存在
        $openid = $wxResult['openid'];
        // 定义一个userModel，去用户表中查询是否存在该用户
        $user = UserModel::getUserByOpenid($openid);
        if ($user) {
            // 如果用户存在，则取用户id
            $userid = $user->id;
        } else {
            // 2.如果存在则不做处理，如果不存在则新增一条记录
            $userid = $this->newUser($openid);
        }

        // 3.生成令牌，准备缓存数据，写入缓存
        $cacheValue = $this->prepareCacheValue($wxResult, $userid);

        // 4.把令牌返回到客户端
        return $this->saveToCache($cacheValue);
    }

    private function saveToCache($cacheValue)
    {
        $key = self::generateToken();// 这就是令牌

        // 缓存用户信息
        $value = json_encode($cacheValue); // 把数组转化为json字符串
        //$value = json_decode($cacheValue);// 把字符串转化为数组
        $expre_id = config('setting.token_expire_in');// 时长 7200

        // tp5自带的缓存机制，可以扩展为redis
        $request = cache($key, $value, $expre_id); // $request 返回为 true或false

        if (!$request) { //
            throw new TokenException([
                'msg' => '服务器内部错误'
            ]);
        }
        return $key;
    }

    /**
     * 准备缓存数据
     *
     * @param $wxResult
     * @param $userid
     */
    private function prepareCacheValue($wxResult, $userid)
    {
        $cacheValue = $wxResult;
        $cacheValue['userid'] = $userid;
        $cacheValue['scope'] = 16;//用户权限作用域，我们后边会讲到
        return $cacheValue;
    }

    private function newUser($openid)
    {
        $user = UserModel::create([
            'openid' => $openid
        ]);
        // 新增成功，返回用户ID
        return $user->id;
    }
}