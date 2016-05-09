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
    <h1 class="title_2 line_x">一键延时 - 请选择相应的想要延时时间！</h1>
</div>
<div class="pad_lr_10" >


			<form action="<?php echo u('items/key_addtime');?>" method="post" name="searchform" id="info_form">
                <table width="100%" cellspacing="0" class="table_form">
				<tbody>
	                <tr>
						<th width="120">延时24小时:</th>
						<td> 
							<input type="hidden" name="action" value="aday" />
							<input type="submit" name="dosubmit" class="smt mr10" value="延时提交" id="dosubmit"/>
							 
						</td>
					</tr>
				</tbody>
                </table>           
			</form>

			<form action="<?php echo u('items/key_addtime');?>" method="post" name="searchform" id="info_form">
                <table width="100%" cellspacing="0" class="table_form">
				<tbody>
	                <tr>
						<th width="120">延时48小时:</th>
						<td> 
							<input type="hidden" name="action" value=" twday" />
							<input type="submit" name="dosubmit" class="smt mr10" value="延时提交" id="dosubmit"/>
						 
						</td>
					</tr>
				</tbody>
                </table>           
			</form>

			<form action="<?php echo u('items/key_addtime');?>" method="post" name="searchform" id="info_form">
                <table width="100%" cellspacing="0" class="table_form">
				<tbody>
	                <tr>
						<th width="120">延时72小时:</th>
						<td> 
							<input type="hidden" name="action" value="trday" />
							<input type="submit" name="dosubmit" class="smt mr10" value="延时提交" id="dosubmit"/>
							 
						</td>
					</tr>
				</tbody>
                </table>           
			</form>

			<form action="<?php echo u('items/key_addtime');?>" method="post" name="searchform" id="info_form">
                <table width="100%" cellspacing="0" class="table_form">
				<tbody>
	                <tr>
						<th width="120">自主延时时间:</th>
						<td> 
							<input type="text" name="times" size="15" class="input-text" value="72" /> 小时
						</td>
					</tr>
					<tr>
						<th width="120"> </th>
						<td> 
							<input type="hidden" name="action" value="mytime" />
							<input type="submit" name="dosubmit" class="smt mr10" value="自主延时提交" id="dosubmit"/>
						</td>
					</tr>
				</tbody>
                </table>           
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
</body></html>