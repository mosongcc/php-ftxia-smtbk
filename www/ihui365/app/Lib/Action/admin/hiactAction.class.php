<?php

class hiactAction extends BackendAction {

	private $_tbconfig = null;
	public function _initialize() {
        parent::_initialize();
		$api_config = M('items_site')->where(array('code' => 'ftxia'))->getField('config');
        $this->_tbconfig = unserialize($api_config);

		$taodianjin		= C('ftx_taojindian_html');
		$this->tb_token		= C('ftx_tb_token');
		if(strpos($taodianjin,'text/javascript')){
			$this->pid		= get_word($taodianjin,'pid: "','"');
		}else{
			$this->pid		= $taodianjin;
		}

    }

 
	 public function _before_index() {
		
		if(!$this->pid){
			exit('请先设置淘点金!');
		}

		$parr = explode("_",$this->pid);
		$siteId = $parr[2];
		$adzoneId = $parr[3];

		$this->assign('tb_token',	$this->tb_token);
		$this->assign('siteId',		$siteId);
		$this->assign('adzoneId',	$adzoneId);
 
    }

	public function setting(){
		 $this->display();
	}

	public function collect(){
		$eventId			= I('eventid','','intval');
		$cate_id			= I('cate_id','','intval');
		$p					= I('p',1,'intval');
		$coupon_start_time	= I('coupon_start_time');
		$coupon_end_time	= I('coupon_end_time');
		if ($p > 1) {
			//$hiact_totalcoll = F('hiact_totalcoll');
			//F('hiact_totalcoll', NULL);
			//$this->ajaxReturn(0, '采集完成'.$hiact_totalcoll.'条！完毕,谢谢!');
		}

		if(!$eventId){$this->ajaxReturn(0, '请选择主题');}


		if (false === $hiact_totalcoll = F('hiact_totalcoll')) {
			$hiact_totalcoll = 0;
		}
		if (false === $hiact_collect_time = F('hiact_collect_time')) {
			$hiact_collect_time = time();
			F('hiact_collect_time', time());
		}




		$tb_top = $this->_get_top();
        $req = $tb_top->load_api('FtxiaAliActivityItemsGetRequest');
        $req->setFields('num_iid,title,pic_url,price,coupon_price,coupon_rate,shop_type,click_url');
		$req->setEventid($eventId);
		$req->setPid($this->pid);
		$req->setTime(date("Y-m-d"));
        $resp = objtoarr($tb_top->execute($req));

		if($resp['code'] =='10001'){
			$this->ajaxReturn(0, $resp['msg']);
		}
        $totalnum = $resp['total_results'];
        //列表内容
        $iids = array();
        $resp_items = $resp['itemlists'];
		//p($resp_items);
        $taobaoke_item_list = array();
		//$this->ajaxReturn(0, '采集完成'.$totalnum.'条！完毕,谢谢!');
        //foreach ($resp_items  as $val) {

		$pre = 10;
		$ii = ($p-1)*$pre;
		$iicount = $ii + $pre;
		$maxpage = $totalnum/$pre +1;
		if($p>$maxpage){
			F('hiact_totalcoll', NULL);
			$this->ajaxReturn(0, '采集完成'.$totalnum.'条！完毕,谢谢!');
		}

		for($i=$ii;$i<$iicount;$i++){
						 
						
			$val = $resp_items[$i];
			if(!$val['coupon_start_time']){
				if(!$coupon_start_time){
					$this->ajaxReturn(0, '请设置开始时间');
				}
				$val['coupon_start_time'] = strtotime($coupon_start_time);
			}
			if(!$val['coupon_end_time']){
				if(!$coupon_end_time){
					$this->ajaxReturn(0, '请设置结束时间');
				}
				$val['coupon_end_time'] = strtotime($coupon_end_time);
			}
            //$val = (array) $val;
			$msg = '成功！';
			$val['cate_id']=$cate_id;
            $taobaoke_item_list[] = $val;
			if($val['num_iid']){
				//p($val);
				$res= $this->_ajax_ftx_publish_insert($val);
				if($res>0){
					$coll++;
					$hiact_totalcoll++;
				}
				$thiscount++;
			}
        }

		F('hiact_totalcoll',$hiact_totalcoll);
		$result_data['p']			= $p;
		$result_data['msg']			= $msg;
		$result_data['coll']		= $coll;
		$result_data['totalcoll']	= $hiact_totalcoll;
		$result_data['totalnum']	= $totalnum;
		$result_data['thiscount']	= $thiscount;
		$result_data['times']		= lefttime(time()-$hiact_collect_time);
		$this->assign('result_data', $result_data);
		$resp = $this->fetch('collect');
		$this->ajaxReturn(1, '', $resp);

	}


	private function _ajax_ftx_publish_insert($item) {
		$item_mod = D('items');
		if($data = $item_mod->where(array('num_iid'=>$item['num_iid']))->count()){
			if($data['commission']<$item['commission'] || $data['coupon_end_time']<time() ){
				unset($item['cate_id']);
				unset($item['title']);
				$item_id = $item_mod->where(array('num_iid'=>$item['num_iid']))->save($item);
			}
			return 1;
        }

		$item['pass'] = 1; 
		$item['status'] ='underway';
        $item_mod->create($item);
        $item_id = $item_mod->add();
        if ($item_id) {
			return 1;
        } else {
            return 0;
        }
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

	public function ajax_getchilds() {
        $cid	= I('id','', 'intval');
		if($cid){
			$this->ajaxReturn(0, L('operation_failure'));
		}
		$top = $this->_get_top();
        $req = $top->load_api('FtxiaAliActivityGetRequest');
        $req->setFields('id,name');
		$req->setPid($cid);
		$resp = $top->execute($req);
        $cats = object_to_array($resp->cats);
		$catlist =array();
		foreach($cats as $cat){
			$_cat = array();
			$_cat['id'] = $cat['eventid'];
			$_cat['name'] = $cat['name'];
			$catlist[] = $_cat;
		}

        if ($cats) {
            $this->ajaxReturn(1, L('operation_success'), $catlist);
        } else {
            $this->ajaxReturn(0, L('operation_failure'));
        }
    }

 
}