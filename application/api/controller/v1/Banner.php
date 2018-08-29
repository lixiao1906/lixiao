<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/8/7
 * Time: 18:27
 */

namespace app\api\controller\v1;


use app\api\model\Banner as BannerModel;
use app\api\validate\IDMustBePositiveInt;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\BannerMissException;

class Banner
{
    /**
     * @param $id
     */
    public function getBanner($id)//这个不校验为空这种情况吗
    {
        //攔截器
        (new IDMustBePositiveInt())->goCheck();
        $result = BannerModel::getBannerById($id);
        if (!$result) {
            throw new BannerMissException();
        }
        return $result;
    }
}