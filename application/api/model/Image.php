<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/8/21
 * Time: 22:32
 */

namespace app\api\model;


class Image extends BaseModel
{
    protected $hidden = ['id', 'from', 'delete_time', 'update_time'];

    //在模型中自定义
    public function getUrlAttr($value, $data)
    {
        return $this->prefixImgUrl($value, $data);
    }
}