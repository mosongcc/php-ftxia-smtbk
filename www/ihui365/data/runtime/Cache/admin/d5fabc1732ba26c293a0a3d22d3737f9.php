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
<!--其他设置-->
<div class="pad_lr_10">
	<form id="info_form" action="<?php echo u('setting/edit');?>" method="post">
	<table width="100%" class="table_form contentWrap">
 
	<tr>
            <th width="150">首页广告 :</th>
            <td>
                <label><input type="radio" <?php if(C('ftx_ads_pp') == '1'): ?>checked="checked"<?php endif; ?> value="1" name="setting[ads_pp]"> 使用品牌团广告接管有广告</label> &nbsp;&nbsp;
                <label><input type="radio" <?php if(C('ftx_ads_pp') == '0'): ?>checked="checked"<?php endif; ?> value="0" name="setting[ads_pp]"> 使用自定义广告</label>
                <span class="gray ml10">品牌团广告会每天自动更新</span>
            </td>
        </tr>
	 

	<tr>
            <th>QQ :</th>
            <td><input type="text" name="setting[qq]" class="input-text" size="20" value="<?php echo C('ftx_qq');?>"></td>
        </tr>
	<tr>
            <th width="150">QQ特享群 :</th>
            <td><input type="text" name="setting[qq_qun]" size="20" class="input-text" value="<?php echo C('ftx_qq_qun');?>" />&nbsp;&nbsp;<span class="gray">QQ特享群</span></td>
        </tr>
	<tr>
            <th width="150"><?php echo L('kefu_html');?> :</th>
            <td>
                <input type="text" name="setting[kefu_html]" class="input-text" size="80" value="<?php echo C('ftx_kefu_html');?>">
                <span class="gray ml10"><br>前台客服链接：请填写如：http://amos.im.alisoft.com/msg.aw?v=2&uid=你的客服旺旺&site=cntaobao&s=2&charset=utf-8</span>
            </td>
        </tr>

	<tr>
            <th>预告分类ID :</th>
            <td><input type="text" name="setting[cat_yugao]" class="input-text" size="20" value="<?php echo C('ftx_cat_yugao');?>"></td>
        </tr>

	<tr>
            <th>九块九分类ID :</th>
            <td><input type="text" name="setting[cat_jiu]" class="input-text" size="20" value="<?php echo C('ftx_cat_jiu');?>"></td>
        </tr>

	<tr>
            <th>十九块九分类ID :</th>
            <td><input type="text" name="setting[cat_shijiu]" class="input-text" size="20" value="<?php echo C('ftx_cat_shijiu');?>"></td>
        </tr>

	<tr>
            <th>京东购分类ID :</th>
            <td><input type="text" name="setting[cat_jd]" class="input-text" size="20" value="<?php echo C('ftx_cat_jd');?>"></td>
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