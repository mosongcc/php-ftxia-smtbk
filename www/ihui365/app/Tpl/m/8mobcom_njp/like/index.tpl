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
			<span id="t-find"><a href="javascript:window.history.go(-1)" class="btn btn-left btn-back"></a></span>
			<span id="t-index">我的收藏</span>
		</div>
		</header>

		<include file="public:items_list" />
		<include file="public:footer" />
	</div>
</div>
    <include file="public:mainjs" />
</body>
</html>