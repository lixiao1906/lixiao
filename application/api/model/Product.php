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
    protected $hidden = ['from', 'create_time', 'delete_time', 'update_time', 'category_id', 'pivot', 'img_id', 'summary'];

    public function getMainImgUrlAttr($value, $data)
    {
        return $this->prefixImgUrl($value, $data);
    }

    /**
     * 查询最近商品 （按几条查询）
     * @param $count
     * @return mixed
     */
    public static function getProductRecently($count)
    {
        return self::order('create_time desc')->limit($count)->select();
    }

    /**
     * 根据分类ID查询产品
     */
    public static function getProductByCategoryId($id)
    {
        return self::where('category_id', '=', $id)->select();
    }

    public function imgs()
    {
        return $this->hasMany('ProductImage', 'product_id', 'id');
    }

    public function properties()
    {
        return $this->hasMany('ProductProperty', 'product_id', 'id');
    }

    /**
     * 查询商品详情
     *
     * @param $id
     */
    public static function getProductDetail($id)
    {
        //Query
        return self::with(['imgs' => function ($query) {
            $query->with(['imgUrl'])->order('order', 'asc');
        }])->with(['properties'])
            ->find($id);
    }
}