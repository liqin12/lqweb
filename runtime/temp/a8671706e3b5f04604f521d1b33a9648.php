<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\php\lqweb\application\admin/template/admin\property\add_pro.html";i:1501484910;}*/ ?>
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
        <strong><span class="icon-pencil-square-o"></span>添加属性</strong>
    </div>
    <div class="body-content">
        <form method="post" enctype="multipart/form-data" class="form-x"
              action="" onsubmit="return check()">
            <div class="form-group">
                <div class="label">
                    <label>属性名称：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" id="name" name="pro_name" />
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