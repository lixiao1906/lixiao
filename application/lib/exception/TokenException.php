<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/9/4
 * Time: 23:09
 */

namespace app\lib\exception;


class TokenException extends BaseException
{
    // 错误码
    public $code = 401;
    // 错误信息
    public $msg = 'Token已过期或无效';
    // 请求错误码
    public $errorCode = 10005;
}