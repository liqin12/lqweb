<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/29
 * Time: 10:37
 */
namespace app\admin\model;
use think\Model;
class Lq_proprety extends Model
{
    /**
     * 查询所有
     */
    public function query_pro(){
        $result=Lq_proprety::field('id,pro_name')
                            ->limit(10)
                            ->order('id ','desc')
                            ->select();
        return $result;
    }

    /**
     * 查询单条语句
     */
    public function queryone_pro($id){
        $result=Lq_proprety::where('id',$id)->find();
        if ($result){
            return $result;
        }else{
            return false;
        }

    }

    /***
     * 插入语句
     */
    public function insert_pro($data){
        $res=Lq_proprety::create($data);
        if ($res){
            return $res;
        }else{
            return false;
        }
    }
}
