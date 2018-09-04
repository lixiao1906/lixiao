<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/9/3
 * Time: 22:30
 */

namespace app\lib\exception;


class WeChatException extends BaseException
{
    public $code = 400;
    public $msg = '调用微信接口失败';
    public $errorCode = 999;
}