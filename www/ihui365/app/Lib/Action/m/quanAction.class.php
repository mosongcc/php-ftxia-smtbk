<?php
class quanAction extends FirstendAction {
	public function _initialize() {
        parent::_initialize();
		$api_config = M('items_site')->where(array('code' => 'ftxia'))->getField('config');
        $this->_tbconfig = unserialize($api_config);
    }

    public function index() {
		$p		= I('p',1, 'intval');
		$sort	= I('sort','normal','trim');
		$cid	= I('cid');
		$key	= I('key');

		$top = $this->_get_top();
        $req = $top->load_api('FtxiaQuanListGetRequest');
        $req->setFields('num_iid,title,pic_url,price,volume');
        $req->setPageNo($p);
		if($key){
			$req->setKeyword($key);
		}
		$req->setSort($sort);
		$req->setCid($cid);
		$req->setTime(date("m-d:H:i"));
		$resp = $top->execute($req);
        $count = $resp->totals;
        $items_list = object_to_array($resp->items);
		$this->assign('items_list',$items_list);
        $pager = $this->_pager($count, '60');
        $this->assign('page', $pager->fshow());
		$this->assign('total', $count);
		$this->assign('sort', $sort);
		$this->assign('cid', $cid);
        $this->assign('nav_curr', 'quan');
        $this->_config_seo(array(
			'title' => date('n月j日').'独家全网内部优惠券汇总--内部券秒杀汇总',
		));
        $this->display();
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