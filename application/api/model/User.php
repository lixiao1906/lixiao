<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/9/4
 * Time: 21:06
 */

namespace app\api\model;


class User extends BaseModel
{

    public static function getUserByOpenid($openid)
    {
        return self::where('openid', '=', $openid)->find();
    }
}