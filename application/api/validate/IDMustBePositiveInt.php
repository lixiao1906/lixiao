<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/8/8
 * Time: 19:30
 */

namespace app\api\validate;


class IDMustBePositiveInt extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isPositiveInt'
    ];

    protected $message = [
        'id' => 'id必须为正整数'
    ];
}