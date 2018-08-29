<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/8/21
 * Time: 21:21
 */

namespace app\api\model;


class BannerItem extends BaseModel
{
    protected $hidden = ['id', 'img_id', 'banner_id', 'update_time', 'delete_time'];

    public function images()
    {
        return $this->belongsTo('Image', 'img_id', 'id');
    }

}