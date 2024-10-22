<!doctype html>
<html>
<head>
<include file="public:head" />
<link rel=stylesheet type=text/css href="__STATIC__/jky/css/user.css" />
<style type="text/css">
.left .user-bind .taobao_sync { background-position:0 -448px; }
.left .user-bind .taobao_sync_no { background-position:0 -464px; }
</style>
</head>
<body>
<include file="public:header" />
<script charset="utf-8" type="text/javascript" src="__STATIC__/jky/js/jquery.validate.js" ></script>
<script>
$(function(){

	$('#pwdset').validate({
        errorPlacement: function(error, element){
            var error_td = element.parent('div').next('div');
            error_td.find('.warn').hide();
            error_td.append(error);
        },
        success       : function(label){
            label.addClass('ok').text('OK!');
        },
        onkeyup: false,
        rules : {
             
            password : {
                required : true,
                minlength: 6
            },
            repassword : {
                required : true,
                equalTo  : '#password'
            }
        },
	messages : {
             
            password  : {
                required : '您必须提供一个密码',
                minlength: '密码长度应在6-20个字符之间'
            },
            repassword : {
                required : '您必须再次确认您的密码',
                equalTo  : '两次输入的密码不一致'
            }
        },
		submitHandler: function(form) {   
	        var query=$(form).serialize();
	        var url=$(form).attr('action');
	        ajaxPost(url,query);
        }

});

});
</script>
<div class="main mb20 {:C('ftx_site_width')} clear">
	<div class="user_main">
		<include file="user/left" />


		<div class="right">
			<div class="menu-tag">
				<ul>
					<li id="info"><a href="{:U('user/info')}">帐户资料</a></li>
					<li id="pwd"><a href="{:U('user/password')}">修改密码</a></li>
					<li id="avatar"><a href="{:U('user/avatar')}">头像设置</a></li>
					<li id="apilogin"><a href="{:U('user/bind')}">帐号绑定</a></li>
				</ul>
			</div>
			<script>
			$('.menu-tag ul #pwd').addClass('active');
			</script>
			<div class="u-tip">
				<p>保障您的账号安全！建议您养成定期修改密码的好习惯！</p>
			</div>


			<form id="pwdset" name="form1" action="{:U('user/password')}" method="post" class="ml30 mt30">
				<div class="address">
					<ul>
						 
						<li>
							<div class="user">
								<label>新 密 码：</label>
								<input name="password" type="password" id="password" size="20" maxlength="20" style="width:150px;" class="ddinput"/>
							</div>
							<div class="error-box">
								<label class="warn">密码为长度 6 - 20 位</label>
							</div>
						</li>
						<li>
							<div class="user">
								<label>确认密码：</label>
								<input name="repassword" type="password" id="repassword" style="width:150px;" class="ddinput"/>
							</div>
							<div class="error-box">
								<label class="warn">请再次确认密码</label>
							</div>
						</li>
						<li>
							<input type="hidden" name="sub" value="1" />
							<input type="submit" class="smt smt1" value="保存信息">
						</li>
					</ul>
				</div>
			</form>

		</div>

	</div>
</div>
<!--主部结束-->
<include file="public:footer" />
</body>
</html>

