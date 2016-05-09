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
			<span id="classify" class="classify"><a href="javascript:;" class="btn btn-left btn-type"></a></span>
			<span id="t-index">{:C('ftx_site_name')}</span>
			<span id="user"><a href="javascript:;" class="sign_btn btn btn-right btn-sign" _hover-ignore="1"></a></span>
		</div>
		</header>

		<if condition="C('ftx_ads_pp') eq '0'">
		{:R('advert/index', array(2), 'Widget')}
		<else/>
		<!--品牌托管-->
		<notempty name="brandlist">
		<script type="text/javascript" src="__STATIC__/js/MobileSlider.js"></script>
		<style>
		.slider{display:none}/*用于获取更加体验*/
		.focus span{width:10px;height:10px;margin-right:10px;border-radius:50%;background:#666;font-size:0}
		.focus span.current{background:#fff}
		</style>
		<div class="slider">
			<ul>
			<volist name="brandlist['banner']" id="banner">
				<li><a href="{:U('brand/dlist',array('uid'=>$banner['shop']['uid']))}" target="_blank"><img src="{$banner['shop']['enter_img']}"></a></li>
			</volist>
			</ul>
		</div>
		<script>
			$(".slider").MobileSlider({width:640,height:256,during:5000})
		</script>
		</notempty>
		 </if>

		<div class="nav_box">
			<nav class="nav" id="nav">
				<ul class="">
					<li><a class="active" href="{:U('index/index')}"><em class="icon icon-jz"></em><span>{:C('ftx_site_name')}</span><em class="line"></em></a></li>
					<li><a href="{:U('brand/index')}"><em class="icon icon-bz"></em><span>品牌团</span><em class="line"></em></a></li>
					<li><a href="{:U('jiu/index')}"><em class="icon icon-jk"></em><span>9.9包邮</span><em class="line"></em></a></li>
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