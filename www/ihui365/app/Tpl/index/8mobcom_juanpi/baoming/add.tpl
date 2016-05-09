<!doctype html>
<html>
<head>
<include file="public:head" />
<css file="__STATIC__/jky/css/baoming.css" />

<link rel="stylesheet" type="text/css" href="__STATIC__/js/calendar/calendar-blue.css"/>
<script type="text/javascript" src="__STATIC__/js/calendar/calendar.js"></script>
</head>
<body>
<include file="public:header" />

<include file="bm_top" />

<div class="main {:C('ftx_site_width')} mb20">
	<div class="main-newgood -2">

		<div class="procedures bc">
			<span>报名流程</span>
			<em>1</em>发布活动<i></i>
			<em>2</em>活动审核<i></i>
			<em>3</em>确认排期<i></i>
			<em>4</em>活动上线
		</div>

		<div class="bm-form mt30">
			<table>
				<tr>
					<th>报名商品网址：</th>
					<td>
						<input type="text" id="url" class="form-int-long" value=""/>
						<input class="smt" type="button" onClick="getTaoItem($('#url').val())" value="抓取商品信息"/>
						<div class="form-tip">
						什么是商品网址？<br />
						如果您是B店，提供的商品格式为：<span class="org_2">http://detail.tmall.com/item.htm?id=26914584813</span><br />
						如果您是C店，提供的商品格式为：<span class="org_2">http://item.taobao.com/item.htm?id=12345678910</span>
						</div>
											</td>
				</tr>
			</table>
		</div>
		
		<form action="{:U('goods/goods_add',array('do'=>'submit'))}" method="post" name="form1" onsubmit="return check_zhe();">
			<if condition="C('ftx_baoming_open') eq '1'">
			<div class="bm-form mt30">
				<table>
					<tr>
						<th>付费报名：</th>
						<td>
							<select name="pay_id" id="pay_id" class="mr10">
							<option value="0">免费- 等待漫长审核</option>
							<optgroup label="───────────────────"></optgroup>
							<?php foreach($baoming_reason as $key=>$res){ ?>
								<option value="{$key}">{$res[3]}</option>
							<?php }?>
							</select>
							<div class="form-tip"></div>
						</td>
					</tr>
				</table>
			</div>
			<else/>
			<input type="hidden" name="pay_id" id="pay_id" value="0" />
			</if>

			<div class="bm-form">
				<div style="position:relative">
					<div class="pic">
						<img class="pic_url" src="__STATIC__/images/no_pic.png" width="340" height="340" alt="图片预览">
						<span class="tip org_2">（商品图片必须无文字、无水印、300*300像素以上）</span>
					</div>
				</div>
				<table>
					<if condition="$no_zc eq 'yes'">
					<tr>
						<th>专场：</th>
						<td>
							<span class="form-tip org_2" style="font-size: 22px;">{$zc.name}专场报名</span>
						</td>
					</tr>
					</if>
					<tr>
						<th>商品名称：</th>
						<td>
							<input name="title" type="text" id="title" class="form-int-long" value="" />
							<div class="form-tip org_2 f12">标题内不允许出现包邮、折扣信息和新品等字样，要求10-18字。如：日系加厚带帽牛角扣呢子大衣</div>
						</td>
					</tr>
					<tr>
						<th>图片链接：</th>
						<td><input name="pic_url" type="text" id="pic_url" class="form-int-long" value="" /></td>
					</tr>
					<tr>
						<th>所属分类：</th>
						<td>
							
							<select class="J_cate_select mr10 form-sel" id="J_cate_select" data-pid="0"   data-uri="{:U('item/ajax_getchilds', array('type'=>0))}" data-selected=""></select>
							<input type="hidden" name="cate_id" id="J_cate_id" value="" />


							<div class="form-tip org_2 f12">请正确选择您报名的商品对应的分类</div>
						</td>
					</tr>
					<tr>
						<th>包邮范围：</th>
						<td>
							<select name="ems" id="ems">
								<option value="0">不包邮</option>
								<option value="1">包邮</option>
							</select>
						</td>
					</tr>
					<tr>
						<th>30天销量：</th>
						<td>
							<input name="volume" type="text" id="volume" class="form-int-extrashort bcf" value="" readOnly="true" />
							<span class="form-text">件</span>&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
					</tr>
					<tr>
						<th>商品原价：</th>
						<td>
							<input name="price" type="text" id="price" class="form-int-extrashort bcf" value="" readOnly="true" />
							<span class="form-text">元</span>
						</td>
					</tr>
					<tr>
						<th>活动价格：</th>
						<td>
							<input name="coupon_price" type="text" id="coupon_price" class="form-int form-int-extrashort" value="" />
							<span class="form-text">元</span>
						</td>
					</tr>
					<tr>
						<th>商品来源：</th>
						<td>
							<select name="shop_type" id="shop_type">
							<volist name="orig_list" id="val">
							<option value="{$val.type}">{$val.name}</option>
							</volist>
						</select>
						</td>
					</tr>
				</table>
			</div>
			<div class="bm-form" style="border:0">
				<table>
					<tr>
						<th>店铺主旺旺：</th>
						<td><input name="nick" type="text" id="nick" class="form-int-short bcf" value="" readOnly="true" /></td>
					</tr>
					<tr>
						<th>联系人QQ：</th>
						<td><input name="qq" type="text" id="qq" class="form-int-short" value="{$info.qq}" /></td>
					</tr>
					<tr>
						<th>联系人手机：</th>
						<td><input name="mobile" type="text" id="mobile" class="form-int-short" value="{$info.mobile}" /></td>
					</tr>
					<tr>
						<th>联系人姓名：</th>
						<td><input name="person_name" type="text" id="person_name" class="form-int-short" value="{$info.realname}" /></td>
					</tr>
					<tr>
						<th>推荐理由：</th>
						<td>
							<textarea id="reason" name="reason" class="form-textarea" cols="30" rows="10">请务必以客观的角度评价您的商品，否则会影响到您商品的审核。</textarea>
						</td>
					</tr>
					<tr>
						<th></th>
						<td>
							<div class="form-btn">
								<input type="hidden" name="iid" id="iid" value="" />
								<input type="hidden" name="user_id" id="user_id" value="" />
								<input type="hidden" name="zc_id" id="zc_id" value="{$zc['id']}" />								
								<input type="hidden" name="id" value="" />
								<input type="button" name="smt" value="提交报名" class="btn" id="smt">
							</div>
						</td>
					</tr>
				</table>
			</div>
		</form>
	</div>
