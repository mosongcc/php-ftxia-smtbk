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
<!--商品列表-->
<div class="subnav">
	<div class="content_menu ib_a blue line_x">
    		<a class="add fb " href="<?php echo U('hiact/setting');?>" ><em>Token设置</em></a>

		<a class="add fb " href="<?php echo U('hiact/index');?>" ><em>采集</em></a>
 
	


	</div>

</div>
<div class="pad_lr_10">
    <form id="J_info_form" action="<?php echo U('hiact/collect');?>" method="post">
    <table width="100%" cellspacing="0" class="table_form">
		<tr>
			<th width="150">鹊桥活动主题 :</th>
			<td><select class="J_tejia_select mr10" data-pid="0" data-uri="<?php echo U('hiact/ajax_getchilds', array('type'=>0));?>"></select></td>
		</tr>
		<tr>
			<th>鹊桥活动ID</th>
			<td><input type="text" name="eventid" id="J_tejia_cate_id" value="" class="input-text"/><div id="J_nickTip" class="onShow">http://temai.taobao.com/preview.htm?id=后面的数字</div></td>
		</tr>
		<tr>
			<th width="150">对应分类 :</th>
			<td><select class="J_cate_select mr10" data-pid="0" data-uri="<?php echo U('items_cate/ajax_getchilds', array('type'=>0));?>"></select></td>
		</tr>

		<tr>
			<th>开始时间 :</th>
			<td><input type="text" name="coupon_start_time" id="coupon_start_time" size="20" class="date"></td>
		</tr>
		<tr>
			<th>结束时间 :</th>
			<td><input type="text" name="coupon_end_time" id="coupon_end_time" size="20" class="date" ></td>
		</tr>


		<tr>
			<th></th>
			<td><input type="submit" value="采集" name="dosubmit" class="smt mr10"> 
			<input type="hidden" name="cate_id" id="J_cate_id" value="0" />
		</form>

		<form name='form_reg' action='http://pub.alimama.com/event/publish.json' method='post' target="_blank" onsubmit="return publish();">  
			<input type='hidden' name='eventId' id="eventid" value=''/>
			<input type='hidden' name='adzoneId' id="adzoneId" value='<?php echo ($adzoneId); ?>'/>
			<input type='hidden' name='siteId' id="siteId" value='<?php echo ($siteId); ?>'/>
			<input type='hidden' name='_tb_token_' id="tb_token" value='<?php echo ($tb_token); ?>'/>  
			<input type="submit" value="注册" name="dosubmit" title="注册后即可在阿里妈妈后台查看推广明细[推广管理-我推广的活动] 点击后有出现推广地址表示注册成功 即可关闭" class="smt mr10">
		</form>
			</td>
		</tr>
    </table>
	
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
function publish(){
	var eventid = $("#J_tejia_cate_id").attr("value");
	var adzoneId = $("#adzoneId").attr("value");
	var siteId = $("#siteId").attr("value");
	var tb_token = $("#tb_token").attr("value");
	$("#eventid").val(eventid);
	if(!eventid){alert('请选择主题');return false;}
	if(!adzoneId){alert('请设置淘点金');return false;}
	if(!siteId){alert('请设置淘点金');return false;}
	if(!tb_token){alert('请设置TOKEN并确保登录阿里妈妈');return false;}
}
$(function(){
    var collect_url = "<?php echo U('hiact/collect');?>";
    $('#J_info_form').ajaxForm({success:complete, dataType:'json'});
    var p = 2;
    function complete(result){
	
        if(result.status == 1){
            $.dialog({id:'cmt_taobao', title:result.msg, content:result.data, padding:'', lock:true});
            p = 2; 
            collect_page();
        } else {
            $.ftxia.tip({content:result.msg, icon:'alert'});
        }
    }
    function collect_page(){
	var eventid = $("#J_tejia_cate_id").attr("value");
	var cate_id = $("#J_cate_id").attr("value");
	var coupon_start_time = $("#coupon_start_time").attr("value");
	var coupon_end_time = $("#coupon_end_time").attr("value");
        $.getJSON(collect_url, {eventid:eventid,cate_id:cate_id,p:p,coupon_start_time:coupon_start_time,coupon_end_time:coupon_end_time}, function(result){
            if(result.status == 1){
                $.dialog.get('cmt_taobao').content(result.data);
                p++; 
                collect_page(p);
            }else{
                $.dialog.get('cmt_taobao').close();
                $.ftxia.tip({content:result.msg});
            }
        });
    }
    //分类联动
    $('.J_tejia_select').tejia_select({field:'J_tejia_cate_id'});
    $('.J_cate_select').cate_select({field:'J_cate_id'});
});
</script>
 <script language="javascript" type="text/javascript">
Calendar.setup({
	inputField     :    "coupon_start_time",
	ifFormat       :    "%Y-%m-%d %H:%M",
	showsTime      :    'true',
	timeFormat     :    "24"
});
</script>
<script language="javascript" type="text/javascript">
Calendar.setup({
	inputField     :    "coupon_end_time",
	ifFormat       :    "%Y-%m-%d %H:%M",
	showsTime      :    'true',
	timeFormat     :    "24"
});
</script>
</body>
</html>