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
			<span id="t-index">{$zc.name}</span>
		</div>
		</header>

		<div class="bannar">
                        <img width="100%" src="{:attach(get_thumb($zc['pic_url'], ''),'zc')}" />
		</div>
 
	 
		<include file="public:items_list" />
		<include file="public:footer" />
	</div>
</div>

    <!-- main js -->
    <include file="public:mainjs" />
</body>
</html>