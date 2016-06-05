<?php
namespace Home\Controller;
use Model\UserModel;
use Think\Controller;
use Think\Crypt\Driver\Think;

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

    public function login(){
        if(!empty($_POST)) {
            $user = new \Model\UserModel();
            $rst = $user->checkNamePwd($_POST['username'], $_POST['password']);
            if($rst === false){
                echo"用户名或密码错误";
            }else{
                session('username',$rst['username']);
                session('user_id',$rst['user_id']);
                $this -> redirect('Index/index');
            }
        }else{
            $this->display();
        }
    }

    public function logout(){
        //清空全部session
        session(null);
        //跳转至用户登录界面
        $this -> redirect('Index/login');
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
    public function register(){
        $User = new \Model\UserModel();
        if(!empty($_POST)){
            if (!$User->create()){
                show_bug($User->getError());
                exit;
            }else{
                // 验证通过 可以进行其他数据操作
                $_POST['password'] = md5($_POST['password']);
                $rst = $User -> add($_POST);
                if($rst > 0){
                    $this -> success('注册成功',U('Index/login'));
                }else{
                    $this -> error('注册失败',U('Index/index'));
                }
            }
        }else{
            $this->display();
        }
    }

    public function verifyImg(){
        $config = array(
            'fontSize' => 18,
            'imageH' => 35,
            'imageW' => 150,
            'length' => 4,
            'fontttf' => '4.ttf',
        );
        $verify = new \Think\Verify($config);
        $verify ->entry();
    }

    //多语言切换
    public function lang(){
        $this -> assign('lang',L());
        $this -> display();
    }

}