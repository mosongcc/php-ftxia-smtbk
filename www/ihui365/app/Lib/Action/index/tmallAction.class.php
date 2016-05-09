<?php
class tmallAction extends FirstendAction {
	public function _initialize() {
        parent::_initialize();
		$api_config = M('items_site')->where(array('code' => 'ftxia'))->getField('config');
        $this->_tbconfig = unserialize($api_config);
    }

    public function index() {
		$p = I('p',1, 'intval');
		$sort = I('sort','new','trim');
		$top = $this->_get_top();
        $req = $top->load_api('FtxiaTmallItemsGetRequest');
        $req->setFields('num_iid,title,pic_url,price,volume');
        $req->setPageNo($p);
		$req->setSort($sort);
		$req->setTime(date("Y-m-d"));
		$resp = $top->execute($req);
        $count = $resp->totals;
		if($count>6000){$count = 6000;}
        $items_list = object_to_array($resp->items);
		if(!$items_list){
			$result = object_to_array(json_decode($resp));
			if($result['errors']){
				$msg = $result['errors']['error']['msg'].',请联系飞天侠开放平台 <a href="http://www.ftxia.com/" target="_blank">http://www.ftxia.com/</a>';
				exit($msg);
			}
		}
		$this->assign('items_list',$items_list);
        $pager = $this->_pager($count, '60');
        $this->assign('page', $pager->kshow());
		$this->assign('sort', $sort);
        $this->assign('nav_curr', 'tmall');
        $this->_config_seo(array(
			'title' => '商城优选 — 精选最值得买的爆款商品 — ',
			'keywords' => '天猫商城,tmall',
			'description' => '为您提供天猫商城优质商品' ,
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