<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/8/8
 * Time: 19:39
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;
use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck()
    {
        $params = Request::instance()->param();
        $result = $this->batch()->check($params);
        if ($result) {
            return true;
        } else {
            $e = new ParameterException([
                'msg' => $this->error
            ]);
            throw $e;
        }
    }

    protected function isPositiveInt($value, $rule = '', $data = '', $field = '')
    {
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {
            return true;
        } else {
            return false;
            // return $field.'必须为正整数';
        }
    }

    protected function isNotEmpty($value)
    {
        if (empty($value)) {
            return false;
        } else {
            return true;
        }
    }
}