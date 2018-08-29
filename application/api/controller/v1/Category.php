<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/8/29
 * Time: 20:55
 */

namespace app\api\controller\v1;

use app\api\model\Category as CategoryModel;
use app\lib\exception\CategoryException;

class Category
{
    /**
     * 查询全部分类
     */
    public function getAllCategories(){
        // 好了，不卡了,这个all接收俩个参数，第一个是参数，咱们这里不需要参数，
        //就传一个空的数组就可以了,我一会再给你写一个别的，第二个参数是关联模型
        // 这是静态方法，这个方法就相当于CategoryModel::with('topicImg')->select();没什么区别，就是另外一种表达方式
        // 你把哪些不要的隐藏了吧,在模型里写，不行，因为hidden是模型里的方法
        $result = CategoryModel::all([],'topicImg');
        if(!$result){
            throw new CategoryException();
        }
        return $result;
    }
}