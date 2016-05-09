<!doctype html>
<html>
<head>
<include file="public:head" />
<script type="text/javascript" src="__STATIC__/8mobcomjuanpi/js/index.js"></script>
 
</head>
<body>
<include file="public:header" />
<if condition="C('ftx_ads_pp') eq '0'">
{:R('advert/index', array(1), 'Widget')}
<else/>
<notempty name="brandlist">

<div class="top_bar {:C('ftx_site_wc')}">
	<ul id="banner_list" class="banner">
	<volist name="brandlist['banner']" id="banner" >
		<li style="background:url({$banner['shop']['banner_img']}) -200px 0px no-repeat;" ><a  title="{$banner['shop']['nick']}"   target="_blank" href="{:U('brand/dlist',array('uid'=>$banner['shop']['uid']))}" class="pic"></a></li>
	</volist>
	</ul>
</div> 

<div class="top_wrap  {:C('ftx_site_wc')}">
	<div class="top_box">
		<div class="banner_l">
			<dl>
				<dd>
					<a href="{:U('jiu/index')}"  target="_blank"><img src="/static/8mobcom/images/global/top_right_jiu.png">
					<div class="txt"><span class="title">9.9包邮</span> <span>今日上新<em>{$today_jiu_count}</em>款</span></div></a>
				</dd>
                                <dd>
					<a href="{:U('shijiu/index')}"  target="_blank"><img src="/static/8mobcom/images/global/top_right_shi.png">
					<div class="txt"><span class="title">19.9包邮</span> <span>今日上新<em>{$today_shi_count}</em>款</span></div></a>
				</dd>
			</dl>
		</div>
		<div class="banner_r">
			<dl>
				<dd>
					<a href="" target="_blank" title="右一" _hover-ignore="1"><img src="http://s1.juancdn.com/bao/151117/c/2/564a7dc1c2f51_124x119.jpg" alt="" _hover-ignore="1"></a>
				</dd>
				<dd>
					<a href="" target="_blank" title="右二"><img src="http://s1.juancdn.com/bao/151113/e/5/5645c707784de_124x119.jpg" alt="" _hover-ignore="1"></a>
				</dd>
				<dd>
					<a href="" target="_blank" title="右三"><img src="http://s1.juancdn.com/bao/151117/7/4/564a7e6f9f8cf_124x119.jpg" alt="" _hover-ignore="1"></a>
				</dd>
				<dd>
					<a href="" target="_blank" title="右四"><img src="http://s1.juancdn.com/bao/151117/c/a/564a7e262488e_124x119.jpg" alt="" _hover-ignore="1"></a>
				</dd>
			</dl>
		</div>
                <div class="round">
            <div class="adType">
            </div>
        </div>
        <div style="display:none;" class="banner_arrow" data-banner="arrow">
            <a href="javascript:;" class="arrow_prev" data-arrow="prev"><i></i></a>
            <a href="javascript:;" class="arrow_next" data-arrow="next"><i></i></a>
        </div>
    </div>
</div>
</notempty>
 </if>



<div class="{:C('ftx_site_wc')} new-users clear">
            <ul class="fr">
                <li><i class="f"></i><span>淘宝天猫特卖1折起</span></li>
                <li><i class="s"></i><span>全场9.9元包邮</span></li>
                <li><i class="t"></i><span>100%验货质检</span></li>
            </ul>
            <div class="update-time fl">
                <div class="today">
                    <i class="icon_new"></i>今日新品<span>每天10点新品特卖</span>
                </div>
            </div>
</div>

<!--品牌团托管广告位-->
<notempty name="brandlist['brand']">
<div class="{:C('ftx_site_wc')} brand_index clear">

 
	<div class="brand_list">
	<ul>
	<volist name="brandlist['brand']" id="brand" key="bi">
		<li>
		<div class="brand-status">
			<a href="{:U('brand/dlist',array('uid'=>$brand['shop']['uid']))}" class="link-box" target="_blank" data-value="brand#1_1">
				<div class="brand-pic">
					<img src="{$brand['shop']['enter_img']}_468x468Q90.jpg">
					<div class="brand_time" data-etime="{$brand['shop']['oetime']}" style="display: block;">
						<p class="endtime" data-time="{$brand['shop']['oetime']}" data-id="b{$bi}" id="end_date_b{$bi}">
							<span class="icon_time"></span>
							<span class="brand-days"><em>6</em><i>天</i></span>
							<span class="brand-hours"><em>9</em><i>时</i></span>
							<span class="brand-minutes"><em>34</em><i>分</i></span>
							<span class="brand-seconds"><em>19</em><i>秒</i></span>
						</p>
						<div class="brand_time_bg"></div>
					</div>
				</div>
                                <div class="card">
					<img class="brand-logo" src="{$brand['shop']['logo']}_160x160Q90.jpg">
					<span class="discount discount1">
						<span>马上抢</span>
					</span>                                    
					<span class="title">{$brand['shop']['nick']}</span>
                                </div>
                            </a>
		</div>
		</li>
	</volist>
	</ul>
        </div>
	
	<div class="brand-icons">
		<span class="txt fl">更多品牌特卖:</span>
		<ul class="fl">
		<volist name="brandlist['list']" id="brand">
			<li>
				<a href="{:U('brand/dlist',array('uid'=>$brand['shop']['uid']))}" target="_blank">
				<img alt="" src="{$brand['shop']['logo']}_160x160Q90.jpg">
				</a>
			</li>
		</volist>
		</ul>
		<a href="{:U('brand/index')}" target="_blank" class="see-all fr"><span class="fl">查看全部</span><em class="go-icon fr"></em></a>
	</div>
</div>
</notempty>

 
<!--右侧浮动导航-->
<include file="public:nav-classify" />
 
<include file="public:list" />
<script>

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

</script>
<include file="public:footer" />
</body>
</html>