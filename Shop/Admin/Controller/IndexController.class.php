<?php
/**
 * 后台首页控制器
 * Created by PhpStorm.
 * User: Shadow
 * Date: 2016-04-03 0003
 * Time: 13:14
 * Http: www.hongyuvip.com
 */

namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    //首页frameset html框架集成方法

    function index(){
        if(session('adminname') == ''){
            $this -> error('请先登录管理员账号',U('Login/index'));
        }else{
            $admin = new \Model\AdminModel();
            $admin = $admin->checkName(session('adminname'));
            if($admin == false){
                $this -> error('请先登录管理员账号',U('Login/index'));
            }else{
                $this->display();
            }
        }
    }

    //后台首页
    function home_admin(){
//        $goods = D("Goods");
//        $info = $goods -> select();
//        $this -> assign('info',$info);
        $this -> display();
    }

    //左侧
    function left(){
        $this -> display();
    }
    function main(){
        $info = array(
            '系统名称'=>'鸿宇多用户商城',
            '开发团队'=>'鸿宇科技 & Shadow',
            '企业官网'=>'<a href="http://www.hongyuvip.com" target="_blank">http://www.hongyuvip.com</a>',
            '操作系统'=>PHP_OS,
            '运行环境'=>$_SERVER["SERVER_SOFTWARE"],
            'PHP运行方式'=>php_sapi_name(),
            'ThinkPHP版本'=>THINK_VERSION.' [ <a href="http://thinkphp.cn" target="_blank">查看最新版本</a> ]',
            '上传附件限制'=>ini_get('upload_max_filesize'),
            '执行时间限制'=>ini_get('max_execution_time').'秒',
            '服务器时间'=>date("Y年n月j日 H:i:s"),
            '北京时间'=>gmdate("Y年n月j日 H:i:s",time()+8*3600),
            '服务器域名/IP'=>$_SERVER['SERVER_NAME'].' [ '.gethostbyname($_SERVER['SERVER_NAME']).' ]',
            '剩余空间'=>round((disk_free_space(".")/(1024*1024)),2).'M',
            'register_globals'=>get_cfg_var("register_globals")=="1" ? "ON" : "OFF",
            'magic_quotes_gpc'=>(1===get_magic_quotes_gpc())?'YES':'NO',
            'magic_quotes_runtime'=>(1===get_magic_quotes_runtime())?'YES':'NO',
        );
        $this->assign('info',$info);
        $this->display();
    }
    //右侧
    function right(){
        $info = array(
            '系统名称'=>'鸿宇多用户商城',
            '开发团队'=>'鸿宇科技 & Shadow',
            '企业官网'=>'<a href="http://www.hongyuvip.com" target="_blank">http://www.hongyuvip.com</a>',
            '操作系统'=>PHP_OS,
            '运行环境'=>$_SERVER["SERVER_SOFTWARE"],
            'PHP运行方式'=>php_sapi_name(),
            'ThinkPHP版本'=>THINK_VERSION.' [ <a href="http://thinkphp.cn" target="_blank">查看最新版本</a> ]',
            '上传附件限制'=>ini_get('upload_max_filesize'),
            '执行时间限制'=>ini_get('max_execution_time').'秒',
            '服务器时间'=>date("Y年n月j日 H:i:s"),
            '北京时间'=>gmdate("Y年n月j日 H:i:s",time()+8*3600),
            '服务器域名/IP'=>$_SERVER['SERVER_NAME'].' [ '.gethostbyname($_SERVER['SERVER_NAME']).' ]',
            '剩余空间'=>round((disk_free_space(".")/(1024*1024)),2).'M',
            'register_globals'=>get_cfg_var("register_globals")=="1" ? "ON" : "OFF",
            'magic_quotes_gpc'=>(1===get_magic_quotes_gpc())?'YES':'NO',
            'magic_quotes_runtime'=>(1===get_magic_quotes_runtime())?'YES':'NO',
        );
        $this->assign('info',$info);
        $this->display();
    }

}