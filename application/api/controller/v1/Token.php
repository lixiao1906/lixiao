<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/9/3
 * Time: 20:26
 */

namespace app\api\controller\v1;


use app\api\service\UserToken;
use app\api\validate\TokenGet;

class Token
{
    public function getToken($code = '')
    {
        //1.校验参数
        (new TokenGet())->goCheck();
        //2.业务逻辑
        $wx = new UserToken($code);
        $token = $wx->get();
        //3.颁发令牌
        return [
            'token' => $token
        ];
    }
}