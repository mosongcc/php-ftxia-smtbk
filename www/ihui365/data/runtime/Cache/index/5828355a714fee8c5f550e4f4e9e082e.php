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



<link rel="stylesheet" type="text/css" href="__STATIC__/jky/css/baoming.css" />
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

 


<div class="bm-nav">
	<div class="nav-banner <?php echo C('ftx_site_width');?>">
		<div class="busi-not"></div>
		<div class="nav-list">
			<ul>
				<li <?php if($nav_currr == 'index'): ?>class="nav-active"<?php endif; ?> ><a href="<?php echo U('baoming/index');?>">活动报名</a></li>
				<li <?php if($nav_currr == 'my'): ?>class="nav-active"<?php endif; ?> ><a href="<?php echo U('baoming/my');?>">已报名商品</a></li>
				<li <?php if($nav_currr == 'yaoqiu'): ?>class="nav-active"<?php endif; ?> ><a href="<?php echo U('baoming/yaoqiu');?>">活动要求</a></li>
				<li <?php if($nav_currr == 'shenhe'): ?>class="nav-active"<?php endif; ?> ><a href="<?php echo U('baoming/shenhe');?>">审核说明</a></li>
			</ul>
		</div>
	</div>
</div>

<div class="main <?php echo C('ftx_site_width');?> mb20 clear">
	<div class="main-newgood">
		<div class="textcls">
			<h2>审核说明</h2>
			<div class="line"></div>
			<div class="content">
				<p style="padding-bottom:10px;line-height:24px;padding-left:0px;padding-right:0px;display:block;white-space:normal;color:#ff6600;font-size:16px;padding-top:10px;">
	一、审核周期
</p>
<p style="border-bottom:0px;border-left:0px;padding-bottom:10px;line-height:24px;margin-top:0px;padding-left:20px;padding-right:20px;white-space:normal;margin-bottom:0px;color:#666666;font-size:14px;border-top:0px;border-right:0px;padding-top:10px;">
	1、活动报名后请勿催促，我们会在3个工作日内（自提交之日算起）对您的活动进行审核。<br />
2、我们会优先考虑性价比高的商品，您可以自行调整商品活动价格，以便得到更快的审核进度。
</p>
<p style="padding-bottom:10px;line-height:24px;padding-left:0px;padding-right:0px;display:block;white-space:normal;color:#ff6600;font-size:16px;padding-top:10px;">
	二、结果查询
</p>
<p style="border-bottom:0px;border-left:0px;padding-bottom:10px;line-height:24px;margin-top:0px;padding-left:20px;padding-right:20px;white-space:normal;margin-bottom:0px;color:#666666;font-size:14px;border-top:0px;border-right:0px;padding-top:10px;">
	1、您可以直接到审核结果查看您报名活动的审核动态，招商专员会将审核结果及操作指导发布在留言区<br />
2、请务必在报名时留下您的常用邮箱，系统还会将审核结果以邮件的形式及时发送到您填写的邮箱中。
</p>
<p style="padding-bottom:10px;line-height:24px;padding-left:0px;padding-right:0px;display:block;white-space:normal;color:#ff6600;font-size:16px;padding-top:10px;">
	三、审核状态
</p>
<p style="border-bottom:0px;border-left:0px;padding-bottom:10px;line-height:24px;margin-top:0px;padding-left:20px;padding-right:20px;white-space:normal;margin-bottom:0px;color:#666666;font-size:14px;border-top:0px;border-right:0px;padding-top:10px;">
	1、<?php echo C('ftx_site_name');?>审核条件非常严格，会先后经过7道工序，通过后才能发布上线，这七道工序分别为：初审-复审-洽谈-样品邮寄-样品质检-排期-上线&nbsp;<br />
2、招商专员会经过两轮的活动筛选，即初审、复审，确定您的商品是否适合在本站进行活动&nbsp;<br />
3、在待洽谈状态时，请主动点击与该活动对应的招商专员旺旺与其取得联系（必须是对应的旺旺）&nbsp;<br />
4、在样品邮寄状态时，请将快递信息填写到系统中，以便招商专员能够第一时间反馈样品接收状态&nbsp;<br />
5、招商专员在收到样品时，会将您的活动状态改为“样品质检”，同时会检验您寄来样品的质量&nbsp;<br />
6、如果您的样品质检合格，招商专员会将对应的活动进行初步的排期，如果出现排期问题您也可以直接联系招商专员进行调整&nbsp;<br />
7、到达排期时间后，您的活动即成功发布上线，您可以到<span style="line-height:24px;white-space:normal;color:#666666;font-size:14px;"><?php echo C('ftx_site_name');?></span>首页查看您的活动，活动结束后，您可以再次报名参与&nbsp;<br />
8、如果您的活动被设置为“未通过”，请根据招商专员的留言对活动进行调整、或更换符合要求的商品再来报名&nbsp;<br />
9、如果您报名的活动中连续9款商品均未通过审核，您的店铺将无法再报名参与任何活动&nbsp;<br />
10、如果您报名的活动被标记为“已锁定”状态，该款商品将无法再次进行报名
</p>
<p style="padding-bottom:10px;line-height:24px;padding-left:0px;padding-right:0px;display:block;white-space:normal;color:#ff6600;font-size:16px;padding-top:10px;">
	四、哪些问题导致不被通过
