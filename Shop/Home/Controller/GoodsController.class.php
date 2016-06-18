<?php
/**
 * Created by PhpStorm.
 * User: Shadow
 * Date: 2016/6/6
 * Time: 10:38
 */
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller {
    public function index(){
        if($_SESSION['username'] == ""){
            $this->assign('username','N');
        }else{
            $this->assign('username',$_SESSION['username']);
        }
        $this->display();
    }

}