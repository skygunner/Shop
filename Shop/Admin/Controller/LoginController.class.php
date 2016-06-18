<?php
/**
 * Created by PhpStorm.
 * User: Shadow
 * Date: 2016/6/17
 * Time: 11:05
 */

namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
    function index(){
        if($_POST){
            $model = D('Admin');
            if($model->create($_POST, 4)){
                $ret = $model->login();
                if($ret === TRUE){
                    //$this->success('登陆成功！',U('Index/index'));
                    $this -> redirect('Index/index');
                    exit;
                }else{
                    $ret == 1 ? $this->error('用户名不存在！') : $this->error('密码不正确！');
                }
            }else{
                $this->error($model->getError());
            }
        }
        $this->display();
    }

    public function logout(){
        //清空全部session
        session(null);
        //跳转至用户登录界面
        $this->redirect('Login/index');
    }

    public function captchaImg(){
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