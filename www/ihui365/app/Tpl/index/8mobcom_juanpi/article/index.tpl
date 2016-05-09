<!doctype html>
<html>
<head>
<include file="public:head" />
<css file="__STATIC__/8mobcom/css/article.css" />
<link rel=stylesheet type=text/css href="__STATIC__/8mobcom/css/good.css" />
</head>
<body>
<include file="public:header" /> 
<div class="jiu-nav-main">
	<div class="jiu-nav {:C('ftx_site_width')}">
		<div class="nav-item ">
			<div class="item-list">
				<ul>
				<li ><a href="{:U('article/index')}" <if condition="$cid eq 0"> class="active"</if> >全部</a></li>
				<volist name="acats" id="vol"> 
				<li><a href="{:U('article/cate',array('id'=>$vol['id']))}"  <if condition="$cid eq $vol['id']"> class="active"</if> >{$vol.name}</a></li>
				</volist>
				</ul>
			</div>
		</div>
	</div>
</div>
 

<div class="main clear mb20 {:C('ftx_site_width')}">
	
	<div class="about {:C('ftx_site_width')} article_list">

		<div class="place-explain">
			<a target="_blank" href="{:C('ftx_site_url')}">{:C('ftx_site_name')}</a>
			&nbsp;&gt;&nbsp;
				<a target="_blank" href="{:U('article/index')}" >文章资讯</a>		
			&nbsp;&gt;&nbsp; 
			<notempty name="all_cats[$cid]['pid']">
				<a target="_blank" href="{:U('article/cate',array('id'=>$all_cats[$cid]['pid']))}">{$all_cats[$all_cats[$cid]['pid']]['name']}</a>
			&nbsp;&gt;&nbsp;
			</notempty>
			<notempty name="cid">
				<a target="_blank" href="{:U('article/cate',array('id'=>$cid))}">{$all_cats[$cid]['name']}</a>
			&nbsp;&gt;&nbsp;
			</notempty>
			<a class="bady-xx-seo" href=""></a>
		</div>
		 
		<div class="about_contain fl ">
			<div class="about_content">
				<ul class="about_notes">
					<volist name="article_list" id="val">
					<dl class="newsDl">
					<dt><div id="subwrap">
						<ul>
						<a href="{:U('article/read',array('id'=>$val['id']))}" target="_blank"><img src="{$val.pic_url}" title="{$val.title}" border="0" style=" vertical-align:middle"></a>
						</ul>
						</div>
										</dt>
					<dd class="tit"><a href="{:U('article/read',array('id'=>$val['id']))}" title="{$val.title}" target="_blank">{$val.title}</a></dd>
					<dd class="source">来源于：{:C('ftx_site_name')} <span>{$val.add_time|date="Y-m-d",###}</span></dd>
					<dd class="des"> {$val.seo_desc}<a href="{:U('article/read',array('id'=>$val['id']))}" title="[详细]" target="_blank">[详细]</a></dd>
					</dl> 
					</volist>
				</ul>
			</div>
			<div class="page page2 tr mb10">
				<div class="pageNav">{$page}</div>
			</div>
		</div>

		<div class="right_menu fr">

			<div class="widget">
				<h3>热词标签</h3>
				<div class="tags">
					<volist name="tags" id="tag">
					<a href="{:U('tag/'.$tag['name'])}" target="_blank" class="tag-link-20"  style="font-size: <?php echo rand(12,20);?>px;">{$tag.name}</a>
					</volist>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="widget">
				<h3>文章推荐</h3>
				<ul>
				<volist name="new_article" id="art">
					<li><a href="{:U('article/read',array('id'=>$art['id']))}" target="_blank" >{$art.title}</a></li>
				</volist>
				</ul>
				<div class="clear"></div>
			</div>

			<div class="widget art_item">
				<h3>精品推荐</h3>
				<div class="sidebarhot">
				<ftx:item type="lists"  num="10">
				<volist name="data" id="val">
					<div class="hotshopbox">
						<a href="{:U('item/index',array('iid'=>$val['num_iid']))}" target="_blank"  title="{$val.title}">
							<img class="home-thumb" src="{:attach(get_thumb($val['pic_url'], '_b'),'item')}" alt="{$val.title}" />
						</a>
					</div>
				</volist>
				</ftx:item>
				<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
	
</div>

<script type="text/javascript">
   var ele_fix = $(".art_item");
    var _main = $(".article_list");
    if (ele_fix.length > 0) {
        var ele_offset_top = ele_fix.offset().top;
        $(window).scroll(function() {
            var scro_top = $(this).scrollTop();
            var test = ele_offset_top + scro_top;
            var fix_foot_pos = parseInt(ele_fix.height()) + parseInt(scro_top);
            var mainpos = parseInt(_main.offset().top) + parseInt(_main.height());
            if (scro_top <= ele_offset_top && fix_foot_pos < mainpos) {
                ele_fix.css({
                    position: "static",
                    top: "0"
                });
            } else if (scro_top > ele_offset_top && fix_foot_pos < mainpos) {
                ele_fix.css({
                    "position": "fixed",
                    "top": "0"
                });
            } else if (scro_top > ele_offset_top && fix_foot_pos > mainpos) {
                var posi = mainpos - fix_foot_pos - 18;
                ele_fix.css({
                    position: "fixed",
                    top: posi
                });
            }
        });
    }
</script>


<include file="public:footer" />
</body>
</html>
