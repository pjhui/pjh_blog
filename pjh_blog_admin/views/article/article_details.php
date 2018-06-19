<?php
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?=$title?></title>
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
	<!-- 文章的封面 -->
	<div class="ar-cover">
		<br>
		<b style="font-size:20px;color:#555555;">文章封面</b>
		<br>
		<img width="500" src="<?=$data['cover_url']?>">
	</div>
	<!-- 文章 -->
	<div class="ar-content">
		<!-- 显示文章的标题，分类等等 -->
		<div class="ar-info">
			<div>
				<span class="ar-title"><?=$data['title']?></span><span class="ar-type">[&nbsp;<?=$data['type_name']?>&nbsp;]</span>
				<br><br>
				<span class="ar-time">
					<img align="baseline" width="15" src="/images/style/time.png"><span style="margin-left:5px;"><?=date("Y-m-d H:i:s",$data['time'])?></span>
				</span>
				<span class="ar-time">
					<img align="baseline" width="15" src="/images/style/djl.png"><span style="margin-left:5px;"><?=$data['click_like']?></span>
				</span>
				<span class="ar-time">
					<img align="baseline" width="15" src="/images/style/liu.png"><span style="margin-left:5px;"><?=$data['looks']?></span>
				</span>
				<span class="ar-time">
					<img align="baseline" width="15" src="/images/style/pl.png"><span style="margin-left:5px;"><?=$data['click_like']?></span>
				</span>
				<br><br>
				<span class="ar-time">
					是否转载<span style="margin-left:5px;"><?=$data['is_zhuan']?></span>
					原文链接<span style="margin-left:5px;"><?=$data['is_zhuan']?></span>
				</span>
			</div>
			<!-- 简介 -->
			<div class="ar-desc">
				<span style="font-size: 20px;">文章简介</span>
				<br>
				<?=$data['desc']?>
			</div>
		</div>
		<div class="ar-line"></div>
		<div><?=$data['desc']?></div>
		<div class="line"></div>
		<div><?=$data['content']?></div>
	</div>
</body>
</html>