<div class="jiu-side-nav {:C('ftx_site_width')}">
	<if condition="C('ftx_site_navlogo') neq ''">
		<div><a class="logo" href="{:C('ftx_site_url')}"><img src="{:C('ftx_site_navlogo')}" width="134" height="74" /></a></div>
	<else />
		<div><a class="logo" href="{:C('ftx_site_url')}"><img src="/static/jky/images/fl_nav_logo.jpg" width="134" height="74" /></a></div>
	</if>
		<div class="content">
		<div class="hd">
			<h3>分类筛选</h3>
		</div>
		<div class="bd">
			<ul>
			<li><a href="{:C('ftx_site_url')}" <empty name="cid"> class="on"</empty>>全部</a></li>
			<volist name="cate_data" id="bcate">
				<if condition="$bcate['pid'] eq 0">
				<li><a <if condition="($cid eq $bcate['id']) OR ($cate_data[$cid]['pid'] eq $bcate['id'])">class="on"</if> href="{:U('index/cate', array('cid'=>$bcate['id']))}" title="{$bcate.name}">{$bcate.name}</a></i>	
				</if>
			</volist>
			</ul>
		</div>
		<div class="hd">
			<h3>精选推荐</h3>
		</div>
		<div class="bd">
			<ul class="bd-other">
				<li><a href="{:U('jiu/index')}" >九块九</a></li>
				<li><a href="{:U('shijiu/index')}" >十九块九</a></li>
			</ul>
		</div>
		
		<div class="bottom"> </div>
	</div>
</div>
