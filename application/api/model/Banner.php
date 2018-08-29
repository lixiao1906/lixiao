<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/8/9
 * Time: 19:00
 */

namespace app\api\model;


/**
 * Banner模型 继承Model
 * Class Banner
 * @package app\api\model
 */
class Banner extends BaseModel
{

    protected $hidden = ['delete_time','update_time'];

    public function items(){
        return $this->hasMany('BannerItem','banner_id','id');
    }

    public static function getBannerById($id)
    {
        return self::with(['items','items.images'])->find($id);
    }
}