<!DOCTYPE html>
<html lang="en">
<head>
	<include file="public:head" />
</head>
<body>
<!-- 主体 -->
<include file="public:not" />
<div class="main">
<include file="public:left" />
	<div class="app">
		<header id="head" class="head">
		<div class="fixtop">
			<span id="t-find"><a href="{:U('index/index')}" class="btn btn-left btn-back"></a></span>
			<span id="t-index">登录</span>
			<span id="t-user"><a  class="free-reg" id="free-reg" rel="nofollow">注册</a></span>
		</div>
		</header>

		<div class="wap-login">
                <form action="{:U('user/login')}" method="post">
                    <div class="login-info mt3">
                        <div class="third-txt">
                            <h5>使用账号登录</h5>
                        </div>
                        <ul class="info-input clear">
                            <li>
                                <div class="clear">
                                    <i><img src="/static/m_8mob_jp/images/person.png"></i>
                                    <input type="text" name="username" id="username" placeholder="邮箱/用户名" class="txt">
                                </div>       				
                            </li>
                            <li><p class="line-on"></p></li>
                            <li>
                                <div class="clear">
                                    <i><img src="/static/m_8mob_jp/images/pass.png"></i>
                                    <input type="password" name="password" id="password" placeholder="密码" class="txt">
                                </div>       				
                            </li>
                        </ul>
                        
                        <a id="btn_sub" class="sub" rel="nofollow">登  录</a>
                       
                        <div class="wap-app">
                            <div class="third-txt">
                                <h5>第三方账号快速登录</h5>
                            </div>
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
</div>
<script type="text/javascript">
 $('#free-reg').click(function(){
            toast_show("请使用电脑版注册~");
 });
$("#btn_sub").click(function() {
	var password	= $("#password").val();
	var username = $("#username").val(); 
	if(username == ''){
		toast_show("请输入帐号！");
		$('#username').focus();
		return false;
	}
	if(password == ''){
		toast_show("请输入密码！");
		$('#password').focus();
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
				location.href="{:U('user/index')}";
                        }else{
				toast_show(result.msg);
                        }
		}
	});
});
</script>
    <include file="public:mainjs" />
</body>
</html>