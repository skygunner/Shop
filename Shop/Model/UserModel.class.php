<?php
/**
 * Created by PhpStorm.
 * User: Shadow
 * Date: 2016/6/2
 * Time: 3:31
 */
namespace Model;
use Think\Model;
class UserModel extends Model{

    function checkNamePwd($name,$pwd){
        //getBYXX(); 根据指定XX字段进行查询,弗雷Model利于__call()封装的方法
        $info = $this ->getByusername($name);
        //$info部位null,就可以继续验证密码
        if($info != null){
            if($info['password'] != md5($pwd)){
                return false;
            }else{
                return $info;
            }
        }else{
            return false;
        }
    }

    //判断用户名是否存在
    function checkName($name){
        $info = $this ->getByadminname($name);
        if($info != null){
            return $info['adminname'];
        }else{
            return false;
        }
    }

    function checkCaptcha($captcha){
        $verify = new \Think\Verify();
        if(!$verify ->check($captcha)){
            return false;
        }else{
            return true;
        }
    }
    //批处理验证-数组方式批量显示错误
    protected $patchValidate = true;
    //验证规则
    protected $_validate = array(
        array('username','require','用户名必须填写！',0,'regex',1),
        array('username','','用户名已经存在！',0,'unique',1),// 在新增的时候验证name字段是否唯一

        array('password','require','密码必须填写！',0,'regex',1),
        array('password','checkPwd','密码格式不正确',0,'function'), // 自定义函数验证密码格式

        array('repassword','require','确认密码必须填写！',0,'regex',1),
        array('repassword','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致

        array('mobile','require','手机号必须填写！',0,'regex',1),
        array('mobile','/^1[0-9]\d{9}$/','请填写正确的手机号码！',0,'regex',1),

        array('captcha','require','验证码必须填写！',2,'regex',1), // 存在字段就验证

        array('mobilecode','require','手机验证码必须填写！',0,'regex',1),

        array('email','email','邮箱格式不正确！',2 ),
        array('qq','/^[1-9]\d{4,15}$/','QQ号码！'),

        //array('value',array(1,2,3),'值的范围不正确！',2,'in'), // 当值不为空的时候判断是否在一个范围内
    );
}