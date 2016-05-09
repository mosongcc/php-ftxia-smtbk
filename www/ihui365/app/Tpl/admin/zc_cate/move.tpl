<!--移动栏目-->
<script src="__STATIC__/js/admin.js"></script>
<div class="dialog_content">
	<form id="info_form" name="info_form" action="{:U('zc_cate/move')}" method="post">
	<table width="100%" class="table_form">
		<tr> 
			<th width="90">{:L('item_cate_moveto')} :</th>
			<td><select id="J_zc_select" class="J_zc_select mr10" data-pid="0" data-uri="{:U('zc_cate/ajax_getchilds')}"></select></td>
		</tr>
	</table>
	<input type="hidden" name="pid" id="J_pid" />
	<input type="hidden" name="ids" value="{$ids}" />
	</form>
</div>
<script>
$(function(){
	$('#info_form').ajaxForm({success:complate,dataType:'json'});
	function complate(result){
		if(result.status == 1){
			$.dialog.get(result.dialog).close();
			$.ftxia.tip({content:result.msg});
			window.location.reload();
		} else {
			$.ftxia.tip({content:result.msg, icon:'alert'});
		}
	}
	$('#J_zc_select').zc_select({field:'J_pid'});
});
</script>