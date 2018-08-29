<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/8/26
 * Time: 16:37
 */

namespace app\api\validate;


class Count extends BaseValidate
{
    protected $rule = [
        'count' => 'isPositiveInt|between:1,15'
    ];
}