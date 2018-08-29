<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/8/25
 * Time: 20:11
 */

namespace app\lib\exception;


class ThemeException extends BaseException
{
    public $code = 404;
    public $msg = '请求的主题不存在';
    public $errorCode = 40000;
}