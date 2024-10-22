<!--移动栏目-->
<div class="dialog_content">
	<form id="J_check_form" name="info_form" action="{:U('items/getcheck')}" method="post">
	<table width="100%" cellpadding="3" cellspacing="1" class="table_form">
		<tr>
			<th width="80">推荐理由 :</th>
			<td><input type="text" name="intro" id="intro" class="input-text" size="50" value="{$item.intro}"></td>
			<td width="90"></td>
		</tr>
		<notempty name="item['pay_id']">
		<tr>
			<th width="80">付款信息 :</th>
			<td>
			<label class="mr10"><input type="radio" value="1" name="pay_status" class="radio" > 已付款 </label>
			  &nbsp;&nbsp;&nbsp;
			<label><input type="radio" value="0" name="pay_status" id="fail" class="radio" checked> 未付款 </label>
			</td>
			<td></td>
		</tr>


		</notempty>
		<tr>
			<th width="80">审核选项 :</th>
			<td>
			<input type="radio" value="1" name="pass" class="radio" id="passed">
                    <label for="passed" class="radio_lalel">审核通过</label>&nbsp;&nbsp;&nbsp;
                    <input type="radio" value="0" name="pass" id="fail" class="radio" checked>
                    <label for="fail" class="radio_lalel">退回</label>
			</td>
			<td></td>
		</tr>

		<tr class="failed">
			<th width="80">退回原因 :</th>
			<td>
				<textarea name="fail_reason" cols="48" rows="5"></textarea>
			</td>
		</tr>

		<tr class="check_pass">
			<th width="80">标题 :</th>
			<td><input type="text" name="title" id="title" value="{$item.title}" class="input-text" size="50"></td>
			<td></td>
		</tr>
		<tr class="check_pass">
			<th width="80">活动开始 :</th>
			<td><input type="text" name="coupon_start_time" id="coupon_start_time" class="date" size="20"  value=""></td>
			<td></td>
		</tr>
		<tr class="check_pass">
			<th width="80">活动结束 :</th>
			<td><input type="text" name="coupon_end_time" id="coupon_end_time" class="date" size="20"  value=""></td>
			<td></td>
		</tr>

		<tr>
			<th width="80"></th>
			<td>
				<input type="hidden"  name="num_iid" id="J_num_iid"value="{$item.num_iid}">
				<input type="hidden"  name="id" value="{$item.id}" />
				<input type="submit"  class="smt"   value="审核">
			</td>
			<td></td>
		</tr>
	</table>
	
	</form>
</div>
<script>
$(function(){

	Calendar.setup({
	     inputField     :    "coupon_start_time",
	     ifFormat       :    "%Y-%m-%d %H:%M",
	     showsTime      :    'true',
	     timeFormat     :    "24"
	});
	Calendar.setup({
	     inputField     :    "coupon_end_time",
	     ifFormat       :    "%Y-%m-%d %H:%M",
	     showsTime      :    'true',
	     timeFormat     :    "24"
	});

	$('#J_check_form').ajaxForm({success:complate,dataType:'json'});
	function complate(result){
		if(result.status == 1){
			$.ftxia.tip({content:result.msg});
			window.location.reload();
		} else {
			$.ftxia.tip({content:result.msg, icon:'alert'});
		}
	}

	$(".check_pass").hide();
	$('#passed').live('click', function() {
		$(".check_pass").show();
		$(".failed").hide();
	});

	$('#fail').live('click', function() {
		$(".check_pass").hide();
		$(".failed").show();
	});

});
</script>