<?php
class itemsAction extends BackendAction {
	private $_ftxconfig = null;
    public function _initialize() {
        parent::_initialize();
        $this->_mod = D('items');
        $this->_cate_mod = D('items_cate'); 
		$api_config = M('items_site')->where(array('code' => 'ftxia'))->getField('config');
        $this->_ftxconfig = unserialize($api_config);
    }

    public function _before_index() {
        //分类信息
        $res = $this->_cate_mod->field('id,name')->select();
        $cate_list = array();
        foreach ($res as $val) {
            $cate_list[$val['id']] = $val['name'];
        }
        $this->assign('cate_list', $cate_list);
        //默认排序
        $this->sort = 'ordid ASC,id DESC,';
        $this->order ='add_time DESC';
    }

    protected function _search() {
        $map = array();
        ($time_start = $this->_request('time_start', 'trim')) && $map['add_time'][] = array('egt', strtotime($time_start));
        ($time_end = $this->_request('time_end', 'trim')) && $map['add_time'][] = array('elt', strtotime($time_end)+(24*60*60-1));
        ($price_min = $this->_request('price_min', 'trim')) && $map['price'][] = array('egt', $price_min);
        ($price_max = $this->_request('price_max', 'trim')) && $map['price'][] = array('elt', $price_max);
        ($rates_min = $this->_request('rates_min', 'trim')) && $map['coupon_rate'][] = array('egt', $rates_min);
        ($rates_max = $this->_request('rates_max', 'trim')) && $map['coupon_rate'][] = array('elt', $rates_max);
        ($nick = $this->_request('nick', 'trim')) && $map['nick'] = array('like', '%'.$nick.'%');
        $cate_id = $this->_request('cate_id', 'intval');
        if ($cate_id) {
            $id_arr = $this->_cate_mod->get_child_ids($cate_id, true);
            $map['cate_id'] = array('IN', $id_arr);
            $spid = $this->_cate_mod->where(array('id'=>$cate_id))->getField('spid');
            if( $spid==0 ){
                $spid = $cate_id;
            }else{
                $spid .= $cate_id;
            }
        }
        $map['pass'] = 1;
        ($keyword = $this->_request('keyword', 'trim')) && $map['title'] = array('like', '%'.$keyword.'%');
        $this->assign('search', array(
            'time_start' => $time_start,
            'time_end' => $time_end,
            'price_min' => $price_min,
            'price_max' => $price_max,
            'rates_min' => $rates_min,
            'rates_max' => $rates_max,
            'nick' => $nick,
            'pass' =>$pass,
            'selected_ids' => $spid,
            'cate_id' => $cate_id,
            'keyword' => $keyword,
        ));
        return $map;
    }

    public function add() {
        if (IS_POST) {
            //获取数据
            if (false === $data = $this->_mod->create()) {
                $this->error($this->_mod->getError());
            }
            if( !$data['cate_id']||!trim($data['cate_id']) ){
                $this->error('请选择商品分类');
            }
            $item_id = $this->_mod->publish($data);
            !$item_id && $this->error(L('operation_failure'));

            $this->success(L('operation_success'));
        } else {
            //来源

            $orig_list = M('items_orig')->where(array('pass'=>1))->select();
            $this->assign('orig_list',$orig_list);
            $this->display();
        }
    }

    public function edit() {
        if (IS_POST) {
            //获取数据
            if (false === $data = $this->_mod->create()) {
                $this->error($this->_mod->getError());
            }
            if( !$data['cate_id']||!trim($data['cate_id']) ){
                $this->error('请选择商品分类');
            }
            $item_id = $data['id'];
						$data['coupon_start_time'] = strtotime($data['coupon_start_time']);
						$data['coupon_end_time'] = strtotime($data['coupon_end_time']);
            //更新商品
            $this->_mod->where(array('id'=>$item_id))->save($data);
            $this->success(L('operation_success'));
        } else {
            $id = $this->_get('id','intval');
			$num_iid = $this->_get('num_iid');
			if($id){
				$item = $this->_mod->where(array('id'=>$id))->find();
			}
			if($num_iid){
				$item = $this->_mod->where(array('num_iid'=>$num_iid))->find();
			}
            //分类
            $spid = $this->_cate_mod->where(array('id'=>$item['cate_id']))->getField('spid');
            if( $spid==0 ){
                $spid = $item['cate_id'];
            }else{
                $spid .= $item['cate_id'];
            }
            $this->assign('selected_ids',$spid); //分类选中
            $this->assign('info', $item);
            //来源
            //p($item);
            $orig_list = M('items_orig')->select();
            $this->assign('orig_list', $orig_list);
            $this->display();
        }
    }

