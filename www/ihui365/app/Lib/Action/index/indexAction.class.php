<?php
class indexAction extends FirstendAction {

	public function _initialize() {
        parent::_initialize();
        $api_config = M('items_site')->where(array('code' => 'ftxia'))->getField('config');
        $this->_tbconfig = unserialize($api_config);
        $this->_mod = D('items');
        $this->_cate_mod = D('items_cate');
		C('DATA_CACHE_TIME',C('ftx_site_cachetime'));

		$items_likes =  M('items_like')->field('item_id')->where(array('uid'=>$this->visitor->info['id']))->select();
		if(is_array($items_likes)){
			$like_ids=array();
			foreach($items_likes as $like){
				 $like_ids[]=$like['item_id'];
			}
		}
		$this->assign('like_ids', $like_ids);

    }
	public function _empty(){
    	$this->index();
    }
    /**
	 ** 首页（全部）
	 **/
    public function index() { 
		$p		= I('p',1 ,'intval'); //页码
		$sort	= I('sort', 'default', 'trim'); //排序
		$status = I('status', 'all', 'trim'); //排序
 
		$today_str = mktime(0,0,0,date("m"),date("d"),date("Y"));
		$tomorr_str = mktime(0,0,0,date("m"),date("d")+1,date("Y"));
		$today_wh['coupon_start_time'] = array(array('egt',$today_str),array('elt',$tomorr_str)) ;
		$today_wh['pass'] = '1';
		$today_wh['isshow'] = '1';
		$today_wh['coupon_rate'] = array('lt',10000);

		$tomorrow_wh['coupon_start_time'] = array('egt',$tomorr_str);
		$tomorrow_wh['pass'] = '1';
		$tomorrow_wh['isshow'] = '1';

		$md_id = md5(implode("-",$today_wh));
		$file = 'index_today_item_'.$md_id;
		if(C('ftx_site_cache')){
			if(false === $today_item = S($file)){
				$today_item = $this->_mod->where($today_wh)->count();
				S($file,$today_item);
			}
		}else{
			$today_item = $this->_mod->where($today_wh)->count();
		}
		$this->assign('today_item', $today_item);

		$md_id = md5(implode("-",$tomorrow_wh));
		$file = 'index_tomorrow_item_'.$md_id;
		if(C('ftx_site_cache')){
			if(false === $tomorrow_item = S($file)){
				$tomorrow_item = $this->_mod->where($tomorrow_wh)->count();
				S($file,$tomorrow_item);
			}
		}else{
			$tomorrow_item = $this->_mod->where($tomorrow_wh)->count();
		}
		$this->assign('tomorrow_item', $tomorrow_item);

		$order = 'ordid asc';
		switch ($sort){
    		case 'new':
				$order.= ', coupon_start_time DESC';
				break;
			case 'price':
				$order.= ', price DESC';
				break;
			case 'rate':
				$order.= ', coupon_rate ASC';
				break;
			case 'hot':
				$order.= ', volume DESC';
				break;
			case 'default':
				if('magic' == C('ftx_index_sort')){
					$order.= ', astime DESC, pic_url asc';
				}else{
					$order.= ', '.C('ftx_index_sort');
				}
		}

		switch ($status){
            case 'all':
                //$where['status']="underway";
                break;
            case 'underway':
                $where['status']="underway";
                break;
			case 'sellout':
				$where['status']="sellout";
				break;
        }

		if(C('ftx_index_not_text')){
			$not_arr = explode(",",C('ftx_index_not_text'));
			$arrs =array();
			foreach($not_arr as $key =>$value){
				$arrs[] = '%'.$value.'%';
			}
			$where['title'] =array('notlike',$arrs,'AND');
		}

		if(C('ftx_index_cids')){
			$where['cate_id'] =  array('in',C('ftx_index_cids'));
		}

		if(C('ftx_wait_time') == '1'){
			$where['coupon_start_time'] = array('egt',time());
		}elseif(C('ftx_wait_time') =='2'){
			$where['coupon_start_time'] = array('elt',time());
		}

		if(C('ftx_end_time') == '1'){
			$where['coupon_end_time'] = array('egt',time());
		}
		if(C('ftx_index_ems') == '1'){
			$where['ems'] = '1';
		}
		
		if(C('ftx_index_shop_type')){$where['shop_type'] = C('ftx_index_shop_type');}
		if(C('ftx_index_mix_price')>0){$where['coupon_price'] = array('egt',C('ftx_index_mix_price'));}
		if(C('ftx_index_max_price')>0){$where['coupon_price'] = array('elt',C('ftx_index_max_price'));}
		if(C('ftx_index_mix_price')>0 && C('ftx_index_max_price')>0){$where['coupon_price'] = array(array('egt',C('ftx_index_mix_price')),array('elt',C('ftx_index_max_price')),'and');}
		if(C('ftx_index_mix_volume')>0){$where['volume'] = array('egt',C('ftx_index_mix_volume'));}
		if(C('ftx_index_max_volume')>0){$where['volume'] = array('elt',C('ftx_index_max_volume'));}
		if(C('ftx_index_mix_volume')>0 && C('ftx_index_max_volume')>0){$where['volume'] = array(array('egt',C('ftx_index_mix_volume')),array('elt',C('ftx_index_max_volume')),'and');}

		$where['pass'] = '1';
		$where['isshow'] = '1';
		$index_info['sort']=$sort;
		$index_info['status']=$status;
		$page_size = C('ftx_index_page_size');
		$index_info['p']=$p;

        $start = $page_size * ($p - 1) ;

		if(false === $cate_list = F('cate_list')) {
			$cate_list = D('items_cate')->cate_cache();
		}
		$this->assign('cate_list', $cate_list); //分类

		$mdarray = $where;
		$mdarray['sort'] = $sort;
		$mdarray['status'] = $status;
		$mdarray['order'] = $order;
		$mdarray['p'] = $p; 
		$md_id = md5(implode("-",$mdarray));
		$file = 'index_'.$md_id;
 
		if(C('ftx_site_cache')){
			if(false === $items = S($file)){
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
				S($file,$items);
			}
		}else{
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
		}
		
		/*
		if(IS_AJAX){
			if(!$items){$this->ajaxReturn(0, '加载完成');}
			$this->assign('items_list', $items['item_list']);
			$resp = $this->fetch('ajax');
            $this->ajaxReturn(1, '', $resp);
		}
		*/
		$this->assign('items_list', $items['item_list']);
		$this->assign('index_info',$index_info);

		if(C('ftx_site_cache')){
			$file = 'index_count';
			if(false === $count = S($file)){
				$count = $this->_mod->where($where)->count();
				S($file,$count);
			}
		}else{
			$count = $this->_mod->where($where)->count();
		}

		$pager = $this->_pager($count, $page_size);
		$this->assign('page', $pager->kshow());
		$this->assign('total_item',$count);


		$today_str = mktime(0,0,0,date("m"),date("d"),date("Y"));
		$tomorr_str = mktime(0,0,0,date("m"),date("d")+1,date("Y"));
		
		$jiumap['coupon_price'] = array('lt','10');
		$jiumap['coupon_start_time'] = array(array('egt',$today_str),array('elt',$tomorr_str));
		$shimap['coupon_price'] = array(array('egt',10),array('elt',20),'and');
		$shimap['coupon_start_time'] = array(array('egt',$today_str),array('elt',$tomorr_str));
		if(C('ftx_site_cache')){
			$file = 'today_jiu_count';
			if(false === $today_jiu_count = S($file)){
				$today_jiu_count = $this->_mod->where($jiumap)->count();
				S($file,$today_jiu_count);
			}
		}else{
			$today_jiu_count = $this->_mod->where($jiumap)->count();
		}
		$this->assign('today_jiu_count',$today_jiu_count);


		if(C('ftx_site_cache')){
			$file = 'today_shi_count';
			if(false === $today_shi_count = S($file)){
				$today_shi_count = $this->_mod->where($shimap)->count();
				S($file,$today_shi_count);
			}
		}else{
			$today_shi_count = $this->_mod->where($shimap)->count();
		}
		$this->assign('today_shi_count',$today_shi_count);




		$top = $this->_get_top();
        $req = $top->load_api('FtxiaBrandsBannerGetRequest');
        $req->setFields('title,nick,logo');
		$req->setCid('');
		$req->setTime(date("y-m-d-H",time()));
		$resp = $top->execute($req);
        $brandlist = object_to_array($resp->brandlist);
		$this->assign('brandlist',$brandlist);

		$top = $this->_get_top();
        $req = $top->load_api('FtxiaBrandsCatGetRequest');
        $req->setFields('cid,name');
		$resp = $top->execute($req);
        $brandcats = object_to_array($resp->cats);
		$this->assign('brandcats',$brandcats);

 
		$this->assign('pager','index');
		$this->assign('ajaxurl',U('index/index',array('p'=>$index_info['p'],'sort'=>$index_info['sort'])));
    	$this->assign('nav_curr', 'index');
    	$this->_config_seo(C('ftx_seo_config.index'));
		$this->display();
    }

