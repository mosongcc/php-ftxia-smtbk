<?php

class uzAction extends BackendAction {

	private $_ftxconfig = null;
	public function _initialize() {
        parent::_initialize();
        $this->_cate_mod = D('items_cate');
		$api_config = M('items_site')->where(array('code' => 'ftxia'))->getField('config');
        $this->_ftxconfig = unserialize($api_config);
    }



	public function index( )
    {
        $res = $this->_cate_mod->field( "id,name" )->select( );
        $cate_list = array( );
        foreach ( $res as $val )
        {
            $cate_list[$val['id']] = $val['name'];
        }
        $this->assign( "cate_list", $cate_list );
        $map = $this->_search( );
        $mod = D( "robots_other" );
        if ( !empty( $mod ) )
        {
            $this->_list( $mod, $map );
        }
        $this->sort = "ordid ASC,";
        $this->order = "last_time DESC";
        $this->display();
    }


	public function add( )
    {
        if(!function_exists("curl_getinfo"))
        {
            $this->error(L("curl_not_open"));
        }
        $this->display();
    }
	public function save(){
		if(IS_POST)
        {
            $name = $this->_post( "name", "trim" );
            $uzhan_id = $this->_post( "uzhan_id", "trim" );
            $uzhan_cates = $this->_post( "uzhan_cates", "trim" );
            $start_coupon_rate = $this->_post( "start_coupon_rate", "trim" );
            $end_coupon_rate = $this->_post( "end_coupon_rate", "trim" );
            $start_price = $this->_post( "start_price", "trim" );
            $end_price = $this->_post( "end_price", "trim" );
            $shop_type = $this->_post( "shop_type", "trim", "all" );
            $ems = $this->_post( "ems", "trim" );
            if ( !$name && !trim( $name ) )
            {
                $this->error( "请填写采集器名称" );
            }
            if ( !$uzhan_id && !trim( $uzhan_id ) )
            {
                $this->error( "请选择采集的U站" );
            }
            if ( !$uzhan_cates && !trim( $uzhan_cates ) )
            {
                $this->error( "请选择采集U站对应的分类" );
            }
            if ( !$uzhan_cates && !trim( $uzhan_cates ) )
            {
                $this->error( "请选择采集U站对应的分类" );
            }
            if ( $end_coupon_rate < $start_coupon_rate )
            {
                $this->error( "最低折扣不能高于最高折扣" );
            }
            $data['name'] = $name;
            $data['other_id'] = $uzhan_id;
            $data['other_cates'] = $uzhan_cates;
            $data['shop_type'] = $shop_type;
            $data['start_coupon_rate'] = $start_coupon_rate;
            $data['end_coupon_rate'] = $end_coupon_rate;
            $data['start_price'] = $start_price;
            $data['end_price'] = $end_price;
            $data['ems'] = $ems;
            $data['last_time'] = time( );
            D( "robots_other" )->create( $data );
            $item_id = D( "robots_other" )->add( );
            $this->success( "添加成功！" );
		}

	}

