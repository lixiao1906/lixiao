<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/8/25
 * Time: 18:12
 */

namespace app\api\model;


use think\Model;

class BaseModel extends Model
{
    // 基类中的方法更换为受保护的，只让子类去用
    protected function prefixImgUrl($value, $data)
    {
        $finalUrl = $value;
        if ($data['from'] == 1) {
            $finalUrl = config('setting.img_prefix') . $finalUrl;
        }
        return $finalUrl;
    }
}