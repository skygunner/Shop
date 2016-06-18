<?php
/**
 * Created by PhpStorm.
 * User: Shadow
 * Date: 2016/6/8
 * Time: 10:32
 */
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        session_start();
        if($_SESSION['username'] == ""){
            $this->assign('username','N');
        }else{
            $this->assign('username',$_SESSION['username']);
        }
        $this->display();
    }

    public function show(){
        //调试输出函数
    }

    public function register11(){
        if(!empty($_POST)){
            //验证码校验
            $verify = new \Think\Verify();
            if(!$verify->check($_POST['captcha'])){
                echo "验证码错误";
            } else {
                //判断用户名和密码，在model模型里边制作一个专门方法进行验证
                $user = new \Model\ManagerModel();
                $rst = $user -> checkNamePwd($_POST['mg_username'],$_POST['mg_password']);
                if($rst === false){
                    echo "用户名或密码错误";
                } else {
                    //登录信息持久化$_SESSION
                    session('mg_username',$rst['mg_name']);
                    session('mg_id',$rst['mg_id']);
                    //$this ->redirect($url, $params, $delay, $msg)
                    //$this -> redirect('Index/index',array('id'=>100,'name'=>'tom'),2,'用户马上登陆到后台');
                    $this -> redirect('Index/index');
                }
            }
        }
        $this -> assign('lang',L());
        $this -> display();
    }


    //多语言切换
    public function lang(){
        $this -> assign('lang',L());
        $this -> display();
    }

}