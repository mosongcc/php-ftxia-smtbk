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
			<span id="t-find"><a href="{:U('user/index')}" class="btn btn-left btn-back"></a></span>
			<span id="t-index">我的资料</span>
		</div>
		</header>

		<div class="clear bind_phone">
                <ul class="bind_info_page">
                    <li class="pb_3">
                        <a class="clear" id="change_head" href="javascript:;">
                            <span class="fl title">头像</span>
                            <div class="fr user-photo arrow">
                                <img src="__STATIC__/m_8mob_jp/images/icon/left_arrow.png" class="left_arrow fr">
                            </div>
                            <div class="fr user-photo">
                                <img src="{:avatar($info['id'], 100)}" class="user fr">
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="clear" id="change_name" href="javascript:;">
                            <span class="fl title">用户名</span>
                            <div class="fr user-photo arrow">
                                <img src="__STATIC__/m_8mob_jp/images/icon/left_arrow.png" class="left_arrow fr">
                            </div>
                            <div class="fr user-photo">
                                <span class="title">{$info.username}</span>
                            </div>
                        </a>
                    </li>
                </ul>
                <ul class="mt20 clear_p bind_info_page">
                    <li>
                        <a class="clear" id="binded_phone">
                            <span class="fl title">手机号码</span>
                            <div class="fr user-photo arrow">
                                <img src="__STATIC__/m_8mob_jp/images/icon/left_arrow.png" class="left_arrow fr">
                            </div>
                            <div class="fr user-photo">
                                <span class="title">{$info.mobile}</span>                            </div>
                        </a>
                    </li>
                </ul>
                <p class="tips_p2"></p>
		</div>

		<div class="wap-login">
                <form action="{:U('user/password')}" method="post">
                    <div class="login-info mt3">
                        <ul class="info-input clear">
                            <li>
                                <div class="clear">
                                    <i><img src="/static/m_8mob_jp/images/pass.png"></i>
                                    <input type="password" name="password" id="password" placeholder="原密码" class="txt">
                                </div>       				
                            </li>
                            <li><p class="line-on"></p></li>
                            <li>
                                <div class="clear">
                                    <i><img src="/static/m_8mob_jp/images/pass.png"></i>
                                    <input type="password" name="newpassword" id="newpassword" placeholder="新密码" class="txt">
                                </div>       				
                            </li>

			    <li><p class="line-on"></p></li>
                            <li>
                                <div class="clear">
                                    <i><img src="/static/m_8mob_jp/images/pass.png"></i>
                                    <input type="password" name="repassword" id="repassword" placeholder="重复新密码" class="txt">
                                </div>       				
                            </li>
                        </ul>
                         
                        <a id="btn_sub" class="sub" rel="nofollow">提  交</a>
                       
                    </div> 
                </form> 	
            </div>

	</div>
</div>

<script type="text/javascript">

$("#btn_sub").click(function() {
	
	var password	= $("#password").val();
	var newpassword = $("#newpassword").val();
	var repassword	= $("#repassword").val();
	if(password == ''){
		toast_show("请输入原始密码！");
		$('#password').focus();
		return false;
	}
	if(newpassword == ''){
		toast_show("请输入新密码！");
		$('#newpassword').focus();
		return false;
	}
	if(password == newpassword){
		toast_show("新密码不能与原密码一样！");
		$('#newpassword').focus();
		return false;
	}
	if(newpassword != repassword){
		toast_show("两次输入的密码不一致！");
		$('#repassword').focus();
		return false;
	}

	$.ajax({
                    url: "{:U('user/password')}",
                    type: 'POST',
                    data: {
                        password: password,
                        newpassword: newpassword,
			repassword: repassword
                    },
                    dataType: 'json',
                    success: function(result){
                        if(result.status == 1){
				//toast_show(result.data);
			    $.dialog({id:'goods_add_success', title:lang.tips, content:result.data, padding:'', fixed:true, lock:true});
                        }else{
				toast_show(result.status.info);
                        }
                    }
                });
});
</script>


    <include file="public:mainjs" />
</body>
</html>