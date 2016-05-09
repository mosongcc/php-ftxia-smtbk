<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link href="__STATIC__/css/admin/style.css" rel="stylesheet"/>
	<title><?php echo L('website_manage');?></title>
	<script>
	var URL = '__URL__';
	var SELF = '__SELF__';
	var ROOT_PATH = '__ROOT__';
	var APP	 =	 '__APP__';
	//语言项目
	var lang = new Object();
	<?php $_result=L('js_lang');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>lang.<?php echo ($key); ?> = "<?php echo ($val); ?>";<?php endforeach; endif; else: echo "" ;endif; ?>
	</script>
</head>

<body>
<div id="J_ajax_loading" class="ajax_loading"><?php echo L('ajax_loading');?></div>
<?php if(($sub_menu != '') OR ($big_menu != '')): ?><div class="subnav">
    <div class="content_menu ib_a blue line_x">
    	<?php if(!empty($big_menu)): ?><a class="add fb J_showdialog" href="javascript:void(0);" data-uri="<?php echo ($big_menu["iframe"]); ?>" data-title="<?php echo ($big_menu["title"]); ?>" data-id="<?php echo ($big_menu["id"]); ?>" data-width="<?php echo ($big_menu["width"]); ?>" data-height="<?php echo ($big_menu["height"]); ?>"><em><?php echo ($big_menu["title"]); ?></em></a>　<?php endif; ?>
        <?php if(!empty($sub_menu)): if(is_array($sub_menu)): $key = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($key % 2 );++$key; if($key != 1): ?><span>|</span><?php endif; ?>
        <a href="<?php echo U($val['module_name'].'/'.$val['action_name'],array('menuid'=>$menuid)); echo ($val["data"]); ?>" class="<?php echo ($val["class"]); ?>"><em><?php echo ($val['name']); ?></em></a><?php endforeach; endif; else: echo "" ;endif; endif; ?>
    </div>
