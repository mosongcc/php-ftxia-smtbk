<?php
class shopAction extends BackendAction {
	public function _initialize() {
        parent::_initialize();
        $this->_mod = D('tejia_cate');
		$api_config = M('items_site')->where(array('code' => 'ftxia'))->getField('config');
        $this->_ftxconfig = unserialize($api_config);
    }

	public function index(){
		$this->display();
	}

	public function setting(){
		if(IS_POST){
			$cate_id	= I('cate_id', 'trim');
			$url		= I('url', 'trim');
			$q			= I('q');
			$q			= urlencode($q);
			$sprice		= I('sprice', 'trim');
			$eprice		= I('eprice', 'trim');
			$sort		= I('sort', 'trim');
			$page		= I('page', 'trim');
			$coupon_start_time	= strtotime($_POST['coupon_start_time']);
			$coupon_end_time	= strtotime($_POST['coupon_end_time']);
			$url		= str_replace('http:','https:',$url);
			if(!$url){
				$this->ajaxReturn(0, '店铺地址必须填写！');
			}
			if(!$cate_id){
				$this->ajaxReturn(0, '入库分类必须选择!');
			}
			F('shop_setting', array(
				'cate_id' => $cate_id, 
				'q' => $q, 
				'url' =>$url, 
				'sprice' =>$sprice, 
				'eprice' =>$eprice, 
				'page' => $page, 
				'sort' => $sort, 
				'coupon_start_time' => $coupon_start_time, 
				'coupon_end_time' => $coupon_end_time, 
			));
			$this->collect();
		}
	}
	public function collect(){
		if (false === $shop_setting =F('shop_setting')){
			$this->ajaxReturn(0, L('illegal_parameters'));
		}
		$p =$this->_get('p', 'intval', 1);
		$page=$shop_setting['page'];
		if($p>1){
			if ($p > $page){
				$this->ajaxReturn(0, '已经采集完成'.$p.'页！请返回，谢谢');
			}

			if($shop_setting['total_page']){
				if ($p > $shop_setting['total_page']){
				$this->ajaxReturn(0, '已经采集完成'.$p.'页！请返回，谢谢');
				}

			}
		}
		unset($shop_setting['total_page']);
		$top = $this->_get_top();
        $req = $top->load_api('FtxiaTaobaoShopListGetRequest');
        $req->setFields('num_iid,title,pic_url,price,coupon_price,nick');
		$req->setUrl($shop_setting['url']);
		$req->setSprice($shop_setting['sprice']);
		$req->setEprice($shop_setting['eprice']);
		$req->setKeyword($shop_setting['q']);
		$req->setSort($shop_setting['sort']);
		$req->setPageNo($p);
		$resp = objtoarr($top->execute($req));
		if($resp['status']['code']!='200'){
			if($resp['status']){
				$this->ajaxReturn(0, $resp['status']['msg']);
			}
			if($resp['error']){
				$this->ajaxReturn(0, $resp['error']['msg']);
			}
		} 
		
        $count = $resp['total_results'];
        //列表内容
        $iids = array();
        $resp_items = objtoarr($resp['itemlists']);
		if(!$resp_items){
			$resul = objtoarr($resp);
			$this->ajaxReturn(0, $resul['error']['msg']);
		}
		$shop_setting['total_page'] = $resp['total_page'];
		F('shop_setting',$shop_setting);
        $taobaoke_item_list = array();
 
		foreach ($resp_items as $key => $val){
			$value							= (array) $val;
			$value['coupon_start_time']		= $shop_setting['coupon_start_time'];
			$value['coupon_end_time']		= $shop_setting['coupon_end_time'];
			$value['cate_id']				= $shop_setting['cate_id'];
			$value['astime']				= date("Ymd",$shop_setting['coupon_start_time']);
			$res=$this->_ajax_tb_publish_insert($value);
			if($res>0){
				$coll++;
			}
			$totalcoll++;
		} 
		if(strpos($html,'<a class="disable">下一页</a>')){
			$this->ajaxReturn(0, '已经采集完成'.$p.'页,本次采集到'.$totalcoll.'件商品！请返回，谢谢');
		}
		F('totalcoll',$totalcoll);
		$this->assign('p',$p);
		$this->assign('coll', $coll);
		$this->assign('totalnum', $totalcoll);
		$this->assign('totalcoll', $totalcoll);
		$resp =$this->fetch('collect');
		$this->ajaxReturn(1, '', $resp);
	}
	 

	private function _ajax_tb_publish_insert($item) {
        $item['title'] = strip_tags($item['title']);
        $result = D('items')->ajax_yg_publish($item);
        return $result;
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