	/**
	 ** 搜索
	 **/
	public function so() {
		$sort	= I('sort', 'new', 'trim'); //排序
		$status = I('status', 'all', 'trim'); //排序
		$cid	= I('cid','','intval');
		$k		= I('k');
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
			if(strpos($k,' ')){
				$karr=split(' ',$k);
				foreach($karr as $kw){
					$like[] = array('like', '%' . $kw . '%');
				}
				$where['title'] = $like;
			}else{
				$where['title'] = array('like', '%' . $k . '%');
			}
			$this->assign('k',$k);
		}

		$today_str = mktime(0,0,0,date("m"),date("d"),date("Y"));
		$tomorr_str = mktime(0,0,0,date("m"),date("d")+1,date("Y"));
		$today_wh['coupon_start_time'] = array(array('egt',$today_str),array('elt',$tomorr_str)) ;
		$today_wh['pass'] = '1';
		$today_item = $this->_mod->where($today_wh)->count();
		$this->assign('today_item', $today_item);

		if ($cid) {
            $id_arr = $this->_cate_mod->get_child_ids($cid, true);
            $map['cate_id'] = array('IN', $id_arr);
			$this->assign('cid',$cid);
        }
		$where['pass'] = '1';
		$index_info['sort']=$sort;
		$index_info['status']=$status;
		$page_size = C('ftx_index_page_size');
        $p = I('p',1, 'intval'); //页码
		$index_info['p']=$p;

