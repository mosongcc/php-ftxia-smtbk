<?php if (!defined('THINK_PATH')) exit();?><div class="dialog_content col_tab">
<link rel="stylesheet" type="text/css" href="__STATIC__/js/calendar/calendar-blue.css"/>
<script type="text/javascript" src="__STATIC__/js/calendar/calendar.js"></script>
<form id="info_form" action="<?php echo u('setting/edit');?>" method="post">
	<div class="J_panes">
		<div class="content_list pad_10">
		<table width="100%" class="table_form">
			<tr>
			    <th width="100">统一时间开关 :</th>
			    <td>
				<label><input type="radio" <?php if(C('ftx_coupon_time_open') == '1'): ?>checked="checked"<?php endif; ?> value="1" name="setting[coupon_time_open]"> <?php echo L('open');?></label> &nbsp;&nbsp;
				<label><input type="radio" <?php if(C('ftx_coupon_time_open') == '0'): ?>checked="checked"<?php endif; ?> value="0" name="setting[coupon_time_open]"> <?php echo L('close');?></label>
				<span class="gray ml10"></span>
			    </td>
			</tr>
			<tr>
			    <th width="100">统一开始时间 :</th>
			    <td><input type="text" name="setting[coupon_start_time]" size="20" id="coupon_start_time"  class="date" value="<?php echo C('ftx_coupon_start_time');?>" />
			    <span class="gray">采集的活动开始时间</span></td>
			</tr> 
		</table>
		</div>
        </div>
</form>
</div>
<script language="javascript" type="text/javascript">
$(function(){ 
	$('#info_form').ajaxForm({success:complate, dataType:'json'});
	function complate(result){
		if(result.status == 1){
			$.dialog.get(result.dialog).close();
			$.ftxia.tip({content:result.msg});
			window.location.reload();
		} else {
			$.ftxia.tip({content:result.msg, icon:'alert'});
		}
	} 
});
	Calendar.setup({
		inputField     :    "coupon_start_time",
		ifFormat       :    "%Y-%m-%d %H:%M",
		showsTime      :    'true',
		timeFormat     :    "24"
	});
</script>