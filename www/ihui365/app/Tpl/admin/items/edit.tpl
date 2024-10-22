<include file="public:header" />
<link rel="stylesheet" type="text/css" href="__STATIC__/js/calendar/calendar-blue.css"/>
<script type="text/javascript" src="__STATIC__/js/calendar/calendar.js"></script>
<form id="info_form" action="{:u('items/edit')}" method="post" enctype="multipart/form-data">
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
				<th width="80">所属分类 :</th>
				<td><select class="J_cate_select mr10" data-pid="0" data-uri="{:U('items_cate/ajax_getchilds', array('type'=>0))}" data-selected="{$selected_ids}"></select>
				<input type="hidden" name="cate_id" id="J_cate_id" value="{$info.cate_id}" /></td>
				<th>IID :</th>
				<td><input type="text" name="num_iid" id="J_num_iid" class="input-text" size="20" value="{$info.num_iid}"></td>
				<th> </th>
				<td> </td>
			</tr>
			<tr>
				<th width="80">掌柜旺旺 :</th>
				<td><input type="text" name="nick" id="nick" class="input-text" size="20" value="{$info.nick}"></td>
				<th>sellerId :</th>
				<td><input type="text" name="sellerId" id="J_sellerId" class="input-text" size="20" value="{$info.sellerId}"></td>
				<th> </th>
				<td> </td>
			</tr>
			<tr>
				<th>商品名称 :</th>
				<td><input type="text" name="title" id="J_title" class="input-text" size="40" value="{$info.title}"></td>
				<th>商品标签 :</th>
				<td><input type="text" name="tags" id="J_tags" class="input-text" size="30" value="{$info.tags}"><input type="button" value="{:L('auto_get')}" id="J_gettags" name="tags_btn" class="btn"></td>
				<th>商品来源 :</th>
				<td>
					<select name="shop_type" id="shop_type">
						<volist name="orig_list" id="val">
						<option value="{$val.type}" <if condition="$info['shop_type'] eq $val['type']">selected="selected"</if>>{$val.name}</option>
						</volist>
					</select>
				</td>
			</tr>
			<tr>
				<th width="80">商品价格 :</th>
				<td width="30%"><input type="text" name="price" size="10" class="input-text" value="{$info.price}"> 元</td>
				<th>秒杀价格 :</th>
				<td><input type="text" name="coupon_price" size="10" class="input-text" value="{$info.coupon_price}"> 元</td>
				<th>折扣比率 :</th>
				<td><input type="text" name="coupon_rate" id="coupon_rate" class="input-text" size="10" value="{$info.coupon_rate}">1000就是1折</td>
			</tr>
			<tr>
				<th>30天销量 :</th>
				<td><input type="text" name="volume" id="volume" class="input-text" size="10" value="{$info.volume}"></td>
				<th>点击量 :</th>
				<td><input type="text" name="hits" id="hits" class="input-text" size="10" value="{$info.hits}"></td>
				<th>是否包邮 :</th>
				<td>
					<select name="ems" id="ems">
						<option value="0" <if condition="$info['ems'] eq 0">selected="selected"</if>>不包邮</option>
						<option value="1" <if condition="$info['ems'] eq 1">selected="selected"</if>>包邮</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>开始时间 :</th>
				<td><input type="text" name="coupon_start_time" id="coupon_start_time" size="20" class="date" value="{$info.coupon_start_time|date="Y-m-d H:i",###}"></td>
				<th>结束时间 :</th>
				<td><input type="text" name="coupon_end_time" id="coupon_end_time" size="20" class="date" value="{$info.coupon_end_time|date="Y-m-d H:i",###}"></td>
				<th>在售状态 :</th>
				<td>
					<select name="status" id="status">
						<option value="underway" <if condition="$info['status'] eq 'underway'">selected="selected"</if>>上架/出售中</option>
						<option value="sellout" <if condition="$info['status'] eq 'sellout'">selected="selected"</if>>卖光/下架</option>
						<option value="fail" <if condition="$info['status'] eq 'fail'">selected="selected"</if>>未审核通过</option>
					</select>
				</td>
			</tr>



			<tr>
				<th>30天支出佣金 :</th>
				<td><input type="text" name="totalfee" id="totalfee" class="input-text" size="10" value="{$info.totalfee}">元</td>
				<th>30天推广量 :</th>
				<td><input type="text" name="totalnum" id="totalnum" class="input-text" size="10" value="{$info.totalnum}"></td>
				<th>佣金 :</th>
				<td><input type="text" name="commission" id="commission" class="input-text" size="10" value="{$info.commission}">元</td>
			</tr>




			<tr>
				<th>正方形图片 :</th>
				<td>
					<input type="text" name="pic_url" class="input-text" size="50" value="{$info.pic_url}" id="J_pic_url">
					<div id="J_pic_upload" class="upload_btn"><span>{:L('upload')}</span></div>
				</td>
				<th>长方形图片 :</th>
				<td>
					<input type="text" name="pic_urls" class="input-text" size="50" value="{$info.pic_urls}" id="J_pic_urls">
					<div id="J_pics_upload" class="upload_btn"><span>{:L('upload')}</span></div>
				</td>
				<th>佣金比率 :</th>
				<td><input type="text" name="commission_rate" id="commission_rate" class="input-text" size="10" value="{$info.commission_rate}"></td>
			</tr>
			<tr>
				<th></th>
				<td><notempty name="info['pic_url']"> <img src="{:attach(get_thumb($info['pic_url'], '_m'), 'item')}"  width="250" id="J_pic_url_img"/></notempty><br /></td>
				<th></th>
				<td><notempty name="info['pic_urls']"><img src="{:attach(get_thumb($info['pic_urls'], '_m'), 'item')}" width="250" id="J_pic_url_imgs"/></notempty><br /></td>
			</tr>
			<tr>
				<th>推广链接 :</th>
				<td colspan="6">
                			<input type="text" name="click_url" id="J_click_url" class="input-text" size="100" value="{$info.click_url}">
				</td>
			</tr>
			<tr>
				<th>商品简介 :</th>
				<td colspan="6"><textarea name="intro" cols="60" rows="3">{$info.intro}</textarea></td>
			</tr>
			<tr>
				<th>商品详情 :</th>
				<td colspan="6"><textarea name="desc" id="desc" style="width:80%;height:300px;visibility:hidden;resize:none;">{$info.desc}</textarea></td>
			</tr>
			
			<tr>
            			<th>发布人 :</th>
				<td>{$info.uname}</td>
			</tr>
		</table>
		</div>


 
		<div class="content_list pad_10 hidden">
		<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
			<tr>
				<th width="120">{:L('seo_title')} :</th>
 				<td><input type="text" name="seo_title" class="input-text" size="60" value="{$info.seo_title}"></td>
			</tr>
			<tr>
				<th>{:L('seo_keys')} :</th>
				<td><input type="text" name="seo_keys" class="input-text" size="60" value="{$info.seo_keys}"></td>
			</tr>
			<tr>
				<th>{:L('seo_desc')} :</th>
				<td><textarea name="seo_desc" cols="80" rows="8">{$info.seo_desc}</textarea></td>
			</tr>
		</table>
		</div>
        
        </div>
		<div class="mt10"><input type="submit" value="{:L('submit')}" id="dosubmit" name="dosubmit" class="smt  mr10" style="margin:0 0 10px 100px;"></div>
	</div>