        $start = $page_size * ($p - 1) ;

		if (false === $cate_list = F('cate_list')) {
            $cate_list = D('items_cate')->cate_cache();
        }
		$this->assign('cate_list', $cate_list); //分类

        $items_list = $this->_mod->where($where)->order($order)->limit($start . ',' . $page_size)->select();
		$items = array();
		$pagecount = 0;
		foreach($items_list as $key=>$val){
			$items[$key]			= $val;
			$items[$key]['class']	= $this->_mod->status($val['status'],$val['coupon_start_time'],$val['coupon_end_time']);
			$items[$key]['zk']		= round(($val['coupon_price']/$val['price'])*10, 1); 
			if($val['coupon_start_time']>time()){
				$items[$key]['timeleft'] = $val['coupon_start_time']-time();
			}else{
				$items[$key]['timeleft'] = $val['coupon_end_time']-time();
			}
			if($items[$key]['click_url']){
				if(strlen($items[$key]['click_url'])<20){
					$items[$key]['click_url'] = '';
				}
			}
			$items[$key]['cate_name']		=$cate_list['p'][$val['cate_id']]['name'];
			$url = C('ftx_site_url').U('item/index',array('id'=>$val['id']));
			$items[$key]['url'] = urlencode($url);
			$items[$key]['urltitle'] = urlencode($val['title']);
			$items[$key]['price'] = number_format($val['price'],1);
			$items[$key]['coupon_price'] = number_format($val['coupon_price'],1);
			$pagecount++;
		}
		$this->assign('pagecount', $pagecount);
		$this->assign('items_list', $items);
		$this->assign('index_info',$index_info);
		$count = $this->_mod->where($where)->count();
		$pager = $this->_pager($count, $page_size);
		$this->assign('page', $pager->kshow());
		$this->assign('total_item',$count);
 
