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
<!--添加商品-->
<div class="subnav">
    <h1 class="title_2 line_x">添加商品</h1>
</div>
<link rel="stylesheet" type="text/css" href="__STATIC__/js/calendar/calendar-blue.css"/>
<script type="text/javascript" src="__STATIC__/js/calendar/calendar.js"></script>
<form id="info_form" action="<?php echo u('items/add');?>" method="post" enctype="multipart/form-data">
<div class="pad_lr_10">
	<div class="col_tab">
		<ul class="J_tabs tab_but cu_li">
			<li class="current">基本信息</li>
			<li>SEO设置</li>
		</ul>
		<div class="J_panes">
        <div class="content_list pad_10">
		<table width="100%" cellpadding="2" cellspacing="1" class="table_form">

			<tr>
				<th width="80">宝贝链接：</th>
				<td colspan="6">
					<input type="text" id="good_link" name="link" class="input-text" size="50" >
					<input type="button" value="一键采集" id="J_get_info" name="click_url_btn" class="btn">
					<p id="good_link_error" style="display:none;" class="onError">错误</p>
				</td>
			</tr>
			<tr>
				<th width="80">所属分类 :</th>
				<td><select class="J_cate_select mr10" data-pid="0" data-uri="<?php echo U('items_cate/ajax_getchilds', array('type'=>0));?>" data-selected=""></select><input type="hidden" name="cate_id" id="J_cate_id" value="" /></td>
				<th>IID :</th>
				<td>
					<input type="text" name="num_iid" id="J_num_iid" class="input-text" size="20" >
					<input type="button" value="随机" id="J_rand" name="rand_btn" class="btn">
				</td>
				<th> &nbsp;</th>
				<td> &nbsp;</td>
			</tr>

			<tr>
				<th width="80">掌柜旺旺 :</th>
				<td><input type="text" name="nick" id="J_nick" class="input-text" size="20" value="<?php echo ($info["nick"]); ?>"></td>
				<th>sellerId :</th>
				<td>
					<input type="text" name="sellerId" id="J_sellerId" class="input-text" size="20" >
				</td>
				<th> &nbsp;</th>
				<td> &nbsp;</td>
			</tr>

			<tr>
				<th>商品名称 :</th>
				<td><input type="text" name="title" id="J_title" class="input-text" size="40" ></td>
				<th>商品标签 :</th>
				<td>
					<input type="text" name="tags" id="J_tags" class="input-text" size="30" >
					<input type="button" value="<?php echo L('auto_get');?>" id="J_gettags" name="tags_btn" class="btn">
				</td>
				<th>商品来源 :</th>
				<td>
					<select name="shop_type" id="shop_type">
					<?php if(is_array($orig_list)): $i = 0; $__LIST__ = $orig_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["type"]); ?>"><?php echo ($val["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            				</select>
				</td>
			</tr>
			<tr>
				<th width="80">商品价格 :</th>
				<td width="30%"><input type="text" name="price" id="J_price"size="10" class="input-text" > 元</td>
				<th>秒杀价格 :</th>
				<td><input type="text" name="coupon_price" id="coupon_price" size="10" class="input-text" > 元</td>
				<th>手机端价 :</th>
				<td><input type="text" name="mcoupon_price" id="mcoupon_price" size="10" class="input-text" > 元</td>
			</tr>
			<tr>
				<th>30天销量 :</th>
				<td><input type="text" name="volume" id="volume" class="input-text" size="10" ></td> 
				<th>点击量 :</th>
				<td><input type="text" name="hits" id="hits" class="input-text" size="10" value="<?php echo ($info["hits"]); ?>"></td>
				<th>是否包邮 :</th>
				<td>
					<select name="ems" id="ems">
						<option value="0">不包邮</option>
						<option value="1">包邮</option>
					</select>				  
				</td>
			</tr>
			<tr>
				<th>开始时间 :</th>
				<td><input type="text" name="coupon_start_time" id="coupon_start_time" size="20" class="date"></td>
			 
				<th>结束时间 :</th>
				<td><input type="text" name="coupon_end_time" id="coupon_end_time" size="20" class="date" ></td>
			</tr>
			<tr>
				<th>正方形图片 :</th>
				<td colspan="3">
					<input type="text" name="pic_url" class="input-text"  id="J_pic_url" size="50">
					<div id="J_pic_upload" class="upload_btn"><span><?php echo L('upload');?></span></div>
				</td>
				<th>长方形图片 :</th>
				<td colspan="3">
					<input type="text" name="pic_urls" class="input-text"  id="J_pic_urls" size="50">
					<div id="J_pics_upload" class="upload_btn"><span><?php echo L('upload');?></span></div>
				</td>
			</tr>
			<tr>
				<th></th>
				<td><img id="J_pic_url_img"  width="200"  ><br /></notempty></td>
				<th></th>
				<td><img id="J_pic_url_imgs"  width="200"  ><br /></notempty></td>
			</tr>

			<tr>
				<th>推广链接 :</th>
				<td colspan="6">
                			<input type="text" name="click_url" id="J_click_url" class="input-text" size="100" value="<?php echo ($info["click_url"]); ?>">
				</td>
			</tr>
			<tr>
				<th>商品简介 :</th>
				<td colspan="6"><textarea name="intro" id="J_intro" cols="60" rows="3"></textarea></td>
			</tr>
			<tr>
				<th>商品详情 :</th>
				<td colspan="6"><textarea name="desc" id="desc" style="width:80%;height:300px;visibility:hidden;resize:none;"></textarea></td>
			</tr>
 

		</table>
		</div>


 
		<div class="content_list pad_10 hidden">
		<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
			<tr>
				<th width="120"><?php echo L('seo_title');?> :</th>
 				<td><input type="text" name="seo_title" class="input-text" size="60" value="<?php echo ($info["seo_title"]); ?>"></td>
			</tr>
			<tr>
				<th><?php echo L('seo_keys');?> :</th>
				<td><input type="text" name="seo_keys" class="input-text" size="60" value="<?php echo ($info["seo_keys"]); ?>"></td>
			</tr>
			<tr>
				<th><?php echo L('seo_desc');?> :</th>
				<td><textarea name="seo_desc" cols="80" rows="8"><?php echo ($info["seo_desc"]); ?></textarea></td>
			</tr>
		</table>
		</div>
        
        </div>
		<div class="mt10"><input type="submit" value="<?php echo L('submit');?>" id="dosubmit" name="dosubmit" class="smt mr10" style="margin:0 0 10px 150px;"></div>
	</div>
