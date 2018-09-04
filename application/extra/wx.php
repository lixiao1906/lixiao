<?php
/**
 * Created by PhpStorm.
 * User: MacBook Air
 * Date: 2018/9/3
 * Time: 21:07
 */

return [
    // 微信小程序APP_ID
    'app_id' => 'wx55270fafe119578d',

    // 微信小程序APP_SECRET
    'app_secret' => '254807b9a34e82f52aae4325fa30450c',

    // 微信使用code换取用户openid及session_key的url地址
    'login_url' => "https://api.weixin.qq.com/sns/jscode2session?" .
        "appid=%s&secret=%s&js_code=%s&grant_type=authorization_code",
];