<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"D:\php\lqweb\application\admin/template/admin\category\add_class.html";i:1500882521;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>

    <link rel="stylesheet" href="__PUBLIC__/css/pintuer.css">
    <link rel="stylesheet" href="__PUBLIC__/css/admin.css">
    <script src="__PUBLIC__/js/jquery.js"></script>
    <script src="__PUBLIC__/js/jquery-1.8.3.min.js"></script>
    <script src="__PUBLIC__/js/pintuer.js"></script>
    <script type="text/javascript">
        function check() {
            var name = document.getElementById("name").value;
            if (name.length <= 0 || name.replace(/\s/g, "") == "") {
                alert("添加的类容不能为空");
                return false;
            }
        }
    </script>
</head>
<body>
<div class="panel admin-panel margin-top">
    <div class="panel-head" id="add">
        <strong><span class="icon-pencil-square-o"></span>添加内容</strong>
    </div>
    <div class="body-content">
        <form method="post" enctype="multipart/form-data" class="form-x"
              action="" onsubmit="return check()">

            <div class="form-group">
                <div class="label">
                    <label>上级分类：</label>
                </div>
                <div class="field">
                    <select name="fid" id="cate_name" class="input w50">
                        <?php if($first != null): ?><option value="<?php echo $first['id']; ?>"><?php echo $first['cg_name']; ?></option><?php else: ?><option value="0">请选择分类</option><?php endif; if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
                            <option value="<?php echo $v['id']; ?>"><?php echo $v['cg_name']; ?></option>
                            <?php if(is_array($v['son']) || $v['son'] instanceof \think\Collection || $v['son'] instanceof \think\Paginator): if( count($v['son'])==0 ) : echo "" ;else: foreach($v['son'] as $key=>$vv): ?>
                                <option value="<?php echo $vv['id']; ?>" >------<?php echo $vv['cg_name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <div class="tips">不选择上级分类默认为一级分类</div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>分类名称：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" id="name" name="cate_name" />
                    <div class="tips"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="label">

                </div>
                <div class="field">
                    <!-- onclick="add()" -->
                    <button class="button bg-main icon-check-square-o" type="submit">
                        提交</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>

<!-- <script type="text/javascript" >

		function add()
		{
			var cate_name=$('#cate_name').val();
			//return alert(cate_name)
			var name=$('#name').val();

			$.ajax({
				   type: "POST",
				   url: "",
				   data: {name:name,cate_name:cate_name},
				   success: function(data){

				     if(data.flag==1)
			    	 {
			    	 	alert(data.msg)

			    	 }
				   }
				});
		}
	</script> -->
</html>