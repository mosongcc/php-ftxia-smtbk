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
						<p class="register">已有帐号，<a class="blu" href="{:U('user/login')}">立即登录</a></p>
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
				<h3>注册{:C('ftx_site_name')}</h3>
				<form action="{:U('user/register')}" name="register_form" method="post" id="register_form">
					<ul>
						<li id="emailMatch_list">
							<div class="user">
								<span><i class="email-ico"></i></span>
								<input id="emailMatch" class="user-input" type="text" placeholder="邮箱" name="email" value="" autocomplete="off"/>
							</div>
							<div class="error-box">
								<span class="tip" id="email_warn" warn="请填写常用邮箱"></span>
								<span id="check_email" class="checking">检查中...</span>
							</div>
						</li>
						<li>
							<div class="user">
								<span><i class="user-ico"></i></span>
								<input class="user-input" type="text" placeholder="用户名" id="username" name="username" value="" autocomplete="off"/>
							</div>
							<div class="error-box">
								<span class="tip" id="username_warn" warn="用户名长度3-15位字母或数字"></span>
								<span id="check_user" class="checking">检查中...</span>
							</div>
						</li>
						<li>
							<div class="user">
								<span><i class="pass-ico"></i></span>
								<input class="user-input" type="password" placeholder="请输入密码" name="password" value="" autocomplete="off"/>
							</div>
							<div class="error-box"><span class="tip" id="password_warn" warn="密码6～16位，区分大小写"></span></div>
						</li>
						<li>
							<div class="user">
								<span><i class="pass-ico"></i></span>
								<input class="user-input" type="password" placeholder="请输入密码" name="repassword" value="" autocomplete="off"/>
							</div>
							<div class="error-box"><span class="tip" id="repassword_warn" warn="确认密码6～16位，区分大小写"></span></div>
						</li>
						<li>
							<div class="user spr">
								<span><i class="spr-ico"></i></span>
								<input class="user-input" type="text" placeholder="验证码" name="captcha"  id="captcha" autocomplete="off"/>
								<img alt="验证码" title="点击更换" style="cursor:pointer;" onClick="this.src='{:U('captcha/'.time())}&a='+Math.random()" src="{:U('captcha/'.time())}" id="J_captcha_img" class="captcha_img" alt="{:L('captcha')}" data-url="{:U('captcha/js_rand')}">						</div>
							<div class="error-box error-box01" id="ckyzm"><span class="tip" id="captcha_warn" warn="填写4位验证码"></span></div>
						</li>
						<li style="padding-bottom:0">
							<div class="chex">
								<span><label><input class="ck" name="agreement" type="checkbox" checked="checked"/><a href="javascript:;" id="J_protocol_btn">我已经阅读过并同意声明</a></label></span>
							</div>
						</li>

						<li>
							<div class="btn">
								<input type="hidden" name="from" value="{$from}" />
								<input type="hidden" name="action" id="login" value="login" />
								<input type="submit" name="sub" class="sub" value="注  册" autocomplete="off"/>
							</div>
						</li>
					</ul>
				</form>
			</div>
		</div>
		<p><a href="http://www.miibeian.gov.cn/" rel="nofollow" target="_blank">{:C('ftx_site_icp')}</a> Copyright © 2010-2015 8MOB.com V7.0 正式版 all Rights Reserved <a href="http://bbs.8mob.com/" target="_blank">飞天侠淘宝客官方</a>
{:C('ftx_statistics_code')}</p>
	</div>
</div>
<!-- /主体 -->
<script charset="utf-8" type="text/javascript" src="__STATIC__/jky/js/jquery.validate.js" ></script>
<script charset="utf-8" type="text/javascript" src="__STATIC__/jky/js/placeholder.js"></script> 
<script charset="utf-8" type="text/javascript" src="__STATIC__/jky/js/jquery.emailmatch.js"></script>
<script type="text/javascript">
$(function(){
	//获取焦点事件
	$(':input').focus(function(){
    	//高亮边框
    	$('.input-active').removeClass('input-active');
    	$(this).parents('.user').addClass('input-active');
		var name=$(this).attr('name');
    	$('#'+name+'_warn').attr('warn')==undefined || $('#'+name+'_warn').html('<strong class="warn"></strong>'+$('#'+name+'_warn').attr('warn'));//清除之前验证信息
	});
	//默认获取焦点
	$('input[name=email]').focus();
});
$(function(){
    $('#register_form').validate({
        errorPlacement: function(error, element){
           var error_td = element.parent('div').next('div');
           error_td.find('.tip').hide();
           error_td.append(error);
        },
        success       : function(label){
            label.addClass('tip').html('<strong class="ok"></strong>');
        },
        onkeyup: false,
        rules : {
            username : {
                required : true,
                byteRange: [3,15,'utf-8'],
				remote   : {
                    url :'index.php?m=ajax&a=check_user',
                    type:'post',
                    data:{
                        username : function(){
                            return $('#username').val();
                        }
                    },
                    beforeSend:function(){
                        var _checking = $('#check_user');
                        _checking.prev('.tip').hide();
                        _checking.next('.error-box').hide();
                        $(_checking).show();
                    },
                    complete :function(){
                        $('#check_user').hide();
                    }
                }
            },
            password : {
                required : true,
                minlength: 6
            },
	    repassword : {
                required : true,
                minlength: 6
            },
            email : {
                required : true,
                email    : true,
				remote   : {
                    url :'index.php?m=ajax&a=check_email',
                    type:'post',
                    data:{
                        email : function(){
                            return $('#emailMatch').val();
                        }
                    },
                    beforeSend:function(){
                        var _checking = $('#check_email');
                        _checking.prev('.tip').hide();
                        $(_checking).show();
                    },
                    complete :function(){
                        $('#check_email').hide();
                    }
                }
            },
			captcha : {
                required : true,
                rangelength:[4,4]
            },
            agree : {
                required : true
            }
        },
        messages : {
            username : {
                required : '<strong class="error"></strong>用户名不能为空',
                byteRange: '<strong class="error"></strong>用户名必须在3-15个字符之间',
				remote   : '<strong class="error"></strong>用户名已存在'
            },
            password  : {
                required : '<strong class="error"></strong>密码不能为空',
                minlength: '<strong class="error"></strong>密码长度应在6-20个字符之间'
            },
	    repassword  : {
                required : '<strong class="error"></strong>密码不能为空',
                minlength: '<strong class="error"></strong>密码长度应在6-20个字符之间'
            },
            email : {
                required : '<strong class="error"></strong>邮箱不能为空',
                email    : '<strong class="error"></strong>邮箱格式错误',
				remote   : '<strong class="error"></strong>邮箱已存在'
            },
            captcha : {
                required : '<strong class="error"></strong>验证码不能为空',
				rangelength    : '<strong class="error"></strong>位数错误'
            },
            agree : {
                required : '<strong class="error"></strong>您必须阅读并同意该协议'
            }
        }
    });
	});

</script>
 
</body>
</html>
