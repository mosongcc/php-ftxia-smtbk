<include file="public:header" />
<!--商品列表-->
<div class="subnav">
	<div class="content_menu ib_a blue line_x">
		<a class="add fb " href="javascript:toxml()" ><em>sitemap生成</em></a>
		<a class="add fb " href="{:U('setting/baidu')}" ><em>百度推送设置</em></a>
		<a class="add fb " href="javascript:baidu()" ><em>百度一键推送</em></a>
	</div>

</div>
<div class="pad_lr_10" >
    
 
</div>
<include file="public:footer" />
<script>

function toxml(){
	var url = "{:U('sitemap/toxml')}";
	$.getJSON(url, {p:1}, function(result){
            if(result.status == 1){
		$.ftxia.tip({content:result.msg});
            }else{
                $.ftxia.tip({content:result.msg});
            }
	});
}

function baidu(){
	var url = "{:U('sitemap/baidu')}";
	$.getJSON(url, {p:1}, function(result){
            if(result.status == 1){
		$.ftxia.tip({content:result.msg});
            }else{
                $.ftxia.tip({content:result.msg});
            }
	});
}
</script>
</body>
</html>