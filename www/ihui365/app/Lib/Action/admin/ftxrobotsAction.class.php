<?php

class ftxrobotsAction extends BackendAction {

	private $_tbconfig = null;
	public function _initialize() {
        parent::_initialize();
        $this->_mod = D('ftxrobots');
        $this->_cate_mod = D('items_cate');
		$api_config = M('items_site')->where(array('code' => 'ftxia'))->getField('config');
        $this->_tbconfig = unserialize($api_config);
    }
 
	 public function _before_index() {
        $res = $this->_cate_mod->field('id,name')->select();
        $cate_list = array();
        foreach ($res as $val) {
            $cate_list[$val['id']] = $val['name'];
        }
        $this->assign('cate_list', $cate_list);
		$ftxrobots_collect_data = F('ftxrobots_collect_data');
		$this->assign('ftxrobots_collect_data', $ftxrobots_collect_data);
        $this->sort = 'ordid ASC,';
        $this->order ='last_time DESC';
    }

	public function add(){
		if (IS_POST) {
			$name					= I('name','', 'trim');
			$cid					= I('cid','', 'trim');
			$recid					= I('recid','', 'trim');
			$cate_id				= I('cate_id','', 'trim');
			$keyword				= I('keyword','', 'trim');
			$page					= I('page','1', 'trim');
			$sort					= I('sort','normal', 'trim');
			$start_commissionRate	= I('start_commissionRate','10', 'trim');
			$end_commissionRate		= I('end_commissionRate','9999', 'trim');
			$start_coupon_rate		= I('start_coupon_rate','10', 'trim');
			$end_coupon_rate		= I('end_coupon_rate','9900', 'trim');
			$start_volume			= I('start_volume','0', 'trim');
			$end_volume				= I('end_volume','9999999', 'trim');
			$start_price			= I('start_price','0', 'trim');
			$end_price				= I('end_price','99999', 'trim'); 
			$shop_type				= I('shop_type','all', 'trim');
			$ems					= I('ems','1', 'trim');
			$http_mode				= I('http_mode','', 'trim');
			if( !$name||!trim($name) ){
				$this->error('请填写采集器名称');
			}
			if( !$cate_id||!trim($cate_id) ){
				$this->error('请选择商品分类');
			}

			if (!$keyword && !$cid) {
				$this->error('请填写关键词或选择API分类');
			}
			if($start_commissionRate > $end_commissionRate){
				$this->error('起始佣金不能高于最高佣金');
			}
		 
			if($start_coupon_rate > $end_coupon_rate){
				$this->error('最低折扣不能高于最高折扣');
			}
			if($start_volume > $end_volume){
				$this->error('最低销量不能高于最高销量');
			}

			$data['name'] = $name;
			$data['cid'] = $cid;
			$data['recid'] = $recid;
			$data['cate_id'] = $cate_id;
			$data['keyword'] = $keyword;
			$data['page'] = $page;
			$data['sort'] = $sort;
			$data['start_commissionRate'] = $start_commissionRate;
			$data['end_commissionRate'] = $end_commissionRate;
			$data['start_coupon_rate'] = $start_coupon_rate;
			$data['end_coupon_rate'] = $end_coupon_rate;
			$data['start_volume'] = $start_volume;
			$data['end_volume'] = $end_volume;
			$data['start_price'] = $start_price;
			$data['end_price'] = $end_price;
			$data['shop_type'] = $shop_type;
			$data['ems'] = $ems;
			$data['http_mode'] = $http_mode;

			$this->_mod->create($data);
			$item_id = $this->_mod->add();
			$this->success('添加成功！');
		}
	}

