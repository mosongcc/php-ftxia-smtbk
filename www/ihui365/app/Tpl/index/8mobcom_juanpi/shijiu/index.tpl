<!doctype html>
<html>
<head>
<include file="public:head" />
<script type="text/javascript" src="__STATIC__/8mobcomjuanpi/js/index.js"></script>
</head>
<body>
<include file="public:header" />


<notempty name="tag_list"> 
<div class="jiu-nav-main jiu-nav-main-2" id="seclevel">
	<div class="jiu-nav {:C('ftx_site_width')}  seclevelinner">
		<div class="nav-item  ">
			<div class="item-list">
				<ul>
				<li><a href="{:U('index/cate', array('cid'=>$cinfo['pid']))}" <empty name="tag"> class="active"</empty>>全部</a></li>
				<volist name="tag_list" id="bcate">
					<li><a href="{:U('shijiu/index',array('tag'=>$bcate['id']))}" class=" <if condition="$tag eq $bcate['id']">active</if>" ><span></span>{$bcate.name}</a></li>

				</volist>
				</ul>
			</div>
		</div>
	</div>
</div>
</notempty>


<include file="public:list" />

<include file="public:footer" />
</body>
</html>