	public function clear(){
		if(IS_POST){
			if ($_REQUEST['isok'] == "1") {
				$action	= $this->_post('action', 'trim');
				$where = '1=1';
				if('outtime' == $action){
					$where.=" AND pass=1  AND coupon_end_time <".time();
				}elseif('notpass' == $action){
					$where.=" AND pass=0";
				}elseif('clear' == $action){
					$db_file = CONF_PATH . 'db.php';
					$db = require $db_file;
					$sql = 'TRUNCATE TABLE '.$db['DB_PREFIX'].'items ';
					$mes = M()->execute($sql);
					$this->success(L('clear_success'));
				}

				$ids_list = $this->_mod->where($where)->select();
				$ids = "";
				foreach ($ids_list as $val) {
				   $ids .= $val['id'] . ",";
				}
				if ($ids != "") {
				   $ids = substr($ids, 0, -1);
				   M('items_comment')->where("item_id in(" . $ids . ")")->delete();
				}
				
				$this->_mod->where($where)->delete();
				$this->success(L('clear_success'));
			}else{
				$this->success('确认是否要删除？', U('items/clear'));
			}
		}else{
			$this->display();
		}
	}


	public function delete_search() {
        if (isset($_REQUEST['dosubmit'])) {
            if ($_REQUEST['isok'] == "1") {
                //搜索
                $where = '1=1';
                $keyword = trim($_POST['keyword']);
                $cate_id = trim($_POST['cate_id']);
                $cate_id = trim($_POST['cate_id']);
                $time_start = trim($_POST['time_start']);
                $time_end = trim($_POST['time_end']);
                $status = trim($_POST['status']);
                $min_price = trim($_POST['min_price']);
                $max_price = trim($_POST['max_price']);
            
                if ($keyword != '') {
                    $where .= " AND title LIKE '%" . $keyword . "%'";
                }
                if ($cate_id != ''&&$cate_id!=0) {
                    $where .= " AND cate_id=" . $cate_id;
                }
                if ($time_start != '') {
                    $time_start_int = strtotime($time_start);
                    $where .= " AND coupon_end_time>='" . $time_start_int . "'";
                }
                if ($time_end != '') {
                    $time_end_int = strtotime($time_end);
                    $where .= " AND coupon_end_time<='" . $time_end_int . "'";
                }
                if ($status != '') {
                    $where .= " AND status=" . $status;
                }
                if ($min_price != '') {
                    $where .= " AND coupon_price>=" . $min_price;
                }
                if ($max_price != '') {
                    $where .= " AND coupon_price<=" . $max_price;
                }
                $ids_list = $this->_mod->where($where)->select();
                $ids = "";
                foreach ($ids_list as $val) {
                    $ids .= $val['id'] . ",";
                }
                if ($ids != "") {
                    $ids = substr($ids, 0, -1);
                }
                $this->_mod->where($where)->delete();
                $this->success('删除成功', U('items/clear'));
            } else {
                $this->success('确认是否要删除？', U('items/clear'));
            }
        } else {
            $this->display();
        }
    }


	/**
	 * 一键延时
	 */
	public function key_addtime(){
		if(IS_POST){
			$action	= $this->_post('action', 'trim');
			$where = '1=1';
			$where.=" AND pass=1  AND coupon_end_time <".time();
			if('aday' == $action){
				$datas['coupon_end_time']=time()+86400;
			}elseif('twday' == $action){
				$datas['coupon_end_time']=time()+2*86400;
			}elseif('trday' == $action){
				$datas['coupon_end_time']=time()+3*86400;
			}else{
				$times	= $this->_post('times', 'intval');
				!$times && $this->error('请输入延时时间',U('items/key_addtime'));
				$datas['coupon_end_time']=time()+$times*3600;
			}
				
			if ($datas) {
				$this->_mod->where($where)->save($datas);
				$this->success('延时成功！');
			}else{
				$this->error('错误',U('items/key_addtime'));
			}
		}else{
			$this->display();
		}
	}
 
