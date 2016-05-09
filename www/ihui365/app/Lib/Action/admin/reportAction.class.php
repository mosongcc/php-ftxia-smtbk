<?php
class reportAction extends BackendAction {
	public function _initialize() {
		parent::_initialize();
		$this->_mod = D('report');
		$this->item_mod = D('items');
	}

	/**
	 * 举报列表
	 */
	public function _before_index() {
		$reason['1'] = "商品已卖光";
		$reason['2'] = "抢购提前开始";
		$reason['3'] = "商品链接不正确";
		$reason['4'] = "商品分类不正确";
		$reason['5'] = "价格与网站不一致(VIP折扣登录淘宝后才能看到)";
		$reason['6'] = "商品描述有误";
		$reason['7'] = "其他原因";
		$this->assign('reason', $reason);
		$index=I('index');
		if($index==1){
			$where=array('pass'=>1);
			$this->assign('index',1);
		}else{
			$where=array('pass'=>0);
			$this->assign('index',0);
		}
		$count = $this->_mod->where($where)->count();
		$pager = new Page($count,20);
		$page = $pager->show();
		$this->assign("pager", $page);
		$re=$this->_mod->order('id DESC')->where($where)->limit($pager->firstRow.','.$pager->listRows)->select();

		$this->assign('re',$re);
			
	}

	public function edit(){
		if (IS_POST) {
			$report_id=I('report_id');
			$this->_mod->where(array('id'=>$report_id))->save(array('pass'=>1));
			if (false === $data = $this->item_mod->create()) {
				$this->error($this->item_mod->getError());
			}
			if( !$data['cate_id']||!trim($data['cate_id']) ){
				$this->error('请选择商品分类');
			}
			$item_id = $data['id'];
			$data['coupon_start_time'] = strtotime($data['coupon_start_time']);
			$data['coupon_end_time'] = strtotime($data['coupon_end_time']);
			//更新商品
			$this->item_mod->where(array('id'=>$item_id))->save($data);
			$this->success(L('operation_success'),U('report/index'));
		} else {
			$id=I('id');
			$this->assign('report_id',$id);
			$item_id=I('item_id');
			$item=$this->item_mod->where(array('num_iid'=>$item_id))->find();
			$spid = D('items_cate')->where(array('id'=>$item['cate_id']))->getField('spid');
			if( $spid==0 ){
				$spid = $item['cate_id'];
			}else{
				$spid .= $item['cate_id'];
			}
			$this->assign('selected_ids',$spid);
			$this->assign('info', $item);
			$res_list= M('zc_cate')->where(array('status'=>'1'))->select();
			foreach($res_list as $val){
				$zc_cate[$val['id']] = $val['name'];
			}
			$this->assign('zclist', $res_list);
			$this->assign('zc_cate', $zc_cate);
			$orig_list = M('items_orig')->where(array('pass'=>1))->select();
			$this->assign('orig_list',$orig_list);
			$this->display();
		}
	}


}