</p>
<p style="border-bottom:0px;border-left:0px;padding-bottom:10px;line-height:24px;margin-top:0px;padding-left:20px;padding-right:20px;white-space:normal;margin-bottom:0px;color:#666666;font-size:14px;border-top:0px;border-right:0px;padding-top:10px;">
	1、9.9包邮秒杀报名要求。<a href="<?php echo U('baoming/yaoqiu');?>" target="_blank">查看详细&gt;&gt;</a><br />
2、20元封顶报名要求。<a href="<?php echo U('baoming/yaoqiu');?>" target="_blank">查看详细&gt;&gt;</a><br />
3、独家折扣报名要求。<a href="<?php echo U('baoming/yaoqiu');?>" target="_blank">查看详细&gt;&gt;</a> 
</p>
<p style="padding-bottom:10px;line-height:24px;padding-left:0px;padding-right:0px;display:block;white-space:normal;color:#ff6600;font-size:16px;padding-top:10px;">
	五、商家报名规则
</p>
<p style="border-bottom:0px;border-left:0px;padding-bottom:10px;line-height:24px;margin-top:0px;padding-left:20px;padding-right:20px;white-space:normal;margin-bottom:0px;color:#666666;font-size:14px;border-top:0px;border-right:0px;padding-top:10px;">
	1、商家认真查看活动要求说明，符合要求的商家联系我们的客服索要活动报名地址。<br />
2、准确填写报名信息，提交报名，我们会尽快进行审核，请关注自己的报名后台查看审核结果。<br />
3、审核通过的活动，我们会联系商家，沟通活动准备工作及上线排期等问题。<br />
4、活动报名准备阶段，商品库存为店铺本身的自然库存。<br />
5、活动自报名起至专员审核排查结束，商家必须做好全面的配合工作。
</p>
<p style="padding-bottom:10px;line-height:24px;padding-left:0px;padding-right:0px;display:block;white-space:normal;color:#ff6600;font-size:16px;padding-top:10px;">
	六、关于样品
</p>
<p style="border-bottom:0px;border-left:0px;padding-bottom:10px;line-height:24px;margin-top:0px;padding-left:20px;padding-right:20px;white-space:normal;margin-bottom:0px;color:#666666;font-size:14px;border-top:0px;border-right:0px;padding-top:10px;">
	1、在活动组织过程中，招商专员会酌情收取样品，请给与配合。<br />
2、邮递样品时，请添加两张打印的样品邮寄单，样品邮寄单电子版可以在报名后台下载。<br />
3、样品一经发出不予退还，快递费用由您承担，不支持到付。<br />
4、样品仅供审核参考，裁定商品是否可以上活动，请不要误认为邮递样品后就一定能上活动，最终解释权归本活动所有。<br />
5、样品收取后，我们有权自行处理及做其用途使用。<br />
6、所有跟<?php echo C('ftx_site_name');?>达成合作的商家在提交样品前请联系对应的审核专员的旺旺，其它任何通过QQ、电话、邮件等方式向商家索取样品的行为均未得到<?php echo C('ftx_site_name');?>授权，谨防上当！
</p>
<p style="padding-bottom:10px;line-height:24px;padding-left:0px;padding-right:0px;display:block;white-space:normal;color:#ff6600;font-size:16px;padding-top:10px;">
	七、黑名单
</p>
<p style="border-bottom:0px;border-left:0px;padding-bottom:10px;line-height:24px;margin-top:0px;padding-left:20px;padding-right:20px;white-space:normal;margin-bottom:0px;color:#666666;font-size:14px;border-top:0px;border-right:0px;padding-top:10px;">
	1、拉黑原因（重要）&nbsp;<br />
如果商家有以下行为，我们将终止与该商家合作，并将该商家列入黑名单永不合作。 我们真诚的提醒您，诚信合作，拉黑对您对我们都是损失！&nbsp;<br />
· 绕圈报名上活动，同款商品刻意联系不同专员审核者，发现即拉黑，活动随时终止；&nbsp;<br />
· 未按约定排期上架宝贝，修改宝贝价格；&nbsp;<br />
· 活动中单方面将宝贝下架；&nbsp;<br />
· 活动中单方面修改价格或包邮情况；&nbsp;<br />
· 活动期间同时参加其他促销活动；&nbsp;<br />
· 售卖假货或劣质产品等欺骗消费者的行为；&nbsp;<br />
· 未履行相应的售后服务，未能及时恰当处理用户投诉问题；&nbsp;<br />
· 其他不诚信以及违规行为，最终解释权归本活动所有。&nbsp;<br />
2、其他说明加入黑名单的商家，本活动永不合作，且无法删除此黑名单。&nbsp;<br />
3、黑名单由招商专员或活动排查专员添加。
</p>			</div>
		</div>
	</div>
	<!--main  end--> 
</div>




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





<script src="__STATIC__/ftxia/js/goods.js"></script>
</body>
</html>