    /**
     * 商品审核
     */
    public function check() {
		if($this->_request("sort", 'trim')) {
			$sort = $this->_request("sort", 'trim');
		}else {
			$sort = 'id';
		}
		if($this->_request("order", 'trim')) {
			$order = $this->_request("order", 'trim');
		}else {
			$order = 'DESC';
		}
        //分类信息
        $res = $this->_cate_mod->field('id,name')->select();
        $cate_list = array();
        foreach ($res as $val) {
            $cate_list[$val['id']] = $val['name'];
        }
        $this->assign('cate_list', $cate_list);
        //商品信息
        //$map = $this->_search();
        $map=array();
        $map['pass'] = 0;
				$map['status'] = 'underway';
        ($time_start = $this->_request('time_start', 'trim')) && $map['add_time'][] = array('egt', strtotime($time_start));
        ($time_end = $this->_request('time_end', 'trim')) && $map['add_time'][] = array('elt', strtotime($time_end)+(24*60*60-1));
        $cate_id = $this->_request('cate_id', 'intval');
        if ($cate_id) {
            $id_arr = $this->_cate_mod->get_child_ids($cate_id, true);
            $map['cate_id'] = array('IN', $id_arr);
            $spid = $this->_cate_mod->where(array('id'=>$cate_id))->getField('spid');
            if( $spid==0 ){
                $spid = $cate_id;
            }else{
                $spid .= $cate_id;
            }
        }
        ($keyword = $this->_request('keyword', 'trim')) && $map['title'] = array('like', '%'.$keyword.'%');
        $this->assign('search', array(
            'time_start' => $time_start,
            'time_end' => $time_end,
            'selected_ids' => $spid,
            'cate_id' => $cate_id,
            'keyword' => $keyword,
        ));
        //分页
        $count = $this->_mod->where($map)->count('id');
        $pager = new Page($count, 20);
        $select = $this->_mod->where($map)->order('id DESC');
        $select->limit($pager->firstRow.','.$pager->listRows);
				$select->order($sort . ' ' . $order);
        $page = $pager->show();
        $this->assign("page", $page);
        $listarr = $select->select();
        $lists = array();
        foreach($listarr as $key=>$val){
			$lists[$key]			= $val;
		}

        $this->assign('list', $lists);
        $this->assign('list_table', true);
        $this->display();
    }




	
    /**
     * 审核不通过
     */
    public function notcheck() {
		if($this->_request("sort", 'trim')) {
			$sort = $this->_request("sort", 'trim');
		}else {
			$sort = 'id';
		}
		if($this->_request("order", 'trim')) {
			$order = $this->_request("order", 'trim');
		}else {
			$order = 'DESC';
		}
        //分类信息
        $res = $this->_cate_mod->field('id,name')->select();
        $cate_list = array();
        foreach ($res as $val) {
            $cate_list[$val['id']] = $val['name'];
        }
        $this->assign('cate_list', $cate_list);
        //商品信息
        //$map = $this->_search();
        $map=array();
        $map['pass'] = 0;
		$map['status'] = 'fail';
        ($time_start = $this->_request('time_start', 'trim')) && $map['add_time'][] = array('egt', strtotime($time_start));
        ($time_end = $this->_request('time_end', 'trim')) && $map['add_time'][] = array('elt', strtotime($time_end)+(24*60*60-1));
        $cate_id = $this->_request('cate_id', 'intval');
        if ($cate_id) {
            $id_arr = $this->_cate_mod->get_child_ids($cate_id, true);
            $map['cate_id'] = array('IN', $id_arr);
            $spid = $this->_cate_mod->where(array('id'=>$cate_id))->getField('spid');
            if( $spid==0 ){
                $spid = $cate_id;
            }else{
                $spid .= $cate_id;
            }
        }
        ($keyword = $this->_request('keyword', 'trim')) && $map['title'] = array('like', '%'.$keyword.'%');
        $this->assign('search', array(
            'time_start' => $time_start,
            'time_end' => $time_end,
            'selected_ids' => $spid,
            'cate_id' => $cate_id,
            'keyword' => $keyword,
        ));
        //分页
        $count = $this->_mod->where($map)->count('id');
        $pager = new Page($count, 20);
        $select = $this->_mod->where($map)->order('id DESC');
        $select->limit($pager->firstRow.','.$pager->listRows);
				$select->order($sort . ' ' . $order);
        $page = $pager->show();
        $this->assign("page", $page);
        $listarr = $select->select();
        $lists = array();
        foreach($listarr as $key=>$val){
					$lists[$key]			= $val;
					$user	= M('user')->where(array('username'=>$val['uname']))->find();
				}

        $this->assign('list', $lists);
        $this->assign('list_table', true);
        $this->display();
    }


