<!doctype html>
<html>
<head>
<include file="public:head" />
<css file="__STATIC__/jky/css/article.css" />
</head>
<body>
<include file="public:header" /> 
 <div class="mains">
<div class="about piece">
<div class="white_bg">
<div class="about_menu fl">
	<ul>
		<volist name="help_list" id="help">
		<li><a href="{:U('help/read',array('id'=>$help['id']))}">{$help.title}</a></li>
		</volist>
		<volist name="article_cate_list" id="at_cate">
		<li><a <if condition="$at_cate.id eq $cid"> class="cur" </if> href="{:U('article/cate',array('id'=>$at_cate['id']))}">{$at_cate.name}</a></li>
		</volist>
	</ul>
</div>
<div class="about_contain fr">
<div class="about_tit">{$title}</div>
<div class="about_content">
<ul class="about_notes">
<volist name="article_list" id="article">
	<li>
		<em>· </em>
		<span class="title"><a target="_blank" href="{:U('article/read',array('id'=>$article['id']))}">{$article.title}</a></span>
		<span class="gary">{$article.add_time|frienddate}</span>
	</li>
</volist>
</ul>
</div>
<div class="page"> {$page}</div></div>
</div>
</div>
</div>
<include file="public:footer" />
<script src="__STATIC__/js/comment.js"></script>
</body>
</html>
