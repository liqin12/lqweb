<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/29
 * Time: 10:24
 */
namespace  app\admin\controller;

use think\Request;
use think\Controller;
class Goods extends Controller
{
    /**
     * 商品展示
     */
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 添加商品
     */
    public function add_goods()
    {

        $list=db('category')->where('level',3)->select();
        $this->assign('list',$list);
        return $this->fetch();
    }

    /**
     * 添加处理
     */
    public function goods_hendel()
    {

        $post=Request::instance()->post();
        $file=request()->file('img');
        $info=$file->move(ROOT_PATH.'public'.DS.'uploads');
        $data['goods_name']=$post['name'];
        $data['categoryid']=$post['cate_id'];
        $data['goods_price']=$post['price'];
        if ($info){
            $data['goods_img']=$file->getSaveName();
        }else{
            echo $file->getError();
        }
        $data['is_show']=$post['is_show'];
        $data['goods_time']=

        var_dump($post);
    }
}