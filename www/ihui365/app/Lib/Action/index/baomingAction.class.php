<?php
class baomingAction extends FirstendAction {

	private $_ftxconfig = null;
	private $baoming_reason ;
    public function _initialize() {
        parent::_initialize();
        if (!$this->visitor->is_login) {
            IS_AJAX && $this->ajaxReturn(0, L('login_please'));
            $this->redirect('user/login');
        }
		$this->_mod = D('items');
		$this->cid = $_SERVER['HTTP_HOST'];
        $this->_cate_mod = D('items_cate');
		$this->assign('nav_curr', 'index');
		$api_config = M('items_site')->where(array('code' => 'ftxia'))->getField('config');
        $this->_ftxconfig = unserialize($api_config);
		$reason = C('ftx_baoming_reason');
		$this->baoming_reason = $this->parconfig($reason);
		//p($this->baoming_reason);
		$this->assign('baoming_reason', $this->baoming_reason);
		$info = $this->visitor->get();
        $this->assign('info', $info);

    }

	public function index(){

		$this->_config_seo(array(
            'title' => '卖家报名中心 — ' ,
        ));
		$this->assign('nav_currr', 'index');
		$zc=D('zc_cate')->where(array('bm_xs'=>1))->order('ordid asc')->select();
		$this->assign('zc',$zc);
		$this->display();
	}

	public function add(){
		$info = $this->visitor->get();
        $this->assign('info', $info);

		$orig_list = M('items_orig')->where(array('pass'=>1))->select();
		$this->assign('orig_list',$orig_list);
		$this->_config_seo(array(
            'title' => '活动报名 — ' ,
        ));
		$this->assign('nav_currr', 'index');
		$id=I('id');
		if(!$id){
			$this->assign('no_zc','no');
		}else{
			$zc=D('zc_cate')->where(array('id'=>$id))->find();
			$this->assign('zc',$zc);
			$this->assign('no_zc','yes');
		}
		$this->display();
	}

	public function edit(){
		if(IS_POST){
		}else{
			$res_list= M('zc_cate')->where(array('bm_xs'=>'1'))->order('ordid asc')->select();
			foreach($res_list as $val){
				$zc_cate[$val['id']] = $val['name']; 
			}
		    $this->assign('zc_cate', $zc_cate);
			$id = I('id','', 'trim');
			!$id && $this->_404();
			$item = $this->_mod->where(array('id' => $id))->find();
			!$item && $this->_404();

			$orig_list = M('items_orig')->where(array('pass'=>1))->select();
			$this->assign('orig_list',$orig_list);
			$this->assign('item',$item);
			$this->_config_seo(array(
				'title' => '宝贝修改 — ' ,
			));
			$this->display();
		}

	}
	/**
     * AJAX提交
     */
	public function ajaxadd(){

		if(IS_POST){
			$items_mod			= M('items');
			$num_iid			= I('iid','', 'trim');
			if($num_iid == ''){
				$this->ajaxReturn(1005, '商品IID不能为空，请输入宝贝地址获取');
			}
			$cate_id			= I('cate_id','', 'trim');
			$title				= I('title','', 'trim');
			!$title && $this->ajaxReturn(1005, '商品名称不能为空');
			$nick				= I('nick','', 'trim');
			!$nick && $this->ajaxReturn(1005, '掌柜名称不能为空');
			$price				= I('price','', 'trim');
			$ems				= I('ems','', 'trim');
			$volume				= I('volume','', 'intval');
			$coupon_price		= I('good_price','', 'trim');
			$inventory			= I('good_inventory','', 'trim');
			$coupon_start_time	= I('coupon_start_time','', 'trim');
			$coupon_end_time	= I('coupon_end_time','', 'trim');
			$pic_url			= I('pic_url','', 'trim');
			$shop_type			= I('shop_type','', 'trim');
			$intro				= I('intro','', 'trim');
			$zc_id              = I('zc_id');
			$qq					= I('qq','', 'trim');
			$mobile				= I('mobile','', 'trim');
			$person_name		= I('person_name','', 'trim');
			$reason				= I('reason','', 'trim');
			$pay_id				= I('pay_id','', 'trim');

			$items = $items_mod->where(array('num_iid' => $num_iid))->find();
			$items && $this->ajaxReturn(1005, L('item_exist'));

			$data['num_iid']			= $num_iid;
			$data['cate_id']			= $cate_id;
			$data['title']				= $title;
			$data['nick']				= $nick;
			$data['price']				= $price;
			$data['coupon_price']		= $coupon_price;
			$data['coupon_start_time']	= strtotime($coupon_start_time);
			$data['coupon_end_time']	= strtotime($coupon_end_time);
			$data['inventory']			= $inventory;
			$data['ems']				= $ems;
			$data['pay_id']				= $pay_id;
			$data['volume']				= $volume;
			$data['pic_url']			= $pic_url;
			$data['intro']				= $intro;
			$data['shop_type']			= $shop_type;
			$data['add_time']			= time();
			$data['pass']				= 0;
			$data['uid']				= $this->visitor->info['id'];
			$data['uname']				= $this->visitor->info['username'];
			$data['zc_id']			    = $zc_id;
			$data['qq']					= $qq;
			$data['mobile']				= $mobile;
			$data['realname']		= $person_name;
			$data['reason']				= $reason;

			$items_mod->create($data);
			if($items_mod->add()){
				if($pay_id){
					$paylist = $this->baoming_reason[$pay_id];
					if($paylist){
						$pay['memo'] = '订单号：'.$num_iid.'，金额：'.$paylist[1].'元';
						$pay['price'] = $paylist[1];
						$pay['title'] = $this->visitor->info['username'].' 付费报名~' ;
						$this->assign('pay', $pay);
					}
				}

				$resp = $this->fetch('dialog:goods_add_success');
				$this->ajaxReturn(1, '', $resp);
			}else{
				$this->ajaxReturn(0, '数据错误，请检查！');
			}
		}
	}

 

