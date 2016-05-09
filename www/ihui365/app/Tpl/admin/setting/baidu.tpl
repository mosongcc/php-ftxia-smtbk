<include file="public:header" />
<!--商品列表-->
<div class="subnav">
	<div class="content_menu ib_a blue line_x">
		<a class="add fb " href="javascript:toxml()" ><em>sitemap生成</em></a>
		<a class="add fb " href="{:U('setting/baidu')}" ><em>百度推送设置</em></a>
		<a class="add fb " href="javascript:baidu()" ><em>百度一键推送</em></a>
	</div>
    <h1 class="title_2 line_x">百度主动推送设置      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;点此去百度<a href="http://zhanzhang.baidu.com/linksubmit/index" target="_blank">站长平台</a></h1>
</div>
<div class="pad_lr_10">
	<form id="info_form" action="{:u('setting/edit')}" method="post">
	<table width="100%" class="table_form">
        <tr>
            <th width="200">推送站点 :</th>
            <td>
                <input type="text" name="setting[baidu_site]" class="input-text" size="30" value="{:C('ftx_baidu_site')}"> site= </td>
        </tr>
        <tr>
            <th>Token :</th>
            <td>
	    <input type="text" name="setting[baidu_token]" class="input-text" size="30" value="{:C('ftx_baidu_token')}"> token= </td>
        </tr>
       
        <tr>
        	<th></th>
        	<td>
                <input type="hidden" name="menuid"  value="{$menuid}"/>
                <input type="submit" class="smt mr10" value="{:L('submit')}"/>
            </td>
    	</tr>
	</table>
	</form>
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