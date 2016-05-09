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
<div class="subnav">
	<div class="content_menu ib_a blue line_x">
    		<a class="add fb " href="<?php echo U('setting/aitaobao');?>"><em>穿衣搭配设置</em></a>
		<a class="add fb " href="<?php echo U('dapeicaiji/index');?>"><em>搭配采集</em></a>
	</div>
</div>
<div class="subnav">
	<h1 class="title_2 line_x">爱淘宝穿衣搭配采集器</h1>
</div>
<div class="pad_lr_10">
    <form id="J_info_form" action="<?php echo U('dapeicaiji/setting');?>" method="post">
    <table width="100%" cellspacing="0" class="table_form">
	<tr>
		<th width="150">穿衣搭配目录 :</th>
		<td>
			<select name="cat">
				<option value="0">全部</option>
				<option value="3001">日韩</option>
				<option value="3002">欧美</option>
				<option value="3003">复古</option>
				<option value="3004">学院</option>
				<option value="3005">休闲</option>
				<option value="3006">潮品</option>
				<option value="3007">清新</option>
				<option value="3008">甜美</option>
				<option value="3009">BF风</option>
				<option value="3010">轻熟</option>
				<option value="3023">明星</option>
			</select>
		</td>
	</tr>
	<tr>
		<th width="150">入库分类 :</th>
		<td>
			<select class="J_cate_select mr10" data-pid="0" data-uri="<?php echo U('dapei_cate/ajax_getchilds', array('type'=>0));?>"></select>
			<span class="red ml10">请选择采集后要写入的分类。</span>
		</td>			
        </tr>
	<tr>
		<th width="150">每页采集数量 :</th>
		<td>
			<input name="num" type="text" class="input-text" size="8" value="30"/>
			<span class="red ml10">数量越小采集速度越快，第一次采集建议设置120 以后更新只需要30即可，最多120个！</span>
		</td>
	</tr>
        <tr>
		<th></th>
		<td><input type="submit" value="开始采集" name="dosubmit" class="smt mr10"></td>
	</tr>
    </table>
    <input type="hidden" name="cate_id" id="J_cate_id" value="0" />	
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
    var collect_url = "<?php echo U('dapeicaiji/collect');?>";
    $('#J_info_form').ajaxForm({success:complete, dataType:'json'});
    var p = 2;
    function complete(result){
        if(result.status == 1){
            $.dialog({id:'dapeicaiji', title:result.msg, content:result.data, padding:'', lock:true});
            p = 2;
            collect_page();
        } else {
            $.ftxia.tip({content:result.msg, icon:'alert'});
        }
    }
    function collect_page(){
        $.getJSON(collect_url, {p:p}, function(result){
            if(result.status == 1){
                $.dialog.get('dapeicaiji').content(result.data);
                p++;
                collect_page(p);
            }else{
                $.dialog.get('dapeicaiji').close();
                $.ftxia.tip({content:result.msg});
            }
        });
    }
    $('.J_cate_select').cate_select({field:'J_cate_id'});
});
</script>
</body>
</html>