	public function my() {
		$item_mod = M('items');
		$cate_mod = M('items_cate');
		$page_size = 20;
        $p = I('p',1, 'intval'); //页码
        $start = $page_size * ($p - 1) ;

        $res = $cate_mod->field('id,name')->select();
        $cate_list = array();
        foreach ($res as $val) {
            $cate_list[$val['id']] = $val['name'];
        }
        $this->assign('cate_list', $cate_list);
		$type = I('type', 'all', 'trim'); //排序
		$order = 'ordid asc ';
		$map['uid'] = $this->visitor->info['id'];
		switch ($type) {
            case 'all':
                break;
            case 'pass':
                $map['pass'] = 1;   
                break;
			case 'wait':
				$map['pass'] = 0;
				$map['status'] = 'underway';
                break;
			case 'fail':
                $map['pass'] = 0; 
				$map['status'] = 'fail';
                break;
        }
		$goods_list = $item_mod->where($map)->order('add_time desc')->limit($start . ',' . $page_size)->select();
		$this->assign('goods_list', $goods_list);
		$count = $item_mod->where($map)->count('id');
		$pager = $this->_pager($count, $page_size);
        $this->assign('page_bar', $pager->fshow());

		$this->assign('type', $type);
		$this->_config_seo(array(
            'title' => L('my_goods') . '	-	' . C('ftx_site_name'),
        ));
		$this->assign('nav_currr', 'my');
		$this->display();
	}

	public function yaoqiu(){
		$this->_config_seo(array(
            'title' => '活动要求 — ' ,
        ));
		$this->assign('nav_currr', 'yaoqiu');
		$this->display();
	}

	public function shenhe(){
		$this->_config_seo(array(
            'title' => '审核说明 — ' ,
        ));
		$this->assign('nav_currr', 'shenhe');
		$this->display();
	}


