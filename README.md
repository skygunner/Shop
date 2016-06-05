## HTML常用class
* breadcrumb  (设置背景色为 #F5F5F5)
* container （固定宽度）
* container-fluid （100% 宽度）
* checked   (checkbox多选复选框选中)
* col-sm-offset-1   (左边空出 sm-1 距离)


## ThinkPHP
* 自动加载-自定义函数库   (应用目录/Common/Common/function.php)
* var_dump(get_defined_constants(true));  (显示系统变量)
* 网址跳转  ( $this -> success('注册成功',U('Index/login')); )
* 验证码验证判断
    $verify = new \Think\Verify();
    if(!$verify ->check($_POST['captcha'])){
        echo "验证码不正确";
    }else{
        echo "验证码yes";
    }
* redirect() //页面跳转 $this -> redirect($url,$params,$delay,$msg);
    示例: $this -> redirect('Index/index');
          (调试时使用) $this -> redirect('Index/index',array('id'=>$rst['user_id'],'name'=>$rst['username']),2,'登录成功');
* 扩展配置
    // 加载扩展配置文件'LOAD_EXT_CONFIG' => 'user,db',
    假设扩展配置文件user.php 和db.php分别用于用户配置和数据库配置，这样做的好处是哪怕以后关闭调试模式，你修改db配置文件后依然会自动生效。
    如果在应用公共设置文件中配置的话，那么会自动加载应用公共配置目录下面的配置文件Application/Common/Conf/user.php和Application/Common/Conf/db.php。
    如果在模块（假设是Home模块）的配置文件中配置的话，则会自动加载模块目录下面的配置文件 Application/Home/Conf/user.php 和 Application/Home/Conf/db.php。





## JS
* onclick="this.src='图片src地址'"  (单击刷新图片验证码,可放到<img>标签中)

## PHP
* 判断用户名和密码 ( select * from 表名 where name=$name and pwd=$pwd; )
* 显示系统信息
    操作系统        PHP_OS
    Apache版本      apache_get_version()
    PHP版本         PHP_VERSION
    运行方式        PHP_SAPI





## session / cookie
* 常用操作操作
    session(name,value,有效时间) 设置session
    session(name) 获取session
    session(name,null) 删除指定session
    session(null) 清空全部session

  示例:
    session('username,password');
    session('user_id',$rst['user_id']);







































## 简介

ThinkPHP 是一个免费开源的，快速、简单的面向对象的 轻量级PHP开发框架 ，创立于2006年初，遵循Apache2开源协议发布，是为了敏捷WEB应用开发和简化企业应用开发而诞生的。ThinkPHP从诞生以来一直秉承简洁实用的设计原则，在保持出色的性能和至简的代码的同时，也注重易用性。并且拥有众多的原创功能和特性，在社区团队的积极参与下，在易用性、扩展性和性能方面不断优化和改进，已经成长为国内最领先和最具影响力的WEB应用开发框架，众多的典型案例确保可以稳定用于商业以及门户级的开发。

## 全面的WEB开发特性支持

最新的ThinkPHP为WEB应用开发提供了强有力的支持，这些支持包括：

*  MVC支持-基于多层模型（M）、视图（V）、控制器（C）的设计模式
*  ORM支持-提供了全功能和高性能的ORM支持，支持大部分数据库
*  模板引擎支持-内置了高性能的基于标签库和XML标签的编译型模板引擎
*  RESTFul支持-通过REST控制器扩展提供了RESTFul支持，为你打造全新的URL设计和访问体验
*  云平台支持-提供了对新浪SAE平台和百度BAE平台的强力支持，具备“横跨性”和“平滑性”，支持本地化开发和调试以及部署切换，让你轻松过渡，打造全新的开发体验。
*  CLI支持-支持基于命令行的应用开发
*  RPC支持-提供包括PHPRpc、HProse、jsonRPC和Yar在内远程调用解决方案
*  MongoDb支持-提供NoSQL的支持
*  缓存支持-提供了包括文件、数据库、Memcache、Xcache、Redis等多种类型的缓存支持

## 大道至简的开发理念

ThinkPHP从诞生以来一直秉承大道至简的开发理念，无论从底层实现还是应用开发，我们都倡导用最少的代码完成相同的功能，正是由于对简单的执着和代码的修炼，让我们长期保持出色的性能和极速的开发体验。在主流PHP开发框架的评测数据中表现卓越，简单和快速开发是我们不变的宗旨。

## 安全性

框架在系统层面提供了众多的安全特性，确保你的网站和产品安全无忧。这些特性包括：

*  XSS安全防护
*  表单自动验证
*  强制数据类型转换
*  输入数据过滤
*  表单令牌验证
*  防SQL注入
*  图像上传检测

## 商业友好的开源协议

ThinkPHP遵循Apache2开源协议发布。Apache Licence是著名的非盈利开源组织Apache采用的协议。该协议和BSD类似，鼓励代码共享和尊重原作者的著作权，同样允许代码修改，再作为开源或商业软件发布。