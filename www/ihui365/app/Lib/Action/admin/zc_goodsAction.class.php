<?php
class zc_goodsAction extends BackendAction {
	private $_ftxconfig = null;
    public function _initialize() {
        parent::_initialize();
        $this->_mod = D('items');
        $this->_cate_mod = D('items_cate'); 
        
        $res_list= M('zc_cate')->select();
        foreach($res_list as $val){
        	$zc_cate[$val['id']] = $val['name']; 
        }
		    $this->assign('zclist', $res_list);
		    $this->assign('zc_cate', $zc_cate); 
    }
	

	public function goods() {
			$sort = 'id';
			$order = 'DESC';
			$cate_list = array();
			foreach ($res as $val) {
				$cate_list[$val['id']] = $val['name'];
			}
			$this->assign('cate_list', $cate_list);
			$map = array();
			$res = $this->_cate_mod->field('id,name')->select();
			$cate_list = array();
			foreach ($res as $val) {
				$cate_list[$val['id']] = $val['name'];
			}
			$this->assign('cate_list', $cate_list);
			$map['zc_id'] =  array(array('gt',0));
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
			$zc_id = $this->_request('zc_id', 'trim');
			if ($zc_id) {
				$zc_arr =D('zc_cate')->get_child_ids($zc_id, true);
				$map['zc_id'] = array('IN', $zc_arr);
				$spid1 = D('zc_cate')->where(array('id'=>$zc_id))->getField('spid');
				if( $spid1==0 ){
					$spid1 = $zc_id;
				}else{
					$spid1 .= $zc_id;
				}
			}
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
				'zc_id' =>$zc_id,
				'selected_ids1' => $spid1,
			));
			//$map['coupon_end_time'] = array('egt', time()); 
			//分页
			$count = $this->_mod->where($map)->count('id');
			$pager = new Page($count, 20);
			$select = $this->_mod->where($map)->order('id DESC,ordid ASC');
			$select->order($sort . ' ' . $order);
			$select->limit($pager->firstRow.','.$pager->listRows);
			$page = $pager->show();
			$this->assign("page", $page);
			$list = $select->select();

			$this->assign('list', $list);
			$this->assign('list_table', true);
			$this->display();
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
            $item = $this->_mod->where(array('id'=>$id))->find();
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
            $orig_list = M('items_orig')->select();
            $this->assign('orig_list', $orig_list);
            $this->display();
        }
    }
}