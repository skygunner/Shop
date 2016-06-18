<?php
/**
 * Created by PhpStorm.
 * User: Shadow
 * Date: 2016-05-03 0003
 * Time: 19:02
 * Http: www.hongyuvip.com
 */

namespace Admin\Controller;
use Admin\Controller\IndexController;
class UserController extends IndexController{
    function show_user(){
        $user = D("User");
        $total = $user -> count();
        $per = 10;
        $page = new \Component\Page($total,$per);
        $sql = "select * from hy_user " . $page->limit;
        $info = $user -> query($sql);
        $pagelist = $page -> fpage();
        $this -> assign('info',$info);
        $this -> assign('pagelist',$pagelist);
        $this -> display();

    }

    //添加会员
    function add(){
        $user = D("User");
        $ar = array(
            'username' => '鸿宇科技',
            'user_tel' => '18888888888',
            'user_email' => 'admin@hongyuvip.com',
            'user_qq' => '1527200768'
        );
        $rst = $user -> add($ar);

        if($rst > 0){
            echo "会员添加成功";
        }else{
            echo "会员添加失败";
        }
        $this -> display();
    }

}

