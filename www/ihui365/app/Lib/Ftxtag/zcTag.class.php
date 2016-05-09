<?php
/**
 * 导航标签
 */
class zcTag {  
    /**
     * 导航列表
     * @param array $options 
     */
    public function lists($options) {
		$options['style'] = isset($options['style']) ? trim($options['style']) : '0';
		if($options['style']!=='0'){
			$where['pass'] = 1;
			$where['isshow'] = '1';
			$cates=D('zc_cate')->get_child_ids($options['style']);
			$cates['ids']=$options['style'];
			$where['zc_id'] = array('IN', $cates);
			$order = 'ordid DESC,coupon_start_time DESC ';   		
			$items_list = D('items')->where($where)->order($order)->select();    		
			$items = array();
			foreach($items_list as $key=>$val){
				$items[$key]		= $val;
				$items[$key]['class']	= D('items')->status($val['status'],$val['coupon_start_time'],$val['coupon_end_time']);
				$items[$key]['zk']		= round(($val['coupon_price']/$val['price'])*10, 1); 
				if(!$val['click_url']){
					$items[$key]['click_url']	=U('jump/index',array('id'=>$val['id']));
				}
				if($val['coupon_start_time']>time()){
					$items[$key]['click_url']	=U('item/index',array('id'=>$val['id']));
				}
				$items[$key]['cate_name']		=$cate_list['p'][$val['cate_id']]['name']; 
				$url = C('ftx_site_url').U('item/index',array('id'=>$val['id']));
				$items[$key]['url'] = urlencode($url);
				$items[$key]['urltitle'] = urlencode($val['title']);
				$items[$key]['price'] = number_format($val['price'],1);
				$items[$key]['coupon_price'] = number_format($val['coupon_price'],1);
			}
		}
		$items_list=$items;
		//p($items_list);
        return $items_list;
    }
}