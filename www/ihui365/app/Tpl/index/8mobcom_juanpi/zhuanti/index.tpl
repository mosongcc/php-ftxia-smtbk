<!doctype html>
<html>
<head>
<include file="public:head" />
<script type="text/javascript" src="__STATIC__/8mobcom/js/index.js"></script>
<style>
.line {
background: url(http://s.juancdn.com/juanpi/images/act/act-tit.png) no-repeat;
_background: url(http://s.juancdn.com/juanpi/images/act/act-tit.gif) no-repeat;
width: 280px;
height: 40px;
margin: 0 auto;
text-align: center;
}
.line em {
font-size: 20px;
font-family: "微软雅黑";
color: #fff;
line-height: 40px;
}

</style>
</head>
<body>
<include file="public:header" />

<notempty name="zc.banner_pic">
	<div style="width:100%; height:300px; background:url('{:attach(get_thumb($zc['banner_pic'], ''),'zc')}') no-repeat top center;"></div>
</notempty>
<div style="width:100%; background:url('{:attach(get_thumb($zc['body_pic'], ''),'zc')}');margin-top: 0px;padding-top: 20px;">
<div class="{:C('ftx_site_width')}" style="margin:20px auto 0">
	<div class="dtit" style="height: 40px;  border-bottom: 1px solid #00ba85;  margin-bottom: 20px;  font-weight: normal;">
		<div class="line"><em>{$zc.name}</em></div>
	</div>
</div>
<include file="public:list" />

 
</div>

<include file="public:footer" />
</body>
</html>