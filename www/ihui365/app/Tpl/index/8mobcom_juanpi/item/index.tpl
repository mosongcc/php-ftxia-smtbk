<!doctype html>
<html>
<head>
<script src="http://siteapp.baidu.com/static/webappservice/uaredirect.js" type="text/javascript"></script>
<script type="text/javascript">uaredirect("http://m.demo.8mob.com/index.php?m=item&a=index&id={$item.num_iid}");</script>

<include file="public:head" />
<link rel=stylesheet type=text/css href="__STATIC__/8mobcom/css/view.css" />
</head>
<body>
<include file="public:header" />
<!--商品详细-->
<div class="main {:C('ftx_site_width')} dealcon">

	<div class="place-explain">
		您的位置：<a target="_blank" href="{:C('ftx_site_url')}">{:C('ftx_site_name')}</a>&nbsp;&gt;&nbsp;
		<notempty name="item.cate_id">
			<if condition="$cate_data[$item['cate_id']]['pid'] gt 0">
				<if condition="$cate_data[$cate_data[$item['cate_id']]['pid']]['pid'] gt 0">
					<a target="_blank" href="{:U('index/cate',array('cid'=>$cate_data[$cate_data[$item['cate_id']]['pid']]['pid']))}">{$cate_data[$cate_data[$cate_data[$item['cate_id']]['pid']]['pid']]['name']}</a>&nbsp;&gt;&nbsp;
				</if>
				<a target="_blank" href="{:U('index/cate',array('cid'=>$cate_data[$item['cate_id']]['pid']))}">{$cate_data[$cate_data[$item['cate_id']]['pid']]['name']}</a>&nbsp;&gt;&nbsp;
			</if>
			<a target="_blank" href="{:U('index/cate',array('cid'=>$item['cate_id']))}">{$cate_data[$item['cate_id']]['name']}</a>&nbsp;&gt;&nbsp; 
		</notempty>
		
		
		<a class="bady-xx-seo" href="{:U('item/'.$item['num_iid'])}">{$item.title}</a>
	</div>
	<div class="container fl l-con">

		<div class="product clear clearfix">
			<div class="product-pic fl">
				 
				<if condition="$item.shop_type eq 'C' ">
					<a biz-itemid="{$item['num_iid']}" isconvert=1 href="{:U('jump/index',array('iid'=>$item['num_iid']))}"  target="_blank" rel="nofollow" style="width:310px;height:310px;display:table-cell;">
				<elseif condition="$item.shop_type eq 'B' " />
					<a biz-itemid="{$item['num_iid']}" isconvert=1 href="{:U('jump/index',array('iid'=>$item['num_iid']))}"  target="_blank" rel="nofollow" style="width:310px;height:310px;display:table-cell;">
				<elseif condition="$item.shop_type eq 'D' " />
					<a href="{$item.click_url}" target="_blank" rel="nofollow" style="width:310px;height:310px;display:table-cell;">
				<else /><a href="{:U('jump/'.$item['num_iid'])}" target="_blank" rel="nofollow" style="width:310px;height:310px;display:table-cell;">
					</if>
				
				
				<img id="J_ImgBooth"  src='{:attach(get_thumb($item['pic_url'], '_b'),'item')}' alt="{$item.title}"  height="310px"   /></a>
				<ul id="J_UlThumb" class="tb-thumb tb-clearfix">
					<notempty name="item.thumb">
						<volist name="item.thumb" id="tval" k="i">
						<li <eq name="i" value="1">class="tb-selected"</eq>>
							<div class="tb-pic tb-s50">
								<a href="#"><img data-src="{:attach(get_thumb($tval, '_b'),'item')}" src="{:attach(get_thumb($tval, '_s'),'item')}"></a>
							</div>
						</li>
						</volist>
					<else/>
					<li class="tb-selected">
						<div class="tb-pic tb-s50">
							<a href="#"><img data-src="{:attach(get_thumb($item['pic_url'], '_b'),'item')}" src="{:attach(get_thumb($item['pic_url'], '_s'),'item')}"></a>
						</div>
					</li>
					</notempty>
				</ul>
				<span></span>
			</div>
			<div class="product-info fl">
				<h3>
				<if condition="$item.shop_type eq 'C' ">
					<a biz-itemid="{$item['num_iid']}" isconvert=1 href="{:U('jump/index',array('iid'=>$item['num_iid']))}"  target="_blank" rel="nofollow">
				<elseif condition="$item.shop_type eq 'B' " />
					<a biz-itemid="{$item['num_iid']}" isconvert=1 href="{:U('jump/index',array('iid'=>$item['num_iid']))}"  target="_blank" rel="nofollow">
				<elseif condition="$item.shop_type eq 'D' " />
					<a href="{$item.click_url}" target="_blank" rel="nofollow">
				<else /><a href="{:U('jump/'.$item['num_iid'])}" target="_blank" rel="nofollow">
					</if>
					{$item.title}</a></h3>
				<div class="share"></div>
			 
				<p class="tips clear">
					<span class="item-pr fl">原价：<em class="old-price ffv">{$item.price}元</em></span>
					<span class="fl">折扣：<em class="org_2 ffv">{$item.zk}折</em></span>
				</p>
				<notempty name="item.nick">
				<p>
					<span>掌柜：{$item.nick}</span>
				</p>
				</notempty>
				<p class="price">
					<span class="title-tips01">折扣价格</span>
					<em class="org">￥</em>
					<span class="jd-current">{$item.coupon_price}</span> 
					<if condition="$item.ems eq 1">/包邮</if></span>
				</p>
				<notempty name="item.pxhtml">
				<div class="pg">{$item.pxhtml}</div>
				</notempty>
				<notempty name="item.volume">
				<p><span>最近销量： {$item.volume} 件</span></p>
				<notempty name="item.intro">
				<h6>{$item.intro}</h6>
				</notempty>
				</notempty>
				<div class="item-btn clear">
					<span class="btn-tip fl">
						<if condition="$item.class eq 'wait'">
							<a class="btn fl {$item.class}" href="javascript:void(0)" target="_blank" rel="nofollow">
							<span>即将开始</span></a>
						<elseif condition="$item.class eq 'sellout'"/>
							<a class="btn fl {$item.class}" href="{:U('jump/'.$item['num_iid'])}" target="_blank" rel="nofollow">
							<span>已卖光</span></a>
						<elseif condition="$item.class eq 'end'"/>
							<a class="btn fl {$item.class}" href="{:U('jump/'.$item['num_iid'])}" target="_blank" rel="nofollow">
							<span>已结束</span></a>
						<elseif condition="$item.class eq 'buy'"/>
							<if condition="$item.shop_type eq 'C' ">
							<a class="btn fl {$item.class}" biz-itemid="{$item['num_iid']}" isconvert=1 href="{:U('jump/index',array('iid'=>$item['num_iid']))}" target="_blank" rel="nofollow">
								<span>去淘宝抢购</span>
							</a>
							<elseif condition="$item.shop_type eq 'B' " />
							<a class="btn fl {$item.class}" biz-itemid="{$item['num_iid']}" isconvert=1 href="{:U('jump/index',array('iid'=>$item['num_iid']))}" target="_blank" rel="nofollow">
								<span>去天猫抢购</span>
							</a><elseif condition="$item.shop_type eq 'D' " />
							<a class="btn fl {$item.class}" href="{$item['click_url']}" target="_blank" rel="nofollow">
								<span>去京东抢购</span>
							</a></if>
						</if> 
					</span>


					<in name="item.id" value="$like_ids">
					<span class="btn-tip">
						<a lkid="{$item['id']}" gtype="1" lks="0" class="y-like my-like mt5 fl item-like-btn" href="javascript:void(0)"><em class="icon icon-k"></em>已收藏</a>
					</span>
					<else/>
					<span class="btn-tip">
						<a lkid="{$item['id']}" gtype="1" lks="1" class="y-like my-like mt5 fl item-like-btn" href="javascript:void(0)"><em class="icon icon-k"></em>收藏</a>
					</span>
					</in>


 
					<div id="tq_html" class="tq_html"></div>
				</div>
				<p class="price bady-time">
					<if condition="$item.class eq 'wait'">
					<span class="fl">即将开始：</span>
					<span class="endtime time fl" data-time="{$item['coupon_start_time']}" data-id="s1" id="end_date_s1">
					<else/>
					<span class="fl">剩余时间：</span>
					<span class="endtime time fl" data-time="{$item['coupon_end_time']}" data-id="s1" id="end_date_s1">
					</if>
					<?php
						if($item['coupon_start_time']>time()){
							$item['timeleft'] = $item['coupon_start_time']-time();
						}else{
							$item['timeleft'] = $item['coupon_end_time']-time();
						}
						echo lefttime($item['timeleft']);
					?>
					</span>
					<span class="common nomind shoot_time">
						<script type="text/javascript">
							var __qqClockShare = {
							   content: "{$item.title}",
							   time: "{$item.coupon_start_time|date="Y-m-d H:i",###}",
							   advance: 5,
							   url: "{:C('ftx_site_url')}{:U('item/'.$item['num_iid'])}",
							   icon: "2_1"
							};
							document.write('<a href="http://qzs.qq.com/snsapp/app/bee/widget/open.htm#content=' + encodeURIComponent(__qqClockShare.content) +'&time=' + encodeURIComponent(__qqClockShare.time) +'&advance=' + __qqClockShare.advance +'&url=' + encodeURIComponent(__qqClockShare.url) + '" target="_blank"><img src="http://i.gtimg.cn/snsapp/app/bee/widget/img/' + __qqClockShare.icon + '.png" style="border:0px;"/></a>');
						</script>
					</span>
				</p>
				<p class="fenxiang">
					<span class="fl">分享商品：</span>
					<div class="bdsharebuttonbox fl bdshare_t bds_tools get-codes-bdshare fl">
		
		<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
		<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博">
		</a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
		<a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
		<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
		<a href="#" class="bds_more" data-cmd="more"></a>
	</div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"发现个灰常给力的商品！{$item.title}，赶紧来抢吧！","bdMini":"2","bdMiniList":false,"bdPic":"{:attach(get_thumb($item['pic_url'], '_b'),'item')}","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
				</p>
			</div>
		</div>
		
		<div class=" border clearfix " style="margin-bottom: 10px;width:100%;overflow: hidden;background-color: #fff;">
			<div class="hotsearch">
			<h2 class="title" info="">宝贝标签</h2>
			<volist name="tags" id="tag">
				<a class="active" href="{:U('tag/'.$tag)}" target="_blank"><span>{$tag}</span></a>
			</volist>
			</div>
		</div>
		<!--  商品属性 -->

		<notempty name="attributes">
		<div class="border clearfix" style="margin-bottom: 10px;width:100%;overflow: hidden;background-color: #fff;padding-bottom: 10px;">
			<div class="attributes-list ">
			<h2 class="title" info="">商品属性</h2>
			{$attributes}
			</div>
		</div>
		</notempty>
		<!--  商品描述 -->
		<notempty name="desc">
		<div class=" border clearfix" style="margin-bottom: 10px;width:100%;overflow: hidden;background-color: #fff;">
			<h2 class="title" info="">商品描述</h2>
			<div class="information" style="display: block;" >
				{$desc}
			</div>
		</div>
		</notempty>


		<!-- 买过的人说 -->
		<div id="comments" class="comments border clearfix" info="4">
			<h2 class="title" info="">买过的人说</h2>
			<notempty name="comment_list">
			<div class="tbplun" style="display:block;">
				<ul>
				<volist name="comment_list" id="rate">
					<li>
						<em>{$rate.uname}</em><img src="{$rate.ratePic}">
						<div class="ckgd">{$rate.info}</div>
						<notempty name="rate.photos">
							<volist name="rate.photos" id="photo">
								<a class="rate_photo"  href="{$photo}" target="_blank"><img src="{$photo}" width="40px" height="40px" style=""  /></a>
							</volist>
							<br /><br />
						</notempty>
						<div class="ctime">{$rate.rateDate|date="Y-m-d H:i:s",###}</div>
		
					</li>
				</volist>
				</ul>
			</div>
			<else/>
				<div class="plzw">买过的人都很懒，还没有人分享过这件商品的淘货感想，争做晒团第一人！</div>
			</notempty>
		</div>

 </div> 


	<!-- 右侧开始 -->
	<div class="r-con">

        <div class="hottag border clearfix">
    <h2 class="title">热门标签</h2>
    <div class="tags">
	<volist name="tag_lists" id="tag">
	<a href="{:U('tag/'.$tag['name'])}" target="_blank" class="<?php  echo $class_array[array_rand($class_array,1)];?>">{$tag['name']}</a>
	</volist>
  </div>
</div>



<!-- 热门品牌开始 -->
  <div class="hotbrand border clearfix ">
    <h2 class="title">今日品牌推荐</h2>
    <div class="brands">
      <ul>

      <volist name="brandlist['banner']" id="brand" key="bi">
	<li>
          <p class="name {$bi}"><a class="tm" href="{:U('brand/dlist',array('uid'=>$brand['shop']['uid']))}" target="_blank" title="{$brand['shop']['nick']}">{$brand['shop']['nick']}特卖</a><span class="dis">{$brand['shop']['discount']} &gt;</span></p>
            <p class="intro" <if condition="$bi eq 1">style="display:block;"</if>>
            [<a href="{:U('brand/dlist',array('uid'=>$brand['shop']['uid']))}" target="_blank">{$brand['shop']['nick']}</a>]
            <em> </em>
            <a class="det" href="{:U('brand/dlist',array('uid'=>$brand['shop']['uid']))}" target="_blank">{$brand['shop']['txt']}</a>
          </p>
        </li>
	</volist>

 

	<volist name="brandlist['list']" id="brand" key="bi">
	<li>
          <p class="name {$bi}"><a class="tm" href="{:U('brand/dlist',array('uid'=>$brand['shop']['uid']))}" target="_blank" title="{$brand['shop']['nick']}">{$brand['shop']['nick']}特卖</a><span class="dis">{$brand['shop']['discount']} &gt;</span></p>
            <p class="intro"  >
            [<a href="{:U('brand/dlist',array('uid'=>$brand['shop']['uid']))}" target="_blank">{$brand['shop']['nick']}</a>]
            <em> </em>
            <a class="det" href="{:U('brand/dlist',array('uid'=>$brand['shop']['uid']))}" target="_blank">{$brand['shop']['txt']}</a>
          </p>
        </li>
	</volist>


      </ul>
      <div class="more">
        <a class="allbrand" href="{:U('brand/index')}" target="_blank">更多品牌特卖&gt;&gt;</a>
      </div>
    </div>
  </div>
<!-- 热门品牌结束 -->

  </div>

</div>
		
 
<include file="public:list" />
<script type="text/javascript" src="__STATIC__/8mobcom/js/deal.js"></script>
<script type="text/javascript">
	function getTime(){
            $(".endtime").each(function () {
		var end = $(this).attr('data-time');
		var style = 2;
		var id = $(this).attr('data-id');

		today=new Date(); 
		timeold=((end)*1000-today.getTime()); 
		if (timeold < 0) {
			$("#end_date_"+id).html("已结束!");
			return;
		} 
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


                 
            });

        }
        setInterval("getTime()",100);

$(".brands li").hover(function() {
	$(".brands li").children(".intro").hide();
	$(this).children(".intro").show(); 
}); 

   var ele_fix = $(".hotbrand");
    var _main = $(".goods-list");
    if (ele_fix.length > 0) {
        var ele_offset_top = ele_fix.offset().top;
        $(window).scroll(function() {
            var scro_top = $(this).scrollTop();
            var test = ele_offset_top + scro_top;
            var fix_foot_pos = parseInt(ele_fix.height()) + parseInt(scro_top);
            var mainpos = parseInt(_main.offset().top) + parseInt(_main.height());
            if (scro_top <= ele_offset_top && fix_foot_pos < mainpos) {
                ele_fix.css({
                    position: "static",
                    top: "0"
                });
            } else if (scro_top > ele_offset_top && fix_foot_pos < mainpos) {
                ele_fix.css({
                    "position": "fixed",
                    "top": "0"
                });
            } else if (scro_top > ele_offset_top && fix_foot_pos > mainpos) {
                var posi = mainpos - fix_foot_pos - 15;
                ele_fix.css({
                    position: "fixed",
                    top: posi
                });
            }
        });
    }

</script>
<load href="__STATIC__/ftxia/js/report.js" />
<include file="public:footer" />
</body>
</html>
