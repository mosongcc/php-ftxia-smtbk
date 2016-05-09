<include file="public:header" />
<div class="subnav">
    <h1 class="title_2 line_x">WAP设置</h1>
</div>
<div class="pad_lr_10">
	<form id="info_form" action="{:u('setting/edit')}" method="post">
	<table width="100%" class="table_form">
        <tr>
            <th width="200">开启自动跳转 :</th>
            <td>
                <label class="mr10"><input type="radio" class="J_change_status" <if condition="C('ftx_wapjump_open') eq '1'">checked="checked"</if> value="1" name="setting[wapjump_open]"> {:L('open')}</label>
                <label><input type="radio" class="J_change_status" <if condition="C('ftx_wapjump_open') eq '0'">checked="checked"</if> value="0" name="setting[wapjump_open]"> {:L('close')}</label>
            </td>
        </tr>
        <tr id="J_closed_reason" <if condition="C('ftx_wapjump_open') eq 0">class="hidden"</if>>
            <th>跳转网址 :</th>
            <td>
	    <input type="text" name="setting[wap_url]" class="input-text" size="50" value="{:C('ftx_wap_url')}"></td>
        </tr>
       
        <tr>
        	<th></th>
        	<td>
                <input type="hidden" name="menuid"  value="{$menuid}"/>
                <input type="submit" class="smt mr10" value="{:L('submit')}"/>
            </td>
    	</tr>
	</table>
	</form>
</div>
<include file="public:footer" />
<script>
$(function(){
    $('.J_change_status').live('click', function(){
        if($(this).val() == '1'){
            $('#J_closed_reason').fadeIn();
        }else{
            $('#J_closed_reason').fadeOut();
        }
    });
});
</script>
</body>
</html>