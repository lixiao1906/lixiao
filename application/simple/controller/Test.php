<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/8/3
 * Time: 18:38
 */

namespace app\simple\controller;


class Test
{

    public function getData($id)
    {
        $data = [
            'name' => 'test_',
            'age' => 18
        ];

        return json($data);
    }
}