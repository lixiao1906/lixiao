<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/8/3
 * Time: 19:50
 */

namespace app\api\controller\v2;


class Test
{
    /**
     * @param $id
     * @param $name
     * @return string
     */
    public function getData($id)
    {
        // 1.接收参数
        // 2.构造一个规则
        // 3.返回结果
        $data = [
            'name' => 'test_',
            'age' => 18
        ];

        return json($data);
    }
}