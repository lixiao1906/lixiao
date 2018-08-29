<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/8/10
 * Time: 18:39
 */

namespace app\lib\exception;


use think\Exception;
use Throwable;

class BaseException extends Exception
{
    // 錯誤碼
    public $code = 400;
    // 錯誤信息
    public $msg = '參數錯誤';
    // 請求錯誤碼
    public $errorCode = 10000;

    /**
     * 构造函数
     *
     * BaseException constructor.
     * @param array $param
     */
    public function __construct($param = [])
    {
        if (!is_array($param)) {
            return;
        }

        if (array_key_exists('code', $param)) {
            $this->code = $param['code'];
        }

        if (array_key_exists('msg', $param)) {
            $this->msg = $param['msg'];
        }

        if (array_key_exists('errorCode', $param)) {
            $this->errorCode = $param['errorCode'];
        }
    }
}