<?php
/**
 * 后台商品控制器
 * Created by PhpStorm.
 * User: Shadow
 * Date: 2016-04-04 0004
 * Time: 12:33
 * Http: www.hongyuvip.com
 */

namespace Admin\Controller;
use Admin\Controller\IndexController;
class GoodsController extends IndexController {
    //商品列表展示
    function showlist(){
        $goods = D("Goods");
        $total = $goods -> count();
        $per = 20;
        $page = new \Component\Page($total,$per);
        $sql = "select * from hy_goods " . $page->limit;
        $info = $goods -> query($sql);
        $pagelist = $page -> fpage();
        //$info = $goods -> select();
        $this -> assign('info',$info);
        $this -> assign('pagelist',$pagelist);
        $this -> display();
    }

    function showlist_old_02(){
        //实例化 Model 对象
        $goods = D("Goods");

        //获取数据信息
        $info = $goods -> select();

        //$goods = D();
        //$info = $goods -> table('hy_goods') -> select();
        //show_bug($info);

        //输出调试变量信息
        //show_bug($info);
        //foreach($info as $k => $v){
        //    echo $v['goods_name']."<br/>";
        //}


        //价格大于1000元的商品 和 商品名字含有 海 字商品
        //$info = $goods -> where("market_price > 1000 and goods_name like '%海%'") -> select();

        //查询指定字段
        //$info = $goods -> field("goods_id,goods_name") -> select();

        //限制条数
        //$info = $goods -> limit(5,5) ->select();

        //分组查询 group by
        //查询当前商品一共的分组信息
        //通过分组设置可以查询每个分组的商品信息
        //例如: 每个分组下面有多少商品信息
        //      select goods_category_id,count(*) from group by category_id
        //      每个分组下面商品的价格算术和是多少
        //      select category_id,sum(price) from table group by category_id
        //$info = $goods -> field('goods_category_id')-> group('goods_category_id') ->select();

        //排序显示结果 order by market_price desc (desc降序/asc升序)
        //$info = $goods -> order('market_price desc') -> select();

        //把数据 assign 到模板
        $this -> assign('info',$info);
        $this -> display();
    }


    //添加商品
    function add(){
        $goods = D("Goods");
        $ar = array(
            'goods_name' => 'iphone5S',
            'goods_price' => '5888',
            'goods_number' => '53'
        );
        $rst = $goods -> add($ar);

        if($rst > 0){
            echo "商品添加成功";
        }else{
            echo "商品添加失败";
        }

        $this -> display();
    }

    function add_goods(){
//        echo __SELF__;
//        show_bug($_FILES);
//        move_uploaded_file('临时路径名','真实路径名');
        $goods = D("Goods");
        //两个逻辑 ①展现表单 ②接受表单数据
        if(!empty($_POST)){
            //判断附件是否有上传,如果有则实例化Upload,把附件上传到服务器指定位置
            //然后把附件的路径或得到,存入$_POST
            if(!empty($_FILES)){
                $config = array(
                    //'配置项'=>'配置值'
                    'rootPath' => './Shop/Public/Upload/',
                    'savePath' => 'Shop/',
                );
                $upload = new \Think\Upload($config);

                $rst = $upload ->uploadOne($_FILES['goods_img']);
                if(!$rst){
                    show_bug($upload ->getError());
                }else{
                    $imgBig = $rst['savepath'].$rst['savename'];
                    $_POST['goods_img'] = $imgBig;

                    // 商品图片-缩略图
                    $image = new \Think\Image();
                    $srcimg = $upload->rootPath . $imgBig;
                    $image -> open($srcimg);
                    $image -> thumb(150,150);
                    $imgSmall = $rst['savepath']."small_" . $rst['savename'];
                    $image -> save($upload->rootPath . $imgSmall);
                    $_POST['goods_img_small'] = $imgSmall;
                    $_POST['goods_sn'] = "HY" . "88888888";
                }

            }
            $goods -> create(); //自动过滤非法字段
            $z = $goods -> add();
            if($z){
                $this -> success('添加商品成功',U('Goods/showlist'));
            }else{
                $this -> error('添加商品失败',U('Goods/showlist'));
            }
        }else{
            $this -> display();

        }
    }

    //修改商品
    function upd(){
        $this -> display();
    }

}
