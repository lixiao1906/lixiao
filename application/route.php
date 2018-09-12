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
Route::get('api/:version/product/:id','api/:version.Product/getOne');

Route::get('api/:version/category/all','api/:version.Category/getAllCategories');

Route::post('api/:version/token/user','api/:version.Token/getToken');
