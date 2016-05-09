<?php
class brand_itemsAction extends FirstendAction {

	public function _initialize() {
        parent::_initialize();
		$api_config = M('items_site')->where(array('code' => 'ftxia'))->getField('config');
        $this->_tbconfig = unserialize($api_config);
    }

    public function index() {
		$act_sign_id		= I('act_sign_id', 'intval');
		$ltop = $this->_get_top();
		$req = $ltop->load_api('FtxiaJuBrandItemsGetRequest');
		$req->setSid($act_sign_id);
		$req->setTime(date("y-m-d-H",time()));
		$resp = $ltop->execute($req);
		$jus = object_to_array($resp->items);
		$html= Newiconv("GBK","UTF-8",urldecode($jus['html']));
		$html = str_replace("data-ks-lazyload","src",$html);
		$this->assign('html',$html);
        $this->assign('nav_curr', 'ju');
        $this->_config_seo(array(
			'title' => ' 汇聚最划算的团购商品 - ' . C('ftx_site_name'),
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