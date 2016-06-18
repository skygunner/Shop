<?php
/**
 * Created by PhpStorm.
 * User: Shadow
 * Date: 2016-04-03 0003
 * Time: 13:24
 * Http: www.hongyuvip.com
 */

namespace Admin\Controller;
use Admin\Controller\IndexController;
class ManagerController extends IndexController {

    //增加管理员
    public function addAdmin(){
        if(IS_POST){
            $admin = D('Admin');
            if($admin->create()){
                if($admin->add()){
                    $this->success('添加成功',U('Manager/listAdmin'));
                    exit;
                }else{
                    $this->error('添加失败，请重试！');
                }
            }else{
                $this->error($admin->getError());
            }
        }
        $this->display();
    }

    //编辑管理
    public function saveAdmin($id){
        $admin = D('Admin');
        if($_POST){
            if($admin->create()){
                if($admin->save() !== FALSE){
                    $this->success('修改成功',U('Manager/listAdmin'));
                    exit;
                }else{
                    $this->error('修改失败，请重试！');
                }
            }else{
                $this->error($admin->getError());
            }
        }
        $info = $admin->find($id);
        $this->assign('info',$info);
        $this->display();
    }

    //显示管理员
    public function listAdmin(){
        $admin = D("Admin");
        $total = $admin -> count();
        $per = 10;
        $page = new \Component\Page($total,$per);
        $sql = "select * from hy_admin " . $page->limit;
        $info = $admin -> query($sql);
        $pagelist = $page -> fpage();

        $this -> assign('info',$info);
        $this -> assign('pagelist',$pagelist);
        $this -> display();
    }

    //删除管理员
    public function delAdmin($id){
        if($id > 1){
            $admin = M('Admin');
            $admin->delete($id);
        }
        $this->success('删除成功',U('Manager/listAdmin'));
    }



    public function system(){
        $info = array(
            '系统名称'=>'鸿宇多用户商城',
            '开发团队'=>'鸿宇科技 & Shadow',
            '企业官网'=>'<a href="http://www.hongyuvip.com" target="_blank">http://www.hongyuvip.com</a>',
            '操作系统'=>PHP_OS,
            '运行环境'=>$_SERVER["SERVER_SOFTWARE"],
            'PHP运行方式'=>php_sapi_name(),
            'ThinkPHP版本'=>THINK_VERSION,
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