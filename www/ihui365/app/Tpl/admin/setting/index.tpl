<include file="public:header" />
<div class="pad_lr_10">
	<form id="info_form" action="{:u('setting/edit')}" method="post" enctype="multipart/form-data">
	<table width="100%" class="table_form">
		<tr>
            <th width="150">{:L('site_url')} :</th>
            <td><input type="text" name="setting[site_url]" class="input-text" size="30" value="{:C('ftx_site_url')}">
	    <span class="gray ml10">网站地址必须以http:// 开头 / 斜杠结尾</span>
	    </td>
        </tr>
        <tr>
            <th width="150">{:L('site_name')} :</th>
            <td><input type="text" name="setting[site_name]" class="input-text" size="30" value="{:C('ftx_site_name')}"></td>
        </tr>
    
        <tr>
            <th>{:L('site_icp')} :</th>
            <td><input type="text" name="setting[site_icp]" class="input-text" size="30" value="{:C('ftx_site_icp')}"></td>
        </tr>
        <tr>
            <th>{:L('statistics_code')} :</th>
            <td><textarea rows="6" cols="80" name="setting[statistics_code]">{:C('ftx_statistics_code')}</textarea></td>
        </tr>
		 <tr>
            <th width="150">{:L('ipban_switch')} :</th>
            <td>
                <label><input type="radio" <if condition="C('ftx_ipban_switch') eq '1'">checked="checked"</if> value="1" name="setting[ipban_switch]"> {:L('open')}</label> &nbsp;&nbsp;
                <label><input type="radio" <if condition="C('ftx_ipban_switch') eq '0'">checked="checked"</if> value="0" name="setting[ipban_switch]"> {:L('close')}</label>
                <span class="gray ml10">如果本站没有添加禁止IP地址库，建议关闭改功能提升性能</span>
            </td>
        </tr>
	<tr>
            <th width="150">Header添加代码 :</th>
            <td>
                <textarea rows="6" cols="80" name="setting[header_html]">{:C('ftx_header_html')}</textarea>
                <span class="gray ml10"><br>需要在header添加内容的可以加在这里</span>
            </td>
        </tr>

	<tr>
            <th width="150">Footer添加代码 :</th>
            <td>
                <textarea rows="6" cols="80" name="setting[footer_html]">{:C('ftx_footer_html')}</textarea>
                <span class="gray ml10"><br>需要在底部添加内容的可以加在这里</span>
            </td>
        </tr>

	<tr>
            <th width="150">美丽说联盟ID :</th>
            <td>
                <input type="text" name="setting[meilishuo_id]" class="input-text" size="30" value="{:C('ftx_meilishuo_id')}">
                <span class="gray ml10"><br>美丽说联盟ID <a href="http://bbs.8mob.com/forum.php?mod=viewthread&tid=5692" target="_blank">注册及查找教程?</a></span>
            </td>
        </tr>


	<tr>
            <th width="150">淘点金代码 :</th>
            <td>
                <textarea rows="6" cols="80" name="setting[taojindian_html]">{:C('ftx_taojindian_html')}</textarea>
                <span class="gray ml10"><br>必须是完整的淘点金代码 <a href="http://bbs.8mob.com/forum.php?mod=viewthread&tid=3125" target="_blank">不会申请? 查看申请教程!</a></span>
            </td>
        </tr>

    	<tr>
        	<th>{:L('site_status')} :</th>
        	<td>
            	<label><input type="radio" class="J_change_status" <if condition="C('ftx_site_status') eq '1'">checked="checked"</if> value="1" name="setting[site_status]"> {:L('open')}</label> &nbsp;&nbsp;
                <label><input type="radio" class="J_change_status" <if condition="C('ftx_site_status') eq '0'">checked="checked"</if> value="0" name="setting[site_status]"> {:L('close')}</label>
            </td>
    	</tr>
        <tr id="J_closed_reason" <if condition="C('ftx_site_status') eq 1">class="hidden"</if>>
        	<th>{:L('closed_reason')} :</th>
        	<td><textarea rows="4" cols="50" name="setting[closed_reason]" id="closed_reason">{:C('ftx_closed_reason')}</textarea></td>
    	</tr>
        <tr>
        	<th></th>
        	<td><input type="hidden" name="menuid"  value="{$menuid}"/><input type="submit" class="smt mr10" value="{:L('submit')}"/></td>
    	</tr>
	</table>
	</form>
</div>
<include file="public:footer" />
<script>
$(function(){
    $('.J_change_status').live('click', function(){
        if($(this).val() == '0'){
            $('#J_closed_reason').fadeIn();
        }else{
            $('#J_closed_reason').fadeOut();
        }
    });
});
</script>
</body>
</html>