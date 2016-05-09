<?php
class sitemapAction extends BackendAction {

	public function index(){
		$this->display();
	}

	public function toxml() { 
		$this->_mod = D('items');
		$order = 'id desc';
		$site_url = C('ftx_site_url');
	   
		$where['pass'] = '1';
		$where['isshow'] = '1'; 

		$baiduhtml = '<?xml version="1.0" encoding="utf-8"?>
		   <urlset>';
		$items_list = $this->_mod->where($where)->order($order)->limit('0,1000')->select();
		foreach($items_list as $key=>$item){
			$baiduhtml .= "\r\n    <url>\r\n        <loc>" . htmlentities($site_url."index.php?m=item&a=index&id=".$item['num_iid'], ENT_QUOTES) . "</loc>\r\n        <lastmod>". date('Y-m-d',$item['add_time'])."</lastmod>\r\n        <changefreq>daily</changefreq>\r\n        <priority>0.8</priority>\r\n    </url>"; 
		}
		$baiduhtml.= '</urlset>';
		file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/sitemap.xml', $baiduhtml);
		$this->ajaxReturn(0, 'sitemap生成完成！');
    }
 
    public function baidu() {
		$baidu_site = C('ftx_baidu_site');
		$baidu_token = C('ftx_baidu_token');
		if(!$baidu_site || !$baidu_token ){
			$this->ajaxReturn(0, '百度推送Token未设置！');
		}
		$this->_mod = D('items');
		$order = 'id desc';
	   
		$where['pass'] = '1';
		$where['isshow'] = '1'; 
		$baidu = array();
 
		$items_list = $this->_mod->where($where)->order($order)->limit('0,1000')->select();
		foreach($items_list as $key=>$item){
			$baidu[] = C('ftx_site_url').'index.php?m=item&a=index&id='.$item['num_iid'];
					 
		}  
		$result = $this->grab($baidu);
		$data = objtoarr(json_decode($result));
		if($data['error']){
			$message = $data['message'];
			$msg = $message;
			if('over quota' == $message){$msg = '超过百度每日配额了!请明日再提交！';}
			if('site error' == $message){$msg = '站点未在站长平台验证';}
			if('only 2000 urls are allowed once' == $message){$msg = '每次最多只能提交2000条链接';}
			if('token is not valid' == $message){$msg = 'token错误';}
			if('not found' == $message){$msg = '接口地址填写错误';}
			$this->ajaxReturn(0, $msg);
		}
		if($data['success']){
			$msg = '成功推送'.$data['success'].'条，当天剩余'.$data['remain'].'条';
			$this->ajaxReturn(0, $msg);
		}
		if($data['not_same_site']){
			$this->ajaxReturn(0, '提交的站点与配置的信息不一致！');
		}
		p($data);
    }

	public function grab($urls){
		$baidu_site = C('ftx_baidu_site');
		$baidu_token = C('ftx_baidu_token');
		$api = 'http://data.zz.baidu.com/urls?site='.$baidu_site.'&token='.$baidu_token;
		$ch = curl_init();
		$options =  array(
			CURLOPT_URL => $api,
			CURLOPT_POST => true,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POSTFIELDS => implode("\n", $urls),
			CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
		);
		curl_setopt_array($ch, $options);
		$result = curl_exec($ch);
		return $result;
	}
 
}