<notempty name="ad_list">
 <div class="top_bar">
	<ul id="banner_list" class="banner">
	<volist name="ad_list" id="ad" key="i">
		<li style="background:url({:attach($ad['content'],'bannervert')}) no-repeat center center;" ><a  title="{$ad.desc}"   target="_blank" href="{$ad.url}" class="pic"></a></li>
	</volist>
	</ul>
</div>
</notempty>