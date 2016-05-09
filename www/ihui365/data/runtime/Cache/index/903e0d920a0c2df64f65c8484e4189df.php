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



<script type="text/javascript" src="__STATIC__/8mobcomjuanpi/js/index.js"></script>
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

 


<?php if(!empty($tag_list)): ?><div class="jiu-nav-main jiu-nav-main-2" id="seclevel">
	<div class="jiu-nav <?php echo C('ftx_site_width');?>  seclevelinner">
		<div class="nav-item  ">
			<div class="item-list">
				<ul>
				<li><a href="<?php echo U('index/cate', array('cid'=>$cinfo['pid']));?>" <?php if(empty($tag)): ?>class="active"<?php endif; ?>>全部</a></li>
				<?php if(is_array($tag_list)): $i = 0; $__LIST__ = $tag_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bcate): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('shijiu/index',array('tag'=>$bcate['id']));?>" class=" <?php if($tag == $bcate['id']): ?>active<?php endif; ?>" ><span></span><?php echo ($bcate["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
	</div>
</div><?php endif; ?>


<link rel=stylesheet type=text/css href="__STATIC__/8mobcom/css/good_jp.css" />
<!--List Start-->
<div class="main <?php echo C('ftx_site_width');?> clear">
			<ul class="goods-list <?php echo C('ftx_site_wc');?>">
		<?php if(is_array($items_list)): $i = 0; $__LIST__ = $items_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 4 );++$i;?><li  class="<?php if(($mod) == "3"): ?>last<?php endif; ?>">
			<div class="sid_<?php echo ($item["sellerId"]); ?>  list-good   <?php echo ($item["class"]); ?> " id="nid_<?php echo ($item["num_iid"]); ?>">
				<?php if($item["s_price"] > 0.1 ): ?><div class="wap"><div class="wap_ewm"><p>扫描二维码更便宜</p><img src="http://s.jiathis.com/qrcode.php?site=weixin&url=<?php echo urlencode(C('ftx_site_url'));?>index.php%3Fm%3Djump%26iid%3D<?php echo ($item["num_iid"]); ?>" /></div><span>手机购买再省<?php echo (price($item["s_price"])); ?>元</span></div><?php endif; ?>
				<div class="good-pic">
					
				<?php if($item["shop_type"] == 'C' ): ?><a biz-itemid="<?php echo ($item['num_iid']); ?>" isconvert=1 href="<?php echo U('jump/index',array('iid'=>$item['num_iid']));?>"  target="_blank" rel="nofollow">
				<?php elseif($item["shop_type"] == 'B' ): ?>
					<a biz-itemid="<?php echo ($item['num_iid']); ?>" isconvert=1 href="<?php echo U('jump/index',array('iid'=>$item['num_iid']));?>"  target="_blank" rel="nofollow">
				<?php elseif($item["shop_type"] == 'D' ): ?>
					<a href="<?php echo ($item["click_url"]); ?>" target="_blank" rel="nofollow">
				<?php else: ?><a href="<?php echo U('jump/'.$item['num_iid']);?>" target="_blank" rel="nofollow"><?php endif; ?>

					
					<img src='/static/8mobcom/images/blank.gif' data-original='<?php echo attach(get_thumb($item['pic_url'], '_b'),'item');?>' alt="<?php echo ($item["title"]); ?>" class="lazy"   /></a>
					<div class="yhq"> </div>
				</div>
				<h3 class="good-title">
					<?php if($item["ems"] == 1): ?>[包邮]<?php endif; ?><a target="_blank" href="<?php echo U('item/index',array('iid'=>$item['num_iid']));?>" class="title"><?php echo ($item["title"]); ?></a>
					<?php if($item["volume"] > 0 ): ?><span class="sold">已售<em><?php echo ($item["volume"]); ?></em></span><?php else: ?><span class="sold">新品上架<em></em></span><?php endif; ?>
				</h3>
				<div class="good-price">
					<span class="price-current"><em>￥</em><?php echo (price($item["coupon_price"])); ?></span>
					<span class="des-other">
						<span class="price-old"><?php if($item["zk"] < 10): ?><em>¥<?php echo (price($item["price"])); ?></em><u>(<?php echo ($item["zk"]); ?>折)</u><?php endif; ?></span>
						<span class="discount show">
							<?php if($item["ems"] == 1): ?><div class="icon_by" title="包邮"></div><?php endif; ?>
							<?php if(!empty($item["gai"])): ?><b class="icon_gai" title="拍下改价"></b><?php endif; ?>
							<?php if(!empty($visitor)): if($visitor['username'] == C('ftx_index_admin')): ?><a title="不显示" href="javascript:void(0);" data-id="<?php echo ($item["num_iid"]); ?>">取消</a><?php endif; endif; ?>
						</span>
					</span>
					<div class="btn-new   <?php echo ($item["class"]); ?>">
						<?php if($item["class"] == 'wait'): ?><a href="<?php echo U('item/'.$item['num_iid']);?>" target="_blank" rel="nofollow">
							 
							<?php
 if (date('Y-m-d') == date('Y-m-d',$item['coupon_start_time'])){ echo '<span>今日</span><b>'.date('H:i',$item['coupon_start_time']).'</b>'; }else if(date("Y-m-d",strtotime("+1 day")) == date('Y-m-d',$item['coupon_start_time'])){ echo '<span>明日</span><b>'.date('H:i',$item['coupon_start_time']).'</b>'; }else{ echo '<b>'.date('m-d H',$item['coupon_start_time']).'</b>'; } ?> 
							</a>
						<?php elseif(($item["class"] == 'end') OR ($item["class"] == 'sellout') OR ($item["class"] == 'buy')): ?>
							<?php if($item["shop_type"] == 'C' ): ?><a biz-itemid="<?php echo ($item['num_iid']); ?>" isconvert=1 href="<?php echo U('jump/index',array('iid'=>$item['num_iid']));?>"  target="_blank" rel="nofollow"><em class="icon_n"></em><span>淘宝</span></a>
							<?php elseif($item["shop_type"] == 'B' ): ?>
							<a biz-itemid="<?php echo ($item['num_iid']); ?>" isconvert=1 href="<?php echo U('jump/index',array('iid'=>$item['num_iid']));?>"  target="_blank" rel="nofollow"><em class="icon_t"></em><span>天猫</span></a>
							<?php elseif($item["shop_type"] == 'D' ): ?>
							<a href="<?php echo ($item["click_url"]); ?>" target="_blank" rel="nofollow"><em class="icon_j"></em><span>京东</span></a>
							<?php else: ?><a href="<?php echo U('jump/'.$item['num_iid']);?>" target="_blank" rel="nofollow"><span>去抢购</span></a><?php endif; endif; ?>
					</div>
				</div>
				<!-- like -->
		 
				<?php if(in_array(($item["id"]), is_array($like_ids)?$like_ids:explode(',',$like_ids))): ?><a class="my-like" lkid="<?php echo ($item["id"]); ?>" gtype="1" lks="0" title="取消收藏" style="display: block;"><i class="like-ico del-ico"><span class="heart_left"></span><span class="heart_right"></span></i></a>
				<?php else: ?>
				<a class="my-like" lkid="<?php echo ($item["id"]); ?>" gtype="1" lks="1" title="加入收藏"><i class="like-ico "><span class="heart_left"></span><span class="heart_right"></span></i></a><?php endif; ?>
				<!-- end like -->
				<div class="pic-des"> 
					<?php if($item["class"] == 'wait'): ?><h5><em>开始时间：</em><i><?php echo (date("m月d日 H时i分",$item["coupon_start_time"])); ?></i></h5>
					<?php else: ?>
						<?php if(!empty($item["coupon_end_time"])): ?><h5>
							<em>剩余时间：</em>
							<i>
							<?php
 if($item['coupon_start_time']>time()){ $item['timeleft'] = $item['coupon_start_time']-time(); }else{ $item['timeleft'] = $item['coupon_end_time']-time(); } echo lefttime($item['timeleft']); ?></i></h5><?php endif; endif; ?>
					<?php if($item["sellerId"] != ''): ?><h6><em>卖家店铺：</em><i><a href="<?php echo U('shop/'.$item['sellerId']);?>" <?php if($item["shop_type"] == 'C'): ?>rel="nofollow"<?php endif; ?> target="_blank"><?php echo ($item["nick"]); ?></a></i></h6><?php endif; ?> 					
				</div>
				<?php echo (newicon($item["coupon_start_time"])); ?>
				<?php if(($item["class"] == 'sellout') OR ($item["class"] == 'end')): ?><div style="display:block" class="box-hd">
				   <div class="mask-bg"></div>
				   <em class="buy-over">抢光了</em>
				</div><?php endif; ?>
			</div>
		</li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
