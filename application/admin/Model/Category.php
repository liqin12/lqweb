<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/25
 * Time: 15:06
 */
namespace app\admin\model;
use think\Model;

class Category extends Model
{
    /**
     * 根据上级ID查询数据
     */
    public function query_one($fid)
    {
        $result=Category::where('id',$fid)->find();
        if ($result){
               return $result;
        }else{
            return false;
        }
    }

}