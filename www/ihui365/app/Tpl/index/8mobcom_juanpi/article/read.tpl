<!doctype html>
<html>
<head>
<include file="public:head" />
<load href="__STATIC__/8mobcom/css/article.css" />
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
	<div class="about {:C('ftx_site_width')} content">
		
		<div class="place-explain">
			<a target="_blank" href="{:C('ftx_site_url')}">{:C('ftx_site_name')}</a>
			&nbsp;&gt;&nbsp;
				<a target="_blank" href="{:U('article/index')}">文章资讯</a>		
			&nbsp;&gt;&nbsp; 
			<notempty name="all_cats[$article['cate_id']]['pid']">
				<a target="_blank" href="{:U('article/cate',array('id'=>$all_cats[$article['cate_id']]['pid']))}" >{$all_cats[$all_cats[$article['cate_id']]['pid']]['name']}</a>		
			&nbsp;&gt;&nbsp;
				
			</notempty>

			<a target="_blank" href="{:U('article/cate',array('id'=>$all_cats[$article['cate_id']]['id']))}" >{$all_cats[$article['cate_id']]['name']}</a>
			&nbsp;&gt;&nbsp;
			<a class="bady-xx-seo" href="{:U('article/read',array('id'=>$article['id']))}">{$article.title}</a>
		</div>
		 
		<div class="about_contain fl">
			<h2>{$article.title}</h2>
			<p class="gray tc mt10">时间：{$article.add_time|date="Y-m-d ",###}&nbsp;&nbsp;&nbsp;&nbsp;来源：{:C('ftx_site_name')}&nbsp;&nbsp;&nbsp;&nbsp;作者：{$article.author}&nbsp;&nbsp;&nbsp;&nbsp;阅读：{$article.hits}</p>
			<div class="about_content mt30">
				{$article.info}


				<div class="keyMode">
					<notempty name="tag_list">
					<div class="keyWord fl">关键词：
						<volist name="tag_list" id="tag">
						<a href="{:U('tag/'.$tag)}" target="_blank">{$tag}</a>&nbsp;&nbsp;&nbsp;
						</volist>
					</div>
					</notempty>
					<!--百度分享 Star-->
					<div class="bdsharebuttonbox fr"><i class="iTxt" style="float:left;padding-top:6px;">分享到：</i><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a></div>
					<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"{$article.title}","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
					<!--百度分享 End-->
				</div>

				<div class="">
					<div class="fl">上一篇：<a href="{:U('article/read',array('id'=>$pre_article['id']))}"  >{$pre_article.title}</a></div>
					<div class="fr">下一篇：<a href="{:U('article/read',array('id'=>$next_article['id']))}" >{$next_article.title}</a></div>
				</div>
			</div>

			
			<div class="read_list">
				<p><a href="{:U('article/index')}" target="_blank">more+</a>大家都在看：</p>
				<ul>
				<ftx:article type="lists" num="10" order="hits desc">
				<volist name="data" id="val">
					<li><a href="{:U('article/read',array('id'=>$val['id']))}" target="_blank" title="{$val.title}">{$val.title}</a></li>
				</volist>
				</ftx:article>
				</ul>
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
				<ftx:item type="lists" num="8">
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
    var _main = $(".content");
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