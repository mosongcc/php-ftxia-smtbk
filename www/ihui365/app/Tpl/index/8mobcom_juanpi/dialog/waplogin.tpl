<div id="alert_landing">
<div class="wap-login">
	<form action="{:U('user/login')}" method="post" id="J_dlogin_form">
		<div class="login-info mt3">
			<div class="third-txt"><h5>会员帐号登录</h5></div>
			<ul class="info-input clear">
				<li>
				<div class="clear">
					<i><img src="/static/m_8mob_jp/images/person.png" /></i>
					<input type="text" name="username" id="username" placeholder="请输入用户名" class="txt" />
				</div>
				</li>
				<li><p class="line-on"></p></li>
				<li>
				<div class="clear">
					<i><img src="/static/m_8mob_jp/images/pass.png" /></i>
					<input type="password" name="password" id="password" placeholder="请输入密码" class="txt"/>
				</div>
				</li>
			</ul>
			<a id="btn_sub" type="submit" name="btn_sub" class="sub" value="登录" autocomplete="off">登  录</a>
			<a href="javascript:;" onclick='return toast_show("为了您的账户安全，请使用电脑找回密码。")' class="free-reg" >忘记密码？</a>
			<div class="wap-app" >
				<div class="third-txt"><h5>使用合作网站帐号登录</h5></div>
				<div class="third-app clear">
					<volist name="oauth_list" id="val">
					<a href="{:U('oauth/index', array('mod'=>$val['code']))}"  class="{$val.code}"><img src="/static/m_8mob_jp/images/wap_{$val.code}.png" /></a>
					</volist>
				</div>
			</div>
		</div>
	</form>
</div>
</div>
<script type="text/javascript">

$("#btn_sub").click(function() {
	
	var password	= $("#password").val();
	var username = $("#username").val(); 
	if(password == ''){
		toast_show("请输入原始密码！");
		$('#password').focus();
		return false;
	}
	if(username == ''){
		toast_show("请输入帐号！");
		$('#username').focus();
		return false;
	}
	
	$.ajax({
                    url: "{:U('user/login')}",
                    type: 'POST',
                    data: {
                        password: password,
                        username: username
                    },
                    dataType: 'json',
                    success: function(result){
                        if(result.status == 1){
				toast_show(result.msg);
				location.href="{:U('m/user/index')}";
                        }else{
				toast_show(result.msg);
                        }
                    }
                });
});
</script>