<script>
(function($) {
    $("a.my-like").live('click', 
    function() {
        var pid = $(this).attr("lkid");
        if (!$.ftxia.dialog.islogin()) return;
	var obj = $(this);
        var parent = obj;
        var id = parent.attr('lkid');
        var s = parent.attr('lks');
        var gtype = parent.attr("gtype");

        F_createEle(obj);
        setTimeout(function(){$("#likeico").remove()}, 600);
        if(s == 1) {
            // like success
            parent.attr('lks',0);
            obj.find('i.like-ico').addClass('l-active');
            obj.closest('li').find('.like-ceng').show();
            $("#likeico").removeClass('unliked').addClass('like-big').addClass('demo1');
            parent.css('display','block');
        } else {
            // un like success
            parent.attr('lks',1);
            obj.find('i.like-ico').removeClass('l-active');
            $("#likeico").removeClass('l-active').addClass('unliked').removeClass('demo1');
            obj.closest('li').find('.like-ceng').hide();
            parent.css('display','');
        }

        $.ajax({
            url: FTXIAER.root + '/index.php?m=ajax&a=like',
            type: 'POST',
            data: {
                pid: pid
            },
            dataType: 'json',
            success: function(result) {
                if (result.status == 1) {
                    $.ftxia.tip({
                        content: result.msg,
                        icon: 'success'
                    });
                } else if (result.status == 2) {
                    $.ftxia.tip({
                        content: result.msg,
                        icon: 'error'
                    });
                } else {
                    $.ftxia.tip({
                        content: result.msg,
                        icon: 'error'
                    });
                }
            }
        });
    });
})(jQuery);

 var F_createEle = function(ele){
        var div = document.createElement('div');
        div.id = "likeico";
        div.innerHTML = "<span class='heart_left'></span><span class='heart_right'></span>";
        ele.append(div);
    }

