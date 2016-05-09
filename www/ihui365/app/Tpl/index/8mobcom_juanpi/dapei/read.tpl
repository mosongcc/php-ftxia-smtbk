<!doctype html>
<html class="jp-pc w1200">
<head>
<include file="public:head" />

<link rel="stylesheet" type="text/css" href="__STATIC__/8mobcom/css/dapei.css" />

<script src="http://g.tbcdn.cn/??kissy/k/1.3.0/kissy-min.js"></script>
<script src="http://g.tbcdn.cn/??thx/brix/2.0/brix-min.js" charset="utf-8" bx-config="{autoPagelet:true,componentsPath:'http://g.tbcdn.cn/mm/yellowstone/0.17.01/', tag: '20.4.245'}"></script>
<script>  
var PID = '{$pid}';
var UNID = '199';
</script>
<script type="text/javascript" src="__STATIC__/8mobcom/js/click_track.js"></script>

</head>
<body>
<include file="public:header" />
<div bx-name="styleDetail" bx-path="components/style/detail">
<div class="con-wrap dapei-list-detail clearfix" id="J_listDetail">    
    <div class="dapei-detail-con clearfix" id="J_listDetailCon">
	<div class="detail-left-wrap">
	    <div class="detail-left">
                <div class="detail-con clearfix" id="J_detailCon">
		<notempty name="item['pic_url']">
			<img src="{$item.pic_url}_450x10000.jpg" id="mate_pic_0" alt="{$item.title}" class="first">
		</notempty>
		<notempty name="item['pics']">
			<volist name="item['pics']" id="pic" key="i">
				<img src="{$pic}_450x10000.jpg" id="mate_pic_{$i}" alt="{$item.title}" >
			</volist>
		<else/>

			<notempty name="item['one_pic_url']">
			<img src="{$item.one_pic_url}_450x10000.jpg" id="mate_pic_2" alt="{$item.one_title}" class=""></notempty>
			<notempty name="item['two_pic_url']">
			<img src="{$item.two_pic_url}_450x10000.jpg" id="mate_pic_3" alt="{$item.two_title}" class=""></notempty>
			<notempty name="item['three_pic_url']">
			<img src="{$item.three_pic_url}_450x10000.jpg" id="mate_pic_4" alt="{$item.three_title}" class=""></notempty>
			<notempty name="item['four_pic_url']">
			<img src="{$item.four_pic_url}_450x10000.jpg" id="mate_pic_5" alt="{$item.four_title}" class=""></notempty>

		</notempty>


		<div class="detail-nav" id="J_detailNav">

		<notempty name="item['pic_url']">
			<a href="#mate_pic_0"><img src="{$item.pic_url}_90x135.jpg" alt="{$item.title}" class="first"><span class="pic-border"></span></a>
		</notempty>

		<notempty name="item['pics']">
			<volist name="item['pics']" id="pic" key="i">
				<a href="#mate_pic_{$i}"><img src="{$pic}_90x135.jpg" alt="{$item.title}"><span class="pic-border"></span></a>
			</volist>
		<else/>

			<notempty name="item['one_pic_url']"><a href="#mate_pic_1"><img src="{$item.one_pic_url}_90x135.jpg" alt="{$item.one_title}"><span class="pic-border"></span></a></notempty>
			<notempty name="item['two_pic_url']"><a href="#mate_pic_2"><img src="{$item.two_pic_url}_90x135.jpg" alt="{$item.two_title}"><span class="pic-border"></span></a></notempty>
			<notempty name="item['three_pic_url']"><a href="#mate_pic_3"><img src="{$item.three_pic_url}_90x135.jpg" alt="{$item.three_title}"><span class="pic-border"></span></a></notempty>
			<notempty name="$item['four_pic_url']"><a href="#mate_pic_4"><img src="{$item.four_pic_url}_90x135.jpg" alt="{$item.four_title}"><span class="pic-border"></span></a></notempty>

		</notempty>
		
		
            </div>
            </div>
            </div>
        </div>

        <div class="detail-right-wrap" id="J_listDetailRight">
            <div class="daren-info clearfix">
                <div class="daren-logo">
                    <a href="{$item.item_url}" target="_blank"><img src="{$item.avatar}" alt="{$item.author}"></a>
                </div>
              <div class="daren-desc">
                <p class="name-line">
                  <a href="{$item.item_url}" target="_blank"><span class="mate-daren-name">{$item.author}</span><span class="g-daren-ico"></span></a>
                </p>
                <p class="sing-line">{$item.info}</p>
                </div>
            </div>
            <div class="detail-right" id="J_detailRight">                
                <div class="dp-detail-buyimgs" id="dp-detail-buys">
                  <h3>可购买宝贝</h3>
                  <ul class="">


		  <notempty name="item['pics']">
			<volist name="item['pics']" id="pic" key="i">
			<li>
				<a href="{$item.click_url}" target="_blank" class="clearfix">
				<span class="img">
					<img src="{$pic}_90x90xz.jpg" alt="{$item.title}"/>
					
					<span class="txt-detail">查看详情</span>
				</span>                         
				<span class="gobuy">去购买</span>
				</a>
			</li>
			</volist>
		<else/>
			<notempty name="item['one_pic_url']">
			<li>
				<a href="{$item.click_url}" target="_blank" class="clearfix">
				<span class="img">
					<img src="{$item.one_pic_url}_90x90xz.jpg" alt="{$item.one_title}"/>
					
					<span class="txt-detail">查看详情</span>
				</span>                         
				<span class="gobuy">去购买</span>
				</a>
			</li>
			</notempty>
			<notempty name="item['two_pic_url']">
			<li>
				<a href="{$item.click_url}" target="_blank" class="clearfix">
				<span class="img">
					<img src="{$item.two_pic_url}_90x90xz.jpg" alt="{$item.two_title}"/>
					
					<span class="txt-detail">查看详情</span>
				</span>                         
				<span class="gobuy">去购买</span>
				</a>
			</li>
			</notempty>
			<notempty name="item['three_pic_url']">
			<li>
				<a href="{$item.click_url}" target="_blank" class="clearfix">
				<span class="img">
					<img src="{$item.three_pic_url}_90x90xz.jpg" alt="{$item.three_title}"/>
					
					<span class="txt-detail">查看详情</span>
				</span>                         
				<span class="gobuy">去购买</span>
				</a>
			</li>
			</notempty>
			<notempty name="$item['four_pic_url']">
			<li>
				<a href="{$item.click_url}" target="_blank" class="clearfix">
				<span class="img">
					<img src="{$item.four_pic_url}_90x90xz.jpg" alt="{$item.four_title}"/>
					
					<span class="txt-detail">查看详情</span>
				</span>                         
				<span class="gobuy">去购买</span>
				</a>
			</li>
			</notempty>
		</notempty>
		</ul>
              </div>               
                <div class="mate-model-box mate-model-comment">
                <div class="bdsharebuttonbox" style="margin: 0 0 20px 100px;">
		<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
		<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
		<a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
		<a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
		<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
		</div>
                 <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"{$item.info}","bdMini":"1","bdMiniList":false,"bdPic":"{$item.pic_url}","bdStyle":"1","bdSize":"24"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
                           
                </div>

            </div>
        </div>
    </div>
