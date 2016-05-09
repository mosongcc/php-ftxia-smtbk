<?php
class articleAction extends FirstendAction {

	public function _initialize() {
        parent::_initialize();
		$this->cats_mod = D('article_cate');
		$this->article_mod = D('article');
		$this->cats_list = $this->cats_mod->get_cats();
		$this->assign('nav_curr', 'index');
		$this->assign('topnav_curr', 'article');
        $this->assign('acats', $this->cats_list);

		$all_cat = $this->cats_mod->select();
		$all_cats = array();
		foreach($all_cat as $key=>$cval){
			$all_cats[$cval['id']] = $cval;
		}
		$this->assign('all_cats', $all_cats);

		$tags = M('tags')->where(array('status'=>'1'))->order('id desc')->limit('0,50')->select();
		$this->assign('tags', $tags);

		$new_article = $this->article_mod->where(array('status'=>'1'))->order('hits desc')->limit('0,10')->select();
		$this->assign('new_article', $new_article);
    }

	public function index(){
		$p = I('p',1, 'intval');
		$map['status']="1";
		$cat['name'] = '文章资讯 — ';
		$page_size = 15;
		$start = $page_size * ($p - 1) ;
		$order = 'ordid asc ';
		$order.= ', id DESC';
		
        $article_list = $this->article_mod->where($map)->order($order)->limit($start . ',' . $page_size)->select();
 
		$articles = array();
		foreach($article_list as $val){
			$art = $val;
			if($art['pic_url'] == ''){
				$art['pic_url'] = getcontentpic($val['info']);
			}
			if($art['seo_desc'] == ''){
				$infos = preg_replace( "/<(\\/?)(script|i?frame|style|html|body|title|link|a|p|meta|embed|\\?|\\%)([^>]*?)>/isU", "", $val['info'] );
				$infos = strip_tags($infos);
				$art['seo_desc'] = mb_substr($infos,0,180, 'utf-8');
			}
 
			$articles[] = $art;
		}
		 
		$this->assign('article_list',$articles);
		$count = $this->article_mod->where($map)->count();
        $pager = $this->_pager($count, $page_size);
        $this->assign('page', $pager->kshow());

		$this->_config_seo(C('ftx_seo_config.article_cate'), array(
			'title' => $cat['name'],
			'cate_name' => $cat['name'],
            'seo_title' => $cat['seo_title'],
            'seo_keywords' => $cat['seo_keys'],
            'seo_description' => $cat['seo_desc'],
        ));
        $this->display('index');
	}

	public function cate(){
		$cid = I('id','', 'trim');
		$title = '文章阅读';
		$p = I('p',1, 'intval');
		$map['status']="1";
		if($cid){
			$cats = $this->cats_mod->field('id')->where(array('pid'=>$cid))->select();
			if($cats){
				$ids = $cid;
				foreach($cats as $vol){
					$ids.=','.$vol['id'];
				}
				$map['cate_id'] = array('in',$ids);
			}else{
				$map['cate_id'] = $cid;
			}
			$title = $this->cats_list[$cid]['name'];
			$cat = $this->cats_mod->find($cid);
        }else{
			$cat['name'] = '文章中心 ——  ';
		}
		$page_size = 15;
		$start = $page_size * ($p - 1) ;
		$order = 'ordid asc ';
		$order.= ', id DESC';
		
        $article_list = $this->article_mod->where($map)->order($order)->limit($start . ',' . $page_size)->select();
		$this->assign('cid',$cid);
		$articles = array();
		foreach($article_list as $val){
			$art = $val;
			if($art['pic_url'] == ''){
				$art['pic_url'] = getcontentpic($val['info']);
			}
			if($art['seo_desc'] == ''){
				$infos = preg_replace( "/<(\\/?)(script|i?frame|style|html|body|title|link|a|p|meta|embed|\\?|\\%)([^>]*?)>/isU", "", $val['info'] );
				$infos = strip_tags($infos);
				$art['seo_desc'] = mb_substr($infos,0,180, 'utf-8');
			}
 
			$articles[] = $art;
		}
		$this->assign('article_list',$articles);
		$count = $this->article_mod->where($map)->count();
        $pager = $this->_pager($count, $page_size);
        $this->assign('page', $pager->kshow());

		$this->_config_seo(C('ftx_seo_config.article_cate'), array(
			'title' => $cat['name'],
			'cate_name' => $cat['name'],
            'seo_title' => $cat['seo_title'],
            'seo_keywords' => $cat['seo_keys'],
            'seo_description' => $cat['seo_desc'],
        ));
        $this->display('index');
	}

	public function read(){
		$id = I('id','', 'intval');
        !$id && $this->_404(); 
		$this->article_mod->hits($id);
        $article = $this->article_mod->find($id);
		if($article['tags']){
			$article['tags'] = strtr($article['tags'],' ',',');
			$tag_list = explode(',', $article['tags']);
		}else{
			$tag_list = D('items')->get_tags_by_title($article['title']);
		}

		foreach($tag_list as $nkeys){
			if(strpos($article['info'],$nkeys) ){
				$url = U('tag/'.$nkeys);
				$article['info'] =str_replace($nkeys,"<a href=".$url." target=_blank ><b>".$nkeys."</b></a>",$article['info']);
			}
		}
		$pmap['id'] = array('lt',$id);
		$pre_article = $this->article_mod->field('id,title')->where($pmap)->order('id desc')->find();
		$nmap['id'] = array('gt',$id);
		$next_article = $this->article_mod->field('id,title')->where($nmap)->order('id')->find();
		$this->assign('pre_article',	$pre_article);
		$this->assign('next_article',	$next_article);

		$this->_config_seo(C('ftx_seo_config.article'), array(
			'title' => $article['title'],
            'seo_title' => $article['seo_title'],
            'seo_keywords' => $article['tags'],
            'seo_description' => $article['seo_desc'],
        ));
        $this->assign('article',$article);
		$this->assign('tag_list',$tag_list); //分类选中
        $this->display();
	}
}