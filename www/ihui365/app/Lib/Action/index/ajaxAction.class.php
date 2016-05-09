<?php

class ajaxAction extends FirstendAction {

	private $_ftxconfig = null;
	public function _initialize() {
		parent::_initialize();
		$this->_mod = D('items');
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

	public function check_oldpwd(){
		$password = I('oldpass');
		$username = $this->visitor->info['username'];
		$passport = $this->_user_server();
		$uid = $passport->auth($username, $password);
		if(!$uid){
			exit('false');
		}else{
			exit('true');
		}
	}

	public function check_email(){
		$email = I('email');
		$map['email'] = $email;
		$result = M('user')->where($map)->find();
		if($result){
			exit('false');
		}else{
			exit('true');
		}
	}

	public function check_user(){
		$username = I('username');
		$map['username'] = $username;
		$result = M('user')->where($map)->find();
		if($result){
			exit('false');
		}else{
			exit('true');
		}
	}

	public function click_url(){
		$iid = I('iid');
		$url = I('click_url');
		!$iid && exit('false');
		$item = $this->_mod->where(array('num_iid' => $iid))->find();
		if(!$item['click_url']  && !strpos($item['click_url'],"s.click") && !strpos( $item['click_url'], "redirect.simba.taobao.com")){
			$url = str_replace( "[]", "&", $url );
			$url = $this->urlChange( $url );
			$ftxia_https = new ftxia_https( );
			$ftxia_https->fetch( $url );
			$content = $ftxia_https->results;
			if (!$content){
				$content = file_get_contents( $url );
			}
			$forwardStr = $this->ChGetWord( $content, 'class="big-img" href="', '"' );
			$click_url = $this->urlChange($forwardStr);
			$item['click_url'] = $click_url;
			if($id){
				$this->_mod->where( array("id" => $id))->save($item);
			}
			if($iid){
				$ids = $this->_mod->where( array("num_iid" => $iid))->save($item);
				if(!$ids){
					$this->ajaxReturn( 2, "直接跳转", 'url');
				}
			}
			$this->ajaxReturn( 1, "获取url成功", $forwardStr );
		}else{
			$this->ajaxReturn( 1, "获取url成功", $item['click_url'] );
		}
	}

	public function ChGetWord( $str, $firstStr, $nextStr ){
		$firstIndex = strpos( $str, $firstStr );
		$theStr = substr( $str, $firstIndex + strlen( $firstStr ) );
		$firstNext = strpos( $theStr, $nextStr );
		if ( $firstIndex === FALSE || $firstNext === FALSE ){
			return "";
		}
		$str1 = trim( substr( $theStr, 0, $firstNext ) );
		return $str1;
	}

	public function urlChange( $url ){
		$urlFront = $this->ChGetWordFront( $url, "?" )."?";
		$urlAfter = $this->ChGetWordPos( $url, "?" );
		$urlAfter = str_replace( "/", "%2F", $urlAfter );
		$urlAfter = str_replace( "+", "%2B", $urlAfter );
		$urlAfter = str_replace( "==", "%3D%3D", $urlAfter );
		$url = $urlFront.$urlAfter;
		return $url;
	}

	public function ChGetWordPos( $str, $firstStr ){
		$firstIndex = strpos( $str, $firstStr );
		if ( $firstIndex === FALSE ){
			return $str;
		}
		$theStr = substr( $str, $firstIndex + strlen( $firstStr ) );
		return $theStr;
	}

	public function ChGetWordFront( $str, $firstStr ){
		$firstIndex = strpos( $str, $firstStr );
		if ( $firstIndex === FALSE ){
			return $str;
		}
		$theStr = substr( $str, 0, $firstIndex );
		return $theStr;
	}


	public function getinfo(){
		exit();
		if(!C('ftx_coupon_quan')){
			exit('关闭自动获取优惠券');
		}
		$iid = I('sid');
		!$iid && exit();
		$arr_iids = array();
		if(!$this->_ftxconfig['app_key']){header('Content-Type: application/x-javascript');exit('alert("\u8bf7\u5230\u540e\u53f0\u8bbe\u7f6e\u98de\u5929\u4fa0\u5f00\u653e\u5e73\u53f0\u0061\u0070\u0070\u006b\u0065\u0079")');}
		if(strpos($iid,',')){
			$arr_iids = explode(",",$iid);
		}else{
			$arr_iids[] = $iid;
		}
		$ehtm='';
		foreach($arr_iids as  $val){
			$tb_top = $this->_get_ftx_top();
			$req = $tb_top->load_api('FtxiaTaoQuanGetRequest');
			$req->setSid($val);
			$resp = $tb_top->execute($req);
			$result = object_to_array($resp);
			$item = $result['item'];
			if($item['taoquan']){
				$sid = $item['taoquan']['sid'];
				$yhq = '<a target="_blank"  href="javascript:void(0);" data-href="'.$item['taoquan']['url'].'" rel="nofollow" class="J_coupon go-quan  buy"><em class="coupon_num"><i>￥</i><b>'.$item['taoquan']['coupon_price'].'</b> 优惠券</em><em class="coupon_cond">'.$item['taoquan']['cond'].'可用</em></a>';
				$ehtm.='$(".sid_'.$sid.'  .good-pic .yhq").html(\''.$yhq.'\');';
			}
		}
		header('Content-Type: application/x-javascript');
		exit($ehtm);
	}

	public function userinfo(){
		$callback = I('callback');
		if (!$this->visitor->is_login) {
			$result['s'] = 0;
		}else{
			$info = $this->visitor->get();
			$result['s'] = 1;
			$result['user']['name']  =  $info['username'];
			$result['user']['id']  =  $info['id'];
			$result['user']['jifen']  =  $info['score'];

			$msg_mod = D('msg');
			$map['tuid']  = $info['id'];
			$map['status'] = 0;
			$count = $msg_mod->where($map)->order('id DESC')->count('id');
			if($count){
				$result['user']['msgsrc']  = '<img src="/static/jky/images/msg.gif" border="0" alt="有新短消息" />';
			}else{
				$result['user']['msgsrc']  = '<img src="/static/jky/images/msg1.gif" border="0" alt="短消息" />';
			}
			$result['user']['avatar']  = 'data/upload/avatar/default_24.jpg';
		}
		header('Content-Type:text/html; charset=utf-8');
		exit($callback.'('.json_encode($result).')');
	}

	public function index() {
		exit('error');
	}


	/**
	 * 验证码
	 */
	public function captcha() {
		Image::buildImageVerify(4, 1, 'gif', '50', '24', 'captcha');
	}

	/**
	 * 举报添加
	 */
	public function reportadd(){
		$item_id=I('znid');
		$uid=$this->visitor->info['id'];
		$uname=$this->visitor->info['username'];
		if(!$uid&&!$uname){
			$this->ajaxReturn(0, '等先登录，再举报');
		}
		$reason=I('reportAn');
		$comment=I('otherReasons');
		$data=array(
			'item_id'=>$item_id,
			'uid'=>$uid,
			'uname'=>$uname,
			'reason'=>$reason,
			'comment'=>$comment,
			'addtime'=>time()
		);
		$result=D('report')->add($data);
		$this->ajaxReturn(1, '举报成功');
	}

	/**
	 * 举报
	 */
	public function report() {
		$id = I('znid');
		$item = $this->_mod->where(array(id=>$id))->find();
		$this->assign('item',$item);
		$resp = $this->fetch('dialog:report');
		$this->ajaxReturn(1, '', $resp);
	}

	/**
	 * 评论一个商品
	 */
	public function comment() {
		foreach ($_POST as $key=>$val) {
			$_POST[$key] = Input::deleteHtmlTags($val);
		}
		$data = array();
		$data['num_iid']=I('ths_id');
		!$data['num_iid'] && $this->ajaxReturn(1, '评论失败',0);
		$data['info'] = I('comment','', 'trim');
		!$data['info'] && $this->ajaxReturn(1,'请填写评论',0);
		$data['status'] = 1;
		$data['uid'] = $this->visitor->info['id'];
		!$data['uid'] && $this->ajaxReturn(1,'请登录之后再评论',0);
		$data['uname'] = $this->visitor->info['username'];
		//验证商品
		$item = $this->_mod->field('id,num_iid,uid,nick')->where(array('num_iid' => $data['num_iid'], 'pass' => '1'))->find();
		!$item && $this->ajaxReturn(0, "该商品可能已经删除，请联系管理员",0);
		//写入评论
		$data['item_id'] = $item['num_iid'];
		$data['add_time']=time();
		D('items_comment')->add($data);
		$this->ajaxReturn(1, "评论完成", 1);
	}

	/**
	 * 获取iid
	 */
	public function get_id($url) {
		$id = 0;
		$parse = parse_url($url);
		if (isset($parse['query'])) {
			parse_str($parse['query'], $params);
			if (isset($params['id'])) {
				$id = $params['id'];
			} elseif (isset($params['item_id'])) {
				$id = $params['item_id'];
			} elseif (isset($params['default_item_id'])) {
				$id = $params['default_item_id'];
			}
		}
		return $id;
	}

	public function like(){
		$like_mod = M('items_like');
		$id = I('pid');
		!$id && $this->ajaxReturn(0,'未知商品');
		$uid = $this->visitor->info['id'];
		$data['item_id'] = $id;
		$data['uid'] = $uid;
		if($like_mod->where($data)->select()){
			//$this->ajaxReturn(2,'已喜欢！');
			$result = $like_mod->where($data)->delete();
			if($result){
				$like_data = array('likes'=>array('exp','likes-1'));
				$this->_mod->where(array('id'=>$id))->setField($like_data);
				$this->ajaxReturn(1, '取消喜欢成功！');
			}else{
				$this->ajaxReturn(0, $like_mod->getError());
			}

		}
		if (false === $like_mod->create($data)) {
			$this->ajaxReturn(0, $like_mod->getError());
		}
		$lid = $like_mod->add();
		if($lid){
			$like_data = array('likes'=>array('exp','likes+1'));
			$this->_mod->where(array('id'=>$id))->setField($like_data);
			$this->ajaxReturn(1, '登录喜欢成功！');
		}else{
			$this->ajaxReturn(0,'登录喜欢失败，请稍后重试！');
		}
	}

	/**
	 * 获取短消息
	 */
	public function get_msg(){
		header('Content-Type:text/html; charset=utf-8');
		if (!$this->visitor->is_login) {
			exit('请登录！');
		}else{
			$id = $_GET['id'];
			$msg_mod = D('msg');
			$map['uid']  = $this->visitor->info['id'];
			$map['id']  = $id;
			$msg = $msg_mod->where($map)->find();
			if(!$msg){
				exit(print_r($map));
			}
			$msg_mod->where($map)->setField('status', 1);
			exit($msg['info']);
		}
	}

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