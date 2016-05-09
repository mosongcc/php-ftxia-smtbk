<!doctype html>
<html>
<head>
<include file="public:head" />


<link rel="stylesheet" href="//g.alicdn.com/ju/common/1.5.25/global-min.css"/>
<link rel="stylesheet" href="//g.alicdn.com/ju/jsp/1.1.15/pages/category/base.less.css" />
<link rel="stylesheet" href="//g.alicdn.com/ju/home/1.3.12/pages/2015/index.less.css" />      <script src="//g.alicdn.com/??kissy/k/1.4.14/seed-min.js,ju/common/1.5.25/global-min.js,tb/tracker/1.0.16/index.js" charset="utf-8"></script>

<link rel=stylesheet type=text/css href="/static/8mobcom/css/good.css" />
<style>
.w980 .ju-itemlist {width: 980px;}
.w980 li.item-small-v3 {width: 320px!important;height: 320px!important;box-shadow: 0 1px 9px rgba(0, 0, 0, 0.35);}
.w980 li.item-small-v3 .link-box {height: 320px;}
.w980 li.item-small-v3 .item-pic {width: 320px;height: 220px;}
.w980 li.item-small-v3 .multi, .w980 li.item-small-v3 .timetogo{top:180px;}

.w1190 #content, .w1190 .ju-wrapper {width: 1220px;margin-top: 20px;}
.w1100 .ju-itemlist {width: 1200px;}
.w1100 li.item-small-v3 {width: 394px!important;height: 370px!important;box-shadow: 0 1px 9px rgba(0, 0, 0, 0.35);}
.w1100 li.item-small-v3 .link-box {height: 370px;}
.w1100 li.item-small-v3 .item-pic {width: 393px;height: 267px;}
.w1100 li.item-small-v3 .multi, .w1100 li.item-small-v3 .timetogo{top:200px;}
.w1190 li.brand-small-v2, .w1190 li.item-small-v3 {margin: 2px 6px 6px 2px;}
.page div {position: relative;margin-right: auto;padding-top: 10px;display: inline;}
</style>
</head>
<body>

<script>document.documentElement.className += (window.innerWidth || document.body.clientWidth) > 1240 ? " w1190 " : "";</script>
<include file="public:header" />
<div class="jiu-nav-main">
	<div class="jiu-nav {:C('ftx_site_width')}">
		<div class="nav-item ">
			<div class="item-list">
				<ul>
				<li ><a href="/ju" <if condition="$cid eq 0"> class="active"</if> >全部</a></li>
				<volist name="cats" id="vol"> 
				<li><a href="{:U('ju/index',array('cid'=>$vol['cid']))}"  <if condition="$cid eq $vol['cid']"> class="active"</if> >{$vol.name}</a></li>
				</volist>
				</ul>
			</div>
		</div>
	</div>
</div>

	<div  class="container ju-wrapper w1190  {:C('ftx_site_width')} ju-container ju-home">
		<div class="ju-itemlist">
		{$html}
		</div>
	</div>

	<div class="page {:C('ftx_site_width')} "><em></em><div>{$page}</div></div>
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