<link rel=stylesheet type=text/css href="__STATIC__/8mobcom/css/good_jp.css" />
<!--List Start-->
<div class="main {:C('ftx_site_width')} clear">
		<include file="public:items_list" />
	<div class="clear"></div> 
	
	<notempty name="page">
	<div class="page">
		<div class="pageNav">{$page}</div>
	</div>
	</notempty>
</div>
<!--List End-->
<script type="text/javascript">
$(function(){
    $('.report').jumpBox({
		title: '举报',
		LightBox:'show',
		width:520,
		height:200,
		defaultContain:1,
		jsCode:'{$("#ju_form #znid").val($(this).attr("znid"))}{$("#ju_form #ju_title").html($(this).attr("title"))}'
    });
	$("#reportAn").on('change', function() {
		if($(this).val()==99) {
			$(".other").show();
		} else {
			$(".other").hide();
		}
	});
});
function report(t){
	var $form = $('#ju_form');        
	var query=$form.serialize();
	var url=$form.attr('action');
	var ju_report = $form.find('#reportAn').val();
	var ex_report = $form.find('#otherReasons').val();
	if(ju_report == 0){
		alert('请选择举报原因');
		$form.find('#reportAn').focus();
		return false;
	}
	if(ju_report == 99){
		if(ex_report == '' || ex_report.length>140){
			alert('请在140字以内说明理由');
			$('#otherReasons').focus();
			return false;
		}
	};
	$.ajax({
		url: '{:U('ajax/reportadd')}',
		data:query,
		jsonp:"callback",
		success: function(data){
			if(data.status==0){
				alert(data.msg);
			}
			else if(data.status==1){
				alert('举报成功');
				location.replace(location.href);
			}
		}
	});
	return false;
}
</script>
<div id="dhFormHtml">
	<div class="alert_fullbg" id="LightBox"></div>
	<div class="alert_bg alert_report" id="jumpbox" show="0">
		<div class="alert_box">
			<div class="alert_top"><span class="title"></span><a class="close" href="javascript:;"></a></div>
			<div class="alert_content">
				<div class="l_c_l">
					<form id="ju_form" name="ju_form" method="post" onsubmit="return report(this)">
						商品名称：<span id="ju_title"></span><br />
						举报原因：
					<select name="reportAn" id="reportAn" class="selectClass">
						<option value="0">请选择举报原因</option>
						<option value="1">商品已下架</option>
						<option value="2">商品已卖光</option>
						<option value="4">商品链接不正确</option>
						<option value="5">商品分类错误</option>
						<option value="6">商品价格与活动价格不符合</option>
						<option value="7">卖家拒绝发货</option>
						<option value="8">商品描述有误</option>
						<option value="99">其它原因</option>
					</select>
						<br />
					<label class="other" style="display:none">
					其它原因： <input type="text" name="otherReasons" class="text" id="otherReasons"/><br/>
					</label>
					<input type="hidden" id="znid" name="znid" value="1" />
					<input class="smt" type="submit" id="ju_submit" tabindex="3" value="提 交" />
					</form>
				</div>
			</div>
			<div class="bottom">注：为保证您的合法权益，请如实填写您所遇到的情况。</div>
		</div>
	</div>
</div>