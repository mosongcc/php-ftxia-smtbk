<?php
class meiliAction extends FirstendAction {
	public function _initialize() {
        parent::_initialize();
		$ftx_config = M('items_site')->where(array('code' => 'ftxia'))->getField('config');
        $this->_ftxconfig = unserialize($ftx_config);
    }

    public function index() {
		$p = I('p',1, 'intval');
		$sort = I('sort','top','trim');
		$cid = I('cid',0, 'intval');

		$ctop = $this->_get_top();
        $creq = $ctop->load_api('FtxiaMeilicatsGetRequest');
        $creq->setFields('id,name');
		$creq->setCid($cid);
		$creq->setTime(date("Y-m-d"));
		$cresp = $ctop->execute($creq);
        $cats = object_to_array($cresp->cats);
		$this->assign('cats',$cats);
		$this->assign('cid',$cid);
 
		$top = $this->_get_top();
        $req = $top->load_api('FtxiaMeiliItemsGetRequest');
        $req->setFields('item_id,title,pic_url,click_url,price,volume');
		$req->setCid($cid);
        $req->setPageNo($p);
		$req->setNaid(C('ftx_meilishuo_id'));
		$req->setSort($sort);
		$req->setTime(date("Y-m-d"));
		$resp = $top->execute($req);
        $count = $resp->totals;
		if($count>6000){$count = 6000;}
        $items_list = object_to_array($resp->items);
		$items = array();
		foreach($items_list as $key=>$val){
			$items[$key]			= $val;
			if(C('ftx_meilishuo_id')){
				$items[$key]['click_url']	= str_replace("11294", C('ftx_meilishuo_id'), $val['click_url']);
				$items[$key]['wap_url']	= str_replace("11294", C('ftx_meilishuo_id'), $val['wap_url']);
			}
		}
		$this->assign('items_list',$items);
        $pager = $this->_pager($count, '60');
        $this->assign('page', $pager->mshow());
		$this->assign('sort', $sort);
        $this->assign('nav_curr', 'meili');
        $this->_config_seo(array(
			'title' => '美丽说 — 汇集美丽商品 — ',
		));
        $this->display();
    }

	private function _get_top() {
        vendor('Ftxia.TopClient');
        vendor('Ftxia.RequestCheckUtil');
        vendor('Ftxia.Logger');
        $top = new TopClient;
        $top->appkey = $this->_ftxconfig['app_key'];
        $top->secretKey = $this->_ftxconfig['app_secret'];
        return $top;
    }
 
}