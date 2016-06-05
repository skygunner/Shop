<?php
/**
 * Created by PhpStorm.
 * User: Shadow
 * Date: 2016/6/5
 * Time: 11:29
 */

namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
    function index(){
//        show_bug($_POST);
        if(!empty($_POST)){
            // 判断验证码是否正确
            $verify = new \Think\Verify();
            if(!$verify->check($_POST['captcha'])){
                $this -> error('验证码错误',U('Login/index'));
            } else {
                //验证码正确
                //判断用户名和密码，在model模型里边制作一个专门方法进行验证
                $admin = new \Model\AdminModel();
                $rst = $admin -> checkNamePwd($_POST['adminname'],$_POST['password']);
                if($rst === false){
                    $this -> error('用户名或密码错误',U('Login/index'));
                } else {
                    //登录信息持久化$_SESSION
                    session('adminname',$rst['adminname']);
                    session('admin_id',$rst['admin_id']);
                    //$this ->redirect($url, $params, $delay, $msg)
                    //$this -> redirect('Index/index',array('id'=>100,'name'=>'tom'),2,'用户马上登陆到后台');
                    $this -> redirect('Index/index');
                }
            }
        }else{
            $this ->display();
        }
    }

    public function logout(){
        //清空全部session
        session(null);
        //跳转至用户登录界面
        $this -> redirect('Login/index');
    }

    public function verifyImg(){
        $config = array(
            'fontSize' => 20,
            'imageH' => 39,
            'imageW' => 150,
            'length' => 4,
            'fontttf' => '4.ttf',
        );
        $verify = new \Think\Verify($config);
        $verify ->entry();
    }
}