	/**
	 * 过期商品
	 */
	public function outtime(){
		if(IS_POST){
			$action	= $this->_post('action', 'trim');
			$where = '  pass=1  AND coupon_end_time <'.time();
			$this->_mod->where($where)->select();
		}else{
			if ($this->_request("sort", 'trim')) {
				$sort = $this->_request("sort", 'trim');
			} else {
				$sort = 'id';
			}
			if ($this->_request("order", 'trim')) {
				$order = $this->_request("order", 'trim');
			} else {
				$order = 'DESC';
			}
			$map['pass'] = 1 ;
			$map['coupon_end_time'] = array('elt', time()); 

			//分页
			$count = $this->_mod->where($map)->count('id');
			$pager = new Page($count, 20);
			$select = $this->_mod->where($map)->order('id DESC');
			$select->order($sort . ' ' . $order);
			$select->limit($pager->firstRow.','.$pager->listRows);
			$page = $pager->show();
			$this->assign("page", $page);
			$list = $select->select();

			$this->assign('list', $list);
			$this->assign('list_table', true);
			$this->display();
		}
	}


	/**
	 * 下架商品
	 */
	public function  sellout(){
		if(IS_POST){
			$action	= $this->_post('action', 'trim');
			$where = '  pass=1  AND coupon_end_time <'.time();
			$this->_mod->where($where)->select();
		}else{
			if ($this->_request("sort", 'trim')) {
				$sort = $this->_request("sort", 'trim');
			} else {
				$sort = 'id';
			}
			if ($this->_request("order", 'trim')) {
				$order = $this->_request("order", 'trim');
			} else {
				$order = 'DESC';
			}
			//$map['pass'] = 0 ;
			$map['status'] = 'sellout'; 

			//分页
			$count = $this->_mod->where($map)->count('id');
			$pager = new Page($count, 20);
			$select = $this->_mod->where($map)->order('id DESC');
			$select->order($sort . ' ' . $order);
			$select->limit($pager->firstRow.','.$pager->listRows);
			$page = $pager->show();
			$this->assign("page", $page);
			$list = $select->select();

			$this->assign('list', $list);
			$this->assign('list_table', true);
			$this->display();
		}
	}


	/**
	 * 报名未通过
	 */
	public function fail(){
		
			if ($this->_request("sort", 'trim')) {
				$sort = $this->_request("sort", 'trim');
			} else {
				$sort = 'id';
			}
			if ($this->_request("order", 'trim')) {
				$order = $this->_request("order", 'trim');
			} else {
				$order = 'DESC';
			}
			$map['pass'] = 0 ;
			$map['status'] = 'fail'; 
			//分页
			$count = $this->_mod->where($map)->count('id');
			$pager = new Page($count, 20);
			$select = $this->_mod->where($map)->order('id DESC');
			$select->order($sort . ' ' . $order);
			$select->limit($pager->firstRow.','.$pager->listRows);
			$page = $pager->show();
			$this->assign("page", $page);
			$list = $select->select();

			$this->assign('list', $list);
			$this->assign('list_table', true);
			$this->display();
		
	}

	/**
     * 审核操作
     */
    public function add_time() {
        $mod = D($this->_name);
        $pk = $mod->getPk();
        $ids = trim($this->_request($pk), ',');
        $datas['id']=array('in',$ids);
        $datas['coupon_end_time']=time()+C('ftx_item_add_time')*3600;
        if ($datas) {
            if (false !== $mod->save($datas)) {
                IS_AJAX && $this->ajaxReturn(1, L('operation_success'));
            } else {
                IS_AJAX && $this->ajaxReturn(0, L('operation_failure'));
            }
        } else {
            IS_AJAX && $this->ajaxReturn(0, L('illegal_parameters'));
        }

    }

    /**
     * 审核操作
     */
    public function do_check() {
        $mod = D($this->_name);
        $pk = $mod->getPk();
        $ids = trim($this->_request($pk), ',');
        $datas['id']=array('in',$ids);
        $datas['pass']=1;
        if ($datas) {
            if (false !== $mod->save($datas)) {
                IS_AJAX && $this->ajaxReturn(1, L('operation_success'));
            } else {
                IS_AJAX && $this->ajaxReturn(0, L('operation_failure'));
            }
        } else {
            IS_AJAX && $this->ajaxReturn(0, L('illegal_parameters'));
        }
    }

