<!-- 头部开始 -->
<div id="toolbar">
    <div class="bar-con  {:C('ftx_site_width')}">
	<ul class="topNav fl">
		<li class="first"><a href="{:C('ftx_site_url')}" <empty name="topnav_curr">class="active"</empty>>{:C('ftx_site_name')}</a></li>
	<ftx:nav type="lists" style="top">
	<volist name="data" id="val">
		<li <if condition="'wap' eq $val['alias']">class="phone-code"</if>><a href="{$val.link}" <if condition="$topnav_curr eq $val['alias']">class="active"</if> <if condition="$val.target eq 1">target="_blank"</if>><if condition="'wap' eq $val['alias']"><em class="icon-normal icon-phone "></em></if>{$val.name}</a>
		<if condition="'wap' eq $val['alias']">
		<div class="code-tips"><div class="code-box"><p class="code"><img src="{:C('ftx_site_browser')}" width="90px" height="90px" /></p><p class="txt" style="text-align:center;">随时逛 及时抢</p></div></div>
		</if>
		</li>
	</volist>
	</ftx:nav> 
        </ul>
        
        <div class="right-show fr" id="right-show">
		<div class="union-login">
			<volist name="oauth_list" id="val">
				<a href="{:U('oauth/index', array('mod'=>$val['code']))}"><i class="icon-{$val.code}"></i>{$val.name}</a>
			</volist>　|
		</div>
		<div class="login-show">
			<a href="{:U('user/login')}">登录</a>
			<a href="{:U('user/register')}">免费注册</a>　|
		</div>
		<div class="other-show">
			<a href="{:C('ftx_kefu_html')}" target="_blank" rel="nofollow">在线客服</a>
			<a href="{:U('baoming/index')}" target="_blank">卖家报名</a>
		</div>
	</div>
	<script>
			function topHtml() {/*
			<div class="logined-show">
				<a id="{:U('user/index')}" href="{:U('user/index')}" class="normal-a"><span class="user"><literal>{$name}</literal></span><em class="cur"></em></a>
				<div class="normal-box login-box">
					<ul>
						<li><a href="{:U('user/gift')}"><i class="icon icon-02"></i><span>我的订单</span></a></li>
						<li><a href="{:U('user/index')}"><i class="icon icon-03"></i><span>账号设置</span></a></li>
						<li><a href="{:U('user/logout')}" class="exit" ><i class="icon icon-04"></i><span>退出</span></a></li>
					</ul>
				</div>
			</div>
			<div class="personal-show">
				<a href="{:U('user/mingxi')}"><span>账户明细</span></a>
				<a href="{:U('user/gift')}"><span>我的订单</span></a>
				<p class="info fr ffv"><a href="{:U('user/msg')}"><literal>{$msgsrc}</literal></a></p>
				<em class="count" style="display: none;">0</em></a>　|
			</div>
			<div class="other-show"><a href="{:C('ftx_kefu_html')}" target="_blank" rel="nofollow">在线客服</a><a href="{:U('baoming/index')}">卖家报名</a></div>*/;}
				$.ajax({
					url: '{:U('ajax/userinfo')}',
					dataType:'jsonp',
					jsonp:"callback",
					success: function(data){
						if(data.s==1){
							topHtml=getTplObj(topHtml,data.user);
							$('#right-show').html(topHtml).show();
						}
						else{
							$('#right-show').show();
						}
					}
				});
			</script>

    </div>
</div>
<div class="header">
    <div class="area {:C('ftx_site_width')}">
        <div class="logo">
		<if condition="C('ftx_site_logo') neq ''">
			<h1 class="fl"><a title="{:C('ftx_site_name')}" href="{:C('ftx_site_url')}"><img src="{:C('ftx_site_logo')}" width="283" height="50" /></a></h1>
		<else />
			<h1 class="fl"><a title="{:C('ftx_site_name')}" href="{:C('ftx_site_url')}"><img src="/static/8mobcom/images/logo3.png" width="238" height="50" /></a></h1>
		</if>

        </div>
        <div class="protection">
            <a title="每天22点开抢" class="update"   target="_blank"></a>
            <a title="职业买手砍价" class="lowest"  target="_blank"></a>
            <a title="商品验货质检" class="check"   target="_blank"></a>
        </div>
        <div class="search">
		<form method="get" action="index.php" onsubmit="return search_submit();" >
		<span class="search-area fl search_box">
			<input type="hidden" name="m" value="index" />
			<input type="hidden" name="a" value="so" />
			<input x-webkit-speech name="k" id="keywords" placeholder="请输入您要找的宝贝！" value="" class="txt text" />
		</span>
		<input type="submit" value="" class="smt fr">
		</form>
        </div>
    </div>
    <div class="mainNav">
        <div class="nav {:C('ftx_site_width')}">
            <ul class="navigation fl">
		<li class="<if condition="$nav_curr eq 'index'">current</if>   ">
			<a href="{:C('ftx_site_url')}">{:L('index_page')}</a>
			<div class="all-classify">
                        <dl>
			<dd>
			<volist name="cate_data" id="bcate" mod='4'>
			<if condition="$bcate['pid'] eq 0">
				<eq name="mod" value="3"></dd><dd></eq>
				<a <if condition="($cid eq $bcate['id']) OR ($cate_data[$cid]['pid'] eq $bcate['id'])">class="on"</if> href="{:U('index/cate', array('cid'=>$bcate['id']))}" title="{$bcate.name}"><span>{$bcate.name}</span></a>
			</if>
			</volist>
			</dd> 
                        </dl>
                    </div>
		
		</li>
		<ftx:nav type="lists" style="main">
			<volist name="data" id="val">
			<li class="  <if condition="$nav_curr eq $val['alias']">current</if>"><a href="{$val.link}" <if condition="$val.target eq 1">target="_blank"</if>>{$val.name}</a></li>
			</volist>
		</ftx:nav>

            </ul>
            <div class="state-show fr"> <a href="{:U('gift/index')}" target="_blank" class="normal-a">积分商城</a> <a href="javascript:;" class="normal-a dosign signin_a sign_btn" id="signIn_btn"><em class="icon-normal icon-sign"></em><em class="text">签到领积分</em></a>
                <div style="display: none;" class="normal-side-box" id="top-side-box">
                    <div class="box-tips">
                        <p class="text">每天最多可赚：<b>100</b> 积分<br></p>
                        <p class="other"> <a target="_blank" href="{:U('user/mingxi')}">我的积分</a>　｜　<a target="_blank" href="{:U('gift/index')}">积分商城</a><br>
                            QQ特享群：<b>{:C('ftx_qq_qun')}</b> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 
<!--OLD头部结束-->

 