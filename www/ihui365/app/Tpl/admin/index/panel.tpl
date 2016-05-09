<include file="public:header" />
<script src="__STATIC__/js/jquery/jquery.js"></script>
<script src="__STATIC__/js/ftxia.js"></script>
<script src="__STATIC__/js/admin.js"></script>
<div class="pad_10">
	<div class="clearfix">
		<div class="col-2 fl mr10" style="width:48%">
			<h6>我的个人信息</h6>
			<div class="content">
				您好，<b style="color:#06C"> {$my_admin.username}</b> &nbsp;[超级管理员]<br />
				登录IP： {$ip} [ {$time}]<br />
				<div class="bk20 hr"><hr /></div>
				<h2>第一次使用? <a href="http://bbs.8mob.com/forum.php?mod=viewthread&tid=5700" target="_blank">点此查看教程</a></h2>
			</div>
		</div>
		<div class="col-2 col-auto">
			<h6>提示建议</h6>
			<div class="content">
				<notempty name="message">
					<volist name="message" id="val">
						<div class="on{$val.type}">&nbsp;{$val.content}</div><br />
					</volist>
				</notempty>
			</div>
		</div>
		<div class="bk10"></div>

		<div class="col-2 fl mr10" style="width:48%">
			<h6>商品简报</h6>
			<div class="content"> 
				<span>商品数：{$item_total}件</span>、<br />
				过期下架商品：{$item_endtime}件、今日新增：{$item_today}件、佣金商品：{$item_commissioon}件
			</div>
		</div>
		<div class="col-2 col-auto">
			<h6>会员简报</h6>
			<div class="content"> 
			会员总数：{$user_total}人、今日新增会员：{$user_today}人 <br />
			当前在线：{$online_total}人 [会员：{$user_online}人、游客：{$line_total}人(含蜘蛛)]
			</div>
		</div>
		<div class="bk10"></div>
		<div class="col-2 fl mr10" style="width:48%">
			<h6>系统信息</h6>
			<div class="content">
				{:L('ftxia_version')}：<font style="color:#090">Ftxia {$system_info.ftxia_version}</font>  <br />
				{:L('server_os')}：{$system_info.server_os}<br />
				{:L('web_server')}：{$system_info.web_server}<br />
				{:L('php_version')}：{$system_info.php_version}<br />
				支持函数：<span class="{$system_info.curl}"><a href="http://bbs.8mob.com/forum.php?mod=viewthread&tid=4925" target="_blank">远程读取</a></span>
				<span class="onCorrect">编码转换</span>
				<span class="{$system_info.zlib}">页面压缩</span>
				<span class="{$system_info.zip}"><a href="http://bbs.8mob.com/forum.php?mod=viewthread&tid=4924" target="_blank">在线更新</a></span>
				<br />
			</div>
		</div>
		<div class="col-2 col-auto">
			<h6>授权信息</h6>
			<div class="content">
				授权类型：<span id="ftx_license_type"><font color="green">正在获取</font></span><br />
				授权域名：<span id="ftx_license_domain"><font color="green">正在获取</font></span><br />
				<div class="bk20 hr"><hr /></div>
				开放平台：<a href="http://www.ftxia.com/" target="_blank">http://www.ftxia.com</a> <br />
				官方论坛：<a href="http://bbs.8mob.com/" target="_blank">http://bbs.8mob.com</a> 
			</div>
		</div>
	</div>
</div>
<script>
	var updateurl = "{:U('upgrade/version')}";
</script>
{$tips_data}
</body>
</html>