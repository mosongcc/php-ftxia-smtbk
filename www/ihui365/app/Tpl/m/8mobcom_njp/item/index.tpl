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
                        <ul id="target" class="clear" style="width: 3200px;">
                            <li style="width: 640px;"><img src="{$item.pic_url}_400x400.jpg"></li>
                        </ul>
        
                    </div>
                    <div class="list-price buy"><span class="price-new ml"><i>￥</i>{$item.coupon_price}</span><i class="del f14 ml2">￥{$item.price}</i><if condition="$item.gai eq 1"><em class="icon-gai ml2">拍下改价</em></if> </div>
                    <h1>{$item.title}</h1>
                    <div class="better_change">
                        <h3>商品优选</h3>
                        <ul class="better_show clear">
                            <li>
                                <div class="better_info">
                                    <i class="xp"></i>
                                    <span>新品特价</span>
                                </div>
                            </li>
                            <li>
                                <div class="better_info">
                                    <i class="xs"></i>
                                    <span>限时特卖</span>
                                </div>
                            </li>
                            <li>
                                <div class="better_info">
                                    <i class="cx"></i>
                                    <span>诚信品牌</span>
                                </div>
                            </li>
                            <li>
                                <div class="better_info">
                                    <i class="tj"></i>
                                    <span>人气推荐</span>
                                </div>
                            </li>
                            <li class="last">
                                <div class="better_info">
                                    <i class="by"></i>
                                    <span>全国包邮</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>

                <a <notempty name="item['click_url']"> href="{$item['click_url']}" <else />biz-itemid="{$item['num_iid']}" isconvert=1 href="{:U('jump/index',array('id'=>$item['num_iid']))}" </notempty>   class="btn-pay buy"><if condition="$item.shop_type eq 'C' ">去淘宝<elseif condition="$item.shop_type eq 'B' " />去天猫</if></a>
                <div class="bady-part">
                    
                    <div class="tab1">
			<p><p>{$item.desc}</p></p>
			<p><p>{$desc}</p></p>
		    </div>
                 
                    
                </div>
            </div>


	     <div class="buy_btn clear">
                <a href="javascript:addFavorite();" data-id="{$item['num_iid']}" id="a_favorite" class="collect fl"><em></em><span>收藏</span></a>
                <div class="buy_info fr">
                    <a target="_blank" <notempty name="item['click_url']"> href="{$item['click_url']}" <else />biz-itemid="{$item['num_iid']}" isconvert=1 href="{:U('jump/index',array('id'=>$item['num_iid']))}" </notempty> class="go_tmall ">
                        <if condition="$item.shop_type eq 'C' ">去淘宝<elseif condition="$item.shop_type eq 'B' " />去天猫</if><i></i>
                    </a>
                    <a href="javascript:void(0);" class="app_load joa_load_app">{:C('ftx_site_name')}购物<br>更便捷更优惠</a>
                </div>
            </div>



	    <div class="normal item-recommend clear">
                <h3><span>猜你还喜欢:</span></h3>
                <ul class="goods-list clear" id="goods_block"> 
		<volist name="items_list" id="item">
		<li>
			<a class="goods-a" target="_blank" href="{:U('jump/index',array('id'=>$item['num_iid']))}"><img src="{$item.pic_url}_310x310.jpg">        </a>
			<a href="{:U('item/index',array('id'=>$item['num_iid']))}" >            <h3>{$item.title}</h3>
			<div class="list-price buy ">                <span class="price-new"><i>￥</i>{$item.coupon_price}</span><i class="del">￥{$item.price}</i>                <span class="good-btn">去抢购</span>            </div>        </a>
		</li>
		</volist>
		
		</ul>
            </div>


	   





	<include file="public:footer" />
</div>
</div>
    <!-- main js -->
    <include file="public:mainjs" />
<script>
	var $divWidth = $('.head').width();
	$('.item-good li img').css({'width':$divWidth});
	$('#item .tab1').css({'width':$divWidth});
	$('#item img').css({'max-width':$divWidth});

 function addFavorite(){
	var pid = $('#a_favorite').attr('data-id');
	if(!pid){
		return false;
	}
	if (!$.ftxia.dialog.islogin()) return;

	$.ajax({
		type: "post",
		url: FTXIAER.root + '{:U('ajax/like')}',
		data: {
			pid: pid
		},
		success: function (data) {
			if( data.status==1 ){
                            $('#a_favorite').addClass('active');
                            $('#a_favorite').children('span').html('已收藏');
                        }else if( data.status==0 ){
                            $('#a_favorite').removeClass('active');
                            $('#a_favorite').children('span').html('收藏');
                        }else{
                            alert('操作失败，请刷新后重试');
                        }
		}
	});
}
$(function(){
	//判断已登录用户是否已收藏该商品
	var pid = $('#a_favorite').attr('data-id');
	if(pid){
		$.ajax({
                        type: "post",
                        url: FTXIAER.root + '{:U('ajax/likeor')}',
                        data: {
				pid: pid
			},
                        success: function (data) {
                            if( data.status==1 ){
                                $('#a_favorite').addClass('active');
                                $('#a_favorite').children('span').html('已收藏');
                            }
                        }
		});
	}
});
</script>
</body>
</html>