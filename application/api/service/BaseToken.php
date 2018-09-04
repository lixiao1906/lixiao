<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/9/4
 * Time: 23:15
 */

namespace app\api\service;


class BaseToken
{

    /**
     * 随机生成令牌
     *
     * @return string
     */
    public static function generateToken()
    {
        // 一组随机生成的32字符串
        $randChars = getRandChar(32);

        // 一组时间戳
        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];

        // 盐
        $token_salt = config('setting.token_salt');

        return md5($randChars . $timestamp . $token_salt);
    }
}