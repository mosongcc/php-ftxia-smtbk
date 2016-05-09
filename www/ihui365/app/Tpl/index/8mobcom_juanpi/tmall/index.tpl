<!doctype html>
<html>
<head>
<include file="public:head" />
<link rel=stylesheet type=text/css href="__STATIC__/8mobcom/css/good_jp.css" />
</head>
<body>
<include file="public:header" />
<div class="main {:C('ftx_site_width')} clear">
	
	<ul class="goods-list {:C('ftx_site_wc')}">
		<volist name="items_list" id="item" key="i" mod="4">
		<li  class="<eq name="mod" value="3"> last</eq>">
			<div class="sid_{$item.sellerId}  list-good   {$item.class} " id="nid_{$item.num_iid}">
				<div class="good-pic">
					<a biz-itemid="{$item['num_iid']}" isconvert=1 href="http://detail.tmall.com/item.htm?id={$item['num_iid']}"   target="_blank"><img src='/static/8mobcom/images/blank.gif' data-original='{:attach(get_thumb($item['pic_url'], '_b'),'item')}' alt="{$item.title}" class="lazy"   /></a>
					<div class="yhq"> </div>
				</div>
				<h3 class="good-title">
					<if condition="$item.ems eq 1">[包邮]</if><a target="_blank" biz-itemid="{$item['num_iid']}" isconvert=1 href="http://detail.tmall.com/item.htm?id={$item['num_iid']}" class="title">{$item.title}</a>
					
				</h3>
				<div class="good-price">
					<span class="price-current"><em>￥</em>{$item.coupon_price|price}</span>
					<span class="des-other">
						<span class="price-old"><if condition="$item.coupon_rate lt 10000"><em>¥{$item.price|price}</em><u>({$item.coupon_rate|zk}折)</u> </if></span>
						<span class="discount show"><if condition="$item.volume gt 0 "><span class="sold">已售<em>{$item.volume}</em>件</span><else/><span class="sold">新品上架<em></em></span></if>
							<notempty name="item.gai">
							<b class="icon_gai" title="拍下改价"></b>
							</notempty>
							 
						</span>
					</span>
					<div class="btn-new buy">
					<if condition="$item.shop_type eq 'C' ">
						<a biz-itemid="{$item['num_iid']}" isconvert=1 href="http://detail.tmall.com/item.htm?id={$item['num_iid']}"  target="_blank" rel="nofollow"><em class="icon_n"></em><span>淘宝</span></a>
					<elseif condition="$item.shop_type eq 'B' " />
						<a biz-itemid="{$item['num_iid']}" isconvert=1 href="http://detail.tmall.com/item.htm?id={$item['num_iid']}"  target="_blank" rel="nofollow"><em class="icon_t"></em><span>天猫</span></a>
					<elseif condition="$item.shop_type eq 'D' " />
						<a href="{$item.click_url}" target="_blank" rel="nofollow"><em class="icon_j"></em><span>京东</span></a>
					<else />
						<a href="{:U('jump/'.$item['num_iid'])}" target="_blank" rel="nofollow"><span>去抢购</span></a>
					</if> 
					</div>
				</div>
				
			</div>
		</li>
		</volist>
	</ul>
	<div class="clear"></div> 

	<div class="page">
		<div class="pageNav">{$page}</div>
	</div>
</div>

	<div style="position: relative;width: 980px;height: 30px;margin: 10px auto 8px;">
		<div style="position: relative;padding-top: 10px;float: right;display: inline;">内容资源来自：<a href="http://www.ftxia.com/" target="_blank">飞天侠开放平台</a></div>
	</div>

<include file="public:footer" />
</body>
</html>