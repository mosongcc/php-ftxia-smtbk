<?php

class itemAction extends FirstendAction {

	private $_ftxconfig = null;
	public function _initialize() {
		parent::_initialize();
		$this->_mod = D('items');
		$this->_cate_mod = D('items_cate');
		$this->assign('nav_curr', 'index');
		//访问者控制
		if (!$this->visitor->is_login && in_array(ACTION_NAME, array('delete', 'comment','delcol','mycol'))) {
			IS_AJAX && $this->ajaxReturn(0, L('login_please'));
			$this->redirect('user/login');
		}
		if(C('ftx_site_cache')){
			$file = 'items_site';
			if(false === $this->_ftxconfig = S($file)){
				$api_config = M('items_site')->where(array('code' => 'ftxia'))->getField('config');
				$this->_ftxconfig = unserialize($api_config);
				S($file,$this->_ftxconfig);
			}
		}else{
			$api_config = M('items_site')->where(array('code' => 'ftxia'))->getField('config');
			$this->_ftxconfig = unserialize($api_config);
		} 
	}

	public function _empty(){
		$id = ACTION_NAME;
		
		!$id && $this->_404();
		if(C('ftx_site_cache')){
			$file = 'item_'.$id;
			if(false === $item = S($file)){
				if(strlen($id)>6){
					$item = $this->_mod->where(array('num_iid' => $id))->find();
				}else{
					$item = $this->_mod->where(array('id' => $id))->find();
				}
				if($item){
					if($item['coupon_start_time']>time()){
						$item['timeleft'] = $item['coupon_start_time']-time();
					}else{
						$item['timeleft'] = $item['coupon_end_time']-time();
					}
					S($file,$item);
				}
			}
		}else{
			if(strlen($id)>6){
				$item = $this->_mod->where(array('num_iid' => $id))->find();
			}else{
				$item = $this->_mod->where(array('id' => $id))->find();
			}
			if($item){
				if($item['coupon_start_time']>time()){
					$item['timeleft'] = $item['coupon_start_time']-time();
				}else{
					$item['timeleft'] = $item['coupon_end_time']-time();
				}
			}
		}
		
		if(!$item && strlen($id) >8){
			$tb_top = $this->_get_ftx_top();
			$req = $tb_top->load_api('FtxiaItemDetailGetRequest');
			$req->setNumiid($id);
			$resp = $tb_top->execute($req);
			$result = object_to_array($resp);
			$item = $result['item'];
			$item['coupon_start_time'] = strtotime($item['coupon_start_time']);
			$item['coupon_end_time'] = time()+86400;
		}
		!$item['price'] && redirect('index/index');
		$item['class'] = $this->_mod->status($item['status'],$item['coupon_start_time'],$item['coupon_end_time']);
		$item['zk']    = round(($item['coupon_price']/$item['price'])*10, 2);
		if($item['coupon_start_time']>time()){
				$item['timeleft'] = $item['coupon_start_time']-time()+86400;
		}else{
				$item['timeleft'] = $item['coupon_end_time']-time()+86400;
		}
		if($item['click_url']){
			if(strlen($item['click_url'])<20){
				$item['click_url'] = '';
			}
		}
		$this->assign('item', $item);
		if(C('ftx_item_hit')){
			$hits_data = array('hits'=>array('exp','hits+1'));
			if(strlen($id)>9){
				$this->_mod->where(array('num_iid'=>$id))->setField($hits_data);
			}else{
				$this->_mod->where(array('id'=>$id))->setField($hits_data);
			}
		}

		$cate_data =F('cate_list');
		$cid = $item["cate_id"];
		$pid = $cate_data[$cid]['pid'];
		if($item['tags']){
			$tags = $item['tags'];
			$tag_list = explode(' ', $tags);
		}else{
			$tag_list = $this->_mod->get_tags_by_title($item['title']);
			$tags = implode(',', $tag_list);
		}
		$this->_config_seo(C('ftx_seo_config.item'), array(
            'title' => $item['title'],
            'intro' => $item['intro'],
			'price' => $item['price'],
			'coupon_price' => $item['coupon_price'],
			'tags' => $tags,
            'seo_title' => $item['seo_title'],
            'seo_keywords' => $item['seo_keys'],
            'seo_description' => $item['seo_desc'],
		));
 
			$tb_top = $this->_get_ftx_top();
			$req = $tb_top->load_api('FtxiaItemDescGetRequest');
			$req->setFields("rateid,uid,uname,info,add_time");
			$req->setNumIid($item['num_iid']);
			$resp = $tb_top->execute($req);
			$comment_list = object_to_array($resp->rateList);
			$comm = array();
			foreach($comment_list as $com){
				$com['infoo'] = $com['info'];
				foreach($tag_list as $nkeys){
					if(strpos($com['info'],$nkeys) ){
						$url = U('tag/'.$nkeys);
						$com['info'] =str_replace($nkeys,"<a href=".$url." target=_blank ><b>".$nkeys."</b></a>",$com['info']);
					}
				}
				$comm[] = $com;
			}
			$desc =base64_decode( $resp->desc);
			$attributes = base64_decode( $resp->attributes);
			if(C('ftx_desc_url')){
				$desc=str_replace('http://api.ftxia.com/click/url','http://detail.tmall.com/item.htm',$desc);
				$desc=str_replace('href=','isconvert=1 href=',$desc);
			}else{
				$desc=str_replace('http://api.ftxia.com/click/url','javascript:" name="item.htm',$desc);
			}
			//$desc=str_replace(' src=',' class="lazy" src="/static/images/grey.gif" data-original=',$desc);
			$desc=str_replace('class="superboss_haibao', 'class="lazy',$desc);
			$desc=str_replace('width="750"','width="700"',$desc);
			$desc=str_replace('target="_self"','target="_blank"',$desc);
			$desc=str_replace('width: 750.0px','width: 700.0px',$desc);
			$desc=str_replace('<script', '<div style="display:none;"',$desc);
			$desc=str_replace('/script', '/div',$desc);
		 
		$this->assign('desc', $desc);
		$this->assign('attributes', $attributes);
		$this->assign('tags', $tag_list);
 
		$this->assign('comment_list', $comm);
		$this->assign('page_bar', $pager_bar);
		if(false === $cate_list = F('cate_list')) {
			$cate_list = D('items_cate')->cate_cache();
		}
		if(C('ftx_site_cache')){
			$file = 'orlike_'.$cid;
			if(false === $orlike = S($file)){
				if($cid){
					$orlike = $this->_mod->where(array('cate_id'=>$cid,'isshow'=>'1','pass'=>'1'))->limit('0,12')->order('id desc')->select();
				}else{
					$orlike = $this->_mod->where(array('isshow'=>'1','pass'=>'1'))->limit('0,12')->order('id desc')->select();
				}
				S($file,$orlike);
			}
		}else{
			if($cid){
				$orlike = $this->_mod->where(array('cate_id'=>$cid,'isshow'=>'1','pass'=>'1'))->limit('0,12')->order('id desc')->select();
			}else{
				$orlike = $this->_mod->where(array('isshow'=>'1','pass'=>'1'))->limit('0,12')->order('id desc')->select();
			}
		}
		$items = array();
		$pagecount = 0;
		$seller_arr = array();
		$sellers = '';
		foreach($orlike as $key=>$val){
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
		$this->assign('items_list', $items);
		$this->assign('cate_list', $cate_list);
		
		//用户评论
		$user_pl=D('items_comment')->where(array('item_id'=>$item['id']))->count();
		$this->assign('user_pl',$user_pl);
		$user_comment_list=D('items_comment')->where(array('item_id'=>$item['id']))->order('add_time desc')->select();
		$this->assign('user_comment_list',$user_comment_list);
		$this->display('index');
    }

	/**
	 * 商品详细页
	 */
	public function index() {
		
		$id = I('id', '','trim');
		$iid = I('iid', '','trim');
		if($iid && !$id){
			$id = $iid;
		}
		!$id && $this->_404();
		if(C('ftx_site_cache')){
			$file = 'item_'.$id;
			if(false === $item = S($file)){
				if(strlen($id)>6){
					$item = $this->_mod->where(array('num_iid' => $id))->find();
				}else{
					$item = $this->_mod->where(array('id' => $id))->find();
				}
				if($item){
					if($item['coupon_start_time']>time()){
						$item['timeleft'] = $item['coupon_start_time']-time();
					}else{
						$item['timeleft'] = $item['coupon_end_time']-time();
					}
					S($file,$item);
				}
			}
		}else{
			if(strlen($id)>6){
				$item = $this->_mod->where(array('num_iid' => $id))->find();
			}else{
				$item = $this->_mod->where(array('id' => $id))->find();
			}
			if($item){
				if($item['coupon_start_time']>time()){
					$item['timeleft'] = $item['coupon_start_time']-time();
				}else{
					$item['timeleft'] = $item['coupon_end_time']-time();
				}
			}
		}

		if(!$item && strlen($id) >8){
			$tb_top = $this->_get_ftx_top();
			$req = $tb_top->load_api('FtxiaItemDetailGetRequest');
			$req->setNumiid($id);
			$resp = $tb_top->execute($req);
			$result = object_to_array($resp);
			$item = $result['item'];
			$item['coupon_start_time'] = strtotime($item['coupon_start_time']);
			$item['coupon_end_time'] = time()+86400;
		}
		!$item['price'] && redirect('index/index');
		$item['class'] = $this->_mod->status($item['status'],$item['coupon_start_time'],$item['coupon_end_time']);
		$item['zk']    = round(($item['coupon_price']/$item['price'])*10, 2);
		if($item['coupon_start_time']>time()){
			$item['timeleft'] = $item['coupon_start_time']-time()+86400;
		}else{
			$item['timeleft'] = $item['coupon_end_time']-time()+86400;
		}
		if($item['click_url']){
			if(strlen($item['click_url'])<20){
				$item['click_url'] = '';
			}
		}
		$this->assign('item', $item);
		if(C('ftx_item_hit')){
			$hits_data = array('hits'=>array('exp','hits+1'));
			if(strlen($id)>9){
				$this->_mod->where(array('num_iid'=>$id))->setField($hits_data);
			}else{
				$this->_mod->where(array('id'=>$id))->setField($hits_data);
			}
		}

		$cate_data =F('cate_list');
		$cid = $item["cate_id"];
		$pid = $cate_data[$cid]['pid'];
		if($item['tags']){
			$tags = $item['tags'];
			$tag_list = explode(' ', $tags);
		}else{
			$tag_list = $this->_mod->get_tags_by_title($item['title']);
			$tags = implode(',', $tag_list);
		}
		$this->_config_seo(C('ftx_seo_config.item'), array(
            'title' => $item['title'],
            'intro' => $item['intro'],
			'price' => $item['price'],
			'coupon_price' => $item['coupon_price'],
			'tags' => $tags,
            'seo_title' => $item['seo_title'],
            'seo_keywords' => $item['seo_keys'],
            'seo_description' => $item['seo_desc'],
		));

 
			$tb_top = $this->_get_ftx_top();
			$req = $tb_top->load_api('FtxiaItemDescGetRequest');
			$req->setFields("rateid,uid,uname,info,add_time");
			$req->setNumIid($item['num_iid']);
			$resp = $tb_top->execute($req);
			$comment_list = object_to_array($resp->rateList);
			$comm = array();
			foreach($comment_list as $com){
				$com['infoo'] = $com['info'];
				foreach($tag_list as $nkeys){
					if(strpos($com['info'],$nkeys) ){
						$url = U('tag/'.$nkeys);
						$com['info'] =str_replace($nkeys,"<a href=".$url." target=_blank ><b>".$nkeys."</b></a>",$com['info']);
					}
				}
				$comm[] = $com;
			}
			$desc =base64_decode( $resp->desc);
			$attributes = base64_decode( $resp->attributes);
			if(C('ftx_desc_url')){
				$desc=str_replace('http://api.ftxia.com/click/url','http://detail.tmall.com/item.htm',$desc);
				$desc=str_replace('href=','isconvert=1 href=',$desc);
			}else{
				$desc=str_replace('http://api.ftxia.com/click/url','javascript:" name="item.htm',$desc);
			}
			$desc=str_replace(' src=',' class="lazy" src="/static/images/grey.gif" data-original=',$desc);
			$desc=str_replace('class="superboss_haibao', 'class="lazy',$desc);
			$desc=str_replace('width="750"','width="700"',$desc);
			$desc=str_replace('target="_self"','target="_blank"',$desc);
			$desc=str_replace('width: 750.0px','width: 700.0px',$desc);
		 
		$this->assign('desc', $desc);
		$this->assign('attributes', $attributes);
		$this->assign('tags', $tag_list);
		$this->assign('comment_list', $comm);
		$this->assign('page_bar', $pager_bar);
		if(false === $cate_list = F('cate_list')) {
			$cate_list = D('items_cate')->cate_cache();
		}
		if(C('ftx_site_cache')){
			$file = 'orlike_'.$cid;
			if(false === $orlike = S($file)){
				if($cid){
					$orlike = $this->_mod->where(array('cate_id'=>$cid,'isshow'=>'1','pass'=>'1'))->limit('0,12')->order('id desc')->select();
				}else{
					$orlike = $this->_mod->where(array('isshow'=>'1','pass'=>'1'))->limit('0,12')->order('id desc')->select();
				}
				S($file,$orlike);
			}
		}else{
			if($cid){
				$orlike = $this->_mod->where(array('cate_id'=>$cid,'isshow'=>'1','pass'=>'1'))->limit('0,12')->order('id desc')->select();
			}else{
				$orlike = $this->_mod->where(array('isshow'=>'1','pass'=>'1'))->limit('0,12')->order('id desc')->select();
			}
		}
		$items = array();
		$pagecount = 0;
		$seller_arr = array();
		$sellers = '';
		foreach($orlike as $key=>$val){
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
		$this->assign('items_list', $items);
		$this->assign('cate_list', $cate_list);
		
		//用户评论
		$user_pl=D('items_comment')->where(array('item_id'=>$item['id']))->count();
		$this->assign('user_pl',$user_pl);
		$user_comment_list=D('items_comment')->where(array('item_id'=>$item['id']))->order('add_time desc')->select();
		$this->assign('user_comment_list',$user_comment_list);
		$this->display('index');
	}

	public function getinfo(){
		if(!C('ftx_desc_rate')){exit();}
		if(!$this->_ftxconfig['app_key']){header('Content-Type: application/x-javascript');exit('alert(unescape("%u8BF7%u5230%u540E%u53F0%u8BBE%u7F6E%u98DE%u5929%u4FA0%u5F00%u653E%u5E73%u53F0appkey"))');}
		$iid = I('id');
		!$iid && exit();
		$ehtm='';
		$thml='';
		$tb_top = $this->_get_ftx_top();
		$req = $tb_top->load_api('FtxiaItemDetailGetRequest');
		$req->setNumiid($iid);
		$resp = $tb_top->execute($req);
		$result = object_to_array($resp);
		$item = $result['item'];
		if(!$item){
			exit();
		}
		if($item['taoquan']){
			$yhq = '<a target="_blank"  href="javascript:void(0);" data-href="'.$item['taoquan']['url'].'" rel="nofollow" class="J_coupon quan-all quan-buy"><span class="quan-price"><em class="">￥</em>'.$item['taoquan']['coupon_price'].'</span><span class="quan-num">'.$item['taoquan']['cond'].'减</span></a>';
			$ehtm = '$(".tq_html").html(\''.$yhq.'\');';
		}
		if($item['pg']){
			$htm ='<p class="price"><span class="title-tips01">拍下自动改价<em class="tip-b"></em></span><em class="org">￥</em><span class="jd-current">'.$item['pg_price'].'</span></p>';
		}
		$ehtm.='$(".pg").html(\''.trim($item['pxhtml']).'\');';
		if($item['thumb']){
			if(is_array($item['thumb'])){
				$ti = 0;
				foreach($item['thumb'] as $t){
					if($ti == 0){
						$tclass = 'tb-selected';
					}else{
						$tclass = '';
					}
					$thml .='<li class="'.$tclass.'"><div class="tb-pic tb-s50"><a  ><img data-src="'.$t.'_310x310.jpg" src="'.$t.'_100x100.jpg"></a></div></li>';
					$ti ++;
				}
			}
			$ehtm.='$("#J_UlThumb").html(\''.trim($thml).'\');';
		}
		header('Content-Type: application/x-javascript');
		exit($ehtm);
	}


	/**
	 * AJAX获取评论列表
	 */
	public function comment_list() {
		$id = I('id','', 'intval');
		!$id && $this->ajaxReturn(0, L('invalid_item'));
		$item = $this->_mod->where(array('id' => $id, 'pass' => '1'))->count('id');
		!$item && $this->ajaxReturn(0, L('invalid_item'));
		$item_comment_mod = M('items_comment');
		$pagesize = 8;
		$map = array('item_id' => $id,'status' => '1');
		$count = $item_comment_mod->where($map)->count('id');
		$pager = $this->_pager($count, $pagesize);
		$pager->listRows = 8;
		$cmt_list = $item_comment_mod->where($map)->order('add_time DESC')->limit($pager->firstRow . ',' . $pager->listRows)->select();
		$this->assign('cmt_list', $cmt_list);
		$data = array();
		$data['list'] = $this->fetch('comment_list');
		$data['page'] = $pager->fshow();
		$this->ajaxReturn(1, '', $data);
	}

	/**
	 * 评论一个商品
	 */
	public function comment() {
		foreach ($_POST as $key=>$val) {
			$_POST[$key] = Input::deleteHtmlTags($val);
		}
		$data = array();
		$data['item_id'] = I('id', '','intval');
		!$data['item_id'] && $this->ajaxReturn(0, L('invalid_item'));
		$data['info'] = I('content','', 'trim');
		!$data['info'] && $this->ajaxReturn(0, L('please_input') . L('comment_content'));
		$data['status'] = 1;
		$data['uid'] = $this->visitor->info['id'];
		$data['uname'] = $this->visitor->info['username'];
		//验证商品
		$item = $this->_mod->field('id,uid,nick')->where(array('id' => $data['item_id'], 'pass' => '1'))->find();
		!$item && $this->ajaxReturn(0, L('invalid_item'));
		//写入评论
		$item_comment_mod = D('items_comment');
		if (false === $item_comment_mod->create($data)) {
			$this->ajaxReturn(0, $item_comment_mod->getError());
		}
		$comment_id = $item_comment_mod->add();
		if ($comment_id) {
			$this->assign('cmt_list', array(
			array(
                    'uid' => $data['uid'],
                    'uname' => $data['uname'],
                    'info' => $data['info'],
                    'add_time' => time(),
			)
			));
			$resp = $this->fetch('comment_list');
			$this->ajaxReturn(1, L('comment_success'), $resp);
		} else {
			$this->ajaxReturn(0, L('comment_failed'));
		}
	}

	public function noshow(){
		$id = I('id');
		$username = $this->visitor->info['username'];
		if($username != C('ftx_index_admin')){
			$this->ajaxReturn(0,'越权！');
		}
		$data['isshow'] = 0;
		if(M('items')->where(array('num_iid'=>$id))->save($data)){
			$this->ajaxReturn(1, '取消成功！');
		}else{
			$this->ajaxReturn(0, $this->_mod->getError());
		}
	}

	public function delete() {
		$id = I('id','', 'intval');
		!$id && $this->ajaxReturn(0, L('invalid_item'));
		$uid = $this->visitor->info['id'];
		$uname = $this->visitor->info['username'];
		$result = D('items')->where(array('id' => $id))->delete();
		if ($result) {
			$this->ajaxReturn(1, L('del_item_success'));
		} else {
			$this->ajaxReturn(0, L('del_item_failed'));
		}
	}


	public function ajax_getchilds() {
		$id = I('id','', 'intval');
		$map = array('pid'=>$id,'status'=>'1');
		$return = M('items_cate')->field('id,name')->where($map)->select();
		if ($return) {
			$this->ajaxReturn(1, L('operation_success'), $return);
		} else {
			$this->ajaxReturn(0, L('operation_failure'));
		}
	}

	/**
	 * 飞天侠开放平台
	 */
	private function _get_ftx_top() {
		vendor('Ftxia.TopClient');
		vendor('Ftxia.RequestCheckUtil');
		vendor('Ftxia.Logger');
		$tb_top = new TopClient;
		$tb_top->appkey = $this->_ftxconfig['app_key'];
		$tb_top->secretKey = $this->_ftxconfig['app_secret'];
		return $tb_top;
	}

}