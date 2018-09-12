<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/8/26
 * Time: 16:31
 */

namespace app\api\controller\v1;


use app\api\validate\Count;
use app\api\model\Product as ProductModel;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\ProductException;

class Product
{
    public function getRecently($count = 15)
    {
        (new Count())->goCheck();
        $result = ProductModel::getProductRecently($count);
        return $result;
    }

    /**
     * 根据分类ID查询商品
     * @param $id
     */
    public function getProductByCategoryId($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $result = ProductModel::getProductByCategoryId($id);
        if (!$result) {
            throw new ProductException();
        }
        return $result;
    }

    /**
     * 查询商品详情
     *
     * @param $id
     */
    public function getOne($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $product = ProductModel::getProductDetail($id);
        if (!$product) {
            return new ProductException();
        }
        return $product;
    }
}