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

 
<div class="jiu-nav-main">
	<div class="jiu-nav <?php echo C('ftx_site_width');?>">
		<div class="nav-item ">
			<div class="item-list">
				<ul>
				<li ><a href="/ju" <?php if($cid == 0): ?>class="active"<?php endif; ?> >全部</a></li>
				<?php if(is_array($cats)): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('ju/index',array('cid'=>$vol['cid']));?>"  <?php if($cid == $vol['cid']): ?>class="active"<?php endif; ?> ><?php echo ($vol["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
	</div>
</div>

	<div  class="container ju-wrapper w1190  <?php echo C('ftx_site_width');?> ju-container ju-home">
		<div class="ju-itemlist">
		<?php echo ($html); ?>
		</div>
	</div>

	<div class="page <?php echo C('ftx_site_width');?> "><em></em><div><?php echo ($page); ?></div></div>
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