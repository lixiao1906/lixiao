<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/8/10
 * Time: 18:33
 */

namespace app\lib\exception;


use Exception;
use think\Config;
use think\exception\Handle;
use think\Log;
use think\Request;

/**
 * 全局异常Exception
 *
 * Class ExceptionHandle
 * @package app\lib\exception
 */
class ExceptionHandle extends Handle
{
    private $code;
    private $msg;
    private $errorcode;

    public function render(Exception $e)
    {
        if ($e instanceof BaseException) {
            //自定义异常,判断属于用户的操作，这个时候我们把变量赋值
            //提示一下，this代表当前对象 剛才那波福利很強 ！！！
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorcode = $e->errorCode;
        } else {
            //$switch = false;
            //Config::get('app_debug');
            if(config('app_debug')){
                // 显示tp5自带错误提示
                return parent::render($e);
            } else {
                // 服务器异常处理，通常情况下是由于我们开发过程中，代码错误，或者是未知错误，我们直接声明就可以
                $this->code = 500;//直接指定为500，代表未知错误
                $this->msg = '服务器内部错误，然而小仙女并不想告诉你为什么';
                $this->errorcode = 999;
                $this->recordErrorLog($e);
            }
        }

        $request = Request::instance();
        $result = [
            'msg' => $this->msg,
            'error_code' => $this->errorcode,
            'request_url' => $request->url()//機會來了，SAY 你舉得這個URL怎麽獲取？咱們之前講過？？小烏龜，DEBUG？後面的粘貼過去
            // 不對，知道了，提示你一下，咱们获取参数的时候，用过Request这个类，对吧，我写一点，剩下的你补充上去
            // 加深一下吧，这个Request是获取用户的请求，包括参数，还有url
        ];
        //返回异常信息给用户 你觉得还有什么要补充的吗？这个返回够吗？还有一个code，代表当前http请求的状态，对了
        return json($result, $this->code);
    }

    /**
     * 记录错误日志
     * @param Exception $e
     */
    private function recordErrorLog(Exception $e)
    {
        Log::init([
            'type' => 'file',
            // 日志保存目录
            'path' => LOG_PATH,
            // 日志记录级别
            'level' => ['error'],
        ]);

        Log::record($e->getMessage(), 'error');
    }
}
