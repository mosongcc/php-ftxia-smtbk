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
<!--文章列表-->
<div class="pad_lr_10" >
    <form name="searchform" method="get" >
    <table width="100%" cellspacing="0" class="search_form">
        <tbody>
        <tr>
            <td>
            <div class="explain_col">
                <input type="hidden" name="g" value="admin" />
                <input type="hidden" name="m" value="dapei" />
                <input type="hidden" name="a" value="index" />
                <input type="hidden" name="menuid" value="<?php echo ($menuid); ?>" />
                <?php echo L('publish_time');?>：
                <input type="text" name="time_start" id="time_start" class="date" size="12" value="<?php echo ($search["time_start"]); ?>">
                -
                <input type="text" name="time_end" id="time_end" class="date" size="12" value="<?php echo ($search["time_end"]); ?>">
                &nbsp;&nbsp;<?php echo L('article_cateid');?>：
                <select class="J_cate_select mr10" data-pid="0" data-uri="<?php echo U('dapei_cate/ajax_getchilds');?>" data-selected="<?php echo ($search["selected_ids"]); ?>"></select>
                <input type="hidden" name="cate_id" id="J_cate_id" value="<?php echo ($search["cate_id"]); ?>" />
                &nbsp;&nbsp;<?php echo L('status');?>:
                <select name="status">
                <option value="">-<?php echo L('all');?>-</option>
                <option value="1" <?php if($search["status"] == '1'): ?>selected="selected"<?php endif; ?>>已审核</option>
                <option value="0" <?php if($search["status"] == '0'): ?>selected="selected"<?php endif; ?>>未审核</option>
                </select>
                &nbsp;&nbsp;<?php echo L('keyword');?> :
                <input name="keyword" type="text" class="input-text" size="25" value="<?php echo ($search["keyword"]); ?>" />
                <input type="submit" name="search" class="btn" value="<?php echo L('search');?>" />
            </div>
            </td>
        </tr>
        </tbody>
    </table>
    </form>

    <div class="J_tablelist table_list" data-acturi="<?php echo U('dapei/ajax_edit');?>">
    <table width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width=25><input type="checkbox" id="checkall_t" class="J_checkall"></th>
                <th width=25><span data-tdtype="order_by" data-field="id">ID</span></th>
				<th width=50><span data-tdtype="order_by" data-field="styleid">搭配ID</span></th>
                <th width=550><span data-tdtype="order_by" data-field="title">主商品标题</span></th>
				<th width=50><span data-tdtype="order_by" data-field="itemnum">数量</span></th>
                <th width=150><span data-tdtype="order_by" data-field="cate_id"><?php echo L('article_cateid');?></span></th>
                <th width=150><?php echo L('author');?></th>				
				<th width=150><span data-tdtype="order_by" data-field="add_time"><?php echo L('publish_time');?></span></th>
                <th width=60><span data-tdtype="order_by" data-field="ordid"><?php echo L('sort_order');?></span></th>
                <th width="40"><span data-tdtype="order_by" data-field="status"><?php echo L('status');?></span></th>
                <th width="80"><?php echo L('operations_manage');?></th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                <td align="center"><input type="checkbox" class="J_checkitem" value="<?php echo ($val["id"]); ?>"></td>
                <td align="center"><?php echo ($val["id"]); ?></td>
				<td align="center"><?php echo ($val["styleid"]); ?></td>
                <td align="center"><span data-tdtype="edit" data-field="title" data-id="<?php echo ($val["id"]); ?>" class="tdedit" style="color:<?php echo ($val["colors"]); ?>;"><?php echo ($val["title"]); ?></span><?php if(!empty($val['pic_url'])): ?><span class="attachment_icon J_attachment_icon" file-type="image" file-rel="<?php echo ($img_dir); echo ($val["pic_url"]); ?>"><img src="__STATIC__/images/filetype/image_s.gif" /></span><?php endif; ?></td>
				<td align="center"><?php echo ($val["itemnum"]); ?></td>
                <td align="center"><b><?php echo ($cate_list[$val['cate_id']]); ?></b></td>
				<td align="center"><b><?php echo ($val['author']); ?></b></td>				
                <td align="center"><?php echo (frienddate($val["add_time"])); ?></td>
                <td align="center"><span data-tdtype="edit" data-field="ordid" data-id="<?php echo ($val["id"]); ?>" class="tdedit"><?php echo ($val["ordid"]); ?></span></td>
                <td align="center"><img data-tdtype="toggle" data-id="<?php echo ($val["id"]); ?>" data-field="status" data-value="<?php echo ($val["status"]); ?>" src="__STATIC__/images/admin/toggle_<?php if($val["status"] == 0): ?>disabled<?php else: ?>enabled<?php endif; ?>.gif" /></td>
                <td align="center"><a href="<?php echo u('dapei/edit', array('id'=>$val['id'], 'menuid'=>$menuid));?>"><?php echo L('edit');?></a> | <a href="javascript:void(0);" class="J_confirmurl" data-acttype="ajax" data-uri="<?php echo u('dapei/delete', array('id'=>$val['id']));?>" data-msg="<?php echo sprintf(L('confirm_delete_one'),$val['title']);?>"><?php echo L('delete');?></a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>

    <div class="btn_wrap_fixed">
        <label class="select_all"><input type="checkbox" name="checkall" class="J_checkall"><?php echo L('select_all');?>/<?php echo L('cancel');?></label>
        <input type="button" class="btn" data-tdtype="batch_action" data-acttype="ajax" data-uri="<?php echo U('dapei/delete');?>" data-name="id" data-msg="<?php echo L('confirm_delete');?>" value="<?php echo L('delete');?>" />
        <div id="pages"><?php echo ($page); ?></div>
    </div>

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
<link rel="stylesheet" type="text/css" href="__STATIC__/js/calendar/calendar-blue.css"/>
<script src="__STATIC__/js/calendar/calendar.js"></script>
<script>
$('.J_cate_select').cate_select({top_option:lang.all});
Calendar.setup({
    inputField : "time_start",
    ifFormat   : "%Y-%m-%d",
    showsTime  : false,
    timeFormat : "24"
});
Calendar.setup({
    inputField : "time_end",
    ifFormat   : "%Y-%m-%d",
    showsTime  : false,
    timeFormat : "24"
});
</script>
</body>
</html>