</div>

<script language="javascript" type="text/javascript">



regTaobaoUrl = /(.*\.?taobao.com(\/|$))|(.*\.?tmall.com(\/|$))/i; 
function getTaoItem(url){
    if(url==''){
		alert('网址不能为空！');
		return false;
	}
	if (!url.match(regTaobaoUrl)){
		alert('这不是一个淘宝网址！');
		return false;
	}
	 
	$.getJSON(FTXIAER.root + '/?m=goods&a=ajaxgetid', {url:url},function(result){
		if(result.status=='0'){
			alert(result.msg);
			return false;
		}
		taobaokeItem=result.data.item;
		$('#title').val(taobaokeItem.title);
		$('#pic_url').val(taobaokeItem.pic_url);
		$('.pic_url').attr('src',taobaokeItem.pic_url);
		$('#iid').val(taobaokeItem.num_iid);
		$('#price').val(taobaokeItem.price);
		$('#nick').val(taobaokeItem.nick);
		$('#user_id').val(taobaokeItem.user_id);
		$('#shop_type').val(taobaokeItem.tmall);
		$('#ems').val(taobaokeItem.ems);
		$('#volume').val(taobaokeItem.volume);
		$('#coupon_price').val(taobaokeItem.coupon_price);
	});
}
 
$(function(){
	$("#reason").focus(function () {
		$(this).css("color", "#5e5e5e");
		if ($("#reason").val() == "请务必以客观的角度评价您的商品，否则会影响到您商品的审核。") {
			$("#reason").val("");
		}
	})
	$("#reason").blur(function () {
		if ($("#reason").val() == "") {
			$("#reason").val("请务必以客观的角度评价您的商品，否则会影响到您商品的审核。");
			$(this).css("color", "#cccccc");
		}
	})
});

function check_zhe(){

	var number = /^\d+$/;
	var reg = /^(([1-9]\d*)|\d)(\.\d{1,2})?$/;
	var url = /http\:\/\/[a-zA-Z0-9.\/]+\.taobaocdn.*\.com\/.*\.(jpg|png|gif)$/;
	var urls = /http\:\/\/[a-zA-Z0-9.\/]+\.alicdn.*\.com\/.*\.(jpg|png|gif)$/;
	var img_link = $("#pic_url").val();
	var cate_id = $("#J_cate_id").val();
	var title = $("#title").val();
	var price = $("#price").val();
	var nick = $("#nick").val();
	var good_price = $("#coupon_price").val();
	var intro = $('#reason').val();
	var iid = $('#iid').val();
	var volume = $('#volume').val();
	var shop_type = $('#shop_type').val();

	var titleNum=$('#title').val().length;

	if(titleNum == ''){
		alert('请输入商品名称');
		$('#title').focus();
		return false;
	}
	else if(titleNum > 40 || titleNum < 10){
		alert('商品名称必须在10至40个字之间'+titleNum);
		$('#title').focus();
		return false;
	}
	else if($('#pic_url').val() == ''){
		alert('请输入图片链接');
		$('#pic_url').focus();
		return false;
	}
	else if($('#J_cate_id').val() == '-1'){
		alert('请选择商品所属分类');
		$('#J_cate_select').focus();
		return false;
	}
	else if($('#ems').val() == ''){
		alert('请选择包邮范围');
		$('#ems').focus();
		return false;
	}
	else if($('#volume').val() == ''){
		alert('请输入30天销量');
		$('#volume').focus();
		return false;
	}
	else if($('#price').val() == ''){
		alert('请输入原价');
		$('#price').focus();
		return false;
	}
	else if($('#coupon_price').val() == ''){
		alert('请输入活动价格');
		$('#coupon_price').focus();
		return false;
	} 
	else if($('#reason').val() == '请务必以客观的角度评价您的商品，否则会影响到您商品的审核。'){
		alert('请务必以客观的角度评价您的商品，否则会影响到您商品的审核。');
		$('#reason').focus();
		return false;
	}else{
		return true;
	}
}

