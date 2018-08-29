<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/8/13
 * Time: 16:30
 */

namespace app\lib\exception;


class ParameterException extends BaseException
{
    public $code = 400;
    public $msg = '您的参数错误请检查';
    public $errorCode = 20000;
}