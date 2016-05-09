<?php
class ajaxAction extends FirstendAction {

	private $_ftxconfig = null;
	public function _initialize() {
		parent::_initialize();
		$this->_mod = D('items');
	}

	public function like(){
		$like_mod = M('items_like');
		$id = I('pid');
		!$id && $this->ajaxReturn(0,'未知商品');
		$uid = $this->visitor->info['id'];
		$data['item_id'] = $id;
		$data['uid'] = $uid;
		if($like_mod->where($data)->select()){
			$result = $like_mod->where($data)->delete();
			if($result){
				$like_data = array('likes'=>array('exp','likes-1'));
				$this->_mod->where(array('id'=>$id))->setField($like_data);
				$this->ajaxReturn(0, '取消喜欢成功！');
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

	public function likeor(){
		$like_mod = M('items_like');
		$id = I('pid');
		!$id && $this->ajaxReturn(0,'未知商品');
		$uid = $this->visitor->info['id'];
		$data['item_id'] = $id;
		$data['uid'] = $uid;
		if($like_mod->where($data)->select()){
			$this->ajaxReturn(1,'OK!');
		}else{
			$this->ajaxReturn(0,'OK!');
		}
	}

}