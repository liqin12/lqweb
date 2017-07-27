<?php
/**
 * 分类
 */
namespace app\admin\controller;

use think\Request;
use think\Controller;
//use app\admin\model\Category;

class Category extends Controller
{
    public function index()
    {
        $list=db('category')->where('level',1)->order('id desc')->select();
        foreach ($list as $k=>$v)
        {
            $list[$k]['son']=db('category')->where('fid',$v['id'])->order('id desc')->select();
            foreach ($list[$k]['son'] as $kk=>$vv ){
                $kk1=  db('category')->where('fid',$vv['id'])->order('id desc')->select();
                $list[$k]['son'][$kk]['son1']=$kk1;
            }
        }

        $this->assign('list',$list);
        return $this->fetch();
    }

    /**
     * 删除
     */
    public function deldite()
    {
        $id=Request::instance()->param('id');
        $list=db('category')->where('fid',$id)->select();//根据ID查询出子分类
        if ($list){
            $this->error('此分类下还存在子分类，无法删除');
        }else{
            $rs=db('category')->where('id',$id)->delete();
            if ($rs){
                $this->success('删除成功',url('index'));
            }else{
                $this->error('删除失败');
            }
        }
        
    }

    /**
     * 编辑分类
     */
    public function edtie()
    {
        $id=Request::instance()->param('id');
        $data=db('category')->where('id',$id)->find();

        if ($data['level']!=1)//根据查询结果等级是否不为1，若不为1，则查询出上级所有分类
        {
            $levels=db('category')->field('id,cg_name')->where('id',$data['fid'])->find();
            $data['le_id']=$levels['id'];
            $data['le_cgname']=$levels['cg_name'];

            $list=db('category')->where('level',$data['level']-1)->select();
        }
        else
        {
            $data['le_id']='';
            $list='';
        }

        $post=Request::instance()->post();
        if ($post)
        {
            $rest=db('category')->where('id',$post['fid'])->find();

            $date['cg_name']=$post['cate_name'];
            $date['level']=$rest['level']+1;
            $date['fid']=$post['fid'];
            $rs=db('category')->where('id',$post['id'])->update($date);
            if ($rs){
                $this->success('编辑成功',url('index'));
            }else{
                $this->error('编辑失败');
            }
        }

        $this->assign('list',$list);
        $this->assign('data',$data);
        return $this->fetch();
    }

    /**
     * 添加分类
     */
    public function add_class(){

        $list=db('category')->where('level',1)->select();
        foreach ($list as $k=>$v)
        {
            $list[$k]['son']=db('category')->where('fid',$v['id'])->select();
        }
       $post=Request::instance()->post();
        if ($post)
        {
            if ($post['cate_name']==null) $this->error('不能为空，请填写');
            if ($post['fid']==0)
            {
                $data['cg_name']=$post['cate_name'];
                $data['level']=1;
                $data['fid']=0;
            }
            else
            {
                $leve=db('category')->where('id',$post['fid'])->find();
                $data['cg_name']=$post['cate_name'];
                $data['level']=$leve['level']+1;
                $data['fid']=$leve['id'];
            }
            $rs=db('category')->insert($data);
            if ($rs)
            {
                $this->success('添加成功',url('index'));
            }
            else
            {
                $this->error('添加失败');
            }
        }

        $get=Request::instance()->param();
        if ($get){//如果有get值，则证明是从列表那直接添加子分类的，读出相应数据
            $first=db('category')->field('id,cg_name,level')->where('id',$get['id'])->find();
        }else{
            $first='';
        }
        $this->assign('first',$first);
        $this->assign('list',$list);
        return $this->fetch();
    }
}

