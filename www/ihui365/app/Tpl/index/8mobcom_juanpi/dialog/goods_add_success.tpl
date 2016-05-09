<notempty name="pay">
<div class="pay">
	<p class="tips_success">恭喜您，报名成功！点击支付宝图标去付款。</p>
	<form class="topay" action="https://shenghuo.alipay.com/send/payment/fill.htm" method="post" target="_blank" accept-charset="GBK" onsubmit="document.charset=&quot;GBK&quot;">
	<input name="optEmail" type="hidden" value="{:C('ftx_alipay')}"> 
        <input name="memo" type="hidden" value="{$pay.memo}"> 
        <input id="payAmount" name="payAmount" type="hidden" value="{$pay.price}"> 
        <input id="title" name="title" type="hidden" value="{$pay.title}">
	<input type="image" src="__STATIC__/8mobcom/images/alipay.png" border="0" name="submit" alt="付费报名">
	</form>
</div>
</nptempty>
<div id="J_goods_add_success" class="good_add_success clearfix">
	<div class="alert_content">
		<div class="success_con">
			<p class="tips_success">恭喜您，报名成功！</p>
			<p class="tips">请您及时查看宝贝的状态，并做好准备工作</p>
			<p class="btns">
				<a href="{:U('baoming/add')}" class="smt03"><span>继续报名</span><em></em></a>
				<a href="{:U('baoming/my')}" class="smt04"><span>查看列表</span><em></em></a>
			</p>
		</div>
	</div>
</div>