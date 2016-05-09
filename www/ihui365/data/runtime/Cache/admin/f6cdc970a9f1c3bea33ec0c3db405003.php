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
<form id="info_form" action="<?php echo u('score_item/edit');?>" method="post" enctype="multipart/form-data">
<div class="pad_lr_10">
	<div class="col_tab">
		<ul class="J_tabs tab_but cu_li">
			<li class="current">基本资料</li>
 
		</ul>
		<div class="J_panes">
			<div class="content_list pad_10">
				<table width="100%" cellspacing="0" class="table_form">
					<tr>
						<th width="120"><?php echo L('article_cateid');?> :</th>
						<td>
						<select name="cate_id" id="cate_id">
            			<option value="">--请选择分类--</option>
            			<?php if(is_array($cate_list)): $i = 0; $__LIST__ = $cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>" <?php if($info['cate_id'] == $val['id']): ?>selected="selected"<?php endif; ?>><?php echo ($val["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            			</select>
						</td>
				 
						<th>商品名称 :</th>
						<td>
		                    <input type="text" name="title" id="J_title"class="input-text iColorPicker" size="60" value="<?php echo ($info["title"]); ?>">
		                </td>
					</tr>
		            <tr>
						<th><?php echo L('article_img');?> :</th>
						<td>
                        <?php if(!empty($info["img"])): ?><span class="attachment_icon J_attachment_icon" file-type="image" file-rel="<?php echo attach($info['img'], 'score_item');?>">
                        <img src="<?php echo attach($info['img'], 'score_item');?>" style="width:100px; height:100px;" /></span><?php endif; ?><br />
                        <input type="file" name="img" class="input-text"  style="width:200px;" />
                        </td>
		 			 
						<th>淘宝网IID :</th>
						<td><input type="text" name="num_iid" id="num_iid" class="input-text" value="<?php echo ($info["num_iid"]); ?>" size="10" style="width:200px;" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" onafterpaste="this.value=this.value.replace(/[^0-9.]/g,'')"></td>
					</tr>
					<tr>
						<th>原价 :</th>
						<td><input type="text" name="price" id="price" class="input-text" value="<?php echo ($info["price"]); ?>" size="10" style="width:200px;"  onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" onafterpaste="this.value=this.value.replace(/[^0-9.]/g,'')"></td>
					 
						<th>折扣价 :</th>
						<td><input type="text" name="coupon_price" id="coupon_price" class="input-text" value="<?php echo ($info["coupon_price"]); ?>" size="10" style="width:200px;"  onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" onafterpaste="this.value=this.value.replace(/[^0-9.]/g,'')"></td>
					</tr>
					<tr>
						<th>所需积分 :</th>
						<td><input type="text" name="score" id="score" class="input-text" value="<?php echo ($info["score"]); ?>" size="10" style="width:200px;"  onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" onafterpaste="this.value=this.value.replace(/[^0-9.]/g,'')"></td>
					 
						<th>库存 :</th>
						<td><input type="text" name="stock" id="stock" class="input-text" value="<?php echo ($info["stock"]); ?>" size="10" style="width:200px;"  onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" onafterpaste="this.value=this.value.replace(/[^0-9.]/g,'')"></td>
					</tr>     
					<tr>
						<th>每人限兑换数 :</th>
						<td><input type="text" name="user_num" id="user_num" value="<?php echo ($info["user_num"]); ?>" class="input-text" size="10" style="width:200px;"  onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" onafterpaste="this.value=this.value.replace(/[^0-9.]/g,'')"></td>
					 
						<th>排序值 :</th>
						<td><input type="text" name="ordid" value="<?php echo ($info["ordid"]); ?>" id="ordid" class="input-text" size="10" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" onafterpaste="this.value=this.value.replace(/[^0-9.]/g,'')"></td>
					</tr>
					<tr>
						<th>兑换时间 :</th>
						<td>
							<input type="text" name="start_time" id="start_time" value="<?php echo (date("Y-m-d H:i",$info["start_time"])); ?>" class="date" size="18"> - 
							<input type="text" name="end_time" id="end_time" value="<?php echo (date("Y-m-d H:i",$info["end_time"])); ?>" class="date" size="18">
						 </td>
					</tr>
					<tr>
						<th>推荐理由 :</th>
						<td colspan="4"><textarea name="desc" id="desc" style="width:79%;height:50px;"><?php echo ($info["desc"]); ?></textarea></td>
					</tr>
					<tr>
						<th>宝贝详情 :</th>
						<td colspan="4"><textarea name="info" id="info" style="width:80%;height:300px;visibility:hidden;resize:none;"><?php echo ($info["info"]); ?></textarea></td>
					</tr>
				</table>
			</div>
        </div>
		<div class="mt10"><input type="submit" value="<?php echo L('submit');?>" id="dosubmit" name="dosubmit" class="btn btn_submit" style="margin:0 0 10px 100px;"><br /><br /><br /></div>
	</div>
</div>
<input type="hidden" name="menuid"  value="<?php echo ($menuid); ?>"/>
<input type="hidden" name="id" id="id" value="<?php echo ($info["id"]); ?>" />
</form>
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
<script type="text/javascript" src="__STATIC__/js/calendar/calendar.js"></script>
<script type="text/javascript" src="__STATIC__/js/kindeditor/kindeditor.js"></script>
<script>
$(function() {
	KindEditor.create('#info', {
		uploadJson : '<?php echo U("attachment/editer_upload");?>',
		fileManagerJson : '<?php echo U("attachment/editer_manager");?>',
		allowFileManager : true
	});
});
 
Calendar.setup({
    inputField : "start_time",
    ifFormat   : "%Y-%m-%d %H:%M",
    showsTime  : true,
    timeFormat : "24"
});
Calendar.setup({
    inputField : "end_time",
    ifFormat   : "%Y-%m-%d %H:%M",
    showsTime  : true,
    timeFormat : "24"
});

</script>
</body>
</html>