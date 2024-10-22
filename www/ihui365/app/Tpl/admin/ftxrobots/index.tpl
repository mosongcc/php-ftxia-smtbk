<include file="public:header" />
<!--商品列表-->
<div class="subnav">
	<div class="content_menu ib_a blue line_x">
    	<a class="add fb " href="{:U('ftxrobots/add_do')}" ><em>添加采集器</em></a>
	<a class="add fb " href="javascript:auto_collect()" ><em>一键自动采集</em></a>
	<a class="add fb " href="javascript:jx_collect({$ftxrobots_collect_data.rid},{$ftxrobots_collect_data.p})" ><em>继续采集</em></a>
	<a class="add fb J_showdialog" href="javascript:void(0);" data-uri="{:U('setting/index',array('type'=>'ftxrobots'))}" data-title="采集设置" data-id="add" data-width="520" data-height="80"><em>采集设置</em></a>
	</div>

</div>
<div class="pad_lr_10" >
    


    <div class="J_tablelist table_list" data-acturi="{:U('ftxrobots/ajax_edit')}">
    <table width="100%" cellspacing="0">
        <thead>
            <tr>
                <th><span data-tdtype="order_by" data-field="id">ID</span></th>
                <th align="left"><span data-tdtype="order_by" data-field="name">商品名称</span></th>
                <th width="80"><span data-tdtype="order_by" data-field="cate_id">分类</span></th>
				<th width="70"><span data-tdtype="order_by" data-field="page">采集页数</span></th>
				<th width="100"><span data-tdtype="order_by" data-field="last_page">上次采集页数</span></th>
                <th width="40"><span data-tdtype="order_by" data-field="ordid">{:L('sort_order')}</span></th>
				<th width="40"><span data-tdtype="order_by" data-field="status">状态</span></th>
                <th width="120"><span data-tdtype="order_by" data-field="last_time">最近时间</span></th>
                <th width="200">{:L('operations_manage')}</th>
            </tr>
        </thead>
    	<tbody>
            <volist name="list" id="val" >
            <tr>
                <td align="center">{$val.id}</td>
                <td align="left"><span data-tdtype="edit" data-field="name" data-id="{$val.id}" class="tdedit"  >{$val.name}</span></td>
                <td align="center"><b>{$cate_list[$val['cate_id']]}</b></td>
				<td align="center" class="red"><span data-tdtype="edit" data-field="page" data-id="{$val.id}" class="tdedit">{$val.page}</span></td> 
				<td align="center" class="red">{$val.last_page}</td> 
                <td align="center"><span data-tdtype="edit" data-field="ordid" data-id="{$val.id}" class="tdedit">{$val.ordid}</span></td>
				<td align="center"><img data-tdtype="toggle" data-id="{$val.id}" data-field="status" data-value="{$val.status}" src="__STATIC__/images/admin/toggle_<if condition="$val.status eq 0">disabled<else/>enabled</if>.gif" /></td>
                <td align="center">{$val.last_time|frienddate}</td>
                <td align="center"><a href="javascript:collect({$val.id},{$val.last_page});">继续上次采集</a> |<a href="javascript:collect({$val.id},1);">开始采集</a> |<a href="{:u('ftxrobots/edit', array('id'=>$val['id'], 'menuid'=>$menuid))}">{:L('edit')}</a> | <a href="javascript:void(0);" class="J_confirmurl" data-uri="{:u('ftxrobots/delete', array('id'=>$val['id']))}" data-acttype="ajax" data-msg="{:sprintf(L('confirm_delete_one'),$val['name'])}">{:L('delete')}</a></td>
            </tr>
            </volist>
    	</tbody>
    </table>
    </div>

    <div class="btn_wrap_fixed">
        <div id="pages">{$page}</div>
    </div>
</div>
<include file="public:footer" />
<script>
    var collect_url = "{:U('ftxrobots/collect')}";
    var id = 0;
	var p = 1;
	function collect(id,p){
        $.getJSON(collect_url, {id:id,p:p}, function(result){
            if(result.status == 1){
				$.dialog({id:'cmt_taobao', title:result.msg, content:result.data, padding:'', lock:true});
                p++;
				setTimeout("collect_page("+ id +","+ p+")",1000);
            }else{
                $.ftxia.tip({content:result.msg});
            }
        });
    }
	function collect_page(id,p){
        $.getJSON(collect_url, {id:id,p:p}, function(result){
            if(result.status == 1){
                $.dialog.get('cmt_taobao').content(result.data);
                p++;
				setTimeout("collect_page("+ id +","+ p+")",1000);
            }else{
                $.dialog.get('cmt_taobao').close();
                $.ftxia.tip({content:result.msg});
            }
        });
    }




    function auto_collect(){

        $.getJSON(collect_url, {auto:1}, function(result){
            if(result.status == 1){
                $.dialog({id:'cmt_ftxia', title:result.msg.title, content:result.data, padding:'', lock:true});
                rid = result.msg.rid;
                p = result.msg.np;
                
                setTimeout("auto_collect_page("+ rid +","+ p+")",1000);
            }else{
                $.ftxia.tip({content:result.msg});
            }
        });
    }
    function auto_collect_page(rid,p){
        $.getJSON(collect_url, {rid:rid,p:p,auto:1}, function(result){
            if(result.status == 1){
                $.dialog.get('cmt_ftxia').content(result.data);
                rid = result.msg.rid;
                p = result.msg.np;
                setTimeout("auto_collect_page("+ rid +","+ p+")",1000);
            }else{
                $.dialog.get('cmt_ftxia').close();
                $.ftxia.tip({content:result.msg});
            }
        });
    }

    function jx_collect(rid,p){
        $.getJSON(collect_url, {rid:rid,p:p,auto:1}, function(result){
            if(result.status == 1){
                 $.dialog({id:'cmt_ftxia', title:result.msg.title, content:result.data, padding:'', lock:true});
                rid = result.msg.rid;
                p = result.msg.np;
                setTimeout("auto_collect_page("+ rid +","+ p+")",1000);
            }else{
                $.dialog.get('cmt_ftxia').close();
                $.ftxia.tip({content:result.msg});
            }
        });
    }
</script>
</body>
</html>