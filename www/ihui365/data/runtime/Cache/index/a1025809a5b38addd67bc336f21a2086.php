<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8" />
<link rel="dns-prefetch" href="//g.alicdn.com">
<link rel="dns-prefetch" href="//img.alicdn.com">
<title><?php echo ($page_seo["title"]); ?>  <?php echo C('ftx_site_name');?> - Powered by Ftxia</title>
<meta name="keywords" content="<?php echo ($page_seo["keywords"]); ?>" />
<meta name="description" content="<?php echo ($page_seo["description"]); ?>" />
<meta name="generator" content="Ftxia! 8.0" />
<meta name="renderer" content="webkit">
<meta name="version" content="<?php echo FTX_RELEASE; ?>">
<meta name="author" content="Ftxia Team  Bbs.8mob.com" />
<meta name="Copyright" content="2010-2015 Ftxia.com Inc." />
<meta name="MSSmartTagsPreventParsing" content="True" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
<?php if(C('ftx_wapjump_open') == 1): ?><script src="http://siteapp.baidu.com/static/webappservice/uaredirect.js" type="text/javascript"></script>
<script type="text/javascript">uaredirect("<?php echo C('ftx_wap_url');?>");</script><?php endif; ?>
<script language=javascript> 
	<!-- 
	window.onerror=function(){return true;} 
	// -->
	SITEURL="<?php echo C('ftx_site_url');?>";
	CURURL="<?php echo C('ftx_site_url');?>";
	WEBNICK="<?php echo C('ftx_site_name');?>";
	URL_COOKIE=0;
</script>
<link rel=stylesheet type=text/css href="__STATIC__/8mobcom/css/base.css" />
<link rel=stylesheet type=text/css href="__STATIC__/8mobcom/css/global.css" />
<link rel=stylesheet type=text/css href="__STATIC__/8mobcom/css/alert.css" />
<link rel=stylesheet type=text/css href="__STATIC__/8mobcom/css/page.css" />


<script type="text/javascript" src="__STATIC__/8mobcom/js/jquery.js"></script>
<script type="text/javascript" src="__STATIC__/8mobcom/js/jquery.cookie.js"></script>
<script type="text/javascript" src="__STATIC__/js/lazyload.js"></script>
<script type="text/javascript" src="__STATIC__/8mobcom/js/fun.js"></script>
<script type="text/javascript" src="__STATIC__/8mobcom/js/jumpbox.js"></script>
<script type="text/javascript" src="__STATIC__/8mobcom/js/funs.js"></script>

<?php echo C('ftx_header_html');?>
<?php if(C('ftx_site_style') == 'juanpi'): ?><link rel=stylesheet type=text/css href="__STATIC__/8mobcom_jp/css/base.css" />
<?php elseif(C('ftx_site_style') == 'zhe800'): ?>
<link rel=stylesheet type=text/css href="__STATIC__/8mobcom_zhe/css/base.css" />
<?php elseif(C('ftx_site_style') == 'jky'): ?>
<link rel=stylesheet type=text/css href="__STATIC__/8mobcom_jky/css/base.css" /><?php endif; ?>
<link rel=stylesheet type=text/css href="__STATIC__/8mobcom/css/jp_base.css" />



