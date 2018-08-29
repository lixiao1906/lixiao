<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/8/25
 * Time: 20:02
 */

namespace app\api\model;


class Theme extends BaseModel
{
    protected $hidden = ['topic_img_id', 'head_img_id', 'delete_time', 'update_time'];

    public function topicImg()
    {
        // $this->hasOne();写在外键表里用belongsto;否则可以用hasone
        return $this->belongsTo('Image', 'topic_img_id', 'id');
    }

    public function headImg()
    {
        return $this->belongsTo('Image', 'head_img_id', 'id');
    }

    //多对多关系
    public function products()
    {
        return $this->belongsToMany('Product', 'theme_product',
            'product_id', 'theme_id');
    }

    /**
     * 类似于Banner控制器中的getBannerById这个方法只是易读
     * @param $id
     * @return 一个theme数据
     */
    public static function getThemeWithProducts($id){
       // return self::with('products,topicImg,headImg')->find($id);
    }
}