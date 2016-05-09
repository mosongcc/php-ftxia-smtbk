<!doctype html>
<html>
<head>
<include file="public:head" />
<script type="text/javascript" src="__STATIC__/8mobcomjuanpi/js/index.js"></script>
</head>
<body>
<include file="public:header" />
<div class="jiu-nav-main">
	<div class="jiu-nav {:C('ftx_site_width')}">
		<div class="nav-item fl">
			<div class="item-list">
				<ul>
				<li><a href="{:C('ftx_site_url')}" <empty name="cid"> class="active"</empty>>全部</a></li>
				<?php  $cdi=0; ?>
				<volist name="cate_data" id="bcate">
					<if condition="($bcate['pid'] eq 0) AND ($cdi lt 9)">
					<?php $cdi++; ?>
					<li><a <if condition="($cid eq $bcate['id']) OR ($cate_data[$cid]['pid'] eq $bcate['id'])">class="active"</if> href="{:U('index/cate', array('cid'=>$bcate['id']))}" title="{$bcate.name}">{$bcate.name}</a></i>	
					</if>
				</volist>
				</ul>
			</div>
		</div>
		<div class="nav-other fl">
			<ul>
				<li><a href="{:U('xinpin/index')}" ><i class="today"></i><span>今日新品</span></a><em>{$today_item}</em></li>
			</ul>
		</div>
		<div class="n_h">
			<span>排序：</span>
			<a href="{:U('index/cate',array('cid'=>$cid,'sort'=>'default'))}"  class=" <if condition="$index_info['sort'] eq 'default'"> active </if> ">默认</a>
			<a href="{:U('index/cate',array('cid'=>$cid,'sort'=>'new'))}" class=" <if condition="$index_info['sort'] eq 'new'"> active </if> ">最新</a>
			<a href="{:U('index/cate',array('cid'=>$cid,'sort'=>'hot'))}" class=" <if condition="$index_info['sort'] eq 'hot'"> active </if> ">最热</a></div>
		</div>
	</div>
</div>
 
<notempty name="subnav"> 
<div class="jiu-nav-main jiu-nav-main-2" id="seclevel">
	<div class="jiu-nav {:C('ftx_site_width')}  seclevelinner">
		<div class="nav-item  ">
			<div class="item-list">
				<ul>
				<empty name="cinfo['pid']">
					<li><a href="{:U('index/cate', array('cid'=>$cid))}"   class="active">全部</a></li>
				<else />
					<li><a href="{:U('index/cate', array('cid'=>$cinfo['pid']))}"   >全部</a></li>
				</empty>
				<volist name="subnav" id="bcate"> 
					<li><a <if condition="$cid eq $bcate['id']">class="active"</if> href="{:U('index/cate', array('cid'=>$bcate['id']))}" title="{$bcate.name}">{$bcate.name}</a></i>
				</volist>
				</ul>
			</div>
		</div>
	</div>
</div>
</notempty>

 
<include file="public:nav-classify" />
 
 
<include file="public:list" />
 
<include file="public:footer" />
</body>
</html>