<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/8/25
 * Time: 19:15
 */

namespace app\api\validate;


class IDCollection extends BaseValidate
{
    protected $rule = [
        'ids' => 'require|checkIDs'
    ];

    protected $message = [
        'ids' => 'id必须是以逗号分隔的多个正整数'
    ];

    protected function checkIDs($value)
    {
        $values = explode(',', $value);
        if (empty($values)) {
            return false;
        }

        foreach ($values as $id) {
            // 校验参数为正整数
            if (!$this->isPositiveInt($id)) {
                return false;
            }
        }

        return true;
    }
}