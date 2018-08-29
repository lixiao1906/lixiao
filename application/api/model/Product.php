<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/8/26
 * Time: 10:24
 */

namespace app\api\model;


class Product extends BaseModel
{
   protected $hidden = ['from', 'create_time', 'delete_time', 'update_time', 'category_id','pivot','img_id','summary'];

    public function getMainImgUrlAttr($value, $data)
    {
        return $this->prefixImgUrl($value, $data);
    }

    /**
     * 查询最近商品 （按几条查询）
     * @param $count
     * @return mixed
     */
    public static function getProductRecently($count){
        return self::order('create_time desc')->limit($count)->select();
    }

    /**
     * 根据分类ID查询产品
     */
    public static function getProductByCategoryId($id){
        // 笑笑，这个不用关联关系，你看一下产品表里就有这个categoryid字段，直接用这个去查就行了，这个时候还要传过来
        // 一个参数，直接用self,where里面你来写，参照其他的 今天第一次写
        return self::where('category_id','=',$id)->select();
    }
}