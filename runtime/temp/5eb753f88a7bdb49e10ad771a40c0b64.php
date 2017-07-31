<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\php\lqweb\application\admin/template/admin\property\index.html";i:1501488446;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>文章列表--layui后台管理模板</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="__PUBLIC__layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="http://at.alicdn.com/t/font_eolqem241z66flxr.css" media="all" />
    <link rel="stylesheet" href="__PUBLIC__css/news.css" media="all" />
</head>
<body class="childrenBody">
<blockquote class="layui-elem-quote news_search">
    <div class="layui-inline">
        <form action="<?php echo url('Index/index'); ?>" method="post">
            <div class="layui-input-inline">
                <input type="text" value="" name="key_word" placeholder="请输入关键字" class="layui-input search_input">
            </div>
            <input class="layui-btn search_btn" type="submit" value="查询" >
        </form>
    </div>

    <div class="layui-inline">
        <a class="layui-btn layui-btn-normal newsAdd_btn" href="<?php echo url('add_class'); ?>" >添加分类</a>
    </div>
    <div class="layui-inline">
        <div class="layui-form-mid layui-word-aux">本页面刷新后除新添加的文章外所有操作无效，关闭页面所有数据重置</div>
    </div>
</blockquote>
<div class="layui-form news_list">
    <table class="layui-table">
        <colgroup>
            <col width="50">
            <col>
            <col width="9%">
            <col width="9%">
            <col width="9%">
            <col width="9%">
            <col width="9%">
            <col width="15%">
        </colgroup>
        <thead>
        <tr>
            <th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose" id="allChoose"></th>
            <th style="text-align:left;">ID</th>
            <th>属性名称</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody class="news_content">
        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
        <tr>
            <td>
                <input type="checkbox" name="checked" lay-skin="primary" lay-filter="choose">
                <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                    <i class="layui-icon"></i>
                </div>
            </td>
            <td align="left"><?php echo $v['id']; ?></td>
            <td><?php echo $v['pro_name']; ?></td>
            <td>
                <a class="layui-btn layui-btn-mini news_edit" href="<?php echo url('',array('id'=>$v['id'])); ?>" ><i class="iconfont icon-edit"></i> 编辑</a>
                <a class="layui-btn layui-btn-danger layui-btn-mini news_del" href="<?php echo url('',array('id'=>$v['id'])); ?>" data-id="1"><i class="layui-icon"></i> 删除</a>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>

        </tbody>
    </table>
</div>
<div id="page"></div>
<script type="text/javascript" src="__PUBLIC__layui/layui.js"></script>

</body>
</html>