var Mylike_add = function(event) {
	if(!$.ftxia.dialog.islogin()) return !1;
 
        var obj = $(this);
        var parent = obj;
        var id = parent.attr('lkid');
        var s = parent.attr('lks');
        var gtype = parent.attr("gtype");

        F_createEle(obj);
        setTimeout(function(){$("#likeico").remove()}, 600);
        if(s == 1) {
            // like success
            parent.attr('lks',0);
            obj.find('i.like-ico').addClass('l-active');
            obj.closest('li').find('.like-ceng').show();
            $("#likeico").removeClass('unliked').addClass('like-big').addClass('demo1');
            parent.css('display','block');
        } else {
            // un like success
            parent.attr('lks',1);
            obj.find('i.like-ico').removeClass('l-active');
            $("#likeico").removeClass('l-active').addClass('unliked').removeClass('demo1');
            obj.closest('li').find('.like-ceng').hide();
            parent.css('display','');
        }
    }

 var Pause_click = function(){
        $("a.my-like").live('click', _.throttle( Mylike_add, 300 ) );
        $(".list-good").live('mouseleave',function(){$('.like-ceng',$(this)).hide();});
	var b = [];
        var ss  = $('.my-like').each(function(i){
            var gtype = $(this).attr("gtype");
            var prefix = "";
            //得到商品主键前缀
            if(gtype==3){
                prefix = "t";
            }
            b[i] = prefix + $(this).attr('lkid');
        });
        if( b.length>0) {
            var sss = b.join(',');
	    $.ajax({
		url: FTXIAER.root + '/index.php?m=ajax&a=like_status',
		type: 'get',
		data: {
			pid: sss
		},
		dataType: 'json',
		success: function(result) {
			if (result.status == 1) {
				var s = result.data.toString();
				var newgidArr = s;
				$('.my-like').each(function(i){
					var gtype = $(this).attr("gtype");
					var prefix = "";
					//得到商品主键前缀
					if(gtype==3){
						prefix = "t";
					}
					var sid = $(this).attr('lkid');
					var prefixsid = prefix + $(this).attr('lkid');
					if( newgidArr.indexOf(sid) != -1 || newgidArr.indexOf(prefixsid) != -1 ) {
						$(this).css('display','block');
						$(this).attr('lks',0);
						$('i.like-ico',$(this)).addClass('l-active');
					}
				});
			}else if (result.status == 2) {
				$.ftxia.tip({
					content: result.msg,
					icon: 'error'
				});
			} else {
				$.ftxia.tip({
					content: result.msg,
					icon: 'error'
				});
			}
		}
          });
	}


}
     
