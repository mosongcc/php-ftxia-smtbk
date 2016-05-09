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
<style>
.brand-banner{overflow:hidden}
.brand-banner img{width:100%}
.brand-banner{position:relative}
.brand-banner .brand-banner-bg{position:absolute;bottom:0;left:0;width:100%;height:30px;background:#000;filter:alpha(opacity=50);opacity:.5;display:block;z-index:2}
.brand-banner .brand-banner-txt{position:absolute;left:0;bottom:0;height:30px;line-height:30px;color:#fff;z-index:3;padding:0 2%;width:95%;display:block;overflow:hidden;word-break:keep-all;white-space:nowrap;text-overflow:ellipsis}
.brand-banner img{vertical-align:top}
</style>
	<div class="app">
		<header id="head" class="head">
		<div class="fixtop">
			<span id="t-find"><a href="{:U('brand/index')}" class="btn btn-left btn-back"></a></span>
			<span id="t-index">{$shop.nick}</span>
		</div>
		</header>
		<div class="brand-banner">
			<img src="{$shop.enter_img}">
			<div class="brand-banner-bg" style="display:none"></div>
			<div class="brand-banner-txt"></div>
		</div>
 
		<div id="goods">
		<section class="goods" id="goods">
		<ul class="goods-list clear" id="goods_block">
		<volist name="items" id="itemvol" key="x">
			<volist name="itemvol" id="item" key="i" mod="4">
			<li>
				<a class="goods-aa"  href="{:U('jump/index',array('iid'=>$item['num_iid']))}" target="_blank">
					<img  src="__STATIC__/images/grey.gif" class="lazy" _src="{$item.pic_url}_310x310.jpg" />
				</a>
				<a  href="{:U('jump/index',array('iid'=>$item['num_iid']))}"  target="_blank"><h3>{$item.title}</h3>
				<div class="list-price buy "><span class="price-new"><i>￥</i>{$item.coupon_price}</span><i class="del">￥{$item.price}</i><span class="good-btn"><if condition="$item.shop_type eq 'C' ">淘宝<elseif condition="$item.shop_type eq 'B' " />天猫</if></span></div></a>
			</li>
			</volist>
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