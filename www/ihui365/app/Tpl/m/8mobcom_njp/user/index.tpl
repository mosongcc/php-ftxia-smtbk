<!DOCTYPE html>
<html lang="en">
<head>
	<include file="public:head" />
<style>

</style>
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
			<span id="t-index">个人中心</span>
			<span id="t-user"><a href="{:U('user/logout')}" class="free-reg" rel="nofollow">退出</a></span>
		</div>
		</header>

		<div class="user-box">
                <div class="user-box-t">
			<img src="__STATIC__/m_8mob_jp/images/user/user-top.png">
			<div class="user-box-person">
				<div class="user-mes">
					<p class="tel">{$info.username}</p>
					<p class="datum"><a href="{:U('user/info')}"> 积分：{$info.score}</a></p>
				</div>
				<a href="{:U('user/info')}" class="icon icon-enter fr"></a>
			</div>
		</div>

                <div class="user-nav-bot whitebg">
			<ul>
                        <li class="clear">
                            <a href="{:U('like/index')}">
                                <em class="icon icon-collect"></em>
                                <span>我的收藏</span>
                                <em class="arrow"></em>
                            </a>
                        </li>
			<li class="clear">
			<a href="{:U('gift/index')}">
                                <em class="icon icon-ticket"></em>
                                <span>积分兑换</span>
                                <em class="arrow"></em>
                            </a>
			 </li>


                        <li class="clear">
                            <a href="{:U('user/password')}">
                                <em class="icon icon-address"></em>
                                <span>修改登录密码</span>
                                <em class="arrow"></em>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="user-nav-bot whitebg">
			<ul>
                        <li>
                            <a href="{:U('about/help')}">
                                <em class="icon icon-help"></em>
                                <span>帮助中心</span>
                                <em class="arrow"></em>
                            </a>
                        </li>
                        <li>
                            <a href="{:U('about/us')}">
                                <em class="icon icon-about"></em>
                                <span>关于我们</span>
                                <em class="arrow"></em>
                            </a>
                        </li>
			</ul>
                </div>


                <ul class="action-list other-list">
                    <li>
                        <em class="icon icon-tb"></em>
                        <div class="link-box">
                            <em></em><a href="http://h5.m.taobao.com/mlapp/olist.html"><span>淘宝订单</span></a>
                            <a href="http://h5.m.taobao.com/awp/base/bag.htm"><span>购物车</span></a>
                            <a href="http://h5.m.taobao.com/mlapp/olist.html"><span>物流信息</span></a>
                        </div>
                    </li>
                </ul>
		</div>

		<include file="public:footer" />
	</div>
</div>
    <include file="public:mainjs" />
</body>
</html>