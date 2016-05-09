<?php
class aboutAction extends FirstendAction {
	public function _initialize() {
        parent::_initialize();
		$ftx_config = M('items_site')->where(array('code' => 'ftxia'))->getField('config');
        $this->_ftxconfig = unserialize($ftx_config);
    }

    public function help() {
		$this->_config_seo(array(
					'title' =>  '帮助中心 — ',
		));
        $this->display('help');
    }

	public function us() {
		$this->_config_seo(array(
					'title' =>  '关于我们 — ',
		));
        $this->display('us');
    }

}