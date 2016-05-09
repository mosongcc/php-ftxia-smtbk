<!--移动栏目-->
<div class="dialog_content">
	<form id="J_check_form" name="info_form" action="{:U('items/move')}" method="post">
	<table width="100%" cellpadding="3" cellspacing="1" class="table_form">
		<tr>
		<if condition="$move eq 1">
			<th width="80">专场 :</th>
			<td>	<select class="J_cate_select mr10" data-pid="0" data-uri="{:U('zc_cate/ajax_getchilds', array('type'=>0))}" data-selected="0"></select>
			<input type="hidden" name="cate_id" id="J_cate_id" value="0" />
			 
			</td>
			<td width="90"></td>
		<else/>
			<th width="80">分类 :</th>
			<td>
			<select class="J_cate_select mr10" data-pid="0" data-uri="{:U('items_cate/ajax_getchilds', array('type'=>0))}" data-selected="0"></select>
			<input type="hidden" name="cate_id" id="J_cate_id" value="0" />				
			</td>
			<td width="90"></td>
		</if>
		</tr>
		
			
		<tr>
			<th width="80"></th>
			<td>
				<input type="hidden"  name="move" value="{$move}" />
				<input type="hidden"  name="ids" value="{$ids}" />
				<input type="hidden"  name="url" value="{$url}" />
				<input type="submit"  class="smt"   <if condition="$move eq 1">value="加入专场"<else/>value="批量分类"</if>>
			</td>
			<td></td>
		</tr>
	</table>
	
	</form>
</div>

 <script language="javascript" type="text/javascript">
 $('.J_cate_select').cate_select({top_option:lang.all}); //分类联动
 var url=U('items/move');
$(function () {
    $("form").submit(function () {
        $.ajax({
            type: "POST",
            url: url,
            dataType: "JSON",
            cache: false,
            data: $(this).serialize(),
            success: function (data) {
                if (data.state == 1) {
                    $.dialog({
                        message: "操作成功",
                        type: "success",
                        close_handler: function () {
                            parent.location.reload();
                        }
                    });
                } else {
                    $.dialog({
                        message: "操作失败",
                        type: "error",
                        close_handler: function () {
                            parent.location.reload();
                        }
                    });
                }
            }
        })
    })
    //关闭窗口
    $("#close_window").click(function(){
        parent.location.reload();
    })
})
</script>