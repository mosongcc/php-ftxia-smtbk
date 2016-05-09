<!doctype html>
<html>
<head>
<include file="public:head" />
<link rel=stylesheet type=text/css href="__STATIC__/8mobcom/css/good_jp.css" />
<style>
.main .goods-list li:hover .good-price .btn-new.buy a,.main .goods-list li:hover .good-price .btn-new.sellout a, .main .goods-list li:hover .good-price .btn-new.end a {background: #ff6599;}
.main .goods-list li .list-good .good-price .price-current {color: #ff6599;}
.main .goods-list li .list-good .good-price .btn-new a {color: #ff6599;}

.nav-item .item-list ul li a.active, .jiu-nav .n_h a.active, .nav-item .item-list ul li a:hover, .jiu-nav .n_h a:hover {color: #ff6599;border-bottom: #ff6599 solid 2px;}
</style>
</head>
<body>
<include file="public:header" />
<notempty name="cats"> 
<div class="jiu-nav-main jiu-nav-main-2" id="seclevel">
	<div class="jiu-nav {:C('ftx_site_width')}  seclevelinner">
		<div class="nav-item  ">
			<div class="item-list">
				<ul>
				<li><a href="{:U('meili/index', array('cid'=>$cinfo['pid']))}" <empty name="cid"> class="active"</empty>>全部</a></li>
				<volist name="cats" id="bcate">
					<li><a href="{:U('meili/index',array('cid'=>$bcate['id']))}" class=" <if condition="$cid eq $bcate['id']">active</if>" ><span></span>{$bcate.name}</a></li>

				</volist>
				</ul>
			</div>
		</div>
	</div>
</div>
</notempty>


<div class="main {:C('ftx_site_width')} clear">
<ul class="goods-list {:C('ftx_site_wc')}">
		<volist name="items_list" id="item" key="i" mod="4">
		<li  class="<eq name="mod" value="3"> last</eq>">
			<div class="sid_{$item.sellerId}  list-good   {$item.class} " >
				<div class="good-pic">
					<a href="{$item['click_url']}" target="_blank"><img src='/static/8mobcom/images/blank.gif' data-original='{:attach(get_thumb($item['pic_url'], '_b'),'item')}' alt="{$item.title}" class="lazy"   /></a>
					<div class="yhq"> </div>
				</div>
				<h3 class="good-title">
					<if condition="$item.ems eq 0">[包邮]</if><a target="_blank" href="{$item['click_url']}" class="title">{$item.title}</a>
				</h3>
				<div class="good-price">
					<span class="price-current"><em>￥</em>{$item.coupon_price|price}</span>
					<span class="des-other">
						<span class="price-old"><if condition="$item.zk lt 10"><em>¥{$item.price|price}</em><u>({$item.zk}折)</u> </if></span>
						<span class="discount"><if condition="$item.volume gt 0 "><span class="sold">已售<em>{$item.volume}</em>件</span><else/><span class="sold">新品上架<em></em></span></if></span>
					</span>
					<div class="btn-new buy ">
						<em class="icon_m"></em>
						<a href="{$item['click_url']}" target="_blank" rel="nofollow"><span>美丽说</span></a>
					</div>
				</div>
			</div>
		</li>
		</volist>
	</ul>

	<div class="clear"></div> 
	<div class="page">
		<div class="pageNav">{$page}</div>
	</div>
</div>


	<div style="position: relative;width: 980px;height: 30px;margin: 10px auto 8px;">
		<div style="position: relative;padding-top: 10px;float: right;display: inline;">内容资源来自：<a href="http://www.ftxia.com/" target="_blank">飞天侠开放平台</a></div>
	</div>
<script>
$(function() {
    var $navFun = function() {
        var st = $(document).scrollTop(), 
            headh = $("div.header").height()+$("div#toolbar").height(); 
            $nav_classify = $("div.jiu-nav-main");

        if(st > headh){
            $nav_classify.addClass("fixed");
        } else {
            $nav_classify.removeClass("fixed");
        }
    };

    var F_nav_scroll = function () {
        if(navigator.userAgent.indexOf('iPad') > -1){
            return false;
        }      
        if (!window.XMLHttpRequest) {
           return;          
        }else{
            //默认执行一次
            $navFun();
            $(window).bind("scroll", $navFun);
        }
    }
    F_nav_scroll();

});
</script>
<include file="public:footer" />
</body>
</html>