<link rel=stylesheet type=text/css href="__STATIC__/8mobcom/css/good_jp.css" />
<link rel=stylesheet type=text/css href="__STATIC__/8mobcom/css/brand.css" />
</head>
<body>
<!-- 头部开始 -->
<div id="toolbar">
    <div class="bar-con  <?php echo C('ftx_site_width');?>">
	<ul class="topNav fl">
		<li class="first"><a href="<?php echo C('ftx_site_url');?>" <?php if(empty($topnav_curr)): ?>class="active"<?php endif; ?>><?php echo C('ftx_site_name');?></a></li>
	<?php $tag_nav_class = new navTag;$data = $tag_nav_class->lists(array('type'=>'lists','style'=>'top','cache'=>'0','return'=>'data',)); if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li <?php if('wap' == $val['alias']): ?>class="phone-code"<?php endif; ?>><a href="<?php echo ($val["link"]); ?>" <?php if($topnav_curr == $val['alias']): ?>class="active"<?php endif; ?> <?php if($val["target"] == 1): ?>target="_blank"<?php endif; ?>><?php if('wap' == $val['alias']): ?><em class="icon-normal icon-phone "></em><?php endif; echo ($val["name"]); ?></a>
		<?php if('wap' == $val['alias']): ?><div class="code-tips"><div class="code-box"><p class="code"><img src="<?php echo C('ftx_site_browser');?>" width="90px" height="90px" /></p><p class="txt" style="text-align:center;">随时逛 及时抢</p></div></div><?php endif; ?>
		</li><?php endforeach; endif; else: echo "" ;endif; ?> 
        </ul>
        
        <div class="right-show fr" id="right-show">
		<div class="union-login">
			<?php if(is_array($oauth_list)): $i = 0; $__LIST__ = $oauth_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href="<?php echo U('oauth/index', array('mod'=>$val['code']));?>"><i class="icon-<?php echo ($val["code"]); ?>"></i><?php echo ($val["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>　|
		</div>
		<div class="login-show">
			<a href="<?php echo U('user/login');?>">登录</a>
			<a href="<?php echo U('user/register');?>">免费注册</a>　|
		</div>
		<div class="other-show">
			<a href="<?php echo C('ftx_kefu_html');?>" target="_blank" rel="nofollow">在线客服</a>
			<a href="<?php echo U('baoming/index');?>" target="_blank">卖家报名</a>
		</div>
	</div>
	<script>
			function topHtml() {/*
			<div class="logined-show">
				<a id="{:U('user/index')}" href="<?php echo U('user/index');?>" class="normal-a"><span class="user">{$name}</span><em class="cur"></em></a>
				<div class="normal-box login-box">
					<ul>
						<li><a href="<?php echo U('user/gift');?>"><i class="icon icon-02"></i><span>我的订单</span></a></li>
						<li><a href="<?php echo U('user/index');?>"><i class="icon icon-03"></i><span>账号设置</span></a></li>
						<li><a href="<?php echo U('user/logout');?>" class="exit" ><i class="icon icon-04"></i><span>退出</span></a></li>
					</ul>
				</div>
			</div>
			<div class="personal-show">
				<a href="<?php echo U('user/mingxi');?>"><span>账户明细</span></a>
				<a href="<?php echo U('user/gift');?>"><span>我的订单</span></a>
				<p class="info fr ffv"><a href="<?php echo U('user/msg');?>">{$msgsrc}</a></p>
				<em class="count" style="display: none;">0</em></a>　|
			</div>
			<div class="other-show"><a href="<?php echo C('ftx_kefu_html');?>" target="_blank" rel="nofollow">在线客服</a><a href="<?php echo U('baoming/index');?>">卖家报名</a></div>*/;}
				$.ajax({
					url: '<?php echo U('ajax/userinfo');?>',
					dataType:'jsonp',
					jsonp:"callback",
					success: function(data){
						if(data.s==1){
							topHtml=getTplObj(topHtml,data.user);
							$('#right-show').html(topHtml).show();
						}
						else{
							$('#right-show').show();
						}
					}
				});
			</script>

    </div>
</div>
<div class="header">
    <div class="area <?php echo C('ftx_site_width');?>">
        <div class="logo">
		<?php if(C('ftx_site_logo') != ''): ?><h1 class="fl"><a title="<?php echo C('ftx_site_name');?>" href="<?php echo C('ftx_site_url');?>"><img src="<?php echo C('ftx_site_logo');?>" width="283" height="50" /></a></h1>
		<?php else: ?>
			<h1 class="fl"><a title="<?php echo C('ftx_site_name');?>" href="<?php echo C('ftx_site_url');?>"><img src="/static/8mobcom/images/logo3.png" width="238" height="50" /></a></h1><?php endif; ?>

        </div>
        <div class="protection">
            <a title="每天22点开抢" class="update"   target="_blank"></a>
            <a title="职业买手砍价" class="lowest"  target="_blank"></a>
            <a title="商品验货质检" class="check"   target="_blank"></a>
        </div>
        <div class="search">
		<form method="get" action="index.php" onsubmit="return search_submit();" >
		<span class="search-area fl search_box">
			<input type="hidden" name="m" value="index" />
			<input type="hidden" name="a" value="so" />
			<input x-webkit-speech name="k" id="keywords" placeholder="请输入您要找的宝贝！" value="" class="txt text" />
		</span>
		<input type="submit" value="" class="smt fr">
		</form>
        </div>
    </div>
    <div class="mainNav">
        <div class="nav <?php echo C('ftx_site_width');?>">
            <ul class="navigation fl">
		<li class="<?php if($nav_curr == 'index'): ?>current<?php endif; ?>   ">
			<a href="<?php echo C('ftx_site_url');?>"><?php echo L('index_page');?></a>
			<div class="all-classify">
                        <dl>
			<dd>
			<?php if(is_array($cate_data)): $i = 0; $__LIST__ = $cate_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bcate): $mod = ($i % 4 );++$i; if($bcate['pid'] == 0): if(($mod) == "3"): ?></dd><dd><?php endif; ?>
				<a <?php if(($cid == $bcate['id']) OR ($cate_data[$cid]['pid'] == $bcate['id'])): ?>class="on"<?php endif; ?> href="<?php echo U('index/cate', array('cid'=>$bcate['id']));?>" title="<?php echo ($bcate["name"]); ?>"><span><?php echo ($bcate["name"]); ?></span></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</dd> 
                        </dl>
                    </div>
		
		</li>
		<?php $tag_nav_class = new navTag;$data = $tag_nav_class->lists(array('type'=>'lists','style'=>'main','cache'=>'0','return'=>'data',)); if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li class="  <?php if($nav_curr == $val['alias']): ?>current<?php endif; ?>"><a href="<?php echo ($val["link"]); ?>" <?php if($val["target"] == 1): ?>target="_blank"<?php endif; ?>><?php echo ($val["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>

            </ul>
            <div class="state-show fr"> <a href="<?php echo U('gift/index');?>" target="_blank" class="normal-a">积分商城</a> <a href="javascript:;" class="normal-a dosign signin_a sign_btn" id="signIn_btn"><em class="icon-normal icon-sign"></em><em class="text">签到领积分</em></a>
                <div style="display: none;" class="normal-side-box" id="top-side-box">
                    <div class="box-tips">
                        <p class="text">每天最多可赚：<b>100</b> 积分<br></p>
                        <p class="other"> <a target="_blank" href="<?php echo U('user/mingxi');?>">我的积分</a>　｜　<a target="_blank" href="<?php echo U('gift/index');?>">积分商城</a><br>
                            QQ特享群：<b><?php echo C('ftx_qq_qun');?></b> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 
<!--OLD头部结束-->

 
<style>
.w1100 .good-pic {height: 180px;}
.w1005 .good-pic,.w1005 .good-pic img{height: 190px;}

.bmain .w1100 .brand-bd {width: 280px;height: 265px;}
.bmain .w1100 .brand-more a {bottom: 90px;}
.bmain .w1100 .normal-title .title {overflow: hidden;}
.bmain .w1100 .normal-title .title h3 {height: 30px;}
.bmain .w1100 .slide-logos ul li a {height: 69px;}
.bmain .w1100 .slide-logos ul li a img {width: 100px;height: 50px;}

.bmain .w1005 .brand-bd {width: 307px;height: 275px;}
.bmain .w1005 .brand-more a {bottom: 90px;}
.bmain .w1005 .normal-title .title {overflow: hidden;}
.bmain .w1005 .normal-title .title h3 {height: 30px;}
.bmain .w1005 .slide-logos ul li a {width: 120.5px;height: 69px;}
.bmain .w1005 .slide-logos ul li a img {width: 110px;height: 55px;margin-top: 5px;}

.main.title{height: 1px;background: #ccc; position: relative; text-align: center; margin-top: 30px; margin-bottom: 30px; font-size: 14px;}
.title .count {position: relative; display: inline-block; *display: inline; *zoom:1; color: #666; top: -10px; padding: 0 20px; *left: 0px; background: #e2e7eb; }
.main.title.care { border-left-width: 407px; border-right-width: 407px; }
.main.title.hot{ border-left-width: 428px; border-right-width: 428px; }
.title .endtime i { font-weight: bold; font-family: "Tahoma"; letter-spacing: 2px; font-size: 15px; }
</style>
<div style="background:url(<?php echo ($shop['big_img']); ?>) no-repeat" data-src="<?php echo ($shop['big_img']); ?>" class="brand-banner"> 
	<img onload="adapt();" src="<?php echo ($shop['big_img']); ?>" id="brand_imgs" style="display:none;"/>
	<div class="center <?php echo C('ftx_site_width');?>">
		<div class="brand-open">
			<div class="brand-ceng"></div>
			<div class="brand-bg">
				<div class="logo"><img src="<?php echo ($shop['logo']); ?>" width="80px"></div>
				<div class="line"></div>
				<div class="txt"><?php echo ($shop['txt']); ?></div>
			</div>
		</div>
	</div>
</div>
<div class="main title <?php echo C('ftx_site_width');?> ">
    <div class="count">
        
	<?php if($shop['ostime'] >= time()): ?><span>距活动开始还有：</span>
	<span class="endtime" data-time="<?php echo ($shop['ostime']); ?>" data-id="1" id="end_date_1"><?php echo (date("m月d日 H时i分",$shop["ostime"])); ?></span>
	<?php else: ?>
	<span>距活动结束还有：</span>
        <span class="endtime" data-time="<?php echo ($shop['oetime']); ?>" data-id="0" id="end_date_0"><?php echo (date("m月d日 H时i分",$shop["oetime"])); ?></span><?php endif; ?>
	
    </div>
</div>

<?php if(is_array($items)): $x = 0; $__LIST__ = $items;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$itemvol): $mod = ($x % 2 );++$x;?><div class="main <?php echo C('ftx_site_width');?> clear">
	<?php if($floor > 1): ?><div class="bmain">
	<div class="normal-title clear">
                    <a name="floor<?php echo ($x); ?>">
                        <div class="title"><h3><?php echo (num_format($x)); ?>楼</h3></div>
                    </a>
        </div>
	</div><?php endif; ?>
	<ul class="goods-list <?php echo C('ftx_site_wc');?>">

		<?php if(is_array($itemvol)): $i = 0; $__LIST__ = $itemvol;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 4 );++$i;?><li  class="<?php if(($mod) == "3"): ?>last<?php endif; ?>">
			<div class="sid_<?php echo ($item["sellerId"]); ?>  list-good   <?php echo ($item["class"]); ?> " id="nid_<?php echo ($item["num_iid"]); ?>">
				<div class="good-pic">
					<a biz-itemid="<?php echo ($item['num_iid']); ?>" isconvert=1 href="http://detail.tmall.com/item.htm?id=<?php echo ($item['num_iid']); ?>"   target="_blank"><img src='/static/8mobcom/images/blank.gif' data-original='<?php echo ($item['pic_url']); ?>_400x400Q90.jpg' alt="<?php echo ($item["title"]); ?>" class="lazy"   /></a>
					<div class="yhq"> </div>
				</div>
				<h3 class="good-title">
					<a target="_blank" biz-itemid="<?php echo ($item['num_iid']); ?>" isconvert=1 href="<?php echo U('item/index',array('iid'=>$item['num_iid']));?>" class="title"><?php echo ($item["title"]); ?></a>
				</h3>
				<div class="good-price">
					<span class="price-current"><em>￥</em><?php echo (price($item["coupon_price"])); ?></span>
					<span class="des-other">
						<span class="price-old"><?php if($item["zk"] < 10): ?><em>¥<?php echo (price($item["price"])); ?></em><u>(<?php echo ($item["zk"]); ?>折)</u><?php endif; ?></span>
						<?php if($item["ems"] == 1): ?><span class="discount show">
							<b class="icon_by" title="包邮"></b>
						</span><?php endif; ?>
					</span>
					<div class="btn-new buy">
					<?php if($item["shop_type"] == 'C' ): ?><a biz-itemid="<?php echo ($item['num_iid']); ?>" isconvert=1 href="http://detail.tmall.com/item.htm?id=<?php echo ($item['num_iid']); ?>"  target="_blank" rel="nofollow"><em class="icon_n"></em><span>淘宝</span></a>
					<?php elseif($item["shop_type"] == 'B' ): ?>
						<a biz-itemid="<?php echo ($item['num_iid']); ?>" isconvert=1 href="http://detail.tmall.com/item.htm?id=<?php echo ($item['num_iid']); ?>"  target="_blank" rel="nofollow"><em class="icon_t"></em><span>天猫</span></a>
					<?php elseif($item["shop_type"] == 'D' ): ?>
						<a href="<?php echo ($item["click_url"]); ?>" target="_blank" rel="nofollow"><em class="icon_j"></em><span>京东</span></a>
					<?php else: ?>
						<a href="<?php echo U('jump/'.$item['num_iid']);?>" target="_blank" rel="nofollow"><span>去抢购</span></a><?php endif; ?> 
					</div>
				</div>
				
			</div>
		</li><?php endforeach; endif; else: echo "" ;endif; ?>
	
	</ul>
	<div class="clear"></div> 
</div><?php endforeach; endif; else: echo "" ;endif; ?>

 
<div class="main <?php echo C('ftx_site_width');?> dlist pr mt25 clear">
	<div class="bmain">
	<div class="normal-title clear">
                    <a name="floor<?php echo ($x); ?>">
                        <div class="title"><h3>更多心动品牌</h3></div>
                    </a>
        </div>
	</div>
	<?php if(is_array($brands)): $i = 0; $__LIST__ = $brands;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 24 );++$i;?><div class="brand-mod J_brand_mod " data-time="<?php echo ($val["ostime"]); ?>,<?php echo ($val["oetime"]); ?>">
		<div>
			<a  class="link J_nodelog J_poslog"  href="<?php echo U('brand/dlist',array('uid'=>$val['uid']));?>" target="_blank"></a>
			<?php if(date('Y-m-d',$val['ostime']) == date('Y-m-d')): ?><i class="i-new ht"></i><?php endif; ?>
		</div>
		<img class="img lazy" data-original="<?php echo ($val["brandEnter"]); ?>" src="/static/8mobcom/images/blank.gif" alt="<?php echo ($val["shop-name"]); ?>" style="display: block;">
		<div class="info">
			<img class="logo lazy" src="/static/8mobcom/images/blank.gif" data-original="<?php echo ($val["shop_icon"]); ?>_160x160Q90.jpg" alt="<?php echo ($val["shop-name"]); ?>" style="display: block;">
			<div class="about"><?php echo ($val["discount"]); ?></div>
			<div class="desc">
				<?php if($val['ostime'] >= time()): ?><p class="J_soon_tag" style=""><i class="i-soon">即将开始</i></p>
				<?php else: ?>
				<p class="J_soon_tag" style="display:none;"><i class="i-soon">即将开始</i></p><?php endif; ?>
				<p class="J_start_tag" style="display:none;"></p>
			</div>
			<div class="fls"><?php echo (date("m月d日",$val["ostime"])); ?>~<?php echo (date("m月d日",$val["oetime"])); ?></div>
		</div>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>


	<div style="position: relative;width: 980px;height: 30px;margin: 10px auto 8px;">
		<div style="position: relative;padding-top: 10px;float: right;display: inline;">内容资源来自：<a href="http://www.Ftxia.com/" target="_blank">飞天侠开放平台</a></div>
	</div>

	 
<script type="text/javascript">
function show_date_time(end,style,id){
	today=new Date(); 
	timeold=((end)*1000-today.getTime()); 
	if (timeold < 0) {
		$("#end_date_"+id).html("已结束!");
		return;
	}
	window.setTimeout("show_date_time("+end+','+style+','+id+")", 100); 
	sectimeold=timeold/1000;
	secondsold=Math.floor(sectimeold); 
	msPerDay=24*60*60*1000;
	e_daysold=timeold/msPerDay;
	daysold=Math.floor(e_daysold); 
	e_hrsold=(e_daysold-daysold)*24;
	hrsold=Math.floor(e_hrsold); 
	e_minsold=(e_hrsold-hrsold)*60;
	minsold=Math.floor((e_hrsold-hrsold)*60); 
	e_seconds = (e_minsold-minsold)*60;
	seconds=Math.floor((e_minsold-minsold)*60); 
	ms = e_seconds-seconds;
	ms = new String(ms);
	ms1 = ms.substr(2,1);
	ms2 = ms.substr(2,1);
	hrsold1=daysold*24+hrsold;
	if(style == 1){
		$("#end_date_"+id).html((hrsold1<10?'0'+hrsold1:hrsold1)+"小时"+(minsold<10?'0'+minsold:minsold)+"分"+(seconds<10?'0'+seconds:seconds)+"秒");
	}else if(style == 2){
		if(daysold>0){
			$("#end_date_"+id).html("<i>"+daysold+"</i>天<i>"+(hrsold<10?'0'+hrsold:hrsold)+"</i>时<i>"+(minsold<10?'0'+minsold:minsold)+"</i>分<i>"+(seconds<10?'0'+seconds:seconds)+"."+ms2+"</i>秒");
		}else{
			$("#end_date_"+id).html("<i>"+(hrsold<10?'0'+hrsold:hrsold)+"</i>时<i>"+(minsold<10?'0'+minsold:minsold)+"</i>分<i>"+(seconds<10?'0'+seconds:seconds)+"."+ms2+"</i>秒");
		}
	}else if(style == 3){
		$("#end_date_"+id).html((hrsold1<10?'0'+hrsold1:hrsold1)+"小时"+(minsold<10?'0'+minsold:minsold)+"分"+(seconds<10?'0'+seconds:seconds)+"."+ms1+"秒");
	}else if(style == 4){
		if(daysold>0){
			$("#end_date_"+id).html(daysold+"天"+(hrsold<10?'0'+hrsold:hrsold)+"时"+(minsold<10?'0'+minsold:minsold)+"分");
		}else{
			$("#end_date_"+id).html((hrsold1<10?'0'+hrsold1:hrsold1)+"小时"+(minsold<10?'0'+minsold:minsold)+"分");
		}
	}else{
		$("#end_date_"+id).html(daysold+"天"+(hrsold<10?'0'+hrsold:hrsold)+"小时"+(minsold<10?'0'+minsold:minsold)+"分"+(seconds<10?'0'+seconds:seconds)+"秒."+ms2);
	}
}
$(".endtime").each(function() {
        var reg = /^[0-9]+$/;
        var time = $(this).attr('data-time');
	var id = $(this).attr('data-id');
        if (reg.test(time)) {
            show_date_time(time, 2, id);
        }
}); 
        //初始化
        $(".slide-logos .next-btn").click(function(){
            $(".logos-box ul").stop(true,true).animate({marginLeft:-1*$(".logos-box li:eq(0)").width()},100,function(){
                $(".logos-box ul").append($(".logos-box li:eq(0)").clone());
                $(".logos-box li:eq(0)").remove();
                $(".logos-box ul").css("margin-left",0);
            })
        });
        $(".slide-logos .prev-btn").click(function(){
            $(".logos-box ul").prepend($(".logos-box li:last").clone());
            $(".logos-box li:last").remove();
            $(".logos-box ul").css("margin-left",-1*$(".logos-box li:eq(0)").width());
            $(".logos-box ul").stop(true,true).animate({marginLeft:0},100)
        });

        var F_selected = function(){
            var brand_id = location.href.split("#")[1];
            $("#" + brand_id).addClass("selected-active");
            $("li.selected-active").on("mouseover",function(){
                $(this).removeClass("selected-active")
            })
        }
        F_selected();
 
function adapt(){
	var img = new Image(); 
	img.src =$('#brand_imgs').attr("src") ; 
	var imgheight = img.height;
	if(imgheight>0){
		$('.brand-banner').height(imgheight);
	}
}
</script>
<?php echo C('ftx_footer_html');?>
<div class="container" style="_position:relative;">
	<div class="fix-right-layer" id="fix-right-layer" style="display: none; right: 0px;">
	    <div class="fix-right-body">
	        <div class="fix-right-middle" style="overflow: visible; display: block;">
	            <div class="img-span">
			<a href="<?php echo U('user/index');?>" class="mark" title="会员中心">
	                    <img src="__STATIC__/8mobcom/images/layout/my.png">
	                </a>
                    <div class="tab-bar tab-bar-js" style="display:none;">会员中心<div class="tab-tip-arr">◆</div></div>
                </div>

	        </div>
            <div class="fix-right-bottom">
                <div class="img-span">
                    <a href="javascript:void(0);" class="sign sign_btn">
                        <img src="__STATIC__/8mobcom/images/layout/sign.gif" style="margin-left: 7px;">
                    </a>
                    <div class="tab-bar tab-bar-js" style="right: 35px; display: none;">签到送积分<div class="tab-tip-arr">◆</div></div>
                </div>

                <div class="img-span">
                    <a href="javascript:void(0);">
                        <img src="__STATIC__/8mobcom/images/layout/qrcode.png">
                    </a>
                    <div class="qrcode-tab-bar tab-bar-js" style="right: 35px; display: none;">
                        <img src="__STATIC__/8mobcom/images/layout/download_app.png">
                    </div>
                </div>
                <div class="img-span">
                    <a href="<?php echo C('ftx_kefu_html');?>" target="_blank" rel="nofollow">
                        <img src="__STATIC__/8mobcom/images/layout/qq.png">
                    </a>
                    <div class="tab-bar tab-bar-js" style="display:none;">联系客服<div class="tab-tip-arr">◆</div></div>
                </div>
                <div class="img-span">
                    <div id="gotop" class="gotop" style="display: block;">
	                    <a href="javascript:void(0);">
	                        <img src="__STATIC__/8mobcom/images/layout/gotop.png">
	                    </a>
                    </div>
                    <div class="tab-bar tab-bar-js" style="display:none;">返回顶部<div class="tab-tip-arr">◆</div></div>
                </div>
            </div>
            
	    </div>
	</div>

</div>
<script type="text/javascript">
    $(window).resize(function(){
        if($('#fix-right-layer').height()<580){
            $('.fix-right-middle').hide();
        }else{
            $('.fix-right-middle').show();
        }
    });
    /* 右侧浮动层*/
    $('.img-span').hover(function(){
        var bar = $(this).find(".tab-bar-js");
        bar.css('right','60px').show().animate({right:"35px"},1000);
    },function(){
       $(this).find(".tab-bar-js").hide();
    });
    $('.gotop').click(function() {$("html, body").animate({ scrollTop: 0 }, 120);});
</script>
<script>

if(window.screen.width<1500){
	$('.jiu-side-nav.w1100').hide();
}

</script>
<?php if(!empty($visitor)): if($visitor['username'] == C('ftx_index_admin')): ?><script type="text/javascript">
	function noshow(id){
		if(!$.ftxia.dialog.islogin()) return ;
		$(this).html('<img src="/static/ftxia/images/loading.gif" />');
		$.ajax({
			url: FTXIAER.root + '/?m=item&a=noshow',
				type: 'POST',
				data: {
					id: id
				},
			dataType: 'json',
			success: function(result){
				if(result.status == 1){
					$.ftxia.tip({content:result.msg, icon:'success'});
				}else{
					$.ftxia.tip({content:result.msg, icon:'error'});
				}
			}
		});
	}

	$(".show a").click(function() {
		id = $(this).attr("data-id");
		if(!$.ftxia.dialog.islogin()) return ;
		$(this).html('<img src="/static/ftxia/images/loading.gif" />');
		$.ajax({
			url: FTXIAER.root + '/?m=item&a=noshow',
				type: 'POST',
				data: {
					id: id
				},
			dataType: 'json',
			success: function(result){
				if(result.status == 1){
					$(this).html('成功');
					$.ftxia.tip({content:result.msg, icon:'success'});
				}else{
					$(this).html('已取消');
					$.ftxia.tip({content:result.msg, icon:'error'});
				}
			}
		});
	});  
</script><?php endif; endif; ?>
<!-- 页脚 -->
<div class="foot">
	<div class="white_bg <?php echo C('ftx_site_width');?>">
		<div class="xd_info <?php echo C('ftx_site_width');?>">
			<div class="jky-info fl">
				<?php if(C('ftx_site_flogo') != ''): ?><h2><img src="<?php echo C('ftx_site_flogo');?>" height="38" /></h2>
				<?php else: ?>
					<h2><img src="/static/8mobcom/images/foot_logo.jpg" height="38" /></h2><?php endif; ?>
				<div class="attentionlist">
				</div>
			</div>
			<div class="fl">
				<div class="abouts">
					<ul>
				<li class="tit">关于我们</li>
				<li><a href="<?php echo U('help/read',array('id'=>1));?>" target="_blank">关于我们</a></li>
				<li><a href="<?php echo U('help/read',array('id'=>3));?>" target="_blank">联系我们</a></li>
				<li><a href="<?php echo U('help/read',array('id'=>2));?>" target="_blank">广告合作</a></li>
					</ul>
				</div>
					<div class="help">
					<ul>
						<li class="tit">用户帮助</li>
						<li><a href="<?php echo U('help/read',array('id'=>6));?>" target="_blank">常见问题</a></li>
						<li><a href="<?php echo U('help/qianggou');?>" target="_blank">抢购小技巧</a></li>
						<li><a href="<?php echo U('article/index');?>" target="_blank">文章中心</a></li>
					</ul>
				</div>
				<div class="user">
					<ul>
						<li class="tit">会员服务</li>
						<li><a href="<?php echo U('user/register');?>" target="_blank">免费注册</a></li>
						<li><a href="<?php echo U('user/login');?>" target="_blank">登录本站</a></li>
						<li><a href="<?php echo U('forget/index');?>" target="_blank">找回密码</a></li>
					</ul>
				</div>
			</div>
			<div style="float:left;">
				<span class="tit">微信服务号</span>
				<br />
				<?php if(C('ftx_site_weixin') != ''): ?><img src="<?php echo C('ftx_site_weixin');?>" width="100" height="100" />
				<?php else: ?>
				<img src="__STATIC__/8mobcom/images/foot_weixin.png" width="100" height="100" /><?php endif; ?>
			</div>
			<div style="float:left;margin: 0px 0 0 44px;">
				<span class="tit">下载客户端</span>
				<br />
				<?php if(C('ftx_site_weixin') != ''): ?><img src="<?php echo C('ftx_site_browser');?>" width="100" height="100" />
				<?php else: ?>
				<img src="__STATIC__/8mobcom/images/foot_browser.png" width="100" height="100" /><?php endif; ?>
			</div>

			  
			<div class="links <?php echo C('ftx_site_width');?>">
				<span>友情链接：</span>
				<div class="links_list_box">
					<ul class="links_list">
					<?php $tag_link_class = new linkTag;$data = $tag_link_class->lists(array('type'=>'lists','cache'=>'0','return'=>'data',));?><li>
			    			<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 10 );++$i;?><a href="<?php echo ($val["url"]); ?>" target="_blank"><?php echo ($val["name"]); ?></a>
							<?php if(($mod) == "9"): ?></li><li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
						</li>
					</ul>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<p class="f_miibeian <?php echo C('ftx_site_width');?>"><a href="http://www.miibeian.gov.cn/" rel="nofollow" target="_blank"><?php echo C('ftx_site_icp');?></a> © 2010-2015 8MOB.com V8.0 正式版 all Rights Reserved <a href="http://bbs.8mob.com/" target="_blank">飞天侠淘宝客官方</a>
		<?php echo C('ftx_statistics_code');?></p>

		<div class="logo">
			<a rel="nofollow" target="_blank" href=""><img border="0" src="http://s.juancdn.com/juanpi/img/icon/r_315online.gif"></a>
			<a rel="nofollow" target="_blank" href=""><img border="0" src="http://s.juancdn.com/juanpi/img/icon/r_cnnic.gif"></a>
			<a rel="nofollow" target="_blank" href=""><img border="0" src="http://s.juancdn.com/juanpi/img/icon/r_gongshang.gif"></a>
			<a rel="nofollow" target="_blank" logo_type="realname" href=""><img src="http://static.anquan.org/static/outer/image/sm_124x47.png" alt="安全联盟认证" width="124" height="47" style="border: none;"></a>
		</div>
		
	</div>
</div>
<!-- /页脚 -->
<!--淘点金开始-->
<?php echo C('ftx_taojindian_html');?>
<!--淘点金结束-->



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
<?php $tag_load_class = new loadTag;$data = $tag_load_class->js(array('type'=>'js','href'=>'__STATIC__/js/jquery/plugins/jquery.tools.min.js,__STATIC__/js/jquery/plugins/jquery.masonry.js,__STATIC__/js/jquery/plugins/formvalidator.js,__STATIC__/js/fileuploader.js,__STATIC__/js/ftxia.js,__STATIC__/js/front.js,__STATIC__/js/dialog.js,__STATIC__/js/item.js,__STATIC__/js/user.js,__STATIC__/js/comment.js,__STATIC__/8mobcom/js/comm.js','cache'=>'0','return'=>'data',));?>





</body>
</html>