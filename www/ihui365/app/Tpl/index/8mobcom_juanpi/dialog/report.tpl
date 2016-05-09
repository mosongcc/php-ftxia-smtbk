<div id="J_report" class="dialog_check_item clearfix">
	<div class="clearfix">
		商品名称：{$item.title}<br />
		举报原因：<select name="report_reason" class="selectClass">   
					<option value="请选择">请选择</option>   
					<option value="商品价格大于10元">商品价格大于10元</option>   
					<option value="商品已下架">商品已下架</option>   
					<option value="商品不包邮">商品不包邮</option>   
					<option value="商品要求两件起拍，一件不发货。">商品要求两件起拍，一件不发货。</option>   
					<option value="卖家拒绝发货">卖家拒绝发货</option>   
					<option value="商品价格与活动价格不符合">商品价格与活动价格不符合</option>   
					<option value="商品分类错误">商品分类错误</option>   
					<option value="">其它原因</option> 
				</select><br />

		 <textarea id="report_comment"></textarea>
    	<input type="hidden" name="znid" value="{$item.id}"><br />
        <input type="button" value="{:L('ok')}" class="J_check_btn smt">
    </div>
 
	<div class="cx">
		<div class="explain-col">
		<font color="red"><b>注：为保证您的合法权益，请如实填写您所遇到的情况。</b></font>
		</div>
	</div>
 
</div>
<script>
;(function($){
	$('select').live('change', function() {
		if ($('select').find('option:selected').text() == '其它原因') {
			$('.report_comment').attr('style', 'display:block');
		} else if ($('select').find('option:selected').text() != '其它原因') {
			$('.report_comment').attr('style', 'display:none');
		}
	});
})(jQuery);
</script>