<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/8/25
 * Time: 19:05
 */

namespace app\api\controller\v1;


use app\api\model\Theme as ThemeModel;
use app\api\validate\IDCollection;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\ThemeException;

class Theme
{

    /**
     * @param $ids : id1,id2,id3...
     * @return 一组主题模型
     */
    public function getSimpleList($ids = '')
    {
        // 1.校验参数
        (new IDCollection())->goCheck();
        // 2.准备模型数据
        $result = ThemeModel::with('topicImg,headImg')->select($ids);
        // 3.考虑异常
        if (!$result) {
            throw new ThemeException();
        }
        return $result;
    }

    /**
     *  根据ID查询一个主题
     * @param $id
     */
    public function getThemeByID($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $result = ThemeModel::with('products,topicImg,headImg')->find($id);
        // $result = ThemeModel::getThemeWithProducts($id);
        if (!$result) {
            throw new ThemeException();
        }
        return $result;
    }
}