<?php
 class dapeiAction extends FirstendAction {
    public function _initialize() {
        parent::_initialize();
        $this->cats_mod = D('dapei_cate');
        $this->_mod		= D('dapei');
        $this->_cate_mod = D('items_cate');
        $this->cats_list = $this->cats_mod->get_cats();
        $this->assign("acats" , $this->cats_list);
    }
    public function index() {
        $id = I('id', '', 'trim');
        $page = I('p', 1, "intval");
        $where["status" ] = '1';
        if ($id) {
            $where['cate_id' ] = $id;
            $zymvar_30 = $this->cats_list[$id]['name' ];
        }
        $page_size = 20;
        $start = $page_size * ($page - 1);
        $order = "astime desc ";
        $order.= ", styleid DESC";
        $cat = $this->cats_mod->find($id);
        $dapei_list = $this->_mod->where($where)->order($order)->limit($start . ',' . $page_size)->select();
        $this->assign("cid" , $id);
        $this->assign('p', $page);
        $this->assign("dapei_list" , $dapei_list);
        $count = $this->_mod->where($where)->count();
        $pager = $this->_pager($count, $page_size);
        $this->assign("page" , $pager->kshow());
        $this->assign("nav_curr" , 'dapei');
        $this->_config_seo(C("ftx_seo_config.dapei_index"));
        $this->display("index");
    }
    public function cate() {
        $id = I('id', '', 'trim');
        $item = $this->cats_mod->where(array("id" => $id))->find();
        !$item && $this->_404();
        $page = I('p', 1, "intval");
        $where["status" ] = '1';
        if($id){
            $where['cate_id' ] = $id;
        }
        $page_size = 20;
        $start = $page_size * ($page - 1);
        $order = "ordid asc ";
        $order.= ", id DESC";
        $cat = $this->cats_mod->find($id);
        $dapei_list = $this->_mod->where($where)->order($order)->limit($start . ',' . $page_size)->select();
        $this->assign("cid" , $id);
        $this->assign("dapei_list" , $dapei_list);
        $count = $this->_mod->where($where)->count();
        $pager = $this->_pager($count, $page_size);
        $this->assign("page" , $pager->kshow());
        $this->assign("nav_curr" , 'dapei');
        $this->_config_seo(array(
            'title' => $cat['name'].'穿衣搭配',
            'cate_name' => $cat['name'].'穿衣搭配',
            'seo_title' => $item['seo_title'],
            'seo_keywords' => $item["seo_keys"],
            'seo_description' => $item["seo_desc"],
        ));
        $this->display("cate");
    }
    public function read() {

        $id = I("id" , '', "intval");
        $item = $this->_mod->where(array("id" => $id))->find();
		!$item && $this->_404();
        $item["avatar" ] = str_replace("width=30" , "width=100" , $item["avatar" ]);
        $item["avatar" ] = str_replace("height=30" , "height=100" , $item["avatar" ]);
        
        $this->_mod->hits($id);

		$taodianjin = C("ftx_taojindian_html");
        if (strpos($taodianjin, "text/javascript")) {
            $pid = get_word($taodianjin, 'pid: "' , '"');
        } else {
            $pid = $taodianjin;
        }
        $this->assign("pid" , $pid);

        $info = $item["info" ];
        $info = preg_replace("@<script(.*?)</script>@is" , "", $info);
        $info = preg_replace("@<iframe(.*?)</iframe>@is" , "", $info);
        $info = preg_replace("@<style(.*?)</style>@is" , "", $info);
        $info = preg_replace("@<(.*?)>@is" , "", $info);
        $info = str_replace(" " , '', $info);
        $info = mb_substr($info, 0, 150, "utf-8");
		$item["ninfo" ] = $info;
		$item['pics'] = explode(',', $item["itemPics"]);

		$dapei_like = $this->_mod->where(array("cate_id" => $item['cate_id']))->order('id desc')->limit('5')->select();
        $this->assign("dapei_like" , $dapei_like);
		$item['click_url'] = 'http:'.$item['click_url'];
 
       
        $this->assign("item" , $item);   
        $this->assign("nav_curr" , 'dapei');  
        $this->assign('dapei' , $item);
		$this->_config_seo(array(
			'title' =>  $item['title'],
			'keywords' =>  $item['tags'],
			'description' =>  $item['title'],
		));
        $this->display();
    }
} ?>
