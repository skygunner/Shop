<?php
/**
 * Created by PhpStorm.
 * User: Shadow
 * Date: 6/4/2016
 * Time: 3:03 PM
 */

return array(
    //修改模板引擎为Smarty
    'TMPL_ENGINE_TYPE'      =>  'Smarty',   //修改模板引擎为 smarty
    'APP_SUB_DOMAIN_DEPLOY' =>  false,   // 是否开启子域名部署
    'APP_SUB_DOMAIN_RULES'  =>  array(), // 子域名部署规则
    //多语言支持
    'LANG_SWITCH_ON' => true,   // 开启语言包功能
    'LANG_AUTO_DETECT' => true, // 自动侦测语言 开启多语言功能后有效
    'LANG_LIST'        => 'zh-cn,zh-tw,en-us', // 允许切换的语言列表 用逗号分隔
    'VAR_LANGUAGE'     => 'hl', // 默认语言切换变量
    //不区分大小写
    'URL_CASE_INSENSITIVE'  =>  true,
    //设置文件上传根目录
    'rootPath' => './Shop/Public/Upload/',
    'savePath' => 'Shop/',
);