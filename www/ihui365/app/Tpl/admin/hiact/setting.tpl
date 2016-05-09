<include file="public:header" />
<!--商品列表-->
<div class="subnav">
	<div class="content_menu ib_a blue line_x">
    		<a class="add fb " href="{:U('hiact/setting')}" ><em>Token设置</em></a>
		<a class="add fb " href="{:U('hiact/index')}" ><em>采集</em></a>
	</div>
</div>
<div class="pad_lr_10">
	<form id="info_form" action="{:u('setting/edit')}" method="post">
	<table width="100%" class="table_form contentWrap">
		<tr>
		    <th width="150">Token :</th>
		    <td>
			<input type="text" name="setting[tb_token]" class="input-text" size="40" value="{:C('ftx_tb_token')}">
			<span class="gray ml10">Token获取  <a href="http://bbs.8mob.com/show-6360_1_1" target="_blank">教程</a></span>
		    </td>
		</tr>
		<tr>
			<th></th>
			<td><input type="hidden" name="menuid"  value="{$menuid}"/><input type="submit" class="smt mr10" name="do" value="{:L('submit')}"/></td>
		</tr>
	</table>
	</form>
</div>
<include file="public:footer" />
</body>
</html>