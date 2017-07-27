<?php
namespace app\admin\controller;

use think\Controller;

class Index extends  Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function main()
    {
        $version=php_sapi_name().'——'.PHP_VERSION;//php_sapi_name()PHP运行方式，php_vestionPHP运行版本
        $server=php_uname();//服务器环境，，获取系统类型及版本号
       // $mysql_sys=mysqli_get_server_info();
        $this->assign('version',$version);
        $this->assign('server',$server);
        return $this->fetch();
    }
}

