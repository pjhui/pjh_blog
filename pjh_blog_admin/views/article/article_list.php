<?php
use yii\helpers\Url;
use pjh_blog_admin\common\components\SetUpComponent;
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/blog-admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/blog-admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/blog-admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/blog-admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/blog-admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title><?=$title?></title>
</head>
<body>
<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
			<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius">
			<i class="Hui-iconfont">&#xe6e2;</i> 批量删除
			</a> 
			<a href="<?=Url::toRoute(['article/article-add'])?>" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加文章
			</a>
		</span> 
		<span class="r">
				共有<strong><?=$data['count']?></strong> 条
		</span>
	</div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="80">ID</th>
				<th width="100">文章标题</th>
				<th width="150">文章封面</th>
				<th width="40">分类</th>
				<th width="90">点击量</th>
				<th width="150">浏览量</th>
				<th width="500">简介</th>
				<th width="130">添加时间</th>
				<th width="70">是否转载</th>
				<th width="70">原文网址</th>
				<th width="70">是否上线</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(!empty($data['list'])){ foreach($data['list'] as $val){?>
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td><?=$val['id']?></td>
				<td><a href="<?=Url::toRoute(['article/article-details','article_id'=>$val['id']])?>"><?=$val['title']?></a></td>
				<td><a href="<?=$val['cover_url']?>"><img width="150" height="100" src="<?=$val['cover_url']?>"></a></td>
				<td><?=$val['type_name']?></td>
				<td><?=$val['click_like']?></td>
				<td><?=$val['looks']?></td>
				<td class="text-l"><?=$val['desc']?></td>
				<td><?=date("Y-m-d H:i:s",$val['time'])?></td>
				<td><?=$val['is_zhuan']?></td>
				<td><?=$val['article_url']?></td>
				<td class="td-status"><span class="label label-success radius"><?=$val['is_line']?></span></td>
				<td class="td-manage">
					<a style="text-decoration:none" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>
					<a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
					<a style="text-decoration:none" class="ml-5" onClick="change_password('修改密码','change-password.html','10001','600','270')" href="javascript:;" title="修改密码"><i class="Hui-iconfont">&#xe63f;</i></a>
					<a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
				</td>
			</tr>
			<?php } }else{
				echo "<tr class='text-c'><td colspan='12'>没数据</td></tr>";
			}?>
		</tbody>
	</table>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
</body>
</html>