	 public function edit() {
        if (IS_POST) {
			$id			= I('id','', 'trim');
			$name		= I('name','', 'trim');
			$cid		= I('cid','', 'trim');
			$recid		= I('recid','', 'trim');
			$cate_id	= I('cate_id','', 'trim');
			$keyword	= I('keyword', 'trim');
			$page		= I('page','', 'trim');
			$sort		= I('sort','', 'trim');
			$start_commissionRate		= I('start_commissionRate','', 'trim');
			$end_commissionRate		= I('end_commissionRate','', 'trim');
			$start_coupon_rate		= I('start_coupon_rate','', 'trim');
			$end_coupon_rate		= I('end_coupon_rate','', 'trim');
			$start_volume			= I('start_volume','', 'trim');
			$end_volume				= I('end_volume','', 'trim');
			$start_price			= I('start_price','', 'trim');
			$end_price				= I('end_price','', 'trim');
			$shop_type				= I('shop_type','all', 'trim');
			$ems					= I('ems','', 'trim');
			$http_mode				= I('http_mode','', 'trim');

			if( !$name||!trim($name) ){
				$this->error('请填写采集器名称');
			}
			if( !$cate_id||!trim($cate_id) ){
				$this->error('请选择商品分类');
			}

		
			//API采集
			if (!$keyword && !$cid) {
				//$this->error('请填写关键词或选择API分类');
			}
			if($start_commissionRate > $end_commissionRate){
				$this->error('起始佣金不能高于最高佣金');
			}
		
			if($start_coupon_rate > $end_coupon_rate){
				$this->error('最低折扣不能高于最高折扣');
			}
			if($start_volume > $end_volume){
				$this->error('最低销量不能高于最高销量');
			}

			$data['name'] = $name;
			$data['cid'] = $cid;
			$data['recid'] = $recid;
			$data['cate_id'] = $cate_id;
			$data['keyword'] = $keyword;
			$data['page'] = $page;
			$data['sort'] = $sort;
			$data['start_commissionRate'] = $start_commissionRate;
			$data['end_commissionRate'] = $end_commissionRate;
			$data['start_coupon_rate'] = $start_coupon_rate;
			$data['end_coupon_rate'] = $end_coupon_rate;
			$data['start_volume'] = $start_volume;
			$data['end_volume'] = $end_volume;
			$data['start_price'] = $start_price;
			$data['end_price'] = $end_price;
			$data['shop_type'] = $shop_type;
			$data['ems'] = $ems;
			$data['tb_cid'] = $tb_cid;
			$data['http_mode'] = $http_mode;
 
            $this->_mod->where(array('id'=>$id))->save($data);
            $this->success(L('operation_success'));
        } else {
            $id = $this->_get('id','intval');
            $item = $this->_mod->where(array('id'=>$id))->find();
            $spid = $this->_cate_mod->where(array('id'=>$item['cate_id']))->getField('spid');
            if( $spid==0 ){
                $spid = $item['cate_id'];
            }else{
                $spid .= $item['cate_id'];
            }
            $this->assign('selected_ids',$spid); //分类选中
            $this->assign('info', $item);
            //来源
            $orig_list = M('items_orig')->select();
            $this->assign('orig_list', $orig_list);
			if (!function_exists("curl_getinfo")) {
				$this->error(L('curl_not_open'));
			}
			//获取淘宝商品分类
			$items_cate = $this->_get_tbcats();
			$this->assign('items_cate', $items_cate);
            $this->display();
        }
    }


	public function add_do() {
		//判断CURL
        if (!function_exists("curl_getinfo")) {
            $this->error(L('curl_not_open'));
        }
        //获取淘宝商品分类
        $items_cate = $this->_get_tbcats();
        $this->assign('items_cate', $items_cate);
        $this->display();
	}

	public function collect(){
		$id	= I('id','','intval');
		$auto	= I('auto',0,'intval');
		$p		= I('p',1,'intval');
		if($auto){
			if(!$this->_tbconfig['app_key']){$this->ajaxReturn(0, '请设置飞天侠开放平台appkey');}
			$rid	= I('rid',0,'intval');
			$ftxrobots_collect_data['rid'] = $rid;
			$ftxrobots_collect_data['p'] = $p;
			F('ftxrobots_collect_data',$ftxrobots_collect_data);
			if(false === F('robots_time')){
				F('robots_time', time());
			}
			if(!$rid){
				$where['status'] = 1;
				$where['http_mod'] = 0;
				$ftxrobots = $this->_mod->where($where)->order('ordid asc')->select();
				F('ftxrobots', $ftxrobots);
				$rid = 0;
				
			}
			$ftxrobots = F('ftxrobots');
			$date = $ftxrobots[$rid];
			if(!$date){
				F('totalcoll', NULL);
				F('robots_time', NULL);
				$this->ajaxReturn(0, '一键全自动已经采集完成！请返回，谢谢');
			}
			
			if ($p > $date['page']) {
				$p = 1;
				$rid = $rid+1;
				$date = $ftxrobots[$rid];
				if(!$date){
					F('totalcoll', NULL);
					F('robots_time', NULL);
					$this->ajaxReturn(0, '一键全自动已经采集完成！请返回，谢谢');
				}
			}
			$np = $p+1;
			$result_data = $this->api_collect($date,$p);
			$this->assign('result_data', $result_data);
			$msg['title'] = '一键全自动采集';
			$msg['np'] = $np;
			$msg['rid'] = $rid;
			$this->assign('date',$date);
			$this->assign('ftxrobots_count',count($ftxrobots));
			$this->assign('rids',$rid+1);
			$resp = $this->fetch('auto_collect');
			$this->ajaxReturn(1,$msg,$resp);
		}else{
			$date = $this->_mod->where(array('id'=>$id))->find();
			F('robot_setting', $date);
		}
		
		if($date){ 
				if(!$this->_tbconfig['app_key']){$this->ajaxReturn(0, '请设置appkey');}
				if ($p > $date['page']) {
					F('totalcoll', NULL);
					$this->ajaxReturn(0, '已经采集完成'.$date['page'].'页！请返回，谢谢');
				}
				$result_data = $this->api_collect($date,$p);
				$this->assign('result_data', $result_data);
				$resp = $this->fetch('collect');
				$this->ajaxReturn(1, '', $resp);
		 
		}else{
			$this->ajaxReturn(0, 'error');
		}
	}
 
