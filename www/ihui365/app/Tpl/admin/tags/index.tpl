<include file="public:header" />
<!--商品列表-->
<div class="subnav">
	<div class="content_menu ib_a blue line_x">
	<a class="add fb " href="javascript:auto_collect()" ><em>一键生成标签</em></a>
	</div>
</div>
<div class="pad_lr_10" >
 
    <div class="J_tablelist table_list" data-acturi="{:U('tags/ajax_edit')}">
    <table width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width=25><input type="checkbox" id="checkall_t" class="J_checkall"></th>
                <th width="20"><span data-tdtype="order_by" data-field="id">ID</span></th>
                <th align="left" width="300"><span data-tdtype="order_by" data-field="name">商品名称</span></th>
		<th width="20"><span data-tdtype="order_by" data-field="tcount">热度</span></th>
                <th width="40"><span data-tdtype="order_by" data-field="pass">{:L('pass')}</span></th>
                <th width="80">{:L('operations_manage')}</th>
            </tr>
        </thead>
    	<tbody>
            <volist name="list" id="val" >
            <tr>
                <td align="center"><input type="checkbox" class="J_checkitem" value="{$val.id}"></td>
                <td align="center">{$val.id}</td> 
                <td align="left"><span data-tdtype="edit" data-field="title" data-id="{$val.id}" class="tdedit" style="color:{$val.colors};">{$val.name}</span></td>
		<td align="center">{$val.tcount}</td>
                <td align="center"><img data-tdtype="toggle" data-id="{$val.id}" data-field="status" data-value="{$val.status}" src="__STATIC__/images/admin/toggle_<if condition="$val.status eq 0">disabled<else/>enabled</if>.gif" /></td>

                <td align="center"><a href="javascript:void(0);" class="J_confirmurl" data-uri="{:u('tags/delete', array('id'=>$val['id']))}" data-acttype="ajax" data-msg="{:sprintf(L('confirm_delete_one'),$val['name'])}">{:L('delete')}</a></td>
            </tr>
            </volist>
    	</tbody>
    </table>
    </div>





    <div class="btn_wrap_fixed">
        <label class="select_all mr10"><input type="checkbox" name="checkall" class="J_checkall">{:L('select_all')}/{:L('cancel')}</label>
	 
        <input type="button" class="btn" data-tdtype="batch_action" data-acttype="ajax" data-uri="{:U('items/delete')}" data-name="id" data-msg="{:L('confirm_delete')}" value="{:L('delete')}" />
        <div id="pages">{$page}</div>
    </div>
</div>
<include file="public:footer" />
 
</body>
</html>