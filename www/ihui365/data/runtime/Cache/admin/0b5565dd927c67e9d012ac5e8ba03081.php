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
<link rel="stylesheet" type="text/css" href="__STATIC__/js/calendar/calendar-blue.css"/>
<script type="text/javascript" src="__STATIC__/js/calendar/calendar.js"></script>

<div class="subnav">
    <h1 class="title_2 line_x">清空所有宝贝(<font color="red">新</font>)</h1>
</div>
<div class="pad_lr_10" >
<form action="<?php echo u('items/clear');?>" method="post" name="searchform" id="info_form">
	<table width="100%" cellspacing="0" class="table_form">
		<tbody>
			<tr>
				<th>确认删除：</th>
				<td>
					<input name="isok" type="checkbox" class="input-text" value="1" />&nbsp;&nbsp;<font color=red>(注：确认是否要删除，删除的数据不可恢复！)</font> 
				</td>
			</tr>
	                <tr>
				<th width="120">清空所有宝贝:</th>
				<td>
					<input type="hidden" name="action" value="clear" />
					<input type="submit" name="dosubmit" class="smt mr10" value="清空" id="dosubmit"/>
				</td>
			</tr>
		</tbody>
	</table>           
</form>
</div>

<div class="subnav">
    <h1 class="title_2 line_x">清空已过期宝贝</h1>
</div>
<div class="pad_lr_10" >
<form action="<?php echo u('items/clear');?>" method="post" name="searchform" id="info_form">
	<table width="100%" cellspacing="0" class="table_form">
		<tbody>
			<tr>
				<th>确认删除：</th>
				<td>
					<input name="isok" type="checkbox" class="input-text" value="1" />&nbsp;&nbsp;<font color=red>(注：确认是否要删除，删除的数据不可恢复！)</font> 
				</td>
			</tr>
	                <tr>
				<th width="120">清空已过期宝贝:</th>
				<td>
					<input type="hidden" name="action" value="outtime" />
					<input type="submit" name="dosubmit" class="smt mr10" value="清空" id="dosubmit"/>
				</td>
			</tr>
		</tbody>
	</table>           
</form>
</div>

<div class="subnav">
    <h1 class="title_2 line_x">清空未审核宝贝</h1>
</div>
<div class="pad_lr_10" >
<form action="<?php echo u('items/clear');?>" method="post" name="searchform" id="info_form">
	<table width="100%" cellspacing="0" class="table_form">
		<tbody>
			<tr>
				<th>确认删除：</th>
				<td>
					<input name="isok" type="checkbox" class="input-text" value="1" />&nbsp;&nbsp;<font color=red>(注：确认是否要删除，删除的数据不可恢复！)</font> 
				</td>
			</tr>
	                <tr>
				<th width="120">清空未审核宝贝:</th>
				<td> 
					<input type="hidden" name="action" value="notpass" />
					<input type="submit" name="dosubmit" class="smt mr10" value="清空" id="dosubmit"/>
				</td>
			</tr>
		</tbody>
	</table>           
</form>
</div>

<div class="subnav">
    <h1 class="title_2 line_x">条件删除</h1>
</div>
<div class="pad_lr_10" >
<form action="<?php echo u('items/delete_search');?>" method="post" name="searchform" id="info_form">
	<table width="100%" cellspacing="0" class="table_form">
		<tbody>
			<tr>
				<th width="120">活动结束时间：</th>
				<td>
					<input type="text" name="time_start" id="time_start" class="date" size="12" value="<?php echo ($time_start); ?>">
					-
					<input type="text" name="time_end" id="time_end" class="date" size="12" value="<?php echo ($time_end); ?>">
				</td>
			</tr>
			<tr>
				<th>商品分类：：</th>
				<td>
					<select class="J_cate_select mr10" data-pid="0" data-uri="<?php echo U('items_cate/ajax_getchilds');?>" data-selected=""></select><input type="hidden" name="cate_id" id="J_cate_id" value="" />
				</td>
			</tr>
	                <tr>
				<th>审核状态：</th>
				<td>
					<select name="status">
						<option value="" selected>-所有状态-</option>
						<option value="1">已审核</option>
						<option value="0">未审核</option>
					</select>
				</td>
			</tr>
	                <tr>
				<th>关 键 字：</th>
				<td><input name="keyword" type="text" class="input-text" size="25" value="<?php echo ($keyword); ?>" /></td>
			</tr>
	                <tr>
				<th>活动价格范围：</th>
				<td>
					<input type="text" name="min_price" size="5" class="input-text" value="<?php echo ($min_price); ?>" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" onafterpaste="this.value=this.value.replace(/[^0-9.]/g,'')" />&nbsp;-&nbsp;<input type="text" name="max_price" size="5" class="input-text" value="<?php echo ($max_price); ?>" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" onafterpaste="this.value=this.value.replace(/[^0-9.]/g,'')" />&nbsp;元
				</td>
			</tr>
	                <tr>
				<th>确认删除：</th>
				<td>
					<input name="isok" type="checkbox" class="input-text" value="1" />&nbsp;&nbsp;<font color=red>(注：确认是否要删除，删除的数据不可恢复！)</font> 
				</td>
			</tr>
		</tbody>
	</table>
	<div class="mt10"><input type="submit" name="dosubmit" class="smt mr10" value="删除" id="dosubmit"/></div>
</form>
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
<script language="javascript" type="text/javascript">
	Calendar.setup({
		inputField     :    "time_start",
		ifFormat       :    "%Y-%m-%d",
		showsTime      :    'true',
		timeFormat     :    "24"
	});
	Calendar.setup({
		inputField     :    "time_end",
		ifFormat       :    "%Y-%m-%d",
		showsTime      :    'true',
		timeFormat     :    "24"
	});

$('.J_cate_select').cate_select('请选择');
</script>
</body>
</html>