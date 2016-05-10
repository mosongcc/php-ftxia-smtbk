<?php

/**
 * Class userpointAction
 * 用户积分充值
 */
class pointAction extends UsersAction {

	public function _initialize() {
        parent::_initialize();
		$info = $this->visitor->get();
        $this->assign('info', $info);
    }


    public function chongzhi(){
        $data = array(
            'uid' => $this->visitor->info['id'],
            'username' => $this->visitor->info['username'],
        );
        $this->_config_seo(array(
            'title' => '积分充值  -  ',
        ));
        $this->display();
    }


}