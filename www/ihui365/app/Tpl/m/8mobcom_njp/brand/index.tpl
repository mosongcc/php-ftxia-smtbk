<!DOCTYPE html>
<html lang="en">
<head>
	<include file="public:head" />
 
<!--
	<link rel="stylesheet" type="text/css" href="__STATIC__/js/zepto/widget/navigator/navigator.css" />
	<link rel="stylesheet" type="text/css" href="__STATIC__/js/zepto/widget/navigator/navigator.iscroll.css" />
	<script type="text/javascript" src="__STATIC__/js/zepto/zepto.js"></script>
	<script type="text/javascript" src="__STATIC__/js/zepto/zepto.extend.js"></script>
	<script type="text/javascript" src="__STATIC__/js/zepto/zepto.ui.js"></script>
	<script type="text/javascript" src="__STATIC__/js/zepto/zepto.iscroll.js"></script>
	<script type="text/javascript" src="__STATIC__/js/zepto/widget/navigator.js"></script>
	<script type="text/javascript" src="__STATIC__/js/zepto/widget/navigator.iscroll.js"></script>

	
	-->
	<script type="text/javascript" src="__STATIC__/m_8mob_jp/js/iscroll.js"></script>

</head>
<body>
<!-- 主体 -->
<div class="main">
	<div class="app">
		<header id="head" class="head">
		<div class="fixtop">
			<span id="t-find"><a href="{:U('index/index')}" class="btn btn-left btn-back"></a></span>
			<span id="t-index">品牌团</span>
		</div>
		</header>
<link type="text/css" rel="stylesheet" href="__STATIC__/m_8mob_jp/css/brand.css" />

<nav class="brand_nav_main">
        <div id="brand_nav_wrapper">
            <div id="brand_nav_scroller" class="brand_nav_scroller">
                <ul id="brand_nav_items">
                    <li <empty name="cid">  <empty name="timeFilter">class="brand_nav_on"</empty></empty>><a <empty name="cid">  <empty name="timeFilter">class="cur"</empty></empty>href="{:U('brand/index')}" >今日上新</a></li>
                    <li <if condition="$timeFilter eq 'last'"> class="brand_nav_on"</if>><a <if condition="$timeFilter eq 'last'"> class="cur"</if>href="{:U('brand/index',array('timeFilter'=>'last'))}">最后疯抢</a></li>
                    <li <if condition="$timeFilter eq 'tomorrow'"> class="brand_nav_on"</if>><a <if condition="$timeFilter eq 'tomorrow'"> class="cur"</if>href="{:U('brand/index',array('timeFilter'=>'tomorrow'))}">明日预告</a></li>
		    <volist name="cats" id="vol"> 
			<li  <if condition="$cid eq $vol['cid']"> class="brand_nav_on"</if>><a <if condition="$cid eq $vol['cid']"> class="cur"</if>href="{:U('brand/index',array('cid'=>$vol['cid']))}"  >{$vol.name}</a></li>
		    </volist>
                </ul>
            </div>
        </div>
</nav>
<script>
                   var myscroll=new IScroll("#brand_nav_wrapper",{hScroll:true,snap:true, mouseWheel:true});
        </script>

<div class="brand_main">
        
        <ul id="brand_list_items">
		<volist name="brands" id="val">
		<li class="brand_list">
		<a href="{:U('brand/dlist',array('uid'=>$val['uid']))}" target="_blank" >
			<time>{$val['oetime']|date="m月d日 H时i分",###}结束</time>
			<figure><img src="__STATIC__/images/grey.gif" class="lazy" _src="{$val['newbrandEnter']}_760x760Q50.jpg"  ><h3></h3></figure>
			<aside>
				<figure><img src="__STATIC__/images/grey.gif" class="lazy" _src="{$val['shop_icon']}" ><p>{$val['txt']}</p></figure>
				<div class="r"><span><b>{$val['discount']}</b></span></div>
			</aside>
		</a>
		</li>
		</volist>
	</ul>
        <div class="list_end" style="display: block;"><span></span></div>
</div>


		</div>
	</div>
</div>

    <!-- main js -->
    <script type="text/javascript">
    
    var refreshTimer = null,
            mebook = mebook || {};

    /*
     *滚动结束 屏幕静止一秒后检测哪些图片出现在viewport中
     *和PC端不同 由于无线速度限制 和手机运算能力的差异 1秒钟的延迟对手机端的用户来说可以忍受
     */
    $(window).on('scroll', function () {
        if (refreshTimer) {
            clearTimeout(refreshTimer);
            refreshTimer = null;
        }
        refreshTimer = setTimeout(mebook.getInViewportList(), 300);
    });

    $.belowthefold = function (element) {
        var fold = $(window).height() + $(window).scrollTop();
        return fold <= $(element).offset().top;
    };

    $.abovethetop = function (element) {
        var top = $(window).scrollTop();
        return top >= $(element).offset().top + $(element).height()+300;
    };

    /*
     *判断元素是否出现在viewport中 依赖于上两个扩展方法
     */
    $.inViewport = function (element) {
        return !$.belowthefold(element) && !$.abovethetop(element)
    };

    mebook.loadImg = function (li) {
        if (li.length) {
            var img = li,
                    src = img.attr('_src');
            img.attr('src', src);
        }
    };
    mebook.getInViewportList = function () {
        var list = $('.lazy'),
                ret = [];
        list.each(function (i) {
            var li = list.eq(i);
            if ($.inViewport(li)) {
                mebook.loadImg(li);
            }
        });
    };
    $(window).scrollTop(1);
    mebook.getInViewportList();
    
</script>

</body>
</html>