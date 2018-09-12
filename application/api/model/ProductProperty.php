<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/9/10
 * Time: 22:20
 */

namespace app\api\model;


class ProductProperty extends BaseModel
{
    protected $hidden = ['delete_time', 'update_time', 'product_id'];
}