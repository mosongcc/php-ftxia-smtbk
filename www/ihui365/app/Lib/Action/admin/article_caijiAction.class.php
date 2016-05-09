<?php
class article_caijiAction extends BackendAction {
	public function _initialize() {
        parent::_initialize();
        $this->_mod = M('article');
		$api_config = M('items_site')->where(array('code' => 'ftxia'))->getField('config');
        $this->_tbconfig = unserialize($api_config);
    }

	public function index(){
		$this->display();
	}

	public function setting(){
		if(IS_POST){
			$cate_id		= $this->_post('cate_id', 'trim');
			$article_cate_id	= $this->_post('article_cate_id', 'trim');

			if(!$article_cate_id){
				$this->ajaxReturn(0, '采集分类必须选择！');
			}
			if(!$cate_id){
				$this->ajaxReturn(0, '入库分类必须选择！');
			}
			//把采集信息写入缓存
			F('article_caiji_setting', array(
				'cate_id' => $cate_id,
				'article_cate_id' => $article_cate_id,
			));
			$this->collect();
		}
	}

    public function collect() {
		$source = '';
		$coll = 0;
		if (false === $setting = F('article_caiji_setting')) {
            $this->ajaxReturn(0, L('illegal_parameters'));
        }
		$p		= $this->_get('p', 'intval', 1);
		if($p==1){
			$totalcoll = 0;
		}else{
			$totalcoll = F('totalcoll');
		}
		
		$result = $this->_get_list($setting['article_cate_id'],$p);
		if($result['item_list']){
		foreach ($result['item_list'] as $key => $val) {
			$item = array();
			$bwhere['albumId'] = $val['albumId'];
			$itemhav = $this->_mod->where($bwhere)->find();
			if(!$itemhav){
				$item['cate_id']	= $setting['cate_id'];
				$item['albumId']	= $val['albumId'];
				$item['title']		= $val['title'];
				$item['pic_url']	= $val['pic_url'];
				$item['author']		= $val['username'];
				$item['info']		= $val['content'];
				$item['tags']		= $val['tags'];
				$item['seo_desc']	= $val['desc'];
				$item['add_time']	= $val['add_time'];

				$this->_mod->create($item);
				$res = $this->_mod->add();
				if($res>0){
					if($item['tags']){
						$tag_list = explode(',', $item['tags']);

						foreach($tag_list as $val){
							if($val){
								$ws['name'] = $val;
								$is  = M('article_tags')->where($ws)->find();
								if($is){
									$score_data = array('tcount'=>array('exp','tcount+1'));
									M('article_tags')->where($ws)->setInc('tcount',1);
								}else{
									M('article_tags')->create($ws);
									M('article_tags')->add();
								}
							}
						}
					}

					$coll++;
				}
			}
			$totalcoll++;
		}
		}else{
			$this->ajaxReturn(0, '已经采集完成'.$p.'页,本次采集到'.$totalcoll.'篇文章！请返回，谢谢');
		}

		if ($coll == 0) {
            $this->ajaxReturn(0, "本次更新采集已完成，本页已经采集不重复~");
        }
		F('totalcoll',$totalcoll);
		$this->assign('p',$p);
		$this->assign('coll', $coll); 
		$this->assign('totalnum', $result['count']);
		$this->assign('totalcoll', $totalcoll);
		$resp = $this->fetch('collect');
		$this->ajaxReturn(1, '', $resp);
    }


	/**
     * 获取文章列表
     * 返回文章列表和总数
     */
    private function _get_list($cid, $p ) {
        $tb_top = $this->_get_top();
        $req = $tb_top->load_api('FtxiaArticleListsGetRequest');
        $req->setFields('albumid,title,desc,pic_url,username,content,tags,add_time');
        $req->setPageNo($p);
		$req->setTime(date("Y-m-d"));
        $req->setCid($cid);
		$resp = (array)$tb_top->execute($req);
        $count = $resp['totals'];
        $resp_items = objtoarr($resp['items']);
        //返回
        return array(
            'count' => intval($count),
            'item_list' => $resp_items,
        );
    }


	private function _get_top() {
        vendor('Ftxia.TopClient');
        vendor('Ftxia.RequestCheckUtil');
        vendor('Ftxia.Logger');
        $top = new TopClient;
        $top->appkey = $this->_tbconfig['app_key'];
        $top->secretKey = $this->_tbconfig['app_secret'];
        return $top;
    }

	public function ajax_getchilds() {
        $cid	= I('id','', 'intval');

		$top = $this->_get_top();
        $req = $top->load_api('FtxiaArticleCatsGetRequest');
        $req->setFields('id,name');
		$req->setPid($cid);
		$resp = $top->execute($req);
        $cats = object_to_array($resp->cats);
		$catlist =array();
		foreach($cats as $cat){
			$_cat = array();
			$_cat['id'] = $cat['cid'];
			$_cat['name'] = $cat['name'];
			$catlist[] = $_cat;
		}

        if ($cats) {
            $this->ajaxReturn(1, L('operation_success'), $catlist);
        } else {
            $this->ajaxReturn(0, L('operation_failure'));
        }
    }
}