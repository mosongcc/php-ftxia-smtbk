<?php
class brandAction extends FirstendAction {
	public function _initialize() {
        parent::_initialize();
        $api_config = M('items_site')->where(array('code' => 'ftxia'))->getField('config');
        $this->_tbconfig = unserialize($api_config);
    }
	 
	public function index(){

		$top = $this->_get_top();
        $req = $top->load_api('FtxiaBrandsCatGetRequest');
        $req->setFields('cid,name');
		$resp = $top->execute($req);
 
        $cats = object_to_array($resp->cats);
		if(!$cats){
			$result = object_to_array(json_decode($resp));
			if($result['errors']){
				$msg = $result['errors']['error']['msg'].',请联系飞天侠开放平台 <a href="http://www.ftxia.com/" target="_blank">http://www.ftxia.com/</a>';
				exit($msg);
			}
		}
		$this->assign('cats',$cats);


		$p			= I('p',1, 'intval');
		$cid		= I('cid');
		$timeFilter = I('timeFilter','','htmlspecialchars');
		$per		= 10;
		$top = $this->_get_top();
        $req = $top->load_api('FtxiaBrandsListGetRequest');
        $req->setFields('title,name');
		$req->setCid($cid);
		$req->setPageNo($p);
		$req->setTimeFilter($timeFilter);
		$req->setTime(date("y-m-d-H",time()));
		$resp = $top->execute($req);
        $brandlist = object_to_array($resp->brandlist);

		$totals		= $brandlist['totalnum'];
		$lists	= $brandlist['list']; 
		$this->assign('brands',$brandlist['brand']);
		$this->assign('lists',$lists);
		$this->assign('cid',$cid);
		$this->assign('timeFilter',$timeFilter);

		$pager = $this->_pager($totals, $per);
        $this->assign('page', $pager->kshow());
        $this->assign('nav_curr', 'brand');
        $this->_config_seo(array(
			'title' => ' 【品牌折扣】 —' ,
			'keywords' => '品牌团,品牌折扣',
			'description' => '为您提供优质品牌商品团购' ,
		));
		$this->display('index');
	}

	public function dlist(){ 
		$uid = I('uid');
		$top = $this->_get_top();
        $req = $top->load_api('FtxiaBrandsListGetRequest');
        $req->setFields('title,name');
		$req->setUid($uid);
		$req->setTime(date("y-m-d",time()));
		$resp = $top->execute($req);
        $brandlist = object_to_array($resp->brandlist);
		
		$this->assign('brands',$brandlist['brand']);
		$this->assign('items',$brandlist['list']['items']);
		$this->assign('floor',count($brandlist['list']['items']));
		$this->assign('shop',$brandlist['list']['shop']);
        $this->assign('nav_curr', 'brand');
	//p($brandlist['list']['shop']);
        $this->_config_seo(array(
			'title' => '【'.$brandlist['list']['shop']['nick'].'品牌专场】 —  ' ,
			'keywords' => $brandlist['list']['shop']['nick'],
			'description' => $brandlist['list']['shop']['txt'] ,
		));
		$this->display('dlist');
	}

	private function _get_top() {
        vendor('Ftxia.TopClient');
        vendor('Ftxia.RequestCheckUtil');
        vendor('Ftxia.Logger');
        $top = new TopClient;
        $top->appkey = $this->_tbconfig['app_key'];
        $top->secretKey = $this->_tbconfig['app_secret'];
        return $top;
    }
}