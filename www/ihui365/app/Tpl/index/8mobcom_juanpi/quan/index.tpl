<!doctype html>
<html>
<head>
<if condition="C('ftx_wapjump_open') eq 1">
<script src="http://siteapp.baidu.com/static/webappservice/uaredirect.js" type="text/javascript"></script>
<script type="text/javascript">uaredirect("http://m.demo.8mob.com/index.php?m=quan");</script>
</if>
<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
<include file="public:head" />
</head>
<body>
<include file="public:header" />

<style>
.quan_clear {padding: 0px;}
.quan_r {padding-right: 15px;}
.quan_l {padding-left: 15px;}
.pic {display: inline-block;padding-right: 10px;text-align: center;width: 270px;float: left;}
.pic img{width: 260px;height:260px;border-radius: 4px;}
.quanContent {padding-right: 5px;border: solid #E0E0E0 1px;margin-bottom: 26px;background-color: #fff;border-radius: 4px;}
.quanContent:hover {border: 1px solid #f8285c;}
.quan_header {margin-top: 12px;max-height: 52px;overflow: hidden;}
.quan_header a {line-height: 26px;font-size: 16px;color: #616161;}
.quan_title {color: #565656;}
.date {color: #f3659b;font-size: 22px;margin-bottom: 11px;}
.date .glyphicon {color: #f6924c;}
.coupon {font-size: 12px;margin-bottom: 17px;}
.coupon span:nth-child(1) {color: #f3659b;}
.price {font-size: 15px;color: #FFD9EC;margin-top: 0px;background: #f8285c;height: 54px;line-height: 54px;padding-left: 30px;border-radius: 8px;}
.price span:nth-child(1) {font-size: 28px;font-family: Arial, Helvetica, sans-serif;color: #FFFFFF;}
.btn_buy {margin: 5px 5px 5px 5px;color: #999999;}
.btn_buy span:nth-child(1) {display: inline-block;border: 1px dashed #f8285c;padding: 6px;border-radius: 6px;color: #ec3315;}
.btn_buy span:nth-child(2) {display: inline-block;margin: 5px 5px 5px 5px;color: #999999;font-family: '宋体';font-size: 18px;font-weight: bold;}
.btn_buy span:nth-child(3) {display: inline-block;border: dashed 1px #f8285c;padding: 6px;border-radius: 6px;color: #ec3315;}
.btn_buy span:nth-child(1):hover {background-color: #FACB12;}
a{color: #5e5e5e;text-decoration: none;}
a:focus, a:hover {color: #5e5e5e;text-decoration: none;}
.nav .open>a, .nav .open>a:focus, .nav .open>a:hover {background-color: #FFF;border-color: #FFF;}
.quan_nav {color: #777777;margin-right: 14px;}
.quan_nav_on {color: #EF4929;}
ul.navigation.fl li,ul.navigation.fl li a { -webkit-box-sizing: content-box; }
</style>
<div class="main {:C('ftx_site_width')} clear">
	<div style="height:120px; margin:auto;margin-top:10px; background:#C4E8FF; overflow:hidden; background:url(__STATIC__/images/quan_banner.png)">
		<div style=" float:right;margin-top:28px; margin-right:30px;">
			<form method="get" action="/index.php">
				<input type="hidden" name="m" value="quan" />
				<input type="hidden" name="a" value="index" />
				<div>
					<input name="key" type="text" id="key" style="color:#666666; width:195px; height:30px; border: solid #f8285c 1px; padding-left:5px;" value="" placeholder="输入要搜商品">
				</div>
				<div style="margin-top:13px;">
					<input type="submit" value="搜 索" style="color:#ffffff; width:80px; height:24px; border: solid #f8285c 1px; background:#f8285c;cursor:pointer;">
				</div>
			</form>
		  </div>
	 </div>

	<div style="margin-top:10px; margin-bottom: 10px; overflow:hidden;">
		<a class="quan_nav" href="{:U('quan/index')}" style="float:left;">全部优惠（<span style="font-family:Arial;">{$total}</span>）</a>

		<div id="show_quan_cid" style="float:left;margin-left:7px;">
			<a class="quan_nav <if condition="$cid eq 'fuzhuang'"> quan_nav_on</if>" href="{:U('quan/index',array('cid'=>'fuzhuang'))}">服装</a>
			<a class="quan_nav <if condition="$cid eq 'muying'"> quan_nav_on</if>" href="{:U('quan/index',array('cid'=>'muying'))}">母婴</a>
			<a class="quan_nav <if condition="$cid eq 'hzp'"> quan_nav_on</if>" href="{:U('quan/index',array('cid'=>'hzp'))}">化妆品</a>
			<a class="quan_nav <if condition="$cid eq 'jujia'"> quan_nav_on</if>" href="{:U('quan/index',array('cid'=>'jujia'))}">居家</a>
			<a class="quan_nav <if condition="$cid eq 'xiebao'"> quan_nav_on</if>" href="{:U('quan/index',array('cid'=>'xiebao'))}">鞋包配饰</a>
			<a class="quan_nav <if condition="$cid eq 'meishi'"> quan_nav_on</if>" href="{:U('quan/index',array('cid'=>'meishi'))}">美食</a>
			<a class="quan_nav <if condition="$cid eq 'wenti'"> quan_nav_on</if>" href="{:U('quan/index',array('cid'=>'wenti'))}">文体车品</a>
			<a class="quan_nav <if condition="$cid eq 'shuma'"> quan_nav_on</if>" href="{:U('quan/index',array('cid'=>'shuma'))}">数码家电</a>
		</div>
		<div style="float:right; font-size:12px;">
			<span style="color:#666666;">排序：</span>
			<a href="{:U('quan/index')}" <if condition="$sort eq 'normal'"> style="color:#FF3333;" </if>>默认</a> &nbsp; 
			<a href="{:U('quan/index',array('cid'=>$cid,'sort'=>'more'))}" <if condition="$sort eq 'more'"> style="color:#FF3333;" </if>>优惠最多</a> &nbsp; 
			<a href="{:U('quan/index',array('cid'=>$cid,'sort'=>'volume'))}" <if condition="$sort eq 'volume'">style="color:#FF3333;" </if>>销量</a> &nbsp; 
			<a href="{:U('quan/index',array('cid'=>$cid,'sort'=>'rest'))}" <if condition="$sort eq 'rest'">style="color:#FF3333;" </if>>券剩余</a>
		</div>
	</div>

	<ul class="quan-list {:C('ftx_site_wc')}">
		<volist name="items_list" id="item" key="i" mod="2">
		<div class=" col-xs-6 quan_clear <eq name="mod" value="1"> quan_l <else />  quan_r </eq>" style="height: 288px;">
			<div class=" col-xs-12 quan_clear quanContent">
				<div class=" col-xs-6 quan_clear  ">
					<a href="{:U('jump/index',array('iid'=>$item['num_iid']))}" class="pic" target="_blank" rel="nofollow">
					<img src="{:attach(get_thumb($item['pic_url'], '_b'),'item')}" class="img-responsive"></a>
				</div>
				<div class=" col-xs-6 quan_clear ">
					<p class="quan_header"><div style="float:left; width:16px; height:16px; background:url(__STATIC__/images/<eq name="item.shop_type" value="B">tmall<else />taobao</eq>.png); margin-left:0px; margin-right: 6px;margin-top:2px;"></div><a href="{:U('jump/index',array('iid'=>$item['num_iid']))}" target="_blank" class="quan_title" rel="nofollow">{$item.title}</a></p>
					<p class="date" style="">内部券<span class="glyphicon glyphicon-yen" aria-hidden="true"></span><b><?php echo floatval($item['amount']); ?></b>元</p>
					<p class="coupon">优惠券剩余 <span>{$item.rest}</span> 张，已领取<span>{$item.ling}</span> 张<notempty name="item.volume">，销量<span>{$item.volume}</span></notempty></p>
					<div class="price">券后价￥<span><?php echo floatval($item['qprice']); ?> </span>在售价￥<span><?php echo floatval($item['price']); ?></span></div>
					<div class="btn_buy">
						购买流程：<a href="{$item.quan_url}" target="_blank" rel="nofollow"><span>①点我领券</span></a><span>&gt;</span><a href="{:U('jump/index',array('iid'=>$item['num_iid']))}" rel="nofollow" target="_blank"><span>②点击下单</span></a>
					</div>
				</div>
			</div>
		</div>
		</volist>
	</ul>


	<div class="clear"></div> 
	<notempty name="page">
	<div class="page">
		<div class="pageNav">{$page}</div>
	</div>
	</notempty>
</div>

 



<include file="public:footer" />
</body>
</html>