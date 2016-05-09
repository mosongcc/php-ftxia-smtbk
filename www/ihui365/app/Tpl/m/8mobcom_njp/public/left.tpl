<style>
.app-other {width: 60%;}
</style>
<div class="app-other">
    <ul>
    <li class="search">
        <div id="search-box">
            <form id="search-form" action="/index.php" method="get">
                <div class="box-search">
                    <input type="text" id="keyword" name="keyword" x-webkit-speech="" placeholder="搜索商品" autocomplete="off" value="">
                    <a href="javascript:;" class="del"><img src="/static/m_8mob_jp/images/del.png"></a>
                </div>
		<input type="hidden" id="g" name="g" value="m">
		<input type="hidden" id="m" name="m" value="index">
		<input type="hidden" id="a" name="a" value="index">
                <button id="search-submit" type="submit">
                    <img src="/static/m_8mob_jp/images/icon/search.png">
                </button>
            </form>
        </div>
    </li>
	<li class="normal active ">
        <a href="{:U('index/index')}">
        <em class="home"></em>首页</a></li>
	<volist name="cate_list.p" id="item">
	<li class="normal  "><a href="{:U('index/index',array('cid'=>$item['id']))}"><em style="background-position:-968px 0"></em>{$item.name}</a></li>
	</volist>
           
        </ul>
	<p><a href="{:U('user/index')}"><em class="icon-user"></em><br>个人中心</a><a href="{:U('about/us')}"><em class="icon-about"></em><br>关于{:C('ftx_site_name')}</a></p> 
</div>