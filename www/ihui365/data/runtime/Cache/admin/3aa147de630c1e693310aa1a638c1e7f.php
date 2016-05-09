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
<!--模板样式-->
<div class="subnav">
	<h1 class="title_2 line_x">模板样式设置</h1>
</div>

<div class="pad_lr_10">
<form id="info_form" action="<?php echo u('setting/edit');?>" method="post">
	<table width="100%" class="table_form contentWrap">
		<tr>
			<th width="150">网站宽度 :</th>
			<td>
				<select name="setting[site_width]" id="setting[site_width]">
					<option value="w1100" <?php if(C('ftx_site_width') == 'w1100'): ?>selected="selected"<?php endif; ?>>宽版</option>
					<option value="w980" <?php if(C('ftx_site_width') == 'w980'): ?>selected="selected"<?php endif; ?>>标准版</option>
				</select>
			</td>
		</tr>
		<tr>
			<th width="150">图片尺寸 :</th>
			<td>
				<select name="setting[site_wc]" id="setting[site_wc]">
					<option value="w1100" <?php if(C('ftx_site_wc') == 'w1100'): ?>selected="selected"<?php endif; ?>>宽版-正方形</option>
					<option value="wc1100" <?php if(C('ftx_site_wc') == 'wc1100'): ?>selected="selected"<?php endif; ?>>宽版-长方形</option>
					<option value="w1005" <?php if(C('ftx_site_wc') == 'w1005'): ?>selected="selected"<?php endif; ?>>标准版-正方形</option>
					<option value="wc1005" <?php if(C('ftx_site_wc') == 'wc1005'): ?>selected="selected"<?php endif; ?>>标准版-长方形</option>
				</select>
			</td>
		</tr>


		<tr>
			<th width="150">模版风格 :</th>
			<td>
				<select name="setting[site_style]" id="setting[site_style]">
					<option value="default" <?php if(C('ftx_site_style') == 'default'): ?>selected="selected"<?php endif; ?>>官方默认</option>
					<option value="juanpi" <?php if(C('ftx_site_style') == 'juanpi'): ?>selected="selected"<?php endif; ?>>卷皮风格</option>
					<option value="zhe800" <?php if(C('ftx_site_style') == 'zhe800'): ?>selected="selected"<?php endif; ?>>折800风格</option>
					<option value="jky" <?php if(C('ftx_site_style') == 'jky'): ?>selected="selected"<?php endif; ?>>九块邮风格</option>
				</select>
			</td>
		</tr>
		<tr>
        		<th></th>
        		<td><span class="gray">注意：设置长方形图片 最好网站宽度为标准版的</span></td>
    		</tr>
		<tr>
        		<th></th>
        		<td><input type="hidden" name="menuid"  value="<?php echo ($menuid); ?>"/><input type="submit" class="smt mr10" name="do" value="<?php echo L('submit');?>"/></td>
    		</tr>
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
</body>
</html>