</div>
<input type="hidden" name="menuid"  value="<?php echo ($menuid); ?>"/>
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
<script src="__STATIC__/js/fileuploader.js"></script>
<script type="text/javascript" src="__STATIC__/js/kindeditor/kindeditor.js"></script>
<script type="text/javascript">
$(function() {
	KindEditor.create('#desc', {
		allowFileManager : true
	});
});

$('.J_cate_select').cate_select('请选择');
$(function() { 	

	var upload = new qq.FileUploaderBasic({
		allowedExtensions: ['jpg','gif','png'],
		button: document.getElementById('J_pic_upload'),
		multiple: false,
		action: "<?php echo U('items/ajax_upload');?>",
		inputName: 'img',
		forceMultipart: true, //用$_FILES
		messages: {
			typeError: lang.upload_type_error,
			sizeError: lang.upload_size_error,
			minSizeError: lang.upload_minsize_error,
			emptyError: lang.upload_empty_error,
			noFilesError: lang.upload_nofile_error,
			onLeave: lang.upload_onLeave
		},
		showMessage: function(message){
			$.ftxia.tip({content:message, icon:'error'});
		},
		onSubmit: function(id, fileName){
			$('#J_pic_upload').addClass('btn_disabled').find('span').text(lang.uploading);
		},
		onComplete: function(id, fileName, result){
			$('#J_pic_upload').removeClass('btn_disabled').find('span').text(lang.upload);
			if(result.status == '1'){
				$('#J_pic_url_img').attr('src',result.data);
				$('#J_pic_url').val(result.data);
			}else{
				$.ftxia.tip({content:result.msg, icon:'error'});
			}
		}
	});


	var uploads = new qq.FileUploaderBasic({
		allowedExtensions: ['jpg','gif','png'],
		button: document.getElementById('J_pics_upload'),
		multiple: false,
		action: "<?php echo U('items/ajax_upload');?>",
		inputName: 'img',
		forceMultipart: true, //用$_FILES
		messages: {
			typeError: lang.upload_type_error,
			sizeError: lang.upload_size_error,
			minSizeError: lang.upload_minsize_error,
			emptyError: lang.upload_empty_error,
			noFilesError: lang.upload_nofile_error,
			onLeave: lang.upload_onLeave
		},
		showMessage: function(message){
			$.ftxia.tip({content:message, icon:'error'});
		},
		onSubmit: function(id, fileName){
			$('#J_pics_upload').addClass('btn_disabled').find('span').text(lang.uploading);
		},
		onComplete: function(id, fileName, result){
			$('#J_pics_upload').removeClass('btn_disabled').find('span').text(lang.upload);
			if(result.status == '1'){
				$('#J_pic_url_imgs').attr('src',result.data);
				$('#J_pic_urls').val(result.data);
			}else{
				$.ftxia.tip({content:result.msg, icon:'error'});
			}
		}
	});



	$('ul.J_tabs').tabs('div.J_panes > div');
	//自动获取标签
	$('#J_gettags').live('click', function() {
		var title = $.trim($('#J_title').val());
		if(title == ''){
			$.ftxia.tip({content:lang.article_title_isempty, icon:'alert'});
			return false;
		}
		$.getJSON('<?php echo U("items/ajax_gettags");?>', {title:title}, function(result){
			if(result.status == 1){
				$('#J_tags').val(result.data);
			}else{
				$.ftxia.tip({content:result.msg});
			}
		});
	});


	$('#J_rand').live('click', function() {
		$.getJSON('<?php echo U("items/ajax_time");?>' , function(result){
			if(result.status == 1){
				$('#J_num_iid').val(result.data);
			}else{
				$.ftxia.tip({content:result.msg});
			}
		});
	});


	$('#J_getclick_url').live('click', function() {
		var iid = $.trim($('#J_num_iid').val());
		if(iid == ''){
			$.ftxia.tip({content:lang.iid_empty, icon:'alert'});
			return false;
		}
		$.getJSON('<?php echo U("items/ajax_getclick_url");?>', {iid:iid}, function(result){
			if(result.status == 1){
				$('#J_click_url').val(result.data);
			}else{
				$.ftxia.tip({content:result.msg});
			}
		});
	});
	$.formValidator.initConfig({formid:"info_form",autotip:true});
	$("#good_link").formValidator({onshow:'请填写宝贝链接',onfocus:'请填写宝贝链接'}).inputValidator({min:1,onerror:'请填写宝贝链接'});
	$("#J_title").formValidator({onshow:'请填写商品名称',onfocus:'请填写商品名称'}).inputValidator({min:1,onerror:'请填写商品名称'});
	$("#J_num_iid").formValidator({onshow:"请填写iid",onfocus:"请填写iid",oncorrect:"填写正确",onempty:"请填写iid"}).inputValidator({min:6,max:13,onerror:"iid应该为6-13位之间的数字"});
	$("#J_price").formValidator({onshow:"请填写原价",onfocus:"请填写价格",oncorrect:"填写正确",onempty:"请填写价格"}).inputValidator({min:1,max:100,onerror:"请正确填写价格"});
	$("#J_pic_url").formValidator({onshow:"请填写宝贝地址",onfocus:"请填写宝贝地址",oncorrect:"填写正确",onempty:"请填写宝贝地址"}).inputValidator({min:50,onerror:"请正确填写宝贝地址"});

	$("#coupon_price").formValidator({onshow:"请填写秒杀价",onfocus:"请填写秒杀价",oncorrect:"填写正确",onempty:"请填写秒杀价"}).inputValidator({min:1,max:100,onerror:"请填写秒杀价"});
	$("#coupon_start_time").formValidator({onshow:"请选择秒杀开始时间",onfocus:"请选择秒杀开始时间",oncorrect:"填写正确",onempty:"请填写秒杀开始时间"}).inputValidator({min:15,max:30,onerror:"请正确选择秒杀开始时间"});
	$("#coupon_end_time").formValidator({onshow:"请选择秒杀结束时间",onfocus:"请选择秒杀开结束时间",oncorrect:"填写正确",onempty:"请填写秒杀开结束时间"}).inputValidator({min:15,max:30,onerror:"请正确选择秒杀开结束时间"});
	$("#J_nick").formValidator({onshow:"请填写掌柜",onfocus:"请填写掌柜",oncorrect:"填写正确",onempty:"请填写标题"}).inputValidator({min:3,max:100,onerror:"请正确填写掌柜"});


	var collect_url = "<?php echo U('items/ajaxgetid');?>";
	$("#good_link").focusout(function() {
		var link = $("#good_link").val();
		if (link != '') {
			$.getJSON(collect_url, {url:link}, function(result){
				if(result.status == 1){
					$('#J_num_iid').val(result.data.item.num_iid);
					$('#J_sellerId').val(result.data.item.sellerId);
					$('#J_click_url').val(result.data.click_url);
					$('#J_title').val(result.data.item.title);
					$('#J_intro').val(result.data.item.title);
					$('#J_price').val(result.data.item.price);
					$('#ems').val(result.data.item.ems);
					$('#J_nick').val(result.data.item.nick);
					$('#J_pic_url').val(result.data.item.pic_url);
					$('#J_pic_url_img').attr('src',result.data.item.pic_url);
					$('#volume').val(result.data.item.volume);
					$('#coupon_price').val(result.data.item.coupon_price);
					$('#coupon_start_time').val(result.data.item.coupon_start_time);
					$('#coupon_end_time').val(result.data.item.coupon_end_time);
					$('#shop_type').val(result.data.item.tmall);
					$('#good_link_error').hide();
					$.getJSON('<?php echo U("items/ajax_gettags");?>', {title:result.data.item.title}, function(result){
						if(result.status == 1){
							$('#J_tags').val(result.data);
						}else{
							$.ftxia.tip({content:result.msg});
						}
					});


				}else if(result.status == 0){
					$('#good_link_error').show().html(result.msg);
				}
			});
		}
	});

	$('#J_get_info').live('click', function() {
		var link = $("#good_link").val();
		if (link != '') {
			$.getJSON(collect_url, {url:link}, function(result){
				if(result.status == 1){
					$('#J_num_iid').val(result.data.item.num_iid);
					$('#J_click_url').val(result.data.click_url);
					$('#J_title').val(result.data.item.title);
					$('#J_intro').val(result.data.item.title);
					$('#J_price').val(result.data.item.price);
					$('#J_nick').val(result.data.item.nick);
					$('#J_pic_url').val(result.data.item.pic_url);
					$('#J_pic_url_img').attr('src',result.data.item.pic_url);
					$('#volume').val(result.data.item.volume);
					$('#coupon_price').val(result.data.item.coupon_price);
					$('#coupon_start_time').val(result.data.item.coupon_start_time);
					$('#coupon_end_time').val(result.data.item.coupon_end_time);
					$('#good_link_error').hide();
				}else if(result.status == 0){
					$('#good_link_error').show().html(result.msg);
				}
			});
		}
	});


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