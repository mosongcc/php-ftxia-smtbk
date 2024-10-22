<?php
class dapeiModel extends RelationModel
{
    //自动完成
    protected $_auto = array(
        array('add_time', 'time', 1, 'function'),
    );
    //自动验证
    protected $_validate = array(
        array('title', 'require', '{%dapei_title_empty}'),
    );

    public function addtime(){
        return date("Y-m-d H:i:s",time());
    }
	
	public function hits($id){
		$this->where(array('id'=>$id))->setInc('hits',1);
	}
	
	public function ajax_tb_publish($item) {
		$robot_setting = F('robot_setting');
        if ($this->where(array('styleid'=>$item['styleid']))->count()) {
           return 0;
        }   
		$item['status'] = 1;
        $this->create($item);
        $item_id = $this->add();
        if ($item_id) {
            return 1;
        } else {
            return 0;
        }
    }
	public function get_tags_by_title($title, $num=8){
        vendor('pscws4.pscws4', '', '.class.php');
        $pscws = new PSCWS4();
        $pscws->set_dict(FTX_DATA_PATH . 'scws/dict.utf8.xdb');
        $pscws->set_rule(FTX_DATA_PATH . 'scws/rules.utf8.ini');
        $pscws->set_ignore(true);
        $pscws->send_text($title);
        $words = $pscws->get_tops($num);
        $pscws->close();
        $tags = array();
        foreach ($words as $val) {
            $tags[] = $val['word'];
        }
        return $tags;
    }
}