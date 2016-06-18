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

    public function __construct(){
        parent::__construct();
        if(!session('adminname')){
            $this -> error('请先登录管理员账号',U('Login/index'));
        }
    }
    function index(){
        $this->display();
    }

    //左侧
    function left(){
        $this -> display();
    }
    public function show() {
        show_bug(DATA_PATH);
//        S('data',NULL);
    }
    public function cache_clear() {
        $this->deldir(RUNTIME_PATH);
    }
    function deldir($dir) {
        $dh = opendir($dir);
        while ($file = readdir($dh)) {
            if ($file != "." && $file != "..") {
                $fullpath = $dir . "/" . $file;
                if (!is_dir($fullpath)) {
                    unlink($fullpath);
                } else {
                    deldir($fullpath);
                }
            }
        }
    }
}