	public function api_collect($date,$p){
		$this->_mod->where(array('id'=>$date['id']))->save(array('last_page'=>$p,'last_time'=>time()));
		if (false === $totalcoll = F('totalcoll')) {
			$totalcoll = 0;
		}
		if (false === $robots_time = F('robots_time')) {
			$robots_time = time();
			F('robots_time', time());
		}
		$map['keyword']		= $date['keyword'];									//关键词
		$map['cid']			= $date['cid'];										//api分类ID
		$map['cate_id']		= $date['cate_id'];									//入库分类ID
		if($date['start_commissionRate']<100){
			$map['start_commissionRate']	= ($date['start_commissionRate']*100);//佣金比率下限
		}else{
			$map['start_commissionRate']	= $date['start_commissionRate'];	//佣金比率下限
		}
		if($date['end_commissionRate']<100){
			$map['end_commissionRate']		= ($date['end_commissionRate']*100);	//佣金比率上限
		}else{
			$map['end_commissionRate']		= $date['end_commissionRate'];		//佣金比率上限
		}
		if($date['start_coupon_rate']<100){
			$map['start_coupon_rate']		= ($date['start_coupon_rate']*100);	//折扣最低比率
		}else{
			$map['start_coupon_rate']		= $date['start_coupon_rate'];		//折扣最低比率
		}
		if($date['end_coupon_rate']<100){
			$map['end_coupon_rate']			= ($date['end_coupon_rate']*100);		//折扣最高比率
		}else{
			$map['end_coupon_rate']			= $date['end_coupon_rate'];			//折扣最高比率
		}
		$map['start_volume']			= $date['start_volume'];			//销量下限
		$map['end_volume']				= $date['end_volume'];				//销量上限
		$map['start_price']				= $date['start_price'];				//价格下限
		$map['end_price']				= $date['end_price'];				//价格上限
		//$map['start_credit']			= $date['start_credit'];			//卖家信用下限
		//$map['end_credit']				= $date['end_credit'];				//卖家信用上限
		$map['shop_type']				= $date['shop_type'];				//是否天猫商品
		$map['recid']					= $date['recid'];					//是否更新分类
		$map['sort']					= $date['sort'];					//排序方法
		$map['ems']						= $date['ems'];						//EMS
 				
		$result							= $this->_get_list($map, $p);
		$taobaoke_item_list				= $result['item_list'];
		$totalnum						= $result['count']; 
		$coll=0;
		$thiscount=0;
		if(is_array($taobaoke_item_list)){
			$msg = '成功！';
		}else{
			$msg = '失败！';
		}
		foreach ($taobaoke_item_list as $key => $val) {
			if($map['start_volume'] <= $val['volume'] &&  $val['volume'] <= $map['end_volume'] &&  $map['start_price'] <= $val['coupon_price'] &&  $val['coupon_price'] <= $map['end_price'] && $map['start_coupon_rate'] <=  $val['coupon_rate'] && $val['coupon_rate'] <= $map['end_coupon_rate']){
				if($map['shop_type'] == 'B'){
					if($map['shop_type'] == $val['shop_type']){
						/*入库操作START*/
						$coupon_add_time = C('ftx_coupon_add_time');
						if($coupon_add_time){
							$times	=	(int)(strtotime(date("Y-m-d H:00:00",time()))+$coupon_add_time*3600);
						}else{
							$times	=	(int)(strtotime(date("Y-m-d H:00:00",time()))+72*86400);
						}
						$val['coupon_start_time'] = strtotime(date("Y-m-d H:00:00",time()));
						$val['coupon_end_time'] = $times;
						$val['astime'] = date("Ymd");
						$val['recid'] = $map['recid'];
								
						$res= $this->_ajax_ftx_publish_insert($val);
						if($res>0){
							$coll++;
							$totalcoll++;
						}
						/*入库操作END*/
					}
				}else{
					/*入库操作START*/
					$coupon_add_time = C('ftx_coupon_add_time');
					if($coupon_add_time){
						$times	=	(int)(strtotime(date("Y-m-d H:00:00",time()))+$coupon_add_time*3600);
					}else{
						$times	=	(int)(strtotime(date("Y-m-d H:00:00",time()))+72*86400);
					}
					$val['coupon_start_time'] = strtotime(date("Y-m-d H:00:00",time()));
					$val['coupon_end_time'] = $times;
					$val['astime'] = date("Ymd");
					$val['recid'] = $map['recid'];
					$res= $this->_ajax_ftx_publish_insert($val);
					if($res>0){
						$coll++;
						$totalcoll++;
					}
					/*入库操作END*/
				}
			}
			$thiscount++;	  
		}
		F('totalcoll',$totalcoll);
		$result_data['p']			= $p;
		$result_data['msg']			= $msg;
		$result_data['coll']		= $coll;
		$result_data['totalcoll']	= $totalcoll;
		$result_data['totalnum']	= $totalnum;
		$result_data['thiscount']	= $thiscount;
		$result_data['times']		= lefttime(time()-$robots_time);
		return $result_data;
	}
 

