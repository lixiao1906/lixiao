<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/9/3
 * Time: 20:28
 */

namespace app\api\validate;


class TokenGet extends BaseValidate
{
    protected $rule = [
        'code' => 'require|isNotEmpty'
    ];

    protected $message = [
        'code' => '没有code还想获取令牌，做梦去吧'
    ];
}