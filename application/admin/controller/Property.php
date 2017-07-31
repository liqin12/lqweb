<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\Lq_proprety;

class Property extends  Controller
{
    public function index()
    {
        $model=new Lq_proprety();
        $list=$model->query_pro();
        $this->assign('list',$list);
        return $this->fetch();
    }

    /**
     * 添加数据
     * @return mixed
     */
    public function add_pro()
    {
        $model=new Lq_proprety();

        $post=Request::instance()->post();
        if ($post){
            $rs=$model->insert_pro(array('pro_name'=>$post['pro_name']));
            if ($rs){
                $this->success('添加成功',url('index'));
            }else{
                $this->error('添加失败');
            }
        }
        return $this->fetch();
    }
}

