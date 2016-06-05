<?php
/**
 * Created by PhpStorm.
 * User: Shadow
 * Date: 2016/6/2
 * Time: 14:29
 */
return array(
    'app_begin' => array(
        'Behavior\ReadHtmlCacheBehavior',   // 读取静态缓存
        'Behavior\CheckLangBehavior',
    ),
);