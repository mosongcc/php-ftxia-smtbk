<?php
class tagsAction extends BackendAction {
    public function _initialize() {
        parent::_initialize();
        $this->_mod = D('tags');

    }
 

     
}