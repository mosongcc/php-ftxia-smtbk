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
<h1 class="title_2 line_x">天猫整店采集</h1>
</div>
<div class="pad_lr_10">
	<form id="J_info_form" action="<?php echo U('shop/setting');?>" method="post">
	<table width="100%" cellspacing="0" class="table_form">       
		<tr>
			<th width="150">天猫店铺地址 :</th>
			<td>
				<input name="url" type="text" class="input-text" size="50" />
				<span class="red ml10">必填。如：https://handuyishe.tmall.com/</span>
			</td>
		</tr>
		<tr>
			<th width="150">关键词 :</th>
			<td>
				<input name="q" type="text" class="input-text" size="30" />
				<span class="red ml10">选填，多个关键词用空格隔开。</span>
			</td>
		</tr>
		<tr>
			<th width="150">排序 :</th>
			<td>
				<select name="sort">
					<option value="default">综合</option>
					<option value="hotsell_desc">销量</option>
					<option value="newOn_desc">上新</option>	
					<option value="price_asc">价格从低到高</option>
					<option value="price_desc">价格从高到低</option>
				</select>            
			</td>
		</tr>	
		<tr>
			<th width="150">价格范围 :</th>
			<td>           
				<input type="text" name="sprice" size="5" class="input-text" value=""/> - 
				<input type="text" name="eprice" size="5" class="input-text" value=""/> 
				<span class="gray ml10">可不填，最低价格和最高最高一起设置才有效</span>
			</td>
		</tr>		
		<tr>
			<th>采集页数：</th>
			<td>
			<select name="page">
			<?php for($a=1;$a<=1000;$a++){?>
				<option value="<?php echo $a; ?>" <?php if(100 == $a): ?>selected<?php endif; ?> >采集<?php echo $a; ?>页</option>
			<?php  } ?>
			</select>
			</td>
		</tr>
		<tr>
			<th width="150">入库分类 :</th>
			<td>
				<select class="J_cate_select mr10" data-pid="0" data-uri="<?php echo U('items_cate/ajax_getchilds', array('type'=>0));?>"></select>
				<span class="red ml10">必选，请选择采集后要写入的分类。</span>
			</td>			
		</tr>
		<tr>
			<th>设置开始时间 :</th>
			<td><input type="text" name="coupon_start_time" id="coupon_start_time"  class="date" value="<?php echo $showtime=date("Y-m-d 10:00:00",strtotime("+1 day"));?>"/></td>
		</tr>
		<tr>
			<th>设置结束时间 :</th>
			<td><input type="text" name="coupon_end_time" id="coupon_end_time" class="date" value="<?php echo $now = date('Y-m-d 09:59:59',strtotime('next week')); ?>"/></td>
		</tr>		
		<tr>
			<th></th>
			<td>
				<input type="hidden" name="cate_id" id="J_cate_id" value="0" />	
				<input type="submit" value="开始采集" name="dosubmit" class="smt mr10">
			</td>
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
<script type="text/javascript">

$(function(){
    var collect_url = "<?php echo U('shop/collect');?>";
    $('#J_info_form').ajaxForm({success:complete, dataType:'json'});
    var p = 2;
    function complete(result){
        if(result.status == 1){
            $.dialog({id:'shop', title:result.msg, content:result.data, padding:'', lock:true});
            p = 2;
            collect_page();
        } else {
            $.ftxia.tip({content:result.msg, icon:'alert'});
        }
    }
    function collect_page(){
        $.getJSON(collect_url, {p:p}, function(result){
            if(result.status == 1){
                $.dialog.get('shop').content(result.data);
                p++;
                collect_page(p);
            }else{
                $.dialog.get('shop').close();
                $.ftxia.tip({content:result.msg});
            }
        });
    }
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