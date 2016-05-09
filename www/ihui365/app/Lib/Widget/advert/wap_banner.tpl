<notempty name="ad_list">
<script type="text/javascript" src="__STATIC__/js/MobileSlider.js"></script>
<style>
.slider{display:none}/*用于获取更加体验*/
.focus span{width:10px;height:10px;margin-right:10px;border-radius:50%;background:#666;font-size:0}
.focus span.current{background:#fff}
</style>
<div class="slider">
	<ul>
	<volist name="ad_list" id="ad" key="i">
		<li><a href="{$ad.url}" target="_blank"><img src="{:attach($ad['content'],'bannervert')}" alt="{$ad.desc}"></a></li>
	</volist>
	</ul>
</div>
<script>
	$(".slider").MobileSlider({width:640,height:256,during:5000})
</script>
</notempty>