<?php
class zhuantiAction extends FirstendAction {
		public function _initialize() {
			parent::_initialize();
	    $this->_mod = D('items');
	    $this->_cate_mod = D('zc_cate');
		$this->assign('nav_curr', 'index');
	  }
    
    public function _empty($name){
    	$zc = $this->_cate_mod->where(array('ename'=>$name))->find();
    	if($zc){
			$zc_cate = $this->_cate_mod->where(array('pid'=>$zc['id'],'status'=>'1'))->select();
			if($zc_cate){
				$array_zc = array();
				foreach ($zc_cate as $val) {
					$array_zc[] = $val['id'];
					$where['zc_id'] = array('IN', $array_zc);
				}
			}else{
				$where['zc_id'] = $zc['id'];
			}

				//$where['coupon_end_time'] = array('egt',time()-86400) ;
				$order = 'coupon_start_time DESC ';
				$page_size = '30';
				$pagecount = 0;
				$p = $this->_get('p', 'intval', 1); //页码
				$start = $page_size * ($p - 1) ;
				$items_list = $this->_mod->where($where)->order($order)->limit($start . ',' . $page_size)->select();

				$items = array();
				foreach($items_list as $key=>$val){
					$items['item_list'][$key]			= $val;
					$items['item_list'][$key]['class']	= $this->_mod->status($val['status'],$val['coupon_start_time'],$val['coupon_end_time']);
					$items['item_list'][$key]['zk']		= round(($val['coupon_price']/$val['price'])*10, 1); 
					if($val['coupon_start_time']>time()){
						$items['item_list'][$key]['timeleft'] = $val['coupon_start_time']-time();
					}else{
						$items['item_list'][$key]['timeleft'] = $val['coupon_end_time']-time();
					}
					if($items['item_list'][$key]['click_url']){
						if(strlen($items['item_list'][$key]['click_url'])<20){
							$items['item_list'][$key]['click_url'] = '';
						}
					}
					$items['item_list'][$key]['cate_name']		=$cate_list['p'][$val['cate_id']]['name'];
					$url = C('ftx_site_url').U('item/index',array('id'=>$val['id']));
					$items['item_list'][$key]['url'] = urlencode($url);
					$items['item_list'][$key]['urltitle'] = urlencode($val['title']);
					$items['item_list'][$key]['price'] = number_format($val['price'],1);
					$items['item_list'][$key]['coupon_price'] = number_format($val['coupon_price'],1);
				}
			 

				$count = $this->_mod->where($where)->count();
				$pager = $this->_pager($count, $page_size);
				$this->assign('page', $pager->mshow());


				$this->assign('zc',$zc);
				$this->assign('pagecount', $pagecount);
				$this->assign('items_list',$items['item_list']);
				$this->_config_seo(array(
						'title' => '【'.$zc['name'].'】	- 	' . C('ftx_site_name' ).'专场活动',
						'keywords' => $zc['name'].',专场活动',
						'description' => '【'.$zc['name'].'】!	' . C('ftx_site_name' ).'专场活动',
					));
				$this->display('index');
			
    	}else{
    		redirect(U('index/index')); 
    	}
    	
    }
   
}