<!DOCTYPE html>
<html lang="en">
<head>
	<include file="public:head" />
</head>
<body>
<!-- 主体 -->
<include file="public:not" />
<div class="main">
<include file="public:left" />
	<div class="app">
		<header id="head" class="head">
		<div class="fixtop">
			<span id="t-find"><a href="{:U('index/index')}" class="btn btn-left btn-back"></a></span>
			<span id="t-index">19.9包邮</span>
		</div>
		</header>
 
		<div class="nav_box">
			<nav class="nav" id="nav">
				<ul class="">
					<li><a href="{:U('index/index')}"><em class="icon icon-jz"></em><span>{:C('ftx_site_name')}</span><em class="line"></em></a></li>
					<li><a href="{:U('jiu/index')}"><em class="icon icon-jk"></em><span>9.9包邮</span><em class="line"></em></a></li>
					<li><a class="active"href="{:U('shijiu/index')}"><em class="icon icon-jk"></em><span>19.9包邮</span><em class="line"></em></a></li>
					<li class="_border"><a href="{:U('meili/index')}"><em class="icon icon-jz"></em><span>美丽说</span><em class="line"></em></a></li>
				</ul>
			</nav>
		</div>

		<include file="public:items_list" />
		<include file="public:footer" />
	</div>
</div>

    <!-- main js -->
    <include file="public:mainjs" />
</body>
</html>