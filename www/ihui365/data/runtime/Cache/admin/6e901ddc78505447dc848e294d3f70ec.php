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
<!--邮件服务器设置-->
<div class="common-form">
	<form id="info_form" action="<?php echo u('setting/edit');?>" method="post">
	<table width="100%" class="table_form contentWrap">
    	<tr class="y-bg">
        	<th width="150"><?php echo L('mail_send_mode');?> :</th>
        	<td>
            	<input type="radio" <?php if(C('ftx_mail_server.mode') == 'mail'): ?>checked="checked"<?php endif; ?> value="mail" name="setting[mail_server][mode]"> <?php echo L('mail_function_mode');?> &nbsp;&nbsp;
            	<input type="radio" <?php if(C('ftx_mail_server.mode') == 'smtp'): ?>checked="checked"<?php endif; ?> value="smtp" name="setting[mail_server][mode]"> <?php echo L('smtp_mode');?> &nbsp;&nbsp;<span class="gray"><?php echo L('mail_mode_desc');?></span>
            </td>
    	</tr>
    </table>
    <table width="100%" class="table_form contentWrap">
        <tr>
        	<th width="150"><?php echo L('smtp_host');?> :</th>
        	<td><input type="text" name="setting[mail_server][host]" class="input-text" size="30" value="<?php echo C('ftx_mail_server.host');?>"><span>&nbsp;&nbsp;例:smtp.163.com</span></td>
    	</tr>
        <tr>
        	<th><?php echo L('smtp_port');?> :</th>
        	<td><input type="text" name="setting[mail_server][port]" class="input-text" value="<?php echo C('ftx_mail_server.port');?>" size="30"><span>&nbsp;&nbsp;正常端口为25</span></td>
    	</tr>
        <tr>
        	<th><?php echo L('smtp_from');?> :</th>
        	<td><input type="text" name="setting[mail_server][from]" class="input-text" size="30" value="<?php echo C('ftx_mail_server.from');?>"><span>&nbsp;&nbsp;例:ftxia.com@163.com</span></td>
    	</tr>
        <tr>
        	<th><?php echo L('smtp_auth_username');?> :</th>
        	<td>
            	<input type="text" name="setting[mail_server][auth_username]" class="input-text" size="30" value="<?php echo C('ftx_mail_server.auth_username');?>"><span>&nbsp;&nbsp;例:ftxia.com@163.com</span>
            </td>
    	</tr>
        <tr>
        	<th><?php echo L('smtp_auth_password');?> :</th>
        	<td><input type="password" name="setting[mail_server][auth_password]" class="input-text" size="30" value="<?php echo C('ftx_mail_server.auth_password');?>"></td>
    	</tr>
        <tr>
        	<th><?php echo L('test_email');?> :</th>
        	<td>
            	<input type="text" id="J_email" class="input-text" size="30" value="">
            	<input type="button" id="J_mail_test" value="<?php echo L('send_test_mail');?>" class="btn">
                <span id="J_mail_test_tip">测试之前请先保存设置</span>
		<span>&nbsp;&nbsp;测试失败? <a href="http://bbs.8mob.com/forum.php?mod=viewthread&tid=5696" target="_blank">请点这里查看教程!</a></span>
            </td>
    	</tr>
        <tr>
        	<th></th>
        	<td><input type="hidden" name="menuid"  value="<?php echo ($menuid); ?>"/><input type="submit" class="smt mr10" value="保存"/></td>
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
<script>
$(function(){
    $('#J_mail_test').live('click', function(){
        var email = $('#J_email').val();
        if(email == ''){
            $('#J_mail_test_tip').addClass('red').html('<?php echo L('please_input'); echo L('test_email');?>');
            return false;
        }
        $.getJSON('<?php echo U('setting/ajax_mail_test');?>', {email:email}, function(result){
            if(result.status == 1){
                $('#J_mail_test_tip').removeClass('red').addClass('green').html('<?php echo L('send_test_email_successed');?>');
            }else{
                $('#J_mail_test_tip').addClass('red').html('<?php echo L('send_test_email_failured');?>');
            }
        });
    });
});
</script>
</body>
</html>