	public function uzhanEdit( )
    {
        if ( IS_POST )
        {
            $id					= $this->_post( "id", "trim" );
            $name				= $this->_post( "name", "trim" );
            $uzhan_id			= $this->_post( "uzhan_id", "trim" );
            $uzhan_cates		= $this->_post( "uzhan_cates", "trim" );
            $start_coupon_rate	= $this->_post( "start_coupon_rate", "trim" );
            $end_coupon_rate	= $this->_post( "end_coupon_rate", "trim" );
            $start_price		= $this->_post( "start_price", "trim" );
            $end_price			= $this->_post( "end_price", "trim" );
            $shop_type			= $this->_post( "shop_type", "trim", "all" );
            $ems				= $this->_post( "ems", "trim" );
            if ( !$name && !trim( $name ) )
            {
                $this->error( "请填写采集器名称" );
            }
            if ( !$uzhan_id && !trim( $uzhan_id ) )
            {
                $this->error( "请选择采集的U站" );
            }
            if ( !$uzhan_cates && !trim( $uzhan_cates ) )
            {
                $this->error( "请选择采集U站对应的分类" );
            }
            if ( !$uzhan_cates && !trim( $uzhan_cates ) )
            {
                $this->error( "请选择采集U站对应的分类" );
            }
            if ( $end_coupon_rate < $start_coupon_rate )
            {
                $this->error( "最低折扣不能高于最高折扣" );
            }
            $data['name'] = $name;
            $data['other_id'] = $uzhan_id;
            $data['other_cates'] = $uzhan_cates;
            $data['shop_type'] = $shop_type;
            $data['start_coupon_rate'] = $start_coupon_rate;
            $data['end_coupon_rate'] = $end_coupon_rate;
            $data['start_price'] = $start_price;
            $data['end_price'] = $end_price;
            $data['ems'] = $ems;
            $data['last_time'] = time( );
			D("robots_other")->where(array("id" => $id))->save($data);
            $this->success(L("operation_success"));
        }
        else
        {
            $id = $this->_get( "id", "intval" );
            $info = D("robots_other")->where(array("id" => $id))->find();
            $info['other_cates_json'] = json_decode( $info['other_cates'], TRUE );
			//exit(print_r($info));
            $this->assign( "info", $info );
            $this->display( );
        }
    }



	public function uzhanRobotInfo( )
    {
        $robotsId = $this->_get( "robotsId", "trim" );
        $item = D( "robots_other" )->where( array(
            "id" => $robotsId
        ) )->find( );
        if ( $item )
        {
            $this->ajaxReturn( 1, "", json_decode( $item['other_cates'], TRUE ) );
        }
        else
        {
            $this->ajaxReturn( 0, "找不到相关采集规则信息" );
        }
    }

	public function uzhanRobot( )
    {
        $collectFlag = intval( $this->_get( "collectFlag", "trim" ) );
        if ( $collectFlag == 0 )
        {
            $totalcoll = 0;
        }
        else
        {
            $totalcoll = f( "totalcoll" );
        }
        $robotsId = $this->_get( "robotsId", "trim" );
        $cateId = $this->_get( "cateId", "trim" );
        $currPage = $this->_get( "currPage", "trim" );
        $uzhanCateId = $this->_get( "uzhanCateId", "trim" );
        $url = "http://dazhe.youdou580.com/index.php?m=taobaoMember&a=UZhanRobots&uzhanCateId=".$uzhanCateId."&page=".$currPage;
        $result = json_decode( $this->toUTF8( $this->http( $url ) ), TRUE );
		//p($result);
        if ( $result['status'] == 1 )
        {
            $itemList = $result['data']['list'];
            $data = D("robots_other")->where(array("id" => $robotsId))->find();
			//exit(print_r($data));
            foreach ( $itemList as $key => $item )
            {
				//exit('0');
                $zkprice = floatval( $item['coupon_price'] );
                $zekou = floatval( $item['zekou'] ) * 1000;
                $shop_type = $item['shop_type'];
                $ems = $item['ems'];


                                if ( !defined( ENDTIME ) )
                                {
                                    define( "ENDTIME", "24" );
                                }
                                $times = ( integer )( time( ) + ENDTIME * 3600 * 7 );
                                $itemarray['shop_type'] = $shop_type;
                                $itemarray['title'] = $item['title'];
                                $itemarray['pic_url'] = $item['pic_url'];
                                $itemarray['num_iid'] = $item['num_iid'];
                                $itemarray['price'] = $item['price'];
                                $itemarray['coupon_price'] = $item['coupon_price'];
                                $itemarray['volume'] = $item['volume'];
                                $itemarray['nick'] = $item['nick'] ? $item['nick'] : "无";
                                $itemarray['ems'] = $item['ems'];
                                $itemarray['cate_id'] = $cateId;
                                $itemarray['coupon_rate'] = $zekou;
                                $itemarray['coupon_end_time'] = $times;
                                $itemarray['coupon_start_time'] = time( );

                                $result['item_list'][] = $itemarray;
            }
            $taobaoke_item_list = $result['item_list'];
            $coll = 0;
            $thiscount = 0;
			//p($taobaoke_item_list);
            foreach ( $taobaoke_item_list as $key => $val )
            {
				
                $res = $this->_ajax_tb_publish_insert( $val );
                if ( 0 < $res )
                {
                    ++$totalcoll;
                }
            }
        }
        F("totalcoll", $totalcoll );
        $resultData['pages'] = $result['data']['pages'];
        $resultData['totalcoll'] = $totalcoll;
        $this->ajaxReturn( 1, "", $resultData );
    }

	
    public function uzhanDelete( )
    {
        $where['id'] = $this->_get( "id", "trim", "intval" );
        $items_mod = m( "robots_other" );
        $result = $items_mod->where( $where )->delete( );
        if ( 0 < $result )
        {
            $this->ajaxReturn( 1, "已成功删除U站采集配置项" );
        }
        else
        {
            $this->ajaxReturn( 0, "对不起，删除U站采集配置项失败" );
        }
    }