	public function view(){
		$id = I('id','','trim');
        !$id && $this->_404();
		$item = $this->_mod->where(array('id' => $id))->find();
		!$item && $this->_404();
		if($item['uname'] != $this->visitor->info['username']){
			 $this->redirect('goods/mygoods');
		}

		$this->assign('item', $item);
		$this->_config_seo(array(
            'title' => '报名管理	-	' . C('ftx_site_name'),
        ));
		$this->display();
	}

    /**
     * AJAX获取宝贝
     */
    public function ajaxgetid() {
		$url = I('url','', 'trim');
        $url == '' && $this->ajaxReturn(0, L('please_input') . L('correct_itemurl'));
		!$this->get_id($url) && $this->ajaxReturn(0, L('please_input') . L('correct_itemurl'));
		$iid=$this->get_id($url);
		$items = M('items')->where(array('num_iid' => $iid))->find();
		if($items){
			echo "该商品已经报名！请联系管理员";
		};
		$items && $this->ajaxReturn(0, L('item_exist'));


		$tb_top = $this->_get_ftx_top();
        $req = $tb_top->load_api('FtxiaItemDetailGetRequest');
        $req->setNumiid($iid);
        $resp = $tb_top->execute($req);
        $content = object_to_array($resp);
		$this->ajaxReturn(1,'',$content);
    }
 
	/**
     * AJAX提交
     */
	public function ajaxedit(){
		if(IS_POST){
			$items_mod			= M('items');
			$num_iid			= I('iid','', 'trim');
			if($num_iid == ''){
				$this->ajaxReturn(1005, '商品IID不能为空，请输入宝贝地址获取');
			}
			$id					= I('id','', 'trim');
			if($id == ''){
				$this->ajaxReturn(1005, 'ID不能为空，请返回正常渠道提交！');
			}
			$cate_id			= I('cate_id','', 'trim');
			$title				= I('title','', 'trim');
			!$title && $this->ajaxReturn(1005, '商品名称不能为空');
			$nick				= I('nick','', 'trim');
			!$nick && $this->ajaxReturn(1005, '掌柜名称不能为空');
			$price				= I('price','', 'trim');
			$coupon_price		= I('good_price','', 'trim');
			$inventory			= I('good_inventory','', 'trim');
			$ems				= I('ems','', 'trim');
			$volume				= I('volume','', 'trim');
			$pic_url			= I('pic_url','', 'trim');
			$shop_type			= I('shop_type','', 'trim');
			$coupon_start_time	= I('coupon_start_time','', 'trim');
			$coupon_end_time	= I('coupon_end_time','', 'trim');
			$intro				= I('intro','', 'trim');
			$map['num_iid']		= $num_iid;
			$map['id']			= $id;
			$map['uname']		= $this->visitor->info['username'];

			$items = $items_mod->where($map)->find();
			!$items && $this->ajaxReturn(1005, L('item_not_exist'));


			$data['cate_id']		= $cate_id;
			$data['title']			= $title;
			$data['price']			= $price;
			$data['coupon_price']	= $coupon_price;
			$data['inventory']		= $inventory;
			$data['pic_url']		= $pic_url;
			$data['ems']			= $ems;
			$data['volume']			= $volume;
			$data['intro']			= $intro;
			$data['coupon_start_time']			= strtotime($coupon_start_time);
			$data['coupon_end_time']			= strtotime($coupon_end_time);
			$data['shop_type']		= $shop_type;
			$data['add_time']		= time();
			$data['pass']			= 0;
			$data['status']			= 'underway';
			 if (false == $this->_mod->create($data)) {
                $this->error($this->_mod->getError());
            }
			if($this->_mod->where(array('id'=>$id))->save($data)){
				$this->ajaxReturn(1, '修改成功！');
			}else{
				$this->ajaxReturn(0, '数据错误，请检查！');
			}
		}
	}

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
            } elseif (isset($params['amp;id'])) {
                $id = $params['amp;id'];
            } elseif (isset($params['amp;item_id'])) {
                $id = $params['amp;item_id'];
            } elseif (isset($params['amp;default_item_id'])) {
                $id = $params['amp;default_item_id'];
            }
        }
        return $id;
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