<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="/blog-admin/lib/html5shiv.js"></script>
<script type="text/javascript" src="/blog-admin/lib/respond.min.js"></script>
<link rel="stylesheet" type="text/css" href="/blog-admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/blog-admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/blog-admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/blog-admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/blog-admin/static/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="/css/teacher-action.css" />
<title>新增- H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<div class='mask'></div>
<div class='content'>
    <div class="close">×</div>
    <img src="/images/article/asd.jpg" width="150">
</div>
<article class="page-container">
	<form class="form form-horizontal" id="">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">文章标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="" id="articletitle">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">文章链接：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"  placeholder="" id="sources" name="sources">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">文章分类：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="articletype" class="select">
					<?php
						foreach($data as $val){
							echo "<option value=".$val['type_id'].">".$val['type_name']."</option>";
						}
					?>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">抓取网站：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="articletype" class="select">
					<?php
						echo "<option>--请选择网站--</option>";
						foreach($web_name as $val){
							echo "<option>".$val."</option>";
						}
					?>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">文章简介：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="abstract" class="textarea"  placeholder="说点什么...最少输入10个字符"></textarea>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">排序值：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="" id="articlesort" name="articlesort">
			</div>
		</div>	
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">文章封面：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div style="width:150px;height:150px;background:pink;">选择图片</div>	
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button class="btn btn-primary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存并发布</button>
				<button class="btn btn-secondary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存草稿</button>
				<button class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/blog-admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/blog-admin/static/h-ui/js/H-ui.min.js"></script>  <!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/blog-admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>  
<script type="text/javascript" src="/blog-admin/lib/webuploader/0.1.5/webuploader.min.js"></script> 
<script type="text/javascript" src="/blog-admin/lib/ueditor/1.4.3/ueditor.config.js"></script> 
<script type="text/javascript" src="/blog-admin/lib/ueditor/1.4.3/ueditor.all.min.js"> </script> 
<script type="text/javascript" src="/js/article.js"> </script> 
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$list = $("#fileList"),
	$btn = $("#btn-star"),
	state = "pending",
	uploader;

	var uploader = WebUploader.create({
		auto: true,
		swf: 'lib/webuploader/0.1.5/Uploader.swf',
	
		// 文件接收服务端。
		server: 'fileupload.php',
	
		// 选择文件的按钮。可选。
		// 内部根据当前运行是创建，可能是input元素，也可能是flash.
		pick: '#filePicker',
	
		// 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
		resize: false,
		// 只允许选择图片文件。
		accept: {
			title: 'Images',
			extensions: 'gif,jpg,jpeg,bmp,png',
			mimeTypes: 'image/*'
		}
	});
    $btn.on('click', function () {
        if (state === 'uploading') {
            uploader.stop();
        } else {
            uploader.upload();
        }
    });
	
	var ue = UE.getEditor('editor');
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>