$("#smt").click(function() {
	
	var number		= /^\d+$/;
	var reg			= /^(([1-9]\d*)|\d)(\.\d{1,2})?$/;
	var url			= /http\:\/\/[a-zA-Z0-9.\/]+\.taobaocdn.*\.com\/.*\.(jpg|png|gif)$/;
	var urls		= /http\:\/\/[a-zA-Z0-9.\/]+\.alicdn.*\.com\/.*\.(jpg|png|gif)$/;
	var img_link		= $("#pic_url").val();
	var cate_id		= $("#J_cate_id").val();
	var title		= $("#title").val();
	var price		= $("#price").val();
	var nick		= $("#nick").val();
	var good_price		= $("#coupon_price").val();
	var intro		= $('#intro').val();
	var iid			= $('#iid').val();
	var volume		= $('#volume').val();
	var ems			= $('#ems').val();
	var pay_id		= $('#pay_id').val();
	var shop_type		= $('#shop_type').val();
	var zc_id		= $("#zc_id").val();
	var qq			= $("#qq").val();
	var mobile		= $("#mobile").val();
	var person_name		= $("#person_name").val();
	var reason		= $("#reason").val();


	var titleNum=$('#title').val().length;

	if(titleNum == ''){
		alert('请输入商品名称');
		$('#title').focus();
		return false;
	}
	else if(titleNum > 40 || titleNum < 10){
		alert('商品名称必须在10至40个字之间'+titleNum);
		$('#title').focus();
		return false;
	}
	else if($('#pic_url').val() == ''){
		alert('请输入图片链接');
		$('#pic_url').focus();
		return false;
	}
	else if($('#J_cate_id').val() == '-1'){
		alert('请选择商品所属分类');
		$('#J_cate_select').focus();
		return false;
	}
	else if($('#ems').val() == ''){
		alert('请选择包邮范围');
		$('#ems').focus();
		return false;
	}

	else if($('#volume').val() == ''){
		alert('请输入30天销量');
		$('#volume').focus();
		return false;
	}
	else if($('#price').val() == ''){
		alert('请输入原价');
		$('#price').focus();
		return false;
	}
	else if($('#coupon_price').val() == ''){
		alert('请输入活动价格');
		$('#coupon_price').focus();
		return false;
	}
	else if($('#qq').val() == ''){
		alert('请填写联系人QQ');
		$('#qq').focus();
		return false;
	}
	else if($('#mobile').val() == ''){
		alert('请填写联系人手机');
		$('#mobile').focus();
		return false;
	}
	else if($('#person_name').val() == ''){
		alert('请填写联系人姓名');
		$('#person_name').focus();
		return false;
	}
	else if($('#reason').val() == '请务必以客观的角度评价您的商品，否则会影响到您商品的审核。'){
		alert('请务必以客观的角度评价您的商品，否则会影响到您商品的审核。');
		$('#reason').focus();
		return false;
	}
	

	$.ajax({
                    url: FTXIAER.root + '/index.php?m=baoming&a=ajaxadd',
                    type: 'POST',
                    data: {
                        iid: iid,
                        cate_id: cate_id,
			title: title,
			nick: nick,
			price: price,
			good_price: good_price,
			volume:volume,
			ems:ems,
			pay_id:pay_id,
			pic_url: img_link,
			shop_type: shop_type,
                        intro: intro,
			zc_id: zc_id,
			qq:qq,
			mobile:mobile,
			person_name:person_name,
			reason:reason
                    },
                    dataType: 'json',
                    success: function(result){
                        if(result.status == 1){
			    $.dialog({id:'goods_add_success', title:lang.tips, content:result.data, padding:'', fixed:true, lock:true});
                        }else{
                            $.ftxia.tip({content:result.msg, icon:'error'});
                        }
                    }
                });
});
</script>
<include file="public:footer" />
<script src="__STATIC__/js/select.js"></script>
<script type="text/javascript">
$('.J_cate_select').cate_select('请选择分类');
</script>
</body>
</html>