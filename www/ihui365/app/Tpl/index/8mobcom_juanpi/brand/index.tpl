<!doctype html>
<html>
<head>
<include file="public:head" />
<link rel=stylesheet type=text/css href="__STATIC__/8mobcom/css/good_jp.css" />
<link rel=stylesheet type=text/css href="__STATIC__/8mobcom/css/brand_jp.css" />
</head>
<body>
<include file="public:header" />
<style>
.w1100 .good-pic {height: 180px;}
.w980 .good-pic,.w980 .good-pic img{height: 190px;}

.bmain .w1100 .brand-bd {width: 280px;height: 265px;}
.bmain .w1100 .brand-more a {bottom: 90px;}
.bmain .w1100 .normal-title .title {overflow: hidden;}
.bmain .w1100 .normal-title .title h3 {height: 30px;}
.bmain.w1100 .slide-logos ul li a {width: 98px;height: 60px;}
.bmain.w1100 .slide-logos ul li a img {width: 90px;}

.bmain .w980 .brand-bd {width: 307px;height: 275px;}
.bmain .w980 .brand-more a {bottom: 90px;}
.bmain .w980 .normal-title .title {overflow: hidden;}
.bmain .w980 .normal-title .title h3 {height: 30px;}
.bmain.w980 .slide-logos ul li a {width: 120.5px;height: 69px;}
.bmain.w980 .slide-logos ul li a img {width: 110px;height: 55px;margin-top: 5px;}
.item-list ul li a:hover, .jiu-nav .n_h a:hover {text-decoration: none;color: #f8285c;}
.item-list ul li a.active, .jiu-nav .n_h a.active {color: #f8285c;font-weight: bold;border-bottom: #f8285c solid 2px;text-decoration: none;}
</style>

<div class="jiu-nav-main">
	<div class="jiu-nav {:C('ftx_site_width')}">
		<div class="nav-item fl">
			<div class="item-list">
				<ul>
				<li ><a href="{:U('brand/index')}" <empty name="cid"> class="active"</empty> >全部</a></li>
				<volist name="cats" id="vol"> 
				<li><a href="{:U('brand/index',array('cid'=>$vol['cid'],'timeFilter'=>$timeFilter))}"  <if condition="$cid eq $vol['cid']"> class="active"</if> >{$vol.name}</a></li>
				</volist>
				</ul>
			</div>
		</div>
		<div class="n_h">
			<a href="{:U('brand/index',array('cid'=>$cid))}" <empty name="timeFilter"> class="active"</empty>>默认</a>
			<a href="{:U('brand/index',array('cid'=>$cid,'timeFilter'=>'today'))}" <if condition="$timeFilter eq 'today'"> class="active"</if>>今日品牌</a>
			<a href="{:U('brand/index',array('cid'=>$cid,'timeFilter'=>'last'))}" <if condition="$timeFilter eq 'last'"> class="active"</if>>最后疯抢</a>
			<a href="{:U('brand/index',array('cid'=>$cid,'timeFilter'=>'tomorrow'))}" <if condition="$timeFilter eq 'tomorrow'"> class="active"</if>>明日预告</a>
			<a href="{:U('brand/index',array('cid'=>$cid,'timeFilter'=>'old'))}"      <if condition="$timeFilter eq 'old'"> class="active"</if>>往期活动</a>
		</div>

	</div>
</div>

<div class="bmain {:C('ftx_site_width')} pr mt25 clear">
        <div class="slide-logos clear">
		<span class="prev-btn" style="display: inline;"></span>
		<span class="next-btn" style="display: inline;"></span>
		<div class="logos-box">
			<ul>
			<li class="{:C('ftx_site_width')}">
			<volist name="brands" id="val" mod="24">
				<a href="{:U('brand/dlist',array('uid'=>$val['uid']))}" target="_blank">
					<img alt="{$val.shop-name}" src="{$val.shop_icon}">
					<div class="masking"></div>
					<span>{$val.discount}</span>
				</a>                                 
				<eq name="mod" value="23"></li><li class="{:C('ftx_site_width')}"></eq>
			</volist>
			</li>
			</ul>
		</div>
	</div>
 
</div>


<div class="bmain {:C('ftx_site_width')} m0a clear tag-list"">

<div class="brand-box new-brand">
<volist name="lists" id="val" key="ii">
            <div class="bd">
	    <div class="brand-title clear">
                        <h3 class="name fl"><em class="  brand  fl"></em><a href="{:U('brand/dlist',array('uid'=>$val['shop']['uid']))}" target="_blank"><span> {$val['shop']['nick']} 品牌专场 </span></a></h3>
                        <div class="time fl">
                            <em class="icon clock fl"></em>

			    <if condition="$val['shop']['ostime'] egt time()">
		 
				<span class="fl left_time "><i class="i_time" style="display: none">1448416800</i>距活动开始<span class="endtime" data-time="{$val['shop']['ostime']}" data-id="s{$ii}" id="end_date_s{$ii}"> </span></span>
				<else />
				<span class="fl left_time "><i class="i_time" style="display: none">1448416800</i>剩余<span class="endtime" data-time="{$val['shop']['oetime']}" data-id="s{$ii}" id="end_date_s{$ii}"> </span></span>

				</if>


                            
                        </div>
                        <a href="{:U('brand/dlist',array('uid'=>$val['shop']['uid']))}" target="_blank" class="see-more fr"><em class="icon brand-other fl"></em><span>查看更多{$val['shop']['items_total']}款&gt;&gt;</span></a>
                    </div>


           
            </div>
            <div class="bd">
                <div class="main {:C('ftx_site_width')} clear">
	<ul class="goods-list {:C('ftx_site_wc')}">
		<volist name="val['items']" id="item" key="i" mod="4" offset="0" length="12" >
		<li  class="<eq name="mod" value="3"> last</eq>">
			<div class="sid_{$item.sellerId}  list-good   {$item.class} {$i}" id="nid_{$item.num_iid}">
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
            </div>
                    


</volist>
</div>



</div>

<notempty name="page">
<div class="main {:C('ftx_site_width')} clear">
	<div class="page">
		<div class="pageNav">{$page}</div>
	</div>
</div>
</notempty>

	<div style="position: relative;width: 980px;height: 30px;margin: 10px auto 8px;">
		<div style="position: relative;padding-top: 10px;float: right;display: inline;">内容资源来自：<a href="http://www.ftxia.com/" target="_blank">飞天侠开放平台</a></div>
	</div>
	 
<script type="text/javascript">
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
    </script> 
<include file="public:footer" />
</body>
</html>