$(function(){
//	Pause_click();
});
</script>
	<div class="clear"></div> 
	
	<?php if(!empty($page)): ?><div class="page">
		<div class="pageNav"><?php echo ($page); ?></div>
	</div><?php endif; ?>
</div>
<!--List End-->
<script type="text/javascript">
$(function(){
    $('.report').jumpBox({
		title: '举报',
		LightBox:'show',
		width:520,
		height:200,
		defaultContain:1,
		jsCode:'{$("#ju_form #znid").val($(this).attr("znid"))}{$("#ju_form #ju_title").html($(this).attr("title"))}'
    });
	$("#reportAn").on('change', function() {
		if($(this).val()==99) {
			$(".other").show();
		} else {
			$(".other").hide();
		}
	});
});
function report(t){
	var $form = $('#ju_form');        
	var query=$form.serialize();
	var url=$form.attr('action');
	var ju_report = $form.find('#reportAn').val();
	var ex_report = $form.find('#otherReasons').val();
	if(ju_report == 0){
		alert('请选择举报原因');
		$form.find('#reportAn').focus();
		return false;
	}
	if(ju_report == 99){
		if(ex_report == '' || ex_report.length>140){
			alert('请在140字以内说明理由');
			$('#otherReasons').focus();
			return false;
		}
	};
	$.ajax({
		url: '<?php echo U('ajax/reportadd');?>',
		data:query,
		jsonp:"callback",
		success: function(data){
			if(data.status==0){
				alert(data.msg);
			}
			else if(data.status==1){
				alert('举报成功');
				location.replace(location.href);
			}
		}
	});
	return false;
}
</script>
<div id="dhFormHtml">
	<div class="alert_fullbg" id="LightBox"></div>
	<div class="alert_bg alert_report" id="jumpbox" show="0">
		<div class="alert_box">
			<div class="alert_top"><span class="title"></span><a class="close" href="javascript:;"></a></div>
			<div class="alert_content">
				<div class="l_c_l">
					<form id="ju_form" name="ju_form" method="post" onsubmit="return report(this)">
						商品名称：<span id="ju_title"></span><br />
						举报原因：
					<select name="reportAn" id="reportAn" class="selectClass">
						<option value="0">请选择举报原因</option>
						<option value="1">商品已下架</option>
						<option value="2">商品已卖光</option>
						<option value="4">商品链接不正确</option>
						<option value="5">商品分类错误</option>
						<option value="6">商品价格与活动价格不符合</option>
						<option value="7">卖家拒绝发货</option>
						<option value="8">商品描述有误</option>
						<option value="99">其它原因</option>
					</select>
						<br />
					<label class="other" style="display:none">
					其它原因： <input type="text" name="otherReasons" class="text" id="otherReasons"/><br/>
					</label>
					<input type="hidden" id="znid" name="znid" value="1" />
					<input class="smt" type="submit" id="ju_submit" tabindex="3" value="提 交" />
					</form>
				</div>
			</div>
			<div class="bottom">注：为保证您的合法权益，请如实填写您所遇到的情况。</div>
		</div>
	</div>
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





</body>
</html>