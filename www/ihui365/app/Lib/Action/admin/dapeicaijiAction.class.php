<?php

class dapeicaijiAction extends BackendAction {
    public function _initialize() {
        parent::_initialize(); 
    }
    public function index() {
        $this->display();
    }
    public function setting() {
        if (IS_POST) {
            $cate_id	= $this->_post('cate_id', 'trim');
            $cat		= $this->_post("cat" , "trim");
            $num		= $this->_post("num" , "trim");
            if (!$cate_id) {
                $this->ajaxReturn(0, "入库分类必须选择!");
            }
			//把采集信息写入缓存
            F("dapeicaiji_setting" , array(
                "cate_id" => $cate_id,
                "cat" => $cat,
                "num" => $num,
            ));
            $this->collect();
        }
    }
    public function collect() {
        if (false === $dapeicaiji_setting = F('dapeicaiji_setting')) {
            $this->ajaxReturn(0, L('illegal_parameters'));
        }
        $page = $this->_get('p', 'intval' , 1);
        $taodianjin = C('ftx_taojindian_html');
        if (strpos($taodianjin, "text/javascript")) {
            $pid = get_word($taodianjin, 'pid: "' , '"');
        } else {
            $pid = $taodianjin;
        }
        if (!$pid) {
            $this->ajaxReturn(0, '请设置淘点金后采集！否则无佣金');
        }
        $cat = $dapeicaiji_setting["cat" ]; 
        $post_arr = array(
            '_tb_token_' => 'ZAqDEhxG6unO' ,
            '__ajax__' => '1',
            'pid' => $pid,
            "unid" => "199" ,
            "page" => $page,
            "pageSize" => $dapeicaiji_setting["num" ] ,
            "channelId" => '4',
            "tagId" => $cat,
        );
        $post_arr = http_build_query($post_arr);
        if ($page == 1) {
            $totalcoll = 0;
        } else {
            $totalcoll = F("totalcoll");
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://ai.taobao.com/style/list.htm');
        curl_setopt($ch, CURLOPT_REFERER, "http://ai.taobao.com/style/index.htm");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_arr);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
        $result = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($result, true);
        $item = array();
        $pages = $data["result" ]["paged" ]["pages" ];
        $totalnum = $data["result" ]["paged" ]["items" ];
        if ($page > $pages) {
            $this->ajaxReturn(0, "已经采集完成" . $pages . "页！请返回，谢谢");
        }
		//var_dump($result);
		//exit;
        if ($result) {
            for ($i = 0; $i < $dapeicaiji_setting["num" ]; $i++) {
                $item["info" ] = $data["result" ]["results" ][$i]["description" ];
                $item["pic_url" ] = $data["result" ]["results" ][$i]["mainPic" ];
                $item["styleid" ] = $data["result" ]["results" ][$i]["styleId" ];
                $item["clickurl" ] = $data["result" ]["results" ][$i]["clickUrl" ];
                $item["itemnum" ] = $data["result" ]["results" ][$i]["itemNum" ];
                $item["author" ] = $data["result" ]["results" ][$i]["memberInfoVO" ]["name" ];
                $item["avatar" ] = $data["result" ]["results" ][$i]["memberInfoVO" ]["avatar" ];
                $item["itemPics" ] = $data["result" ]["results" ][$i]["itemPics" ];
                $pics = explode(',', $item["itemPics" ]);
                $item["onepic" ] = $pics[0];
                $item["twopic" ] = $pics[1];
                $item["threepic" ] = $pics[2];
                $item["fourpic" ] = $pics[3];
                $avatar = str_replace("amp;" , "", $item["avatar" ]);
                $pic_url = $item["pic_url" ];
                $styleid = $item["styleid" ];
                $clickurl = $item["clickurl" ];
                $clickurl = str_replace("amp;" , "", $clickurl);
                $info = $item["info" ];
                $tags = D("dapei")->get_tags_by_title($info);
                $taglist = implode(',', $tags);
                $_item["tags" ] = $taglist;
                $_item["pic_url" ] = $item["pic_url"];
				$_item["itemPics" ] = $item["itemPics"];
                $_item["title" ] = $info;
                $_item["itemnum" ] = $item["itemnum"];
                $_item["author" ] = $item["author"];
                $_item["avatar" ] = $avatar;
                $_item["info" ] = $item["info"];
                $_item["styleid" ] = $styleid;
                $_item["item_url" ] = $clickurl;
                $_item["cate_id" ] = $dapeicaiji_setting["cate_id"];
                $_item["onepic" ] = $item["onepic"];
                $_item["twopic" ] = $item["twopic"];
                $_item["threepic" ] = $item["threepic"];
                $_item["fourpic" ] = $item["fourpic"];
				$_item["astime" ] = date('Ymd');
                $_item["click_url" ] = $clickurl;
                if ($info && $pic_url && $styleid) {
                    $items["item_list" ][] = $_item;
                }
            }
        }
        $coll = 0;
        foreach ($items["item_list" ] as $k => $val) {
			
            $res = $this->_ajax_tb_publish_insert($val);
            if ($res > 0) {
                $coll++;
            }
            $totalcoll++;
        }

		if ($coll == 0) {
            $this->ajaxReturn(0, "本次更新采集已完成，本页已经采集不重复~");
        }

        F("totalcoll" , $totalcoll);
        $this->assign('p', $page);
        $this->assign("coll" , $coll);
        $this->assign("pages" , $pages);
        $this->assign("totalnum" , $totalnum);
        $this->assign("totalcoll" , $totalcoll);
        $resp = $this->fetch("collect");
        $this->ajaxReturn(1, '', $resp);
    }

    private function _ajax_tb_publish_insert($item) {
        $item['title'] = strip_tags($item['title']);
        $result = D("dapei")->ajax_tb_publish($item);
        return $result;
    }

} 
?>
