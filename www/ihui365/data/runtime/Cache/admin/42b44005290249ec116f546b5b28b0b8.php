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
<script src="__STATIC__/js/jquery/jquery.js"></script>
<script src="__STATIC__/js/ftxia.js"></script>
<script src="__STATIC__/js/admin.js"></script>
<div class="pad_10">
	<div class="clearfix">
		<div class="col-2 fl mr10" style="width:48%">
			<h6>我的个人信息</h6>
			<div class="content">
				您好，<b style="color:#06C"> <?php echo ($my_admin["username"]); ?></b> &nbsp;[超级管理员]<br />
				登录IP： <?php echo ($ip); ?> [ <?php echo ($time); ?>]<br />
				<div class="bk20 hr"><hr /></div>
				<h2>第一次使用? <a href="http://bbs.8mob.com/forum.php?mod=viewthread&tid=5700" target="_blank">点此查看教程</a></h2>
			</div>
		</div>
		<div class="col-2 col-auto">
			<h6>提示建议</h6>
			<div class="content">
				<?php if(!empty($message)): if(is_array($message)): $i = 0; $__LIST__ = $message;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="on<?php echo ($val["type"]); ?>">&nbsp;<?php echo ($val["content"]); ?></div><br /><?php endforeach; endif; else: echo "" ;endif; endif; ?>
			</div>
		</div>
		<div class="bk10"></div>

		<div class="col-2 fl mr10" style="width:48%">
			<h6>商品简报</h6>
			<div class="content"> 
				<span>商品数：<?php echo ($item_total); ?>件</span>、<br />
				过期下架商品：<?php echo ($item_endtime); ?>件、今日新增：<?php echo ($item_today); ?>件、佣金商品：<?php echo ($item_commissioon); ?>件
			</div>
		</div>
		<div class="col-2 col-auto">
			<h6>会员简报</h6>
			<div class="content"> 
			会员总数：<?php echo ($user_total); ?>人、今日新增会员：<?php echo ($user_today); ?>人 <br />
			当前在线：<?php echo ($online_total); ?>人 [会员：<?php echo ($user_online); ?>人、游客：<?php echo ($line_total); ?>人(含蜘蛛)]
			</div>
		</div>
		<div class="bk10"></div>
		<div class="col-2 fl mr10" style="width:48%">
			<h6>系统信息</h6>
			<div class="content">
				<?php echo L('ftxia_version');?>：<font style="color:#090">Ftxia <?php echo ($system_info["ftxia_version"]); ?></font>  <br />
				<?php echo L('server_os');?>：<?php echo ($system_info["server_os"]); ?><br />
				<?php echo L('web_server');?>：<?php echo ($system_info["web_server"]); ?><br />
				<?php echo L('php_version');?>：<?php echo ($system_info["php_version"]); ?><br />
				支持函数：<span class="<?php echo ($system_info["curl"]); ?>"><a href="http://bbs.8mob.com/forum.php?mod=viewthread&tid=4925" target="_blank">远程读取</a></span>
				<span class="onCorrect">编码转换</span>
				<span class="<?php echo ($system_info["zlib"]); ?>">页面压缩</span>
				<span class="<?php echo ($system_info["zip"]); ?>"><a href="http://bbs.8mob.com/forum.php?mod=viewthread&tid=4924" target="_blank">在线更新</a></span>
				<br />
			</div>
		</div>
		<div class="col-2 col-auto">
			<h6>授权信息</h6>
			<div class="content">
				授权类型：<span id="ftx_license_type"><font color="green">正在获取</font></span><br />
				授权域名：<span id="ftx_license_domain"><font color="green">正在获取</font></span><br />
				<div class="bk20 hr"><hr /></div>
				开放平台：<a href="http://www.ftxia.com/" target="_blank">http://www.ftxia.com</a> <br />
				官方论坛：<a href="http://bbs.8mob.com/" target="_blank">http://bbs.8mob.com</a> 
			</div>
		</div>
	</div>
</div>
<script>
	var updateurl = "<?php echo U('upgrade/version');?>";
</script>
<?php echo ($tips_data); ?>
</body>
</html>