<!DOCTYPE html>
<html lang="en">
<head>
	<include file="public:head" />
</head>
<body>
    <!-- 主体 -->
	<include file="public:not" />
	<div class="main">
		<div class="app">
			<div id="head">
				<div class="fixtop">
					<span id="t-find">
						<a class="btn btn-left btn-back-home" href="/"></a>
					</span>
					<span id="t-index">女装</span>
				</div>
			</div>
<!-- main end-->

			<div id="goods" class="mt10">
				<div id="cover"></div>
				<div id="dwon"></div>
				<ul class="goods-list clear">
					<volist name="items_list" id="item" key="i">
					<li>
						<a class="goods-a" target="_blank" href="{:U('jump/index',array('id'=>$item['num_iid']))}">
							<img class="lazy" _src="{$item.pic_url}_310x310.jpg" src="/static/jky/images/blank.gif" alt="{$item.title}" height="226px;">
							<img class="new-icon" src="/static/8mobcom_jp/images/new_product.png" />
							<h1>{$item.title}</h1>
						</a>
						<a href="{:U('jump/index',array('id'=>$item['num_iid']))}" target="_blank">
							<div class="list-price buy ">
								<span class="price-new"><i>￥</i>{$item.coupon_price}</span><i class="del">￥{$item.price}</i>
								<span class="good-btn">去抢购 </span>
							</div>
						</a>
					</li>
					</volist>
                         
				</ul>
				<div class="paging">
					<div class="paging-nav">
						{$page}
					</div>
				</div>
			</div>
				<div class="alert_fullbg"></div>
				<div class="tips"><div><img src="http://s.juancdn.com/webapp/images/images.png" width="100%;"></div></div>
				<div class="tips01"><div><img src="http://s.juancdn.com/webapp/images/images01.png" width="100%;"></div></div>
				<div id="alert_exchange_new" class="alert_bg" style="left: 50%; margin-left: -130px; top: 35px; position: fixed; display:none;">
					<div class="alert_box">
					    <div class="alert_top">
						<i id="close_box" class="close"></i>
					    </div>
					    <a href="http://m.juanpi.com/apps">
						<div class="alert_content">
						    <div class="message">
							<img class="icon" src="http://s.juancdn.com/jpwebapp/images/juanpi.png">
							<p class="fontL">卷皮客户端</p>
							<p class="fontS">体验更好，功能更全！</p>
						    </div>
						    <button class="sub" value="">马上下载</button>
						</div>
					    </a>
					</div>
				</div>
				<a class="back-top" href="#"><img style="width:40px;" src="http://s.juancdn.com/jpwebapp/images/back-top.png"></a>
				<div id="alert_wrap" class="alert_black_bg">
				    <div class="alert_box">
					<div class="alert_content">
					    <div class="message">
						<i class="close"></i>
						<img class="icon" src="http://s.juancdn.com/jpwebapp/images/juanpi.png">
						<div class="jky_des">
						    <p class="f14">使用卷皮客户端</p>
						    <p class="f12 yellow">全场一折起包邮</p>
						    <p class="f12 yellow">体验掌上的小幸福</p>
						</div>
					    </div>
					    <a href="http://m.juanpi.com/apps?szy" class="sub">立即启动</a>
					</div>
				    </div>
				</div>
				<include file="public:footer" />
			</div>
		</div>
	</div>
</div>
<!-- /主体 -->

    <!-- main js -->
	<include file="public:mainjs" />
</body>
</html>