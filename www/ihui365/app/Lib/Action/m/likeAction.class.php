<?php

class likeAction extends UsersAction {

	public function _initialize() {
        parent::_initialize();
		$this->_mod = D('items');
		$info = $this->visitor->get();
		
        $this->assign('info', $info);
		$items_likes =  M('items_like')->field('item_id')->where(array('uid'=>$this->visitor->info['id']))->select();
		if(is_array($items_likes)){
			$like_ids=array();
			foreach($items_likes as $like){
				 $like_ids[]=$like['item_id'];
			}
		}
		$this->assign('like_ids', $like_ids);
    }

	public function index(){
		$prefix = C(DB_PREFIX);
		$p = I('p',1);
		$page_size = 24;
		$start = $page_size * ($p - 1) ;
		$like_count = M('items_like')->join($prefix.'items ON '.$prefix.'items.id='.$prefix.'items_like.item_id')->where($prefix."items_like.uid = ".$this->visitor->info['id'])->count();
		$likes =  M('items_like')->field('item_id')->where(array('uid'=>$this->visitor->info['id']))->limit($start . ',' . $page_size)->order('id DESC')->select();
		if(is_array($likes)){
			$ids="";
			foreach($likes as $like){
				 $ids.=$like['item_id'].",";
			}
			 $ids=substr($ids,0,-1);
		}
		$map['id'] = array ('in',$ids);
		$items_list = $this->_mod->where($map)->select();
  
		$items = array();
		$seller_arr = array();
		$sellers = '';
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
				if($val['sellerId']){
					$items['seller_arr'][] = $val['sellerId'];
				}
		}

	 
		$this->assign('items_list', $items['item_list']);
		$pager = $this->_pager($like_count, $page_size);
		$this->assign('page', $pager->kshow());
		$this->assign('like_count',$like_count);
		$this->assign('nav_curr', 'like');
		$this->_config_seo(array(
            'title' => ' 我的收藏 — ' ,
        ));
		$this->display('index');
	}

 
     

}