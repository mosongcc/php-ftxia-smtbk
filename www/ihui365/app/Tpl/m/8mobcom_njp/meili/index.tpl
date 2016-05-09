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
			<span id="t-index">美丽说</span>
		</div>
		</header>
 
		<div class="nav_box">
			<nav class="nav" id="nav">
				<ul class="">
					<li><a href="{:U('index/index')}"><em class="icon icon-jz"></em><span>{:C('ftx_site_name')}</span><em class="line"></em></a></li>
					<li><a href="{:U('brand/index')}"><em class="icon icon-bz"></em><span>品牌团</span><em class="line"></em></a></li>
					<li><a href="{:U('jiu/index')}"><em class="icon icon-jk"></em><span>9.9包邮</span><em class="line"></em></a></li>
					<li class="_border"><a class="active" href="{:U('meili/index')}"><em class="icon icon-jz"></em><span>美丽说</span><em class="line"></em></a></li>
				</ul>
			</nav>
		</div>

		<div id="goods">
		<section class="goods" id="goods">
		<ul class="goods-list clear" id="goods_block">
		<volist name="items_list" id="item" key="i">
			<li>
				<a class="goods-a"  href="{$item['wap_url']}" target="_blank">
					<img class="lazy" _src="{$item.pic_url}" src="/static/jky/images/blank.gif">            
					<span class="icon new">新品</span>
				</a>
				<a  href="{$item['wap_url']}"  target="_blank"><h3>{$item.title}</h3>
				<div class="list-price buy "><span class="price-new"><i>￥</i>{$item.coupon_price}</span><i class="del">￥{$item.price}</i><span class="good-btn">美丽说</span></div></a>
			</li>
		</volist>
		</ul>
		</section>
		<div class="paging">
			<div class="paging-nav">
			{$page}
			</div>
		</div>
		</div>
		<include file="public:footer" />
	</div>
</div>

    <!-- main js -->
    <include file="public:mainjs" />
</body>
</html>