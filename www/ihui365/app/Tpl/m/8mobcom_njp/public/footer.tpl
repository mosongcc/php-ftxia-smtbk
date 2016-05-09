
	<div id="back_top" class="slide-box" style="display: none;">
		<a href="#" class="back-top"><img src="/static/m_8mob_jp/images/icon/back-top.png"></a>      
	</div>
	<script type="text/javascript">
	//回到顶部图标显示隐藏效果
	document.getElementById("back_top").style.display = "none";
	window.onscroll = function () {
	    if (document.documentElement.scrollTop + document.body.scrollTop > 100) {
		document.getElementById("back_top").style.display = "block";
	    }
	    else {
		document.getElementById("back_top").style.display = "none";
	    }
	}
	var $divWidth = $('.goods-a img').width();
	$('.goods-a img').css({'height':$divWidth});

	</script>
	<style type="text/css">
	#foot{height: 120px;}
	</style>
	{:C('ftx_taojindian_html')}
	<div id="foot">
	    <div class="foot-nav">
		<a href="{:C('ftx_site_url')}"><img src="/static/m_8mob_jp/images/icon/phone.png">电脑版</a>
		<a href="http://www.mumujie.com/mapi/apk/mumujieV1.0.apk" class="joa_load_app"><img src="/static/m_8mob_jp/images/icon/client.png">客户端</a>
		<a href="{:U('index/index')}" class="_border"><img src="/static/m_8mob_jp/images/icon/home.png">返回首页</a>
	    </div>
	    <div class="foot-copyright"></div>
	    <h2>copyright © 2015 {:C('ftx_site_name')}</h2>
	</div>


<script type="text/javascript">
$("img.lazy").lazyload({threshold:200,failure_limit:30});

var FTXIAER = {
    root: "__ROOT__",
	site: "{:C('ftx_site_url')}",
    uid: "<?php echo $visitor['id'];?>", 
    url: {}
};
var lang = {};
<volist name=":L('js_lang')" id="val">lang.{$key} = "{$val}";</volist>
</script>
<ftx:load type="js" href="__STATIC__/js/jquery/plugins/jquery.tools.min.js,__STATIC__/js/jquery/plugins/jquery.masonry.js,__STATIC__/js/jquery/plugins/formvalidator.js,__STATIC__/js/ftxia.js,__STATIC__/js/front.js,__STATIC__/js/dialog.js,__STATIC__/js/user.js" />
