<?php
/**
 * Created by PhpStorm.
 * User: Shadow
 * Date: 2016/6/8
 * Time: 10:32
 */
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {

    public function user(){
        //调试输出函数
        $this -> display();
    }

    public function index(){
        $this -> display();
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
                $this -> redirect('User/index');
            }
        }else{
            $this->display();
        }
    }

    public function logout(){
        //清空全部session
        session(null);
        //跳转至用户登录界面
        $this -> redirect('User/login');
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
                    $this -> success('注册成功',U('User/login'));
                }else{
                    $this -> error('注册失败',U('User/index'));
                }
            }
        }else{
            $this->display();
        }
    }

    public function showName(){
        $rst=D("Hospital")->where(array('hos_name'=>$_REQUEST['username']))->find();
        if($rst){
            echo "有";
        }else{
            echo "无";
        }
    }
    public function verifyImg(){
        $config = array(
            'fontSize' => 16,
            'imageH' => 35,
            'imageW' => 110,
            'length' => 4,
            'fontttf' => '4.ttf',
        );
        $verify = new \Think\Verify($config);
        $verify ->entry();
    }
}
