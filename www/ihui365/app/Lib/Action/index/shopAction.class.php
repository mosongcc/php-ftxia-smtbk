<?php

class shopAction extends FirstendAction {
	public function _empty(){
		$idd = ACTION_NAME;
    	$this->index($idd);
    }

    public function index($idd) {
		$this->_mod = D('items');
		if($idd){
			$id = $idd;
		}else{
			$id = I('id','', 'intval');
		}
		$where['sellerId'] = $id;
		$info = $this->_mod->field('nick')->where($where)->find();
		$nick = $info['nick'];

		if($nick){
			if(strpos($nick,'旗舰')  || strpos($nick,'专营店')  || strpos($nick,'专卖店')){
				$name = str_replace("旗舰店","",$nick);
				$name = str_replace("旗舰","",$name);
				$name = str_replace("专营店","",$name);
				$name = str_replace("专卖店","",$name);
				$name = str_replace("服饰","",$name);
				$name = str_replace("配件","",$name);
				$name = str_replace("官方","",$name);
				$name = str_replace("男装","",$name);
				$name = str_replace("女装","",$name);
				$start = 0;
				$page_size = 24;
 
				$file = 'shop_'.$id;
				//$where['ems'] = 1;
		 
				if(C('ftx_site_cache')){
					if(false === $items = S($file)){
						$items_list = $this->_mod->where($where)->limit($start . ',' . $page_size)->select();
						$items = array();
						$seller_arr = array();
						$sellers = '';
						foreach($items_list as $key=>$val){
							$items['item_list'][$key]			= $val;
							$items['item_list'][$key]['class']	= $this->_mod->status($val['status'],$val['coupon_start_time'],$val['coupon_end_time']);
							$items['item_list'][$key]['zk']		= round(($val['coupon_price']/$val['price'])*10, 1); 
							if($items['item_list'][$key]['click_url']){
								if(strlen($items['item_list'][$key]['click_url'])<20){
									$items['item_list'][$key]['click_url'] = '';
								}
							}
							if(!$val['click_url']){
								$items['item_list'][$key]['click_url']	=U('jump/index',array('id'=>$val['id']));
							}
							if($val['coupon_start_time']>time()){
								$items['item_list'][$key]['click_url']	=U('item/index',array('id'=>$val['id']));
								$items['item_list'][$key]['timeleft'] = $val['coupon_start_time']-time();
							}else{
								$items['item_list'][$key]['timeleft'] = $val['coupon_end_time']-time();
							}
							$items['item_list'][$key]['cate_name']		=$cate_list['p'][$val['cate_id']]['name']; 
							$url = C('ftx_site_url').U('item/index',array('id'=>$val['id']));
							$items['item_list'][$key]['url'] = urlencode($url);
							$items['item_list'][$key]['urltitle'] = urlencode($val['title']);
							$items['item_list'][$key]['price'] = number_format($val['price'],1);
							$items['item_list'][$key]['coupon_price'] = number_format($val['coupon_price'],1);
							if($val['sellerId']){
								$items['seller_arr'][] = $val['sellerId'];
							}
						}
						S($file,$items);
					}
				}else{
					$items_list = $this->_mod->where($where)->order($order)->limit($start . ',' . $page_size)->select();
					$items = array();
					$seller_arr = array();
					$sellers = '';
					foreach($items_list as $key=>$val){
						$items['item_list'][$key]			= $val;
						$items['item_list'][$key]['class']	= $this->_mod->status($val['status'],$val['coupon_start_time'],$val['coupon_end_time']);
						$items['item_list'][$key]['zk']		= round(($val['coupon_price']/$val['price'])*10, 1); 
						if($items['item_list'][$key]['click_url']){
							if(strlen($items['item_list'][$key]['click_url'])<20){
								$items['item_list'][$key]['click_url'] = '';
							}
						}
						if(!$val['click_url']){
							$items['item_list'][$key]['click_url']	=U('jump/index',array('id'=>$val['id']));
						}
						if($val['coupon_start_time']>time()){
							$items['item_list'][$key]['click_url']	=U('item/index',array('id'=>$val['id']));
							$items['item_list'][$key]['timeleft'] = $val['coupon_start_time']-time();
						}else{
							$items['item_list'][$key]['timeleft'] = $val['coupon_end_time']-time();
						}
						$items['item_list'][$key]['cate_name']		=$cate_list['p'][$val['cate_id']]['name']; 
						$url = C('ftx_site_url').U('item/index',array('id'=>$val['id']));
						$items['item_list'][$key]['url'] = urlencode($url);
						$items['item_list'][$key]['urltitle'] = urlencode($val['title']);
						$items['item_list'][$key]['price'] = number_format($val['price'],1);
						$items['item_list'][$key]['coupon_price'] = number_format($val['coupon_price'],1);
						if($val['sellerId']){
							$items['seller_arr'][] = $val['sellerId'];
						}
					}
				}
				
				$seller_arr = array_unique($items['seller_arr']);
				$sellers = implode(",",$seller_arr);
				if(IS_AJAX){
					if(!$items){$this->ajaxReturn(0, '加载完成');}
					$this->assign('items_list', $items['item_list']);
					$resp = $this->fetch('ajax');
					$this->ajaxReturn(1, '', $resp);
				}
				$this->assign('sellers', $sellers);
				$this->assign('name', $name);

				$this->assign('items_list', $items['item_list']);
				$this->assign('nav_curr', 'index');
				//p(C('ftx_seo_config.cate'));
				$this->_config_seo(array(
					'title' => $name.'特卖专场,'.$name.'特卖专场品牌特卖,'.$name.'特卖专场天猫店铺-品牌特卖',
					'keywords' => '',
					'description' => $name.'特卖专场品牌特卖折扣促销,精选'.$name.'特卖专场淘宝店铺优质折扣商品,全场1折起限量秒杀,买'.$name.'特卖专场品牌商品,上沐沐街品牌团,正品低价,品质保障',
				));

				$this->display('shop');
				exit();


 

			}
		}
 

		$taodianjin = C('ftx_taojindian_html');
		if(strpos($taodianjin,'text/javascript')){
			$pid = get_word($taodianjin,'pid: "','"');
		}else{
			$pid = $taodianjin;
		}
		$this->assign('pid', $pid);
		$this->assign('id', $id);
        $this->display('index');
    }
}