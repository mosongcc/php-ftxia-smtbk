<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
        <meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1" media="(device-height: 568px)">
        <meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="generator" content="Ftxia! 8.0" />
	<meta name="renderer" content="webkit"> 
	<meta name="author" content="Ftxia Team  bbs.8mob.com" />
	<meta name="copyright" content="2010-2015 Ftxia Inc." />
	<meta name="MSSmartTagsPreventParsing" content="True" />
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="full-screen" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <meta name="format-detection" content="address=no">
        <link href="/static/m_8mob_jp/css/style_v3.css" rel="stylesheet" type="text/css" />
	<link href="/static/m_8mob_jp/css/main.css" rel="stylesheet" type="text/css" />
	<link href="/static/8mobcom/css/alert.css" rel="stylesheet" type="text/css" />
        <title><?php echo ($page_seo["title"]); ?>  <?php echo C('ftx_site_name');?> </title>
        <meta content="<?php echo ($page_seo["keywords"]); ?>" name="keywords">
	<meta content="<?php echo ($page_seo["description"]); ?>" name="description">
	<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="/static/m_8mob_jp/js/zepto.min.js"></script>
	<script src="/static/m_8mob_jp/js/underscore.js"></script>
	<script src="/static/m_8mob_jp/js/mobile.js"></script>
	<script src="/static/js/lazyload.js"></script>
	<style type="text/css">.num {float: none;}</style>
 
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
			<span id="t-find"><a href="<?php echo U('index/index');?>" class="btn btn-left btn-back"></a></span>
			<span id="t-index">品牌团</span>
		</div>
		</header>
<link type="text/css" rel="stylesheet" href="__STATIC__/m_8mob_jp/css/brand.css" />

<nav class="brand_nav_main">
        <div id="brand_nav_wrapper">
            <div id="brand_nav_scroller" class="brand_nav_scroller">
                <ul id="brand_nav_items">
                    <li <?php if(empty($cid)): if(empty($timeFilter)): ?>class="brand_nav_on"<?php endif; endif; ?>><a <?php if(empty($cid)): if(empty($timeFilter)): ?>class="cur"<?php endif; endif; ?>href="<?php echo U('brand/index');?>" >今日上新</a></li>
                    <li <?php if($timeFilter == 'last'): ?>class="brand_nav_on"<?php endif; ?>><a <?php if($timeFilter == 'last'): ?>class="cur"<?php endif; ?>href="<?php echo U('brand/index',array('timeFilter'=>'last'));?>">最后疯抢</a></li>
                    <li <?php if($timeFilter == 'tomorrow'): ?>class="brand_nav_on"<?php endif; ?>><a <?php if($timeFilter == 'tomorrow'): ?>class="cur"<?php endif; ?>href="<?php echo U('brand/index',array('timeFilter'=>'tomorrow'));?>">明日预告</a></li>
		    <?php if(is_array($cats)): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><li  <?php if($cid == $vol['cid']): ?>class="brand_nav_on"<?php endif; ?>><a <?php if($cid == $vol['cid']): ?>class="cur"<?php endif; ?>href="<?php echo U('brand/index',array('cid'=>$vol['cid']));?>"  ><?php echo ($vol["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
</nav>
<script>
                   var myscroll=new IScroll("#brand_nav_wrapper",{hScroll:true,snap:true, mouseWheel:true});
        </script>

<div class="brand_main">
        
        <ul id="brand_list_items">
		<?php if(is_array($brands)): $i = 0; $__LIST__ = $brands;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li class="brand_list">
		<a href="<?php echo U('brand/dlist',array('uid'=>$val['uid']));?>" target="_blank" >
			<time><?php echo (date("m月d日 H时i分",$val['oetime'])); ?>结束</time>
			<figure><img src="__STATIC__/images/grey.gif" class="lazy" _src="<?php echo ($val['newbrandEnter']); ?>_760x760Q50.jpg"  ><h3></h3></figure>
			<aside>
				<figure><img src="__STATIC__/images/grey.gif" class="lazy" _src="<?php echo ($val['shop_icon']); ?>" ><p><?php echo ($val['txt']); ?></p></figure>
				<div class="r"><span><b><?php echo ($val['discount']); ?></b></span></div>
			</aside>
		</a>
		</li><?php endforeach; endif; else: echo "" ;endif; ?>
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