<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/8/29
 * Time: 21:43
 */

namespace app\lib\exception;


class ProductException extends BaseException
{
    public $code = 404;
    public $msg = '请求的商品不存在，请检查参数';
    public $errorCode = 20000;
}