<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/8/29
 * Time: 21:46
 */

namespace app\lib\exception;


class CategoryException extends BaseException
{
    public $code = 404;
    public $msg = '请求的Banner不存在';
    public $errorCode = 30000;
}