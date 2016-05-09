<!DOCTYPE html>
<html lang="en">
<head>
	<include file="public:head" />
<style>
.title-tips{ margin: 0 auto 10px; color: #919191; width: 290px; overflow: hidden; }
.fl {
float: left;
display: inline;
}
.fr {
float: right;
display: inline;
}
.good-price {
width: 290px;
height: 36px;
line-height: 36px;
position: relative;
margin: 0 auto 10px auto;
}

.good-price .price-current {
font-size: 32px;
color: #f8285c;
font-family: Arial;
}
.good-price .price-current em {
font-size: 14px;
font-family: "微软雅黑", "verdana";
vertical-align: 1px;
margin-left: 1px;
}
.good-price .btn-new {
position: absolute;
top: 5px;
right: 0;
}
.good-price .btn-new a {
display: block;
font-size: 14px;
cursor: pointer;
color: #fff;
width: 75px;
height: 30px;
line-height: 30px;
background-color: #f8285c;
text-align: center;
overflow: hidden;
}
.good-price .btn-new.buy a {
text-shadow: 1px 1px #ff4700;
}
.main .goods-list li .list-good .good-price .btn-new a {
color: #f8285c;
}


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
			<span id="t-index">积分兑换</span>
		</div>
		</header>
		 
		<div id="goods">
		<section class="goods" id="goods">
		<ul class="goods-list clear" id="goods_block">
		<volist name="item_list" id="item" key="i">
			<li>
				<a class="goods-m"  href="{:U('gift/detail', array('id'=>$item['id']))}" >
					<img class="lazy" _src="{:attach(str_replace('_s.'.array_pop(explode('.', $item['img'])), '_b.'.array_pop(explode('.', $item['img'])), $item['img']), 'score_item')}" height="197px;">
				</a>
				<a href="{:U('gift/detail', array('id'=>$item['id']))}"  target="_blank"><h3>{$item.title}</h3></a>
				<div class="title-tips">
					<span class="fl">开始时间：<em class="old-price">{$item.start_time|date="Y-m-d",###}</em></span>
					<span class="fr">剩余：<em class="org_2">{$item.stock}</em>份</span>
				</div>
				<div class="good-price clear">
					<span class="price-current">{$item.score}<em class="unit">积分</em></span>
					<div class="btn-new buy">
						<a target="_blank" href="{:U('gift/detail', array('id'=>$item['id']))}"><span>我要兑换</span></a>
					</div>
				</div>
				
			</li>
 
		</volist>
		</ul>
		</section>
		<div class="paging">
			<div class="paging-nav">
			{$page}
			</div>
		</div>
		</div>


		<include file="public:footer" />
	</div>
</div>
    <include file="public:mainjs" />
</body>
</html>