</div><?php endif; ?>
<!--商品列表-->
<div class="pad_10" >
    <form name="searchform" method="get" >
    <table width="100%" cellspacing="0" class="search_form">
        <tbody>
            <tr>
                <td>
                <div class="explain_col">
                    <input type="hidden" name="g" value="admin" />
                    <input type="hidden" name="m" value="score_order" />
                    <input type="hidden" name="a" value="index" />
                    <input type="hidden" name="menuid" value="<?php echo ($menuid); ?>" />
                    &nbsp;&nbsp;订单号 :
                    <input name="keyword" type="text" class="input-text" size="25" value="<?php echo ($search["keyword"]); ?>" />
                    &nbsp;&nbsp;用户名 :
                    <input type="text" name="uname" class="input-text" size="12" value="<?php echo ($search["uname"]); ?>" />
                    下单时间 :
                    <input type="text" name="time_start" id="J_time_start" class="date" size="12" value="<?php echo ($search["time_start"]); ?>">
                    -
                    <input type="text" name="time_end" id="J_time_end" class="date" size="12" value="<?php echo ($search["time_end"]); ?>">
                    
                    &nbsp;&nbsp;状态 :
                    <select name="status">
                    <option value="">-<?php echo L('all');?>-</option>
                    <option value="0" <?php if($search["status"] == '0'): ?>selected="selected"<?php endif; ?>>请求代付</option>
                    <option value="1" <?php if($search["status"] == '1'): ?>selected="selected"<?php endif; ?>>代付完成</option>
                    </select>
                    <input type="submit" name="search" class="btn" value="搜索" />
                    <div class="bk8"></div>                
                </div>
                </td>
            </tr>
        </tbody>
    </table>
    </form>
    <div class="J_tablelist table_list" data-acturi="<?php echo U('score_order/ajax_edit');?>">
    <table width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width=25><input type="checkbox" id="checkall_t" class="J_checkall"></th>
                <th width="10"><span data-tdtype="order_by" data-field="id">ID</span></th>
                <th width="60"><span data-tdtype="order_by" data-field="uname">会员名</span></th>
                <th><span data-tdtype="order_by" data-field="item_name">商品名称</span></th>
                <th width="40"><span data-tdtype="order_by" data-field="item_num">数量</span></th>
                <th width="40"><span data-tdtype="order_by" data-field="order_score">积分</span></th>
		<th width="60"><span data-tdtype="order_by" data-field="realname">姓名</span></th>
		<th width="250">地址</th>
		<th width="60">物流公司</th>
		<th width="60">运单号码</th>
                <th width="120"><span data-tdtype="order_by" data-field="add_time">下单时间</span></th>
                <th width="60"><span data-tdtype="order_by" data-field="status"><?php echo L('status');?></span></th>
                <th width="90"><?php echo L('operations_manage');?></th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                <td align="center"><input type="checkbox" class="J_checkitem" value="<?php echo ($val["id"]); ?>"></td>
                <td align="center"><?php echo ($val["id"]); ?></td>
                <td align="center"><?php echo ($val["uname"]); ?></td>
                <td align="center"><?php echo ($val["item_name"]); ?></td>
                <td align="center"><?php echo ($val["item_num"]); ?></td>
                <td align="center"><?php echo ($val["order_score"]); ?></td>  
		<td align="center"><?php echo ($val["realname"]); ?></td> 
		<td align="center"><?php echo ($val["address"]); ?></td> 
		<td align="center"><?php echo ($val["ems_name"]); ?></td> 
		<td align="center"><?php echo ($val["ems_id"]); ?></td> 
                <td align="center"><?php echo (frienddate($val["add_time"])); ?></td>              
                <td align="center"><?php if($val['status'] == '2'): ?>订单异常<?php elseif($val['status'] == '1'): ?><span class="green">订单已发货</span><?php else: ?>订单审核中<?php endif; ?></td>
                <td align="center">
				
				
				<?php if($val['status'] == '2'): ?><a href="<?php echo u('score_order/edit', array('id'=>$val['id'], 'menuid'=>$menuid));?>">订单异常</a><?php elseif($val['status'] == '0'): ?><a href="<?php echo u('score_order/edit', array('id'=>$val['id'], 'menuid'=>$menuid));?>">审核</a><?php else: ?><span class="green"><a href="<?php echo u('score_order/edit', array('id'=>$val['id'], 'menuid'=>$menuid));?>">已发货</a></span><?php endif; ?> | <a href="javascript:void(0);" class="J_confirmurl" data-uri="<?php echo u('score_order/delete', array('id'=>$val['id']));?>" data-acttype="ajax" data-msg="<?php echo sprintf(L('confirm_delete_one'),$val['title']);?>"><?php echo L('delete');?></a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    </div>
    <div class="btn_wrap_fixed">
        <label class="select_all mr10"><input type="checkbox" name="checkall" class="J_checkall"><?php echo L('select_all');?>/<?php echo L('cancel');?></label>
        <input type="button" class="btn" data-tdtype="batch_action" data-acttype="ajax" data-uri="<?php echo U('score_order/delete');?>" data-name="id" data-msg="<?php echo L('confirm_delete');?>" value="<?php echo L('delete');?>" />
        <div id="pages"><?php echo ($page); ?></div>
    </div>
</div>
<script src="__STATIC__/js/jquery/jquery.js"></script>
<script src="__STATIC__/js/jquery/plugins/jquery.tools.min.js"></script>
<script src="__STATIC__/js/jquery/plugins/formvalidator.js"></script>
<script src="__STATIC__/js/ftxia.js"></script>
<script src="__STATIC__/js/admin.js"></script>
<script src="__STATIC__/js/dialog.js"></script>
<script>
//初始化弹窗
(function (d) {
    d['okValue'] = lang.dialog_ok;
    d['cancelValue'] = lang.dialog_cancel;
    d['title'] = lang.dialog_title;
})($.dialog.defaults);
</script>

<?php if(isset($list_table)): ?><script src="__STATIC__/js/jquery/plugins/listTable.js"></script>
<script>
$(function(){
	$('.J_tablelist').listTable();
});
</script><?php endif; ?>
<link rel="stylesheet" href="__STATIC__/js/calendar/calendar-blue.css"/>
<script src="__STATIC__/js/calendar/calendar.js"></script>
<script>
Calendar.setup({
    inputField : "J_time_start",
    ifFormat   : "%Y-%m-%d",
    showsTime  : false,
    timeFormat : "24"
});
Calendar.setup({
    inputField : "J_time_end",
    ifFormat   : "%Y-%m-%d",
    showsTime  : false,
    timeFormat : "24"
});
</script>
</body>
</html>