<if condition="C('ftx_kefu_open') eq '1'">
<!-- S 客服 -->
<script type="text/javascript" src="__STATIC__/8mobcom/js/jquery.fixed.js"></script>
<script>
$(function(){
	//悬浮客服
	$("#fixedBox").fix({
		position 	: "right",	//悬浮位置 - left或right
		horizontal  	: 0,		//水平方向的位置 - 默认为数字
		vertical    	: null,		//垂直方向的位置 - 默认为null
		halfTop     	: true,		//是否垂直居中位置
		minStatue 	: true,		//是否最小化
		hideCloseBtn 	: false,	//是否隐藏关闭按钮
		skin 		: "{:C('ftx_kefu_color')}",	//皮肤
		showBtnWidth 	: 28,		//show_btn_width
		contentBoxWidth : 154, 		//side_content_width
		durationTime 	: 100		//完成时间
	});
});
</script>
<div class="fixed_box" id="fixedBox">
	<div class="content_box">
		<div class="content_inner">
			<div class="close_btn"><a title="关闭"><span>关闭</span></a></div>
			<div class="content_title"><span>客服中心</span></div>
			<div class="content_list">            	
				<div class="qqserver">
					<if condition="C('ftx_kefu_one_value') neq ''">
						<if condition="C('ftx_kefu_one_value') eq 'ss'"> </if>
					</if>

					<if condition="C('ftx_kefu_one_value') neq ''">
					<p>
						
						<if condition="C('ftx_kefu_one_value') eq 'ss'"> </if>
						<if condition="C('ftx_kefu_one_su') eq 'qq'">
							<span>{:C('ftx_kefu_one_name')}:</span> 
							<a href="http://wpa.qq.com/msgrd?v=3&amp;uin={:C('ftx_kefu_one_value')}&amp;site=qq&amp;menu=yes" rel="nofollow" target="_blank"><img border="0" src="http://wpa.qq.com/pa?p=2:{:C('ftx_kefu_one_value')}:41" alt="点击这里给我发消息" title="点击这里给我发消息"></a>
						<elseif condition="C('ftx_kefu_one_su') eq 'ww'"/>
							<span>{:C('ftx_kefu_one_name')}:</span> 
							<a href="http://amos.im.alisoft.com/msg.aw?v=2&uid={:C('ftx_kefu_one_value')}&site=cntaobao&s=2&charset=utf-8" rel="nofollow" target="_blank"><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid={:C('ftx_kefu_one_value')}&site=cntaobao&s=1&charset=utf-8" alt="点击这里给我发消息" title="点击这里给我发消息"></a>
						</if>
					</p>
					</if>

					<if condition="C('ftx_kefu_two_value') neq ''">
					<p>
						<span>{:C('ftx_kefu_two_name')}:</span> 
						<if condition="C('ftx_kefu_two_su') eq 'qq'">
							<a href="http://wpa.qq.com/msgrd?v=3&amp;uin={:C('ftx_kefu_two_value')}&amp;site=qq&amp;menu=yes" rel="nofollow" target="_blank"><img border="0" src="http://wpa.qq.com/pa?p=2:{:C('ftx_kefu_two_value')}:41" alt="点击这里给我发消息" title="点击这里给我发消息"></a>
						<elseif condition="C('ftx_kefu_two_su') eq 'ww'"/>
							<a href="http://amos.im.alisoft.com/msg.aw?v=2&uid={:C('ftx_kefu_two_value')}&site=cntaobao&s=2&charset=utf-8" rel="nofollow" target="_blank"><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid={:C('ftx_kefu_two_value')}&site=cntaobao&s=1&charset=utf-8" alt="点击这里给我发消息" title="点击这里给我发消息"></a>
						</if>
					</p>
					</if>


					<if condition="C('ftx_kefu_three_value') neq ''">
					<p>
						<span>{:C('ftx_kefu_three_name')}:</span> 
						<if condition="C('ftx_kefu_three_su') eq 'qq'">
							<a href="http://wpa.qq.com/msgrd?v=3&amp;uin={:C('ftx_kefu_three_value')}&amp;site=qq&amp;menu=yes" rel="nofollow" target="_blank"><img border="0" src="http://wpa.qq.com/pa?p=2:{:C('ftx_kefu_three_value')}:41" alt="点击这里给我发消息" title="点击这里给我发消息"></a>
						<elseif condition="C('ftx_kefu_three_su') eq 'ww'"/>
							<a href="http://amos.im.alisoft.com/msg.aw?v=2&uid={:C('ftx_kefu_three_value')}&site=cntaobao&s=2&charset=utf-8" rel="nofollow" target="_blank"><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid={:C('ftx_kefu_three_value')}&site=cntaobao&s=1&charset=utf-8" alt="点击这里给我发消息" title="点击这里给我发消息"></a>
						</if>
					</p>
					</if>




					<if condition="C('ftx_kefu_four_value') neq ''">
					<p>
						<span>{:C('ftx_kefu_four_name')}:</span> 
						<if condition="C('ftx_kefu_four_su') eq 'qq'">
							<a href="http://wpa.qq.com/msgrd?v=3&amp;uin={:C('ftx_kefu_four_value')}&amp;site=qq&amp;menu=yes" rel="nofollow" target="_blank"><img border="0" src="http://wpa.qq.com/pa?p=2:{:C('ftx_kefu_four_value')}:41" alt="点击这里给我发消息" title="点击这里给我发消息"></a>
						<elseif condition="C('ftx_kefu_four_su') eq 'ww'"/>
							<a href="http://amos.im.alisoft.com/msg.aw?v=2&uid={:C('ftx_kefu_four_value')}&site=cntaobao&s=2&charset=utf-8" rel="nofollow" target="_blank"><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid={:C('ftx_kefu_four_value')}&site=cntaobao&s=1&charset=utf-8" alt="点击这里给我发消息" title="点击这里给我发消息"></a>
						</if>
					</p>
					</if>



					<if condition="C('ftx_kefu_five_value') neq ''">
					<p>
						<span>{:C('ftx_kefu_five_name')}:</span> 
						<if condition="C('ftx_kefu_five_su') eq 'qq'">
							<a href="http://wpa.qq.com/msgrd?v=3&amp;uin={:C('ftx_kefu_five_value')}&amp;site=qq&amp;menu=yes" rel="nofollow" target="_blank"><img border="0" src="http://wpa.qq.com/pa?p=2:{:C('ftx_kefu_five_value')}:41" alt="点击这里给我发消息" title="点击这里给我发消息"></a>
						<elseif condition="C('ftx_kefu_five_su') eq 'ww'"/>
							<a href="http://amos.im.alisoft.com/msg.aw?v=2&uid={:C('ftx_kefu_five_value')}&site=cntaobao&s=2&charset=utf-8" rel="nofollow" target="_blank"><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid={:C('ftx_kefu_five_value')}&site=cntaobao&s=1&charset=utf-8" alt="点击这里给我发消息" title="点击这里给我发消息"></a>
						</if>
					</p>
					</if>
				</div>
				<hr>
				<div class="phoneserver">
					<h5>客户服务热线</h5>
					<p>{:C('ftx_kefu_telephone')}</p>
				</div>
				<hr>
				<div class="msgserver"><p><a href="{:U('user/msg',array('do'=>'send'))}" target="_blank">给我们留言</a></p></div>
			</div>
			<div class="content_bottom"></div>
		</div>
	</div>
	<div class="show_btn"><span>展开客服</span></div>
</div>
<!-- E 客服 -->
</if>