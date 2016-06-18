<?php
/**
 * Created by PhpStorm.
 * User: Shadow
 * Date: 2016/6/8
 * Time: 11:00
 */
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller {
    public function header(){
        $this -> display();
    }

    public function show(){
        $this -> display();
    }
}