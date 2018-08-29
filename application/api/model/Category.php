<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/8/29
 * Time: 20:59
 */

namespace app\api\model;


class Category extends BaseModel
{
    Protected $hidden = ['delete_time', 'update_time'];

    //关联图片关系
    public function topicImg()
    {
        return $this->belongsTo('Image', 'topic_img_id', 'id');
    }
}