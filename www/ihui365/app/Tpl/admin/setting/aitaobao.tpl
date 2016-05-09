<include file="public:header" />
<div class="subnav">
	<div class="content_menu ib_a blue line_x">
    		<a class="add fb " href="{:U('setting/aitaobao')}"><em>穿衣搭配设置</em></a>
		<a class="add fb " href="{:U('dapeicaiji/index')}"><em>搭配采集</em></a>
	</div>
</div>
<div class="subnav">
    <h1 class="title_2 line_x">搭配设置</h1>
</div>
<div class="pad_lr_10">
	<form id="info_form" action="{:u('setting/edit')}" method="post">
	<table width="100%" class="table_form">

	<tr>
            <th width="200">dapei 频道由开放平台托管 :</th>
            <td>
                <label class="mr10"><input type="radio" class="J_change_status" <if condition="C('ftx_aitaobao_open') eq '1'">checked="checked"</if> value="1" name="setting[aitaobao_open]"> {:L('open')}</label>
                <label><input type="radio" class="J_change_status" <if condition="C('ftx_aitaobao_open') eq '0'">checked="checked"</if> value="0" name="setting[aitaobao_open]"> {:L('close')}</label>
			
		<span class="gray ml10">此选项功能预留待下次版本更新</span>
		
            </td>
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
</body>
</html>