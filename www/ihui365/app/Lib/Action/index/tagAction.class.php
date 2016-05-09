<?php
class tagAction extends FirstendAction {
	public function _initialize() {
        parent::_initialize();
        $this->_mod = D('items');
        $this->_cate_mod = D('items_cate');
		$items_likes =  M('items_like')->field('item_id')->where(array('uid'=>$this->visitor->info['id']))->select();
		if(is_array($items_likes)){
			$like_ids=array();
			foreach($items_likes as $like){
				 $like_ids[]=$like['item_id'];
			}
		}
		$this->assign('like_ids', $like_ids);
    }

	public function _empty($name){
		if($name){
			$this->so($name);
		}else{
			$this->_404();
		}
	}
 
	public function so($k) {
		$sort	= I('sort', 'hot', 'trim'); //排序
		$status = I('status', 'all', 'trim'); //排序
		$cid	= I('cid','', 'intval');
		$order	= 'ordid asc ,id desc';
		switch ($sort) {
            case 'new':
                $order.= ', coupon_start_time DESC';
                break;
            case 'price':
                $order.= ', price DESC';
                break;
        }
		switch ($status) {
            case 'all':
                $where['status']="underway";
                break;
            case 'underway':
                $where['status']="underway";
                break;
			case 'sellout':
				$where['status']="sellout";
				break;
        }
		if($k){
			$where['title'] = array('like', '%' . $k . '%');
			$this->assign('k',$k);
		}

		$where['pass'] = '1';
		$where['isshow'] = '1';
		$index_info['sort']=$sort;
		$index_info['status']=$status;
		$page_size = 120;
        $p = I('p',1, 'intval'); //页码
		$index_info['p']=$p;
        $start = $page_size * ($p - 1) ;
        $item_mod = M('items');
        $items_list = $item_mod->where($where)->order($order)->limit($start . ',' . $page_size)->select();
		$items = array();
		if(!$items_list){$this->redirect(C('ftx_site_url'));}
		foreach($items_list as $key=>$val){
			$items[$key]			= $val;
			$items[$key]['class']	= $this->_mod->status($val['status'],$val['coupon_start_time'],$val['coupon_end_time']);
			$items[$key]['zk']		= round(($val['coupon_price']/$val['price'])*10, 2); 
			if($items[$key]['click_url']){
				if(strlen($items[$key]['click_url'])<20){
					$items[$key]['click_url'] = '';
				}
			}
			if(!$val['click_url']){
				$items[$key]['click_url']	=U('jump/index',array('id'=>$val['id']));
			}
			if($val['coupon_start_time']>time()){
				$items[$key]['click_url']	=U('item/index',array('id'=>$val['id']));
			}
		}
		$this->assign('items_list', $items);
		$this->assign('index_info',$index_info);
		$count = $item_mod->where($where)->count();
        $pager = $this->_pager($count, $page_size);
        $this->assign('page', $pager->kshow());
		$this->assign('total_item',$count);

		if (false === $cate_list = F('cate_list')) {
            $cate_list = D('items_cate')->cate_cache();
        }
		$this->assign('cate_list', $cate_list); //分类


        $this->assign('nav_curr', 'index');
    
		$page_seo=array(
			'title' => $k.'【品牌 价格 图片 新款】，淘宝网天猫'.$k.'1折特卖包邮 - '.C('ftx_site_name'),
			'keywords' => $k,
			'description' => C('ftx_site_name').$k.'特卖专场，最新最全'.$k.'打折促销，所有商品人工质检，质量保证，全场包邮！',
        );
		$this->assign('page_seo', $page_seo);
        $this->display('index');
    }
}