</div>
<input type="hidden" name="menuid"  value="{$menuid}"/>
<input type="hidden" name="id" value="{$info.id}" />
</form>
<include file="public:footer" />
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
		action: "{:U('items/ajax_upload')}",
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
		action: "{:U('items/ajax_upload')}",
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
			$.ftxia.tip({content:lang.title_empty, icon:'alert'});
			return false;
		}
		$.getJSON('{:U("items/ajax_gettags")}', {title:title}, function(result){
			if(result.status == 1){
				$('#J_tags').val(result.data);
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
		$.getJSON('{:U("items/ajax_getclick_url")}', {iid:iid}, function(result){
			if(result.status == 1){
				$('#J_click_url').val(result.data);
			}else{
				$.ftxia.tip({content:result.msg});
			}
		});
	});

	$.formValidator.initConfig({formid:"info_form",autotip:true});
	$("#J_title").formValidator({onshow:'请填写商品名称',onfocus:'请填写商品名称'}).inputValidator({min:1,onerror:'请填写商品名称'}).defaultPassed();
});
function get_child_cates(obj,to_id)
{
	var parent_id = $(obj).val();
	if( parent_id ){
		$.get('?m=items&a=get_child_cates&g=admin&parent_id='+parent_id,function(data){
				var obj = eval("("+data+")");
				$('#'+to_id).html( obj.content );
	    });
    }
}
 
 
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