<?php
/**
 * 自定义函数
 * Created by PhpStorm.
 * User: Shadow
 * Date: 2016/6/2
 * Time: 12:40
 */

//BUG调试函数
function show_bug($msg){
    echo "<pre style='color:red;'>";
    var_dump($msg);
    echo "</pre>";
}

//验证码判断
function checkCaptcha($captcha){
    $verify = new \Think\Verify();
    if(!$verify ->check($captcha)){
        return false;
    }else{
        return true;
    }
}


function verifyImg(){
    $config = array(
        'fontSize' => 18,
        'imageH' => 35,
        'imageW' => 150,
        'length' => 4,
        'fontttf' => '4.ttf',
    );
    $verify = new \Think\Verify($config);
    $verify ->entry();
//        show_bug($verify);
}