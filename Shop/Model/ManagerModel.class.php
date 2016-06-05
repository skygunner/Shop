<?php
/**
 * Created by PhpStorm.
 * User: Shadow
 * Date: 2016/6/2
 * Time: 3:31
 */
namespace Model;
use Think\Model;
class ManagerModel extends Model{
    function checkNamePwd($name,$pwd){
        //getBYXX(); 根据指定XX字段进行查询,弗雷Model利于__call()封装的方法
        $info = $this ->getByusername($name);
        show_bug($info);
    }
}