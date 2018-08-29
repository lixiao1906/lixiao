<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/8/10
 * Time: 18:48
 */

namespace app\lib\exception;

/**
 * 請求的Banner不存在 異常
 *
 * Class BannerMissException
 * @package app\lib\exception
 */
class BannerMissException extends BaseException
{
    public $code = 404;
    public $msg = '请求的分类不存在';
    public $errorCode = 10000;
}