		$this->assign('nav_curr', 'index');
			$page_seo=array(
			'title' => '搜索"'.$k.'"的宝贝结果页 - '.C('ftx_site_name'),
		);
		$this->assign('page_seo', $page_seo);
		$this->assign('pager','so');
		$this->display('index');
    }

	public function shortcut(){
		$Shortcut = "[InternetShortcut] 
		URL=".C('ftx_site_url')." 
		IDList= 
		[{000214A0-0000-0000-C000-000000000046}] 
		Prop3=19,2 
		"; 
		Header("Content-type: application/octet-stream"); 
		header("Content-Disposition: attachment; filename=".C('ftx_site_name').".url;"); 
		echo $Shortcut; 
	}

  /**
	  * 分类
	  */
	public function cate(){
		$cid	=	I('cid','', 'intval');
		$sort	=	I('sort', 'default', 'trim'); //排序
		$status =	I('status', 'all', 'trim'); //排序
		$order	=	'ordid asc ';
		if(!$cid) redirect(U('index/index'));
 
		if(C('ftx_site_cache')){
			$file = 'cinfo_'.$cid;
			if(false === $cinfo = S($file)){
				$cinfo = $this->_cate_mod->where(array('id'=>$cid))->find();
				S($file,$cinfo);
			}
		}else{
			$cinfo = $this->_cate_mod->where(array('id'=>$cid))->find();
		}

		switch ($sort) {
			case 'new':
                $order.= ', coupon_start_time DESC';
                break;
			case 'price':
                $order.= ', price DESC';
                break;
			case 'hot':
                $order.= ', volume DESC';
                break;
			case 'rate':
                $order.= ', coupon_rate ASC';
                break;
			case 'default':
				$order.= ', '.$cinfo['sort'];
		}

		switch ($status) {
			case 'all':
                //$map['status']="underway";
                break;
			case 'underway':
                $map['status']="underway";
                break;
			case 'sellout':
				$map['status']="sellout";
				break;
		}
		if($cinfo['shop_type']){$map['shop_type'] = $cinfo['shop_type'];}
		if($cinfo['mix_price']>0){$map['coupon_price'] = array('egt',$cinfo['mix_price']);}
		if($cinfo['max_price']>0){$map['coupon_price'] = array('elt',$cinfo['max_price']);}
		if($cinfo['max_price']>0 && $cinfo['mix_price']>0){$map['coupon_price'] = array(array('egt',$cinfo['mix_price']),array('elt',$cinfo['max_price']),'and');}
		if($cinfo['mix_volume']>0){$map['volume'] = array('egt',$cinfo['mix_volume']);}
		if($cinfo['max_volume']>0){$map['volume'] = array('elt',$cinfo['max_volume']);}
		if($cinfo['max_volume']>0 && $cinfo['mix_volume']>0){$map['volume'] = array(array('egt',$cinfo['mix_volume']),array('elt',$cinfo['max_volume']),'and');}
		if($cinfo['thiscid']==0){
    		$id_arr = $this->_cate_mod->get_child_ids($cid, true);
    		$map['cate_id'] = array('IN', $id_arr);
			$today_wh['cate_id'] = array('IN', $id_arr);
		}
		$today_str = mktime(0,0,0,date("m"),date("d"),date("Y"));
		$tomorr_str = mktime(0,0,0,date("m"),date("d")+1,date("Y"));
		$today_wh['add_time'] = array(array('egt',$today_str),array('elt',$tomorr_str)) ;
		$today_wh['pass'] = '1';
		$today_wh['isshow'] = '1';

		if(C('ftx_site_cache')){
			$md_id = md5(implode("-",$today_wh));
			$file = 'cate_today_item_'.$md_id;
			if(false === $today_item = S($file)){
				$today_item = $this->_mod->where($today_wh)->count();
				S($file,$today_item);
			}
		}else{
			$today_item = $this->_mod->where($today_wh)->count();
		}

		$this->assign('today_item', $today_item);
		$this->assign('cid',$cid);
		$this->assign('pager','cate');
		$this->assign('cinfo',$cinfo);
		if($cinfo['wait_time'] == '1'){
			$map['coupon_start_time'] = array('egt',time());
		}elseif($cinfo['wait_time'] =='2'){
			$map['coupon_start_time'] = array('elt',time());
		}
		if($cinfo['end_time'] == '1'){
			$map['coupon_end_time'] = array('egt',time());
		}
		if($cinfo['ems'] == '1'){
			$map['ems'] = '1';
		}
		$map['pass']="1";
		$map['isshow'] = '1';
		$index_info['sort']=$sort;
		$index_info['status']=$status;
		$index_info['cid']=$cid;
		$page_size = C('ftx_index_page_size');
		$p = I('p',1,'intval'); //页码
		$index_info['p']=$p;
		$start = $page_size * ($p - 1) ;

		if (false === $cate_list = S('cate_list')) {
			$cate_list = D('items_cate')->cate_cache();
		}
	
		$this->assign('cate_list', $cate_list); //分类

		if(C('ftx_site_cache')){
			$file = 'cate_subnav_'.$cid;
			if(false === $subnav = S($file)){
				$subnav = $this->_cate_mod->where(array('pid'=>$cid))->order('ordid asc')->select();
				if($cinfo['pid'] && !$subnav){
					$subnav = $this->_cate_mod->where(array('pid'=>$cinfo['pid']))->order('ordid asc')->select();
				}
				S($file,$subnav);
			}
		}else{
			$subnav = $this->_cate_mod->where(array('pid'=>$cid))->order('ordid asc')->select();
			if($cinfo['pid'] && !$subnav){
				$subnav = $this->_cate_mod->where(array('pid'=>$cinfo['pid']))->order('ordid asc')->select();
			}
		}
		$this->assign('subnav', $subnav);

		if(C('ftx_site_cache')){
			$mdarray['cid'] = $cid;
			$mdarray['sort'] = $sort;
			$mdarray['status'] = $status;
			$mdarray['p'] = $p;
			$mdarray['order'] = $order;
			$md_id = md5(implode("-",$mdarray));
			$file = 'cate_'.$md_id;
			if(false === $items = S($file)){

				$items_list = $this->_mod->where($map)->order($order)->limit($start . ',' . $page_size)->select();
				$items = array();
				$pagecount = 0;
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
					$pagecount++;
				}
				
				S($file,$items);
			}
		}else{

			$items_list = $this->_mod->where($map)->order($order)->limit($start . ',' . $page_size)->select();
			$items = array();
			$pagecount = 0;
			foreach($items_list as $key=>$val){
				$items['item_list'][$key]			= $val;
				$items['item_list'][$key]['class']	= $this->_mod->status($val['status'],$val['coupon_start_time'],$val['coupon_end_time']);
				$items['item_list'][$key]['zk']		= round(($val['coupon_price']/$val['price'])*10, 1); 
				if(!$val['click_url']){
					$items['item_list'][$key]['click_url']	=U('jump/index',array('id'=>$val['id']));
				}
				if($val['coupon_start_time']>time()){
					$items['item_list'][$key]['click_url']	=U('item/index',array('id'=>$val['id']));
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
				$pagecount++;
			}

		}
		if(IS_AJAX){
			if(!$items){$this->ajaxReturn(0, '加载完成');}
			$this->assign('items_list', $items['item_list']);
			$resp = $this->fetch('ajax');
            $this->ajaxReturn(1, '', $resp);
		}
		$this->assign('pagecount', $pagecount);
		$this->assign('items_list', $items['item_list']);
		$this->assign('index_info',$index_info);

		if(C('ftx_site_cache')){
			$file = 'cate_count_'.$cid;
			if(false === $count = S($file)){
				$count = $this->_mod->where($map)->count();
				S($file,$count);
			}
		}else{
			$count = $this->_mod->where($map)->count();
		}

		$pager = $this->_pager($count, $page_size);
		$this->assign('page', $pager->kshow());
		$this->assign('total_item',$count);
		$this->assign('ajaxurl',U('index/cate',array('cid'=>$cid,'p'=>$index_info['p'],'sort'=>$index_info['sort'])));
        $this->assign('nav_curr', 'index');
        $this->_config_seo(C('ftx_seo_config.cate'), array(
            'cate_name' => $cinfo['name'],
            'seo_title' => $cinfo['seo_title'],
			'seo_keywords' => $cinfo['seo_keys'],
			'seo_description' => $cinfo['seo_desc'],
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