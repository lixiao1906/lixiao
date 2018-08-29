<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/8/8
 * Time: 19:09
 */

namespace app\api\validate;


use think\Validate;

class TestValidate extends Validate
{
    protected $rule = [
        'name' => 'require|max:5',
        'email' => 'email'
    ];
}