	public function getUzCateList(){
		$uid = I("uzhan_id", "trim" );

		$item_cate = $this->_get_uzcatelist($uid);
		 if ($item_cate) {
            $this->ajaxReturn(1, '', $item_cate);
        } else {
            $this->ajaxReturn(0);
        }
	}

	private function _get_uzcatelist($uid) {
        $tb_top = $this->_get_tb_top();
        $req = $tb_top->load_api('FtxiaUzCateListGetRequest');
        $req->setFields("id,name");
		$req->setTime(date("Y-m-d"));
		$req->setUid($uid);
        $resp = $tb_top->execute($req);
		//p($resp);
        $res_cats = (array) $resp->uz_catelist;
        return $res_cats;
    }




	public function getuzlist(){
		$item_cate = $this->_get_uzlist();
		 if ($item_cate) {
            $this->ajaxReturn(1, '', $item_cate);
        } else {
            $this->ajaxReturn(0);
        }
	}

	private function _get_uzlist() {
        $tb_top = $this->_get_tb_top();
        $req = $tb_top->load_api('FtxiaUzListsGetRequest');
        $req->setFields("id,name,url");
		$req->setTime(date("Y-m-d"));
        $resp = $tb_top->execute($req);
		//p($resp);
        $res_cats = (array) $resp->uz_lists;
        return $res_cats;
    }

    private function _get_tb_top() {
        vendor('Ftxia.TopClient');
        vendor('Ftxia.RequestCheckUtil');
        vendor('Ftxia.Logger');
        $tb_top = new TopClient;
        $tb_top->appkey = $this->_ftxconfig['app_key'];
        $tb_top->secretKey = $this->_ftxconfig['app_secret'];
        return $tb_top;
    }


	private function _ajax_tb_publish_insert( $item )
    {
        $item['title'] = strip_tags( $item['title'] );
        $result = d( "items" )->ajax_tb_publish( $item );
        return $result;
    }


	
    private function toUTF8( $string, $code = "" )
    {
        $code = @mb_detect_encoding( $string, array( "UTF-8", "GBK" ) );
        return mb_convert_encoding( $string, "UTF-8", $code );
    }

    private function http( $url, $ua = "" )
    {
        $opts = array(
            "http" => array(
                "header" => "USER-AGENT: ".$ua
            )
        );
        $context = stream_context_create( $opts );
        $html = @file_get_contents( $url, FALSE, $context );
        if ( $html === FALSE )
        {
            $html = @file_get_contents( $url, FALSE, $context );
            if ( $html === FALSE )
            {
                $html = @file_get_contents( $url, FALSE, $context );
            }
        }
        $i = 0;
        for ( ; $i < 100; ++$i )
        {
            if ( !( $html === FALSE ) )
            {
                break;
            }
            $html = @file_get_contents( $url, FALSE, $context );
        }
        return $html;
    }

    private function _substr( $html, $start, $end )
    {
        $a = strpos( $html, $start );
        if ( $a === FALSE )
        {
            return "";
        }
        $html = substr( $html, $a + strlen( $start ) );
        $a = strpos( $html, $end );
        if ( $a === FALSE )
        {
            return "";
        }
        return substr( $html, 0, $a );
    }



}
?>