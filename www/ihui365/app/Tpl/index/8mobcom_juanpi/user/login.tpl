<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>{$page_seo.title}  {:C('ftx_site_name')} - Powered by Ftxia!</title>
<meta name="keywords" content="{$page_seo.keywords}" />
<meta name="description" content="{$page_seo.description}" />
<meta name="generator" content="Ftxia! 7.0" />
<meta name="renderer" content="webkit">
<meta name="author" content="Ftxia Team  bbs.8mob.com" />
<meta name="copyright" content="2010-2015 Ftxia Inc." />
<meta name="MSSmartTagsPreventParsing" content="True" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
<link rel=stylesheet type=text/css href="__STATIC__/jky/css/base.css" />
<link rel=stylesheet type=text/css href="__STATIC__/jky/css/login.css" />
<script type="text/javascript" src="__STATIC__/jky/js/jquery.js"></script>
<script type="text/javascript" src="__STATIC__/jky/js/jquery.cookie.js"></script>
<script type="text/javascript" src="__STATIC__/jky/js/funs.js"></script>
<script type="text/javascript" src="__STATIC__/jky/js/error.js"></script>
<script type="text/javascript" src="__STATIC__/jky/js/noWordArr.js"></script>
 </head>
<body>
<!-- 主体 -->
<div class="login-main">
		<div class="login-content">
		<div class="top">
			<if condition="C('ftx_site_logo') neq ''">
				<div class="logo_show"><a href="{:C('ftx_site_url')}" title="{:C('ftx_site_name')}" class="jky"><img src="{:C('ftx_site_logo')}" width="240" height="50" /></a></div>
			<else />
				<div class="logo_show"><a href="{:C('ftx_site_url')}" title="{:C('ftx_site_name')}" class="jky"><img src="__STATIC__/jky/images/logo3.png" width="240" height="50" /></a></div>
			</if>
		</div>
		<div class="user-login">
			<div class="login-top">
				<h3><i></i>会员通行证</h3>
				<span class="login-r"><a class="active" href="{:C('ftx_site_url')}">返回首页>></a></span>
			</div>
						<p class="register">还没有帐号，<a class="blu" href="{:U('user/register')}">立即注册</a></p>
					</div>
		<div class="login-center">
						<div class="content-share">
				<h3>使用合作网站帐号登录</h3>
				<ul>
		<volist name="oauth_list" id="val">

				<li><a href="{:U('oauth/index', array('mod'=>$val['code']))}"  class="pub {$val.code}">{$val.name}</a></li>
		</volist>
									</ul>
			</div>
						<div class="content-landing">
				<h3>登录{:C('ftx_site_name')}</h3>
				<form action="{:U('user/login')}" name="login_form" method="post" id="login_form">
					<ul>
						<li>
							<div class="user input-active">
								<span><i class="user-ico"></i></span>
								<input class="user-input" type="text" placeholder="用户名/邮箱" name="username"/>
							</div>
							<div class="error-box" id="ckusername"></div>
						</li>
						<li>
							<div class="user">
								<span><i class="pass-ico"></i></span>
								<input class="user-input" type="password" placeholder="请输入密码" name="password"/>
							</div>
							<div class="error-box" id="password"></div>
						</li>
						<li>
							<div class="chex">
								<span><label><input class="ck" name="remember" type="checkbox" checked="checked" value="1"/>两周内免登录</label></span>
								<a class="forget " href="{:U('forget/index')}">忘记密码？</a>
							</div>
						</li>
						<li>
							<div class="btn">
								<input type="hidden" name="from" value="{$from}" />
								<input type="hidden" name="action" id="login" value="login" />
								<input type="submit" name="sub" class="sub" value="登　录" autocomplete="off"/>
							</div>
						</li>
					</ul>
				</form>
			</div>
		</div>
		<p><a href="http://www.miibeian.gov.cn/" rel="nofollow" target="_blank">{:C('ftx_site_icp')}</a> Copyright © 2010-2015 <a href="http://bbs.8mob.com/" target="_blank">8MOB.com</a> V7.0 正式版 all Rights Reserved <a href="http://bbs.8mob.com/" target="_blank">飞天侠淘宝客官方</a>
{:C('ftx_statistics_code')}</p>
	</div>
</div>
<!-- /主体 -->
<script charset="utf-8" type="text/javascript" src="__STATIC__/jky/js/jquery.validate.js" ></script>
<script type="text/javascript" src="__STATIC__/jky/js/placeholder.js"></script> 
<script type="text/javascript">
$(function(){
	//获取焦点事件
	$(':input').focus(function(){
		//高亮边框
		$('.input-active').removeClass('input-active');
		$(this).parents('.user').addClass('input-active');
	});
	//默认获取焦点
	$('input[name=username]').focus();
});
$(function(){
    $('#login_form').validate({
        errorPlacement: function(error, element){
            var error_td = element.parents('div').next('div');
			error_td.append(error);
        },
        success       : function(label){
            label.html('<strong class="ok"></strong>');
        },
        onkeyup: false,
        rules : {
            username : {
                required : true,
                byteRange: [3,30,'utf-8']
            },
            password : {
                required : true,
                minlength: 5
            }
	},
        messages : {
            username : {
                required : '<strong class="error"></strong>帐号不能为空',
                byteRange: '<strong class="error"></strong>账号长度错误'
            },
            password  : {
                required : '<strong class="error"></strong>密码不能为空',
                minlength: '<strong class="error"></strong>密码长度错误'
            }
	}
		 
    });
});
</script>
 
</body>
</html>
