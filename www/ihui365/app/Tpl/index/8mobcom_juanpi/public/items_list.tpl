	<ul class="goods-list {:C('ftx_site_wc')}">
		<volist name="items_list" id="item" key="i" mod="4">
		<li  class="<eq name="mod" value="3"> last</eq>">
			<div class="sid_{$item.sellerId}  list-good   {$item.class} " id="nid_{$item.num_iid}">
				<if condition="$item.s_price gt 0.1 ">
					<div class="wap"><div class="wap_ewm"><p>扫描二维码更便宜</p><img src="http://s.jiathis.com/qrcode.php?site=weixin&url=<?php echo urlencode(C('ftx_site_url'));?>index.php%3Fm%3Djump%26iid%3D{$item.num_iid}" /></div><span>手机购买再省{$item.s_price|price}元</span></div>
				</if>
				<div class="good-pic">
					
				<if condition="$item.shop_type eq 'C' ">
					<a biz-itemid="{$item['num_iid']}" isconvert=1 href="{:U('jump/index',array('iid'=>$item['num_iid']))}"  target="_blank" rel="nofollow">
				<elseif condition="$item.shop_type eq 'B' " />
					<a biz-itemid="{$item['num_iid']}" isconvert=1 href="{:U('jump/index',array('iid'=>$item['num_iid']))}"  target="_blank" rel="nofollow">
				<elseif condition="$item.shop_type eq 'D' " />
					<a href="{$item.click_url}" target="_blank" rel="nofollow">
				<else /><a href="{:U('jump/'.$item['num_iid'])}" target="_blank" rel="nofollow">
					</if>

					
					<img src='/static/8mobcom/images/blank.gif' data-original='{:attach(get_thumb($item['pic_url'], '_b'),'item')}' alt="{$item.title}" class="lazy"   /></a>
					<div class="yhq"> </div>
				</div>
				<h3 class="good-title">
					<if condition="$item.ems eq 1">[包邮]</if><a target="_blank" href="{:U('item/index',array('iid'=>$item['num_iid']))}" class="title">{$item.title}</a>
					<if condition="$item.volume gt 0 "><span class="sold">已售<em>{$item.volume}</em></span><else/><span class="sold">新品上架<em></em></span></if>
				</h3>
				<div class="good-price">
					<span class="price-current"><em>￥</em>{$item.coupon_price|price}</span>
					<span class="des-other">
						<span class="price-old"><if condition="$item.zk lt 10"><em>¥{$item.price|price}</em><u>({$item.zk}折)</u> </if></span>
						<span class="discount show">
							<if condition="$item.ems eq 1"><div class="icon_by" title="包邮"></div></if>
							<notempty name="item.gai">
							<b class="icon_gai" title="拍下改价"></b>
							</notempty>
							<notempty name="visitor">
							<if condition="$visitor['username'] eq C('ftx_index_admin')">
							 <a title="不显示" href="javascript:void(0);" data-id="{$item.num_iid}">取消</a> 
							</if>
							</notempty>
						</span>
					</span>
					<div class="btn-new   {$item.class}">
						<if condition="$item.class eq 'wait'">
							<a href="{:U('item/'.$item['num_iid'])}" target="_blank" rel="nofollow">
							 
							<?php
								if (date('Y-m-d') == date('Y-m-d',$item['coupon_start_time'])){
									echo '<span>今日</span><b>'.date('H:i',$item['coupon_start_time']).'</b>';
								}else if(date("Y-m-d",strtotime("+1 day")) == date('Y-m-d',$item['coupon_start_time'])){
									echo '<span>明日</span><b>'.date('H:i',$item['coupon_start_time']).'</b>';
								}else{
									echo '<b>'.date('m-d H',$item['coupon_start_time']).'</b>';
								}
							?> 
							</a>
						<elseif condition="($item.class eq 'end') OR ($item.class eq 'sellout') OR ($item.class eq 'buy')"/>
							<if condition="$item.shop_type eq 'C' ">
							<a biz-itemid="{$item['num_iid']}" isconvert=1 href="{:U('jump/index',array('iid'=>$item['num_iid']))}"  target="_blank" rel="nofollow"><em class="icon_n"></em><span>淘宝</span></a>
							<elseif condition="$item.shop_type eq 'B' " />
							<a biz-itemid="{$item['num_iid']}" isconvert=1 href="{:U('jump/index',array('iid'=>$item['num_iid']))}"  target="_blank" rel="nofollow"><em class="icon_t"></em><span>天猫</span></a>
							<elseif condition="$item.shop_type eq 'D' " />
							<a href="{$item.click_url}" target="_blank" rel="nofollow"><em class="icon_j"></em><span>京东</span></a>
							<else /><a href="{:U('jump/'.$item['num_iid'])}" target="_blank" rel="nofollow"><span>去抢购</span></a>
							</if>
						</if>
					</div>
				</div>
				<!-- like -->
		 
				<in name="item.id" value="$like_ids">
				<a class="my-like" lkid="{$item.id}" gtype="1" lks="0" title="取消收藏" style="display: block;"><i class="like-ico del-ico"><span class="heart_left"></span><span class="heart_right"></span></i></a>
				<else/>
				<a class="my-like" lkid="{$item.id}" gtype="1" lks="1" title="加入收藏"><i class="like-ico "><span class="heart_left"></span><span class="heart_right"></span></i></a>
				</in>
				<!-- end like -->
				<div class="pic-des"> 
					<if condition="$item.class eq 'wait'">
						<h5><em>开始时间：</em><i>{$item.coupon_start_time|date="m月d日 H时i分",###}</i></h5>
					<else />
						<notempty name="item.coupon_end_time">
						<h5>
							<em>剩余时间：</em>
							<i>
							<?php
								if($item['coupon_start_time']>time()){
									$item['timeleft'] = $item['coupon_start_time']-time();
								}else{
									$item['timeleft'] = $item['coupon_end_time']-time();
								}
								echo lefttime($item['timeleft']);
							?></i></h5>
						</notempty>
					</if>
					<if condition="$item.sellerId neq ''"><h6><em>卖家店铺：</em><i><a href="{:U('shop/'.$item['sellerId'])}" <if condition="$item.shop_type eq 'C'"> rel="nofollow" </if> target="_blank">{$item.nick}</a></i></h6></if> 					
				</div>
				{$item.coupon_start_time|newicon}
				<if condition="($item.class eq 'sellout') OR ($item.class eq 'end')">
				<div style="display:block" class="box-hd">
				   <div class="mask-bg"></div>
				   <em class="buy-over">抢光了</em>
				</div>
				</if>
			</div>
		</li>
		</volist>
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