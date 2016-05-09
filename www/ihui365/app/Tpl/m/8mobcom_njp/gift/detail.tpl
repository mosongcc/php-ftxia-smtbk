<!DOCTYPE html>
<html lang="en">
<head>
	<include file="public:head" />
<style>
.address { color:#666; }
.address li { line-height: 30px; display: block; margin-top: 5px; padding-bottom: 5px; _padding-bottom: 10px; height: auto; overflow: hidden; }
.right .address li { margin-top: 10px; }
.address li .user { float:left }
.address li .user label { width: 80px; text-align: right; display: block; float: left; }
.address li .text { border-top: #ccc solid 1px; border-left: #ccc solid 1px; border-right: #ddd solid 1px; border-bottom: #ddd solid 1px; float: left; width:200px; height: 28px; line-height:28px; padding-left: 5px; margin-right: 5px; }
.address li .text2 { width:100px; }
.address li .user select { color:#5e5e5e }
.error-box { float:left; color:#999; margin-left:5px; }
.error-box label { display:inline-block; padding-left:20px; }
.error-box label.error { background:url(../images/user/error.gif) no-repeat 0 7px; }
.error-box label.ok { background:url(../images/user/ok.gif) no-repeat 0 7px; }
.error-box label.warn { background:url(../images/user/warn.gif) no-repeat 0 7px; }
.error-box label.checking { background:url(../images/checking.gif) no-repeat; display:none; }
.address li .smt { width: 80px; height: 30px; line-height: 28px; margin-top:5px; border-radius: 2px; color:#fff; font-size:13px; cursor:pointer }
.address li .smt1 { margin-left:80px; margin-right: 20px; border:1px solid #e25f07; background:#00cf96; text-shadow: 1px 1px 0 rgba(0, 0, 0, .2); }
.address li .smt1:hover { background:#ff7e00; }
.address li .smt2 { border:1px solid #b8b8b8; background: #c3c3c3; text-shadow: 1px 1px 0 rgba(0, 0, 0, .2); }
.address li .smt2:hover { background:#cccccc; }
.ddinput { border-top: #ccc solid 1px; border-left: #ccc solid 1px; border-right: #ddd solid 1px; border-bottom: #ddd solid 1px; color: #5e5e5e; height: 16px; line-height: 16px; padding: 5px 5px; width: 280px; }
.alert_duihuan .alert_box { border: 1px solid #C2C2C2; }
.alert_duihuan .alert_content { padding:20px; }
.alert_duihuan .alert_content .top_tips { margin-bottom:20px; font-size:14px; text-align:center; color:#666 }
.alert_duihuan .alert_content .top_tips .exchange-num { font-size: 18px; vertical-align: -2px; }

</style>
</head>
<body>
<!-- 主体 -->
<include file="public:not" />
<div class="main">
<div class="app">
	<header class="head" id="head">
		<div class="fixtop">
                            <span id="t-find"><a href="javascript:window.history.go(-1)" class="btn btn-left btn-back"></a></span>
                        <span id="t-index">商品详情</span>
                            <span id="t-user"><a class="btn btn-left btn-back-home" href="{:U('index/index')}"></a></span>
                    </div>
        <dl class="screen-box">
            <dt></dt>
            
            <dd class="pack_up"></dd>
        </dl>
	</header>
	

	<div id="item">
                <div class="item-good">
                    <div class="img_show">
                        <ul id="target" class="clear" style="width: 100%;">
                            <li style="width: 100%;"><img src="{:attach(str_replace('_s.'.array_pop(explode('.', $item['img'])), '_b.'.array_pop(explode('.', $item['img'])), $item['img']), 'score_item')}"></li>
                        </ul>
        
                    </div>
                    <div class="list-price buy">
			<span class="price-new ml"><i>所需积分</i>{$item.score}</span>剩余{$item.stock}份</div>
                    <h1>{$item.title}</h1>
                </div>

                <a  href="javascript:;" data-id="{$item.id}"  class="btn-pay buy J_gift_btn">积分兑换</a>
                <div class="bady-part">
                    
                    <div class="tab1">
			<p><p>{$item.info}</p></p>
		    </div>
                 
                    
                </div>
            </div>

	     <div class="buy_btn clear"> 
                <div class="buy_info fr">
                    <a  href="javascript:;" data-id="{$item.id}" class="go_tmall J_gift_btn">积分兑换<i></i>
                    </a>
                    <a href="javascript:void(0);" class="app_load joa_load_app">{:C('ftx_site_name')}购物<br>更便捷更优惠</a>
                </div>
            </div>

	<include file="public:footer" />
	<script src="__STATIC__/jky/js/gift.js"></script>
</div>
</div>
    <!-- main js -->
    <include file="public:mainjs" />
</body>
</html>