</div>
<div class="con-wrap">
    <div class="style-detail-recommend">
        <h3 class="recommend-title">相似推荐</h3>
        <div class="recommend-list-wrap">
            <div class="recommend-list clearfix">
			 
             <volist name="dapei_like" id="val">
                    <div class="mate-box">
                        <div class="info-wrap">
                            <div class="info-img">
                                <a href="{:U('dapei/read',array('id'=>$val['id']))}">
                                    <img src="{$val.pic_url}_240x10000Q90.jpg" alt="" width="230">
                                </a>
                                <div class="info-detail">
                                    <span>{$val.itemnum}件搭配宝贝</span>
                                    <div class="thumb-goods">
                                         <div class="thumb-mL10 clearfix">
						<if condition="$val['onepic'] eq '' ">
	                    <else/>
                          <a href="{$val.click_url}" target="_blank">
                              <img src="{$val.onepic}_72x72xz.jpg" alt="{$val.title}">
                          </a>
						</if>
						<if condition="$val['twopic'] eq '' ">
	                    <else/>
                          <a href="{$val.one_click_url}" target="_blank">
                              <img src="{$val.twopic}_72x72xz.jpg" alt="{$val.one_title}">
                          </a>
						</if>
						<if condition="$val['threepic'] eq '' ">
	                    <else/>
                          <a href="{$val.two_click_url}" target="_blank">
                              <img src="{$val.threepic}_72x72xz.jpg" alt="{$val.two_title}">
                          </a>
						</if>  
						<if condition="$val['fourpic'] eq '' ">
	                    <else/>
                          <a href="{$val.three_click_url}" target="_blank">
                              <img src="{$val.fourpic}_72x72xz.jpg" alt="{$val.three_title}">
                          </a>
						</if>
                        </div>
                                </div>
                                </div>
                            </div>
                            <p class="goods-txt">
                                {$val.info}
                            </p>
                            <p class="share-action clearfix">
                                <a href="{:U('dapei/read',array('id'=>$val['id']))}" class="favorite J_favorite">去看看</a>
                            </p>
                        </div>
                        <div class="share-user">
                            <p class="user-line">
                                <a href="{:U('dapei/read',array('id'=>$val['id']))}" target="_blank" class="user-img">								
                                <img src="{$val.avatar}" alt="{$val.author}">
                                </a>
                                 <em class="uname"><a href="{:U('dapei/read',array('id'=>$val['id']))}" target="_blank">{$val.author}</a></em><span class="daren-icon"></span>
					      </p>
                          </div>
             </div>
			 </volist>
             
            </div>
        </div>
    </div>
</div>
</div> 
<include file="public:footer" />
</body>
</html>
