<!doctype html>
<html>
<head>
<include file="public:head" />
<link rel=stylesheet type=text/css href="__STATIC__/8mobcom/css/good_jp.css" />
<link rel=stylesheet type=text/css href="__STATIC__/8mobcom/css/brand.css" />
</head>
<body>
<include file="public:header" />
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
<div style="background:url({$shop['big_img']}) no-repeat" data-src="{$shop['big_img']}" class="brand-banner"> 
	<img onload="adapt();" src="{$shop['big_img']}" id="brand_imgs" style="display:none;"/>
	<div class="center {:C('ftx_site_width')}">
		<div class="brand-open">
			<div class="brand-ceng"></div>
			<div class="brand-bg">
				<div class="logo"><img src="{$shop['logo']}" width="80px"></div>
				<div class="line"></div>
				<div class="txt">{$shop['txt']}</div>
			</div>
		</div>
	</div>
</div>
<div class="main title {:C('ftx_site_width')} ">
    <div class="count">
        
	<if condition="$shop['ostime'] egt time()">
	<span>距活动开始还有：</span>
	<span class="endtime" data-time="{$shop['ostime']}" data-id="1" id="end_date_1">{$shop.ostime|date="m月d日 H时i分",###}</span>
	<else />
	<span>距活动结束还有：</span>
        <span class="endtime" data-time="{$shop['oetime']}" data-id="0" id="end_date_0">{$shop.oetime|date="m月d日 H时i分",###}</span>
	</if>
	
    </div>
</div>

<volist name="items" id="itemvol" key="x">
<div class="main {:C('ftx_site_width')} clear">
	<if condition="$floor gt 1">
	<div class="bmain">
	<div class="normal-title clear">
                    <a name="floor{$x}">
                        <div class="title"><h3>{$x|num_format}楼</h3></div>
                    </a>
        </div>
	</div>
	</if>
	<ul class="goods-list {:C('ftx_site_wc')}">

		<volist name="itemvol" id="item" key="i" mod="4">
		<li  class="<eq name="mod" value="3"> last</eq>">
			<div class="sid_{$item.sellerId}  list-good   {$item.class} " id="nid_{$item.num_iid}">
				<div class="good-pic">
					<a biz-itemid="{$item['num_iid']}" isconvert=1 href="http://detail.tmall.com/item.htm?id={$item['num_iid']}"   target="_blank"><img src='/static/8mobcom/images/blank.gif' data-original='{$item['pic_url']}_400x400Q90.jpg' alt="{$item.title}" class="lazy"   /></a>
					<div class="yhq"> </div>
				</div>
				<h3 class="good-title">
					<a target="_blank" biz-itemid="{$item['num_iid']}" isconvert=1 href="{:U('item/index',array('iid'=>$item['num_iid']))}" class="title">{$item.title}</a>
				</h3>
				<div class="good-price">
					<span class="price-current"><em>￥</em>{$item.coupon_price|price}</span>
					<span class="des-other">
						<span class="price-old"><if condition="$item.zk lt 10"><em>¥{$item.price|price}</em><u>({$item.zk}折)</u> </if></span>
						<if condition="$item.ems eq 1">
						<span class="discount show">
							<b class="icon_by" title="包邮"></b>
						</span>
						</if>
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
</div>
</volist>

 
<div class="main {:C('ftx_site_width')} dlist pr mt25 clear">
	<div class="bmain">
	<div class="normal-title clear">
                    <a name="floor{$x}">
                        <div class="title"><h3>更多心动品牌</h3></div>
                    </a>
        </div>
	</div>
	<volist name="brands" id="val" mod="24">
	<div class="brand-mod J_brand_mod " data-time="{$val.ostime},{$val.oetime}">
		<div>
			<a  class="link J_nodelog J_poslog"  href="{:U('brand/dlist',array('uid'=>$val['uid']))}" target="_blank"></a>
			<if condition="date('Y-m-d',$val['ostime']) eq date('Y-m-d')">
			<i class="i-new ht"></i>
			</if>
		</div>
		<img class="img lazy" data-original="{$val.brandEnter}" src="/static/8mobcom/images/blank.gif" alt="{$val.shop-name}" style="display: block;">
		<div class="info">
			<img class="logo lazy" src="/static/8mobcom/images/blank.gif" data-original="{$val.shop_icon}_160x160Q90.jpg" alt="{$val.shop-name}" style="display: block;">
			<div class="about">{$val.discount}</div>
			<div class="desc">
				<if condition="$val['ostime'] egt time()">
				<p class="J_soon_tag" style=""><i class="i-soon">即将开始</i></p>
				<else/>
				<p class="J_soon_tag" style="display:none;"><i class="i-soon">即将开始</i></p>
				</if>
				<p class="J_start_tag" style="display:none;"></p>
			</div>
			<div class="fls">{$val.ostime|date="m月d日",###}~{$val.oetime|date="m月d日",###}</div>
		</div>
	</div>
	</volist>
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
<include file="public:footer" />
</body>
</html>