	private function _ajax_ftx_publish_insert($item) {
        $result = D('items')->ajax_ftx_publish($item);
        return $result;
    }
 
	 public function ajax_get_tbcats() {
        $cid = $this->_get('cid', 'intval', 0);
        $item_cate = $this->_get_tbcats($cid);
        if ($item_cate) {
            $this->ajaxReturn(1, '', $item_cate);
        } else {
            $this->ajaxReturn(0);
        }
    }

    /**
     * 获取商品列表
     * 返回商品列表和总数
     */
    private function _get_list($map, $p) {
        $tb_top = $this->_get_tb_top();
        $req = $tb_top->load_api('FtxiaAliItemsCouponGetRequest');
        $req->setFields('num_iid,title,nick,pic_url,price,click_url,seller_credit_score,item_location,volume,coupon_price,coupon_rate,coupon_end_time,shop_type');
        $req->setPageNo($p);
		$req->setTime(date("Y-m-d"));
        $map['keyword'] && $req->setKeyword($map['keyword']); //关键词
        $map['cid'] && $req->setCid($map['cid']); //分类
        $map['start_price'] && $req->setStartPrice($map['start_price']);
        $map['end_price'] && $req->setEndPrice($map['end_price']);
		$map['start_volume'] && $req->setStartVolume($map['start_volume']);
        $map['end_volume'] && $req->setEndVolume($map['end_volume']);
		$map['start_commissionRate'] && $req->setStartCommissionRate($map['start_commissionRate']);
        $map['end_commissionRate'] && $req->setEndCommissionRate($map['end_commissionRate']);
        $map['shop_type'] && $req->setShopType($map['shop_type']);
        $map['sort'] && $req->setSort($map['sort']);
		$map['ems'] && $req->setEms($map['ems']);
        $resp = (array)$tb_top->execute($req);
        $count = $resp['total_results'];
        //列表内容
        $iids = array();
        $resp_items = objtoarr($resp['itemlists']);
		if(!$resp_items){
			$resul = objtoarr($resp);
			$this->ajaxReturn(0, $resul['error']['msg']);
		}
        $taobaoke_item_list = array();
        foreach ($resp_items  as $val) {
            $val = (array) $val;
			$val['cate_id']=$map['cate_id'];
			$val['sellerId']=$val['sellerid'];
            $taobaoke_item_list[$val['num_iid']] = $val;
        }
        //返回
        return array(
            'count' => intval($count),
            'item_list' => $taobaoke_item_list,
        );
    }

    private function _get_tbcats($cid = 0) {
        $tb_top = $this->_get_tb_top();
        $req = $tb_top->load_api('FtxiaItemcatsGetRequest');
        $req->setFields("cid,parent_cid,name,is_parent");
        $req->setParentCid($cid);
		$req->setTime(date("Y-m-d"));
        $resp = $tb_top->execute($req);
        $res_cats = (array) $resp->item_cats;
        $item_cate = array();
        foreach ($res_cats['item_cat'] as $val) {
            $val = (array) $val;
            $item_cate[] = $val;
        }
        return $item_cate;
    }

    private function _get_tb_top() {
        vendor('Ftxia.TopClient');
        vendor('Ftxia.RequestCheckUtil');
        vendor('Ftxia.Logger');
        $tb_top = new TopClient;
        $tb_top->appkey = $this->_tbconfig['app_key'];
        $tb_top->secretKey = $this->_tbconfig['app_secret'];
        return $tb_top;
    }
  
}