	public function getcheck(){
		if(IS_POST){
			$id					= $this->_post('id', 'trim');
			$title				= $this->_post('title', 'trim');
			$coupon_start_time	= $this->_post('coupon_start_time', 'trim');
			$coupon_end_time	= $this->_post('coupon_end_time', 'trim');
			$pass				= $this->_post('pass', 'trim');
			$pay_status			= $this->_post('pay_status', 'trim');
			$fail_reason		= $this->_post('fail_reason', 'trim');
			$coupon_start_time	= strtotime($coupon_start_time);
			$coupon_end_time	= strtotime($coupon_end_time);
			$id = $this->_post('id', 'trim');
			if($pass == 0){
				$check_date['pass'] = 0;
				$check_date['fail_reason'] = $fail_reason;
				$check_date['status'] = 'fail';
				$check_date['pay_status'] = $pay_status;
				$this->_mod->where(array('id'=>$id))->save($check_date);
				$this->ajaxReturn(1, L('operation_success'));
			}else if($pass == 1){
				$check_date['pass'] = 1;
				$check_date['status'] = 'underway';
				$check_date['title'] = $title;
				$check_date['pay_status'] = $pay_status;
				$check_date['coupon_start_time'] = $coupon_start_time;
				$check_date['coupon_end_time'] = $coupon_end_time;
				$this->_mod->where(array('id'=>$id))->save($check_date);
				$this->ajaxReturn(1, L('operation_success'));
			}
		}else{
			$id = $this->_get('id', 'trim');
			!$id && $this->ajaxReturn(0, 'ID错误，请刷新');
			$item = $this->_mod->where(array('id'=>$id))->find();
			$this->assign('item', $item);
			$resp = $this->fetch();
			$this->ajaxReturn(1, '审核管理',$resp);
		}
	}

	/**
     * AJAX获取宝贝
     */
    public function ajaxgetid() {
		$url = $this->_get('url', 'trim');
        $url == '' && $this->ajaxReturn(0, L('please_input') . L('correct_itemurl'));
		if(strpos($url,'jd.com')){
			$iid	= get_word($url,'.com\/',".html");
			$tb_top = $this->_get_ftx_top();
			$req = $tb_top->load_api('FtxiaJDItemDetailGetRequest');
			$req->setNumiid($iid);
			$resp = $tb_top->execute($req);
			$content = object_to_array($resp);
			$this->ajaxReturn(1,'',$content);
			 
		} 
		!$this->get_id($url) && $this->ajaxReturn(0, L('please_input') . L('correct_itemurl'));
		$iid=$this->get_id($url);
		$items = M('items')->where(array('num_iid' => $iid))->find();
		$items && $this->ajaxReturn(0, L('item_exist'));

		$tb_top = $this->_get_ftx_top();
        $req = $tb_top->load_api('FtxiaItemDetailGetRequest');
        $req->setNumiid($iid);
        $resp = $tb_top->execute($req);
        $content = object_to_array($resp);
		$this->ajaxReturn(1,'',$content);
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

    /**
     * ajax获取标签
     */
    public function ajax_gettags() {
        $title = $this->_get('title', 'trim');
        $tag_list = D('items')->get_tags_by_title($title);
        $tags = implode(' ', $tag_list);
        $this->ajaxReturn(1, L('operation_success'), $tags);
    }

	public function ajax_time(){
		$this->ajaxReturn(1, L('operation_success'), time());
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

	public function ajax_upload( ){
        if(!empty( $_FILES['img']['name'])){
            $result = $this->_upload( $_FILES['img'], "item/" );
            if ( $result['error']){
                $this->error( $result['info'] );
            }else{
                $data['img'] = $result['info'][0]['savename'];
                $this->ajaxReturn( 1, L( "operation_success" ), C( "ftx_attach_path" )."item/".$data['img'] );
            }
        }else{
            $this->ajaxReturn( 0, L( "illegal_parameters" ) );
        }
    }

	public function move() {
        if (IS_POST) {
			$move=I('move', 'intval');
			$ids = $this->_post('ids');
			if($move ==1){
				$zc_id = $this->_post('cate_id', 'intval');
				
				$this->_mod->where(array('id' => array('in', $ids)))->save(array('zc_id'=>$zc_id));
			}else if($move == 2){
				$cate = $this->_post('cate_id','intval');
				$this->_mod->where(array('id' => array('in', $ids)))->save(array('cate_id'=>$cate));
			}
            echo "<script>location.replace(document.referrer);</script>";
        } else {
			$move=I('move');
			$this->assign('move',$move);
            $ids = trim($this->_request('id'), ',');
            $this->assign('ids', $ids);
			$resp = $this->fetch();
            $this->ajaxReturn(1, '', $resp);
        }
    }

}