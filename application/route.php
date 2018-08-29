<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

//Route::post('lixiao/article/:id','simple/Test/test');

//Route::post('lixiao/article','simple/Test/test');

// GET POST DELETE PUT *
// Route::any();

Route::get('api/:version/banner/:id','api/:version.Banner/getBanner');

Route::get('api/:version/theme','api/:version.Theme/getSimpleList');
Route::get('api/:version/theme/:id','api/:version.Theme/getThemeByID');

//产品端
Route::get('api/:version/product/recently','api/:version.Product/getRecently');
Route::get('api/:version/product/by_category','api/:version.Product/getProductByCategoryId');

//全部分类 不用，直接查那张表不就可以了吗，你分析一下，整个分类的模块，它就一张表就可以了，但是小程序调用，一个接口就可以了
Route::get('api/:version/category/all','api/:version.Category/getAllCategories');

//在哪里写
//Route::get('api/:version/Angle/:id','api/:version.Angle/get');
//Route::get('api/v1/banner/:id','api/v1.Banner/getBanner');

//Route::rule('lixiao/article','simple/Test/test','GET|POST',['http'=>true]);

//Route::get('api/:version/smile/:id','api/:version.Test/getData');

