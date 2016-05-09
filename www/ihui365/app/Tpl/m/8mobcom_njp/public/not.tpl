	<div id="top_weixin" style="width: 100%; z-index: 9999; position:fixed;top:0;display: none; background:#e4e4e4; " class="clear">
		<div id="open_d" style="height: 36px;  z-index: 99999; width: 100%; margin: 0 auto; position: relative; max-width: 476px; min-width: 320px; line-height: 36px; font-size: 14px; font-family: '微软雅黑';background: #e4e4e4;border: 1px solid rgba(255,56,56,1);margin: 1px auto;color:rgba(255,56,56,1)">
			<i style="width: 36px; height: 36px; background: #e4e4e4; float: left;"><img src="http://s.juancdn.com/jpwebapp/images/yellow.png?1" width="36px"></i><span style="padding-left: 10px; display: inline-block;"><span id="open_t">无法启动下载，请使用浏览器下载！</span><a style="color:rgba(2,137,205,1); text-decoration: underline;" id="open_o">查看>></a></span><i style="width: 40px; height: 36px; position: absolute; right: 20px;"></i>
		</div>
		<div id="xq_a" style="z-index: 99999;  margin: 0 auto; position: relative;max-width: 480px; min-width: 320px;display:none;">
			<img width="100%" src="/static/8mobcom_jp/images/xiazai_a.png" />
		</div>
	</div>
	<script type="text/javascript">
	if(navigator.userAgent.indexOf("MicroMessenger") > -1 && navigator.userAgent.indexOf("iPhone") > -1 ){
		if(location.href.indexOf("deal") > -1){
			$("#xq_a").find('img').attr("src","/static/8mobcom_jp/images/goumai_i.png");
			$("#open_t").html("无法正常购买？请在浏览器中打开！");
		}else if(location.href.indexOf("apps") > -1){
			$("#xq_a").find('img').attr("src","/static/8mobcom_jp/images/xiazai_i.png");
			$("#open_t").html("无法启动/下载？请在浏览器中打开！");
		}else{
			$("#xq_a").find('img').attr("src","/static/8mobcom_jp/images/xiazai_i.png");
			$("#open_t").html("无法启动/下载？请在浏览器中打开！");
		}
	}else{
		if(location.href.indexOf("deal") > -1){
			$("#xq_a").find('img').attr("src","/static/8mobcom_jp/images/goumai_a.png");
			$("#open_t").html("无法正常购买，请在浏览器中打开！");
		}else if(location.href.indexOf("apps") > -1){
			$("#xq_a").find('img').attr("src","/static/8mobcom_jp/images/xiazai_a.png");
			$("#open_t").html("无法启动/下载？请在浏览器中打开！");
		}else{
			$("#xq_a").find('img').attr("src","/static/8mobcom_jp/images/xiazai_a.png");
			$("#open_t").html("无法启动/下载？请在浏览器中打开！");
		}
	}

	$("#open_d").on('click',  function(event) {
		$("#open_d").hide(400);
		$("#xq_a").show(400);
	});
	$("#xq_a").on('click',  function(event) {
		$("#xq_a").hide(400);
		$("#open_d").show(400);
	});
	</script>