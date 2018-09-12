<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/9/10
 * Time: 22:20
 */

namespace app\api\model;


class ProductImage extends BaseModel
{
    protected $hidden = ['delete_time', 'img_id', 'product_id'];

    public function imgUrl()
    {
        return $this->belongsTo('Image', 'img_id', 'id');
    }
}