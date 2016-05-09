<!doctype html>
<html>
<head>
<include file="public:head" />
<link rel="stylesheet" type="text/css" href="__STATIC__/8mobcom/css/good.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/8mobcom/css/dapei.css" />
<script type="text/javascript" src="__STATIC__/ftxia/js/jquery.masonry.min.js"></script>
<script type="text/javascript" src="__STATIC__/ftxia/js/jquery.infinitescroll.min.js"></script>
<script type="text/javascript">
function item_masonry(){ 
	$('.mate-box img').load(function(){ 
		$('.ks-waterfall-col').masonry({ 
			itemSelector: '.ks-waterfall',
			columnWidth:224,
			gutterWidth:15	
		});		
	});
	$('.ks-waterfall-col').masonry({ 
		itemSelector: '.ks-waterfall',
		columnWidth:224,
		gutterWidth:15								
	});	
}
$(function(){
	function item_callback(){ 		
		$('.mate-box').mouseover(function(){			
			$('.thumb-goods',this).show();
			$('.itemnum',this).hide();
		}).mouseout(function(){			
			$('.thumb-goods',this).hide();	
			$('.itemnum',this).show();
		});		
		item_masonry();	
	}
	item_callback(); 
	$('.mate-box').fadeIn();
	var sp = 1;	
	$(".ks-waterfall-col").infinitescroll({
		navSelector  	: "#more",
		nextSelector 	: "#more a",
		itemSelector 	: ".mate-box",		
		loading:{
			img: "/static/8mobcom/images/dapei/T1cKm3XkRpXXXXXXXX-48-48.gif",
			msgText: ' ',
			finishedMsg: '',           		
			finished: function(){
				sp++;
				if(sp>=10){ //到第10页结束事件
					$("#more").remove();
					$("#infscr-loading").hide();
					$("#J_pagination").show();
					$(window).unbind('.infscr');
				}
			}	
		},errorCallback:function(){ 
			$("#J_pagination").show();
		}		
	},function(newElements){
		var $newElems = $(newElements);
		$('.ks-waterfall-col').masonry('appended', $newElems, false);
		$newElems.fadeIn();
		item_callback();
		return;
	});
});
</script>
</head>
<body>
<include file="public:header" />
<div class="jiu-nav-main">
	<div class="jiu-nav {:C('ftx_site_width')}">
		<div class="nav-item ">
			<div class="item-list">
				<ul>
				<li><a href="{:U('dapei/index')}" <empty name="cid"> class="active"</empty>>全部</a></li>
				<volist name="acats" id="vol">
				<li><a href="{:U('dapei/cate',array('id'=>$vol['id']))}" <if condition="$vol.id eq $cid"> class="active" </if>>{$vol.name}</a></li>
	</volist> 
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="con-wrap page-content lis-page"> 
<div class="ucenter-list-wrap clearfix style-listpage" id="J_dataContent">
<div class="list-con-inner clearfix style-waterfall inline-waterfall">
<div class="ks-waterfall-col">
<volist name="dapei_list" id="dapei" key="i" mod="5">
<div class="mate-box ks-waterfall">
              <div class="info-wrap">
                  <div class="info-img">
                    <a href="{:U('dapei/read',array('id'=>$dapei['id']))}" target="_blank">
                      <img src="{$dapei.pic_url}_240x10000Q90.jpg" alt="{$dapei.title}" width="224" >
                    </a>
                    <div class="info-detail">
                      <span class="itemnum">{$dapei.itemnum}件搭配宝贝</span>
                      <div class="thumb-goods" style="display: none;">					  
                        <div class="thumb-mL10 clearfix">
						<if condition="$dapei['onepic'] eq '' ">
	                    <else/>
                          <a href="{$dapei.click_url}" target="_blank">
                              <img src="{$dapei.onepic}_72x72xz.jpg" alt="{$dapei.title}">
                          </a>
						</if>
						<if condition="$dapei['twopic'] eq '' ">
	                    <else/>
                          <a href="{$dapei.click_url}" target="_blank">
                              <img src="{$dapei.twopic}_72x72xz.jpg" alt="{$dapei.title}">
                          </a>
						</if>
						<if condition="$dapei['threepic'] eq '' ">
	                    <else/>
                          <a href="{$dapei.click_url}" target="_blank">
                              <img src="{$dapei.threepic}_72x72xz.jpg" alt="{$dapei.title}">
                          </a>
						</if>  
						<if condition="$dapei['fourpic'] eq '' ">
	                    <else/>
                          <a href="{$dapei.click_url}" target="_blank">
                              <img src="{$dapei.fourpic}_72x72xz.jpg" alt="{$dapei.title}">
                          </a>
						</if>
                        </div>
                      </div>
                    </div>
                  </div>
                  <p class="goods-txt">{$dapei.info}</p>
                  <p class="share-action clearfix">
                      <a href="{$dapei.click_url}" class="favorite J_favorite" target="_blank">去看看</a>
                  </p>
              </div>
              <div class="share-user">
                  <p class="user-line">
                      <a href="{$dapei.click_url}" target="_blank" class="user-img">
                          <img src="{$dapei.avatar}" alt="{$dapei.author}">
                      </a>
                      <em class="uname"><a href="{$dapei.click_url}" target="_blank">{$dapei.author}</a></em>
                      <span class="daren-icon"></span>
                  </p>
              </div>
          </div>
		  </volist>
		 </div>
		 </div>
         <div id="infscr-loading"></div>
         </div>
<div id="more"></div>
 <div class="main {:C('ftx_site_width')} clear">
	<div class="clear"></div> 
	<notempty name="page">
	<div id="J_pagination" class="page">
		<div class="pageNav">{$page}</div>
	</div>
	</notempty>
</div>
 <script type="text/javascript">
      if ($('.page a.pg-next').attr('href')) {
        $('#more').append("<a href='" + $('.page a.pg-next').attr('href') + "'></a>");		
      }
</script>
 </div>
<include file="public:footer" /> 
</body>
</html>