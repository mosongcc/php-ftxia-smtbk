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
</head>
<body>
<!-- 主体 -->
	<div id="top_weixin" style="width: 100%; z-index: 9999; position:fixed;top:0;display: none; background:#e4e4e4; " class="clear">
		<div id="open_d" style="height: 36px;  z-index: 99999; width: 100%; margin: 0 auto; position: relative; max-width: 476px; min-width: 320px; line-height: 36px; font-size: 14px; font-family: '微软雅黑';background: #e4e4e4;border: 1px solid rgba(255,56,56,1);margin: 1px auto;color:rgba(255,56,56,1)">
			<i style="width: 36px; height: 36px; background: #e4e4e4; float: left;"><img src="http://s.juancdn.com/jpwebapp/images/yellow.png?1" width="36px"></i><span style="padding-left: 10px; display: inline-block;"><span id="open_t">无法启动下载，请使用浏览器下载！</span><a style="color:rgba(2,137,205,1); text-decoration: underline;" id="open_o">查看>></a></span><i style="width: 40px; height: 36px; position: absolute; right: 20px;"></i>
		</div>
		<div id="xq_a" style="z-index: 99999;  margin: 0 auto; position: relative;max-width: 480px; min-width: 320px;display:none;">
			<img width="100%" src="/static/8mobcom_jp/images/xiazai_a.png" />
		</div>
	</div>
	<script type="text/javascript">
	if(navigator.userAgent.indexOf("MicroMessenger") > -1 && navigator.userAgent.indexOf("iPhone") > -1 ){
		if(location.href.indexOf("deal") > -1){
			$("#xq_a").find('img').attr("src","/static/8mobcom_jp/images/goumai_i.png");
			$("#open_t").html("无法正常购买？请在浏览器中打开！");
		}else if(location.href.indexOf("apps") > -1){
			$("#xq_a").find('img').attr("src","/static/8mobcom_jp/images/xiazai_i.png");
			$("#open_t").html("无法启动/下载？请在浏览器中打开！");
		}else{
			$("#xq_a").find('img').attr("src","/static/8mobcom_jp/images/xiazai_i.png");
			$("#open_t").html("无法启动/下载？请在浏览器中打开！");
		}
	}else{
		if(location.href.indexOf("deal") > -1){
			$("#xq_a").find('img').attr("src","/static/8mobcom_jp/images/goumai_a.png");
			$("#open_t").html("无法正常购买，请在浏览器中打开！");
		}else if(location.href.indexOf("apps") > -1){
			$("#xq_a").find('img').attr("src","/static/8mobcom_jp/images/xiazai_a.png");
			$("#open_t").html("无法启动/下载？请在浏览器中打开！");
		}else{
			$("#xq_a").find('img').attr("src","/static/8mobcom_jp/images/xiazai_a.png");
			$("#open_t").html("无法启动/下载？请在浏览器中打开！");
		}
	}

	$("#open_d").on('click',  function(event) {
		$("#open_d").hide(400);
		$("#xq_a").show(400);
	});
	$("#xq_a").on('click',  function(event) {
		$("#xq_a").hide(400);
		$("#open_d").show(400);
	});
	</script>
<div class="main">
<style>
.app-other {width: 60%;}
</style>
<div class="app-other">
    <ul>
    <li class="search">
        <div id="search-box">
            <form id="search-form" action="/index.php" method="get">
                <div class="box-search">
                    <input type="text" id="keyword" name="keyword" x-webkit-speech="" placeholder="搜索商品" autocomplete="off" value="">
                    <a href="javascript:;" class="del"><img src="/static/m_8mob_jp/images/del.png"></a>
                </div>
		<input type="hidden" id="g" name="g" value="m">
		<input type="hidden" id="m" name="m" value="index">
		<input type="hidden" id="a" name="a" value="index">
                <button id="search-submit" type="submit">
                    <img src="/static/m_8mob_jp/images/icon/search.png">
                </button>
            </form>
        </div>
    </li>
	<li class="normal active ">
        <a href="<?php echo U('index/index');?>">
        <em class="home"></em>首页</a></li>
	<?php if(is_array($cate_list["p"])): $i = 0; $__LIST__ = $cate_list["p"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li class="normal  "><a href="<?php echo U('index/index',array('cid'=>$item['id']));?>"><em style="background-position:-968px 0"></em><?php echo ($item["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
           
        </ul>
	<p><a href="<?php echo U('user/index');?>"><em class="icon-user"></em><br>个人中心</a><a href="<?php echo U('about/us');?>"><em class="icon-about"></em><br>关于<?php echo C('ftx_site_name');?></a></p> 
</div>
	<div class="app">
		<header id="head" class="head">
		<div class="fixtop">
			<span id="classify" class="classify"><a href="javascript:;" class="btn btn-left btn-type"></a></span>
			<span id="t-index"><?php echo C('ftx_site_name');?></span>
			<span id="user"><a href="javascript:;" class="sign_btn btn btn-right btn-sign" _hover-ignore="1"></a></span>
		</div>
		</header>

		<?php if(C('ftx_ads_pp') == '0'): echo R('advert/index', array(2), 'Widget');?>
		<?php else: ?>
		<!--品牌托管-->
		<?php if(!empty($brandlist)): ?><script type="text/javascript" src="__STATIC__/js/MobileSlider.js"></script>
		<style>
		.slider{display:none}/*用于获取更加体验*/
		.focus span{width:10px;height:10px;margin-right:10px;border-radius:50%;background:#666;font-size:0}
		.focus span.current{background:#fff}
		</style>
		<div class="slider">
			<ul>
			<?php if(is_array($brandlist['banner'])): $i = 0; $__LIST__ = $brandlist['banner'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$banner): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('brand/dlist',array('uid'=>$banner['shop']['uid']));?>" target="_blank"><img src="<?php echo ($banner['shop']['enter_img']); ?>"></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
		<script>
			$(".slider").MobileSlider({width:640,height:256,during:5000})
		</script><?php endif; endif; ?>

		<div class="nav_box">
			<nav class="nav" id="nav">
				<ul class="">
					<li><a class="active" href="<?php echo U('index/index');?>"><em class="icon icon-jz"></em><span><?php echo C('ftx_site_name');?></span><em class="line"></em></a></li>
					<li><a href="<?php echo U('brand/index');?>"><em class="icon icon-bz"></em><span>品牌团</span><em class="line"></em></a></li>
					<li><a href="<?php echo U('jiu/index');?>"><em class="icon icon-jk"></em><span>9.9包邮</span><em class="line"></em></a></li>
					<li class="_border"><a href="<?php echo U('meili/index');?>"><em class="icon icon-jz"></em><span>美丽说</span><em class="line"></em></a></li>
				</ul>
			</nav>
		</div>
			<div id="goods">
		<section class="goods" id="goods">
		<ul class="goods-list clear" id="goods_block">
		<?php if(is_array($items_list)): $i = 0; $__LIST__ = $items_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li>
				<a class="goods-a" biz-itemid="<?php echo ($item['num_iid']); ?>" isconvert=1 href="<?php echo U('item/index',array('id'=>$item['num_iid']));?>" >
					<img class="lazy" _src="<?php echo attach(get_thumb($item['pic_url'], '_b'),'item');?>" src="/static/jky/images/blank.gif">            
					<span class="icon new">新品</span>
				</a>
				<a biz-itemid="<?php echo ($item['num_iid']); ?>" isconvert=1 href="<?php echo U('jump/index',array('iid'=>$item['num_iid']));?>"  target="_blank"><h3><?php echo ($item["title"]); ?></h3>
				<div class="list-price buy "><span class="price-new"><i>￥</i><?php echo ($item["coupon_price"]); ?></span><i class="del">￥<?php echo ($item["price"]); ?></i><span class="good-btn"><?php if($item["shop_type"] == 'C' ): ?>去淘宝<?php elseif($item["shop_type"] == 'B' ): ?>去天猫<?php endif; ?></span></div></a>
			</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
		</section>
		<div class="paging">
			<div class="paging-nav">
			<?php echo ($page); ?>
			</div>
		</div>
	</div>
		
	<div id="back_top" class="slide-box" style="display: none;">
		<a href="#" class="back-top"><img src="/static/m_8mob_jp/images/icon/back-top.png"></a>      
	</div>
	<script type="text/javascript">
	//回到顶部图标显示隐藏效果
	document.getElementById("back_top").style.display = "none";
	window.onscroll = function () {
	    if (document.documentElement.scrollTop + document.body.scrollTop > 100) {
		document.getElementById("back_top").style.display = "block";
	    }
	    else {
		document.getElementById("back_top").style.display = "none";
	    }
	}
	var $divWidth = $('.goods-a img').width();
	$('.goods-a img').css({'height':$divWidth});

	</script>
	<style type="text/css">
	#foot{height: 120px;}
	</style>
	<?php echo C('ftx_taojindian_html');?>
	<div id="foot">
	    <div class="foot-nav">
		<a href="<?php echo C('ftx_site_url');?>"><img src="/static/m_8mob_jp/images/icon/phone.png">电脑版</a>
		<a href="http://www.mumujie.com/mapi/apk/mumujieV1.0.apk" class="joa_load_app"><img src="/static/m_8mob_jp/images/icon/client.png">客户端</a>
		<a href="<?php echo U('index/index');?>" class="_border"><img src="/static/m_8mob_jp/images/icon/home.png">返回首页</a>
	    </div>
	    <div class="foot-copyright"></div>
	    <h2>copyright © 2015 <?php echo C('ftx_site_name');?></h2>
	</div>


<script type="text/javascript">
$("img.lazy").lazyload({threshold:200,failure_limit:30});

var FTXIAER = {
    root: "__ROOT__",
	site: "<?php echo C('ftx_site_url');?>",
    uid: "<?php echo $visitor['id'];?>", 
    url: {}
};
var lang = {};
<?php $_result=L('js_lang');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>lang.<?php echo ($key); ?> = "<?php echo ($val); ?>";<?php endforeach; endif; else: echo "" ;endif; ?>
</script>
<?php $tag_load_class = new loadTag;$data = $tag_load_class->js(array('type'=>'js','href'=>'__STATIC__/js/jquery/plugins/jquery.tools.min.js,__STATIC__/js/jquery/plugins/jquery.masonry.js,__STATIC__/js/jquery/plugins/formvalidator.js,__STATIC__/js/ftxia.js,__STATIC__/js/front.js,__STATIC__/js/dialog.js,__STATIC__/js/user.js','cache'=>'0','return'=>'data',));?>

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
        return top >= $(element).offset().top + $(element).height();
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
<script type="text/javascript" src="/static/m_8mob_jp/js/mjp.min.js"></script>
<script type="text/javascript" src="/static/m_8mob_jp/js/swipeSlide.min.js"></script>
<script type="text/javascript" src="/static/m_8mob_jp/js/jp.common.js"></script>
<script type="text/javascript">
            $(function(){
            function hideMenu() {
                setTimeout("window.scrollTo(0, 0)", 1);
            }
            $('.alert_black_bg .close').on('click', function(){
                $('.alert_black_bg').hide();
                $('#foot').height(120);
            });
            });
            $(".go-app .closed").on("click",function(){
                $(".go-app").hide();
                return false;
            })
</script>
</body>
</html>