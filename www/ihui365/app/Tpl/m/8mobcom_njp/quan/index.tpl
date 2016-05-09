<!doctype html>
<html lang="zh-CN"><head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=5.0,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="full-screen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="address=no">
<link rel="stylesheet" type="text/css" href="/assets/49ad5b0c/pager.css">
<title>{$page_seo.title}  {:C('ftx_site_name')} </title>
<meta content="{$page_seo.keywords}" name="keywords">
<meta content="{$page_seo.description}" name="description">
<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="__STATIC__/m/css/m_quan.css">
</head>
<body>
<p style="width: 0;height: 0;overflow: hidden;display: none">这里汇集优质全网内部优惠券。让亲享受VIP购物特价。</p>
<div class="title-bar">[<a href="{:C('ftx_wap_url')}">返回首页</a>] 内部券秒杀汇总</div>
<div style="padding: 0 0.2em">
<nav class="navbar navbar-default" id="top">
<div class="container reSetMargin">
<div class="navbar-header">
 
<a class="label pull-left active <if condition="$cid eq 'fuzhuang'"> actives</if>" href="{:U('quan/index',array('cid'=>'fuzhuang'))}">服装</a>
<a class="label pull-left active <if condition="$cid eq 'muying'"> actives</if>" href="{:U('quan/index',array('cid'=>'muying'))}">母婴</a>
<a class="label pull-left active <if condition="$cid eq 'hzp'"> actives</if>" href="{:U('quan/index',array('cid'=>'hzp'))}">化妆品</a>
<a class="label pull-left active <if condition="$cid eq 'jujia'"> actives</if>" href="{:U('quan/index',array('cid'=>'jujia'))}">居家</a>
<a class="label pull-left active <if condition="$cid eq 'xiebao'"> actives</if>" href="{:U('quan/index',array('cid'=>'xiebao'))}">鞋包配饰</a>
<a class="label pull-left active <if condition="$cid eq 'meishi'"> actives</if>" href="{:U('quan/index',array('cid'=>'meishi'))}">美食</a>
<a class="label pull-left active <if condition="$cid eq 'wenti'"> actives</if>" href="{:U('quan/index',array('cid'=>'wenti'))}">文体车品</a>
<a class="label pull-left active <if condition="$cid eq 'shuma'"> actives</if>" href="{:U('quan/index',array('cid'=>'shuma'))}">数码家电</a>
<a class="label pull-left active <empty name="cid"> actives </empty>" href="{:U('quan/index')}" style="float:left;">全部优惠</a>

<a class="label pull-left active <if condition="$sort eq 'more'"> actives </if>" href="{:U('quan/index',array('cid'=>$cid,'sort'=>'more'))}" >优惠最多</a> 
<a class="label pull-left active <if condition="$sort eq 'volume'"> actives </if>" href="{:U('quan/index',array('cid'=>$cid,'sort'=>'volume'))}">销量</a>
<a class="label pull-left active <if condition="$sort eq 'rest'"> actives </if>" href="{:U('quan/index',array('cid'=>$cid,'sort'=>'rest'))}">券剩余</a></div>
</div>
</div>
</nav>
</div>
<div class="container noPadding">
<div class="row noPadding noMargin" style="margin: 0;padding: 0.2em">


<volist name="items_list" id="item" key="i" mod="2">
<div class=" col-xs-12 noPadding divContent">
	<div class=" col-xs-6 noPadding  ">
		<a href="{:U('jump/index',array('iid'=>$item['num_iid']))}" rel="nofollow" class="aImg" target="_blank"><img src="{:attach(get_thumb($item['pic_url'], '_b'),'item')}" class="img-responsive"></a>
	</div>
	<div class=" col-xs-6 noPadding  ">
		<p class="pHeader">{$item.title}</p>
		<p class="pDate">内部券<span class="glyphicon glyphicon-yen" aria-hidden="true"></span><b><?php echo floatval($item['amount']); ?> </b>元<br> 
		 优惠券剩余 <span>{$item.rest} </span>张，已领取<span>{$item.ling}</span> 张，销量<span>{$item.volume}</span>件</p>
		<div class="divPrice">券后价￥<span><?php echo floatval($item['qprice']); ?></span> <del>￥<?php echo floatval($item['price']); ?></del></div>
		<div class="divGo">
			<a href="{$item.quan_url}" rel="nofollow"><span>①点我领券</span></a>
			<a href="{:U('jump/index',array('iid'=>$item['num_iid']))}" rel="nofollow" target="_blank"><span>②点击下单</span></a>
		</div>
	</div>
</div>
</volist>

 

</div>
</div>
<div id="yw0" class="pager">{$page}</div>

<style>
.pager a,.pager span{
font-family: 'Exo', Arial;
    display: inline-block;
    margin-right: 0;
    text-align: center;
    background: #ea2a60;
    border-radius: 3px;
        color: white;
          padding: 6px 5px 4px;
	      text-decoration: none;
	      min-width: 22px;

}
.pager span{
  background: #D4194E;
  color: white;
}
.pager a:hover{
  background: #D4194E;
  color: white;
}
</style>
</body></html>