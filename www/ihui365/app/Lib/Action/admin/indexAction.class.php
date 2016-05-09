<?php
class indexAction extends BackendAction {

    public function _initialize() {
        parent::_initialize();
        $this->_mod			= D('menu');
		$this->_item_mod	= D('items');
		$this->_user_mod	= D('user');
		$this->_online_mod	= D('online');
    }

    public function index() {
        $top_menus = $this->_mod->admin_menu(0);
        $this->assign('top_menus', $top_menus);
        $my_admin = array('username'=>$_SESSION['admin']['username'], 'roleid'=>$_SESSION['admin']['role_id'], 'rolename'=>$_SESSION['admin']['role_name']);
        $this->assign('my_admin', $my_admin);
        $this->display();
    }

    public function panel() {
		$api_config = M('items_site')->where(array('code' => 'ftxia'))->getField('config');
		$ftx_appkey = unserialize($api_config);
        $message = array();
        if (is_dir('./install')) {
            $message[] = array(
                'type' => 'Focus',
                'content' => "您还没有删除 install 文件夹，出于安全的考虑，我们建议您删除 install 文件夹。",
            );
        }
        if (APP_DEBUG == true) {
            $message[] = array(
                'type' => 'Focus',
                'content' => "您网站的 DEBUG 没有关闭，出于安全考虑，我们建议您关闭程序 DEBUG。 <a href='http://bbs.8mob.com/forum.php?mod=viewthread&tid=1291' target='_blank'>点此看教程</a>",
            );
        }
        if (!function_exists("curl_getinfo")) {
            $message[] = array(
                'type' => 'Error',
                'content' => "系统不支持 CURL ,将无法采集商品数据。 <a href='http://bbs.8mob.com/forum.php?mod=viewthread&tid=4925' target='_blank'>点此看教程</a>",
            );
        }
		if (!$ftx_appkey['app_key']) {
            $message[] = array(
                'type' => 'Error',
                'content' => "请设置您的 飞天侠开放平台 APPKEY！<a href='http://bbs.8mob.com/forum.php?mod=viewthread&tid=2871' target='_blank'>点此申请APPKEY</a>",
            );
        }
		if (!C('ftx_meilishuo_id')) {
            $message[] = array(
                'type' => 'Error',
                'content' => "请设置您的 美丽说联盟ID！<a href='http://bbs.8mob.com/forum.php?mod=viewthread&tid=5692' target='_blank'>点此查看申请教程</a>",
            );
        }
		if(!class_exists("ZipArchive")){
			$message[] = array(
                'type' => 'Error',
                'content' => "请开启支持在线更新相关类：php.ini中 php_zip.dll扩展 <a href='http://bbs.8mob.com/forum.php?mod=viewthread&tid=4924' target='_blank'>点此看教程</a>",
            );
		}

		if(C('ftx_taojindian_html')){
			$taodianjin = C('ftx_taojindian_html');
			if(strpos($taodianjin,'text/javascript')){
				$pid = get_word($taodianjin,'pid: "','"');
				if(!$pid){
					$message[] = array(
						'type' => 'Error',
						'content' => "请设置您的 淘点金代码 ！<a href='http://bbs.8mob.com/forum.php?mod=viewthread&tid=3125' target='_blank'>点此查看申请教程</a>",
					);
				}
			}
		}else{
			$message[] = array(
				'type' => 'Error',
				'content' => "请设置您的 淘点金代码 ！<a href='http://bbs.8mob.com/forum.php?mod=viewthread&tid=3125' target='_blank'>点此查看申请教程</a>",
			);
		}



        $this->assign('message', $message);
        $system_info = array(
            'ftxia_version' => FTX_VERSION . ' RELEASE '. FTX_RELEASE .' ',
            'server_domain' => $_SERVER['SERVER_NAME'] . ' [ ' . gethostbyname($_SERVER['SERVER_NAME']) . ' ]',
            'server_os' => PHP_OS,
            'web_server' => $_SERVER["SERVER_SOFTWARE"],
            'php_version' => PHP_VERSION,
            'mysql_version' => mysql_get_server_info(),
            'upload_max_filesize' => ini_get('upload_max_filesize'),
            'max_execution_time' => ini_get('max_execution_time') . '秒',
            'safe_mode' => (boolean) ini_get('safe_mode') ?  'onCorrect' : 'onError',
            'zlib' => function_exists('gzclose') ?  'onCorrect' : 'onError',
			'zip' => class_exists('ZipArchive') ?  'onCorrect' : 'onError',
            'curl' => function_exists("curl_getinfo") ? 'onCorrect' : 'onError',
            'timezone' => function_exists("date_default_timezone_get") ? date_default_timezone_get() : L('no')
        );
        $this->assign('system_info', $system_info);
		$tips_pars = array(
			'action'=>'not'.'ice',
			'sitename'=>'ftxia',
			'siteurl'=>$_SERVER['SERVER_NAME'],
			'version'=>FTX_VERSION,
			'release'=>FTX_RELEASE,
		);
		$tips_str = base64_decode('PGRpdiBpZD0iZnR4aWFfbm90aWNlIj48L2Rpdj48c2NyaXB0IHR5cGU9InRleHQvamF2YXNjcmlwdCIgc3JjPSJodHRwOi8vYmJzLjhtb2IuY29tL3BsdWdpbi5waHA/aWQ9ZnR4aWE6Z2V0dmlwJntwYXJzfSI+PC9zY3JpcHQ+');
		$tips_data = str_replace('{pars}', http_build_query($tips_pars), $tips_str);
		$this->assign('tips_data', $tips_data);
		$my_admin = array('username'=>$_SESSION['admin']['username'], 'roleid'=>$_SESSION['admin']['role_id'], 'rolename'=>$_SESSION['admin']['role_name']);

		$item_total = $this->_item_mod->count();
		$this->assign('item_total', $item_total);
		$item_today = $this->_item_mod->where(array('astime'=>date("Ymd")))->count();
		$this->assign('item_today', $item_today);
		$comwhere['commission'] = array('egt',0);
		$item_commissioon = $this->_item_mod->where($comwhere)->count();
		$this->assign('item_commissioon', $item_commissioon);
		$endwhere['coupon_end_time'] = array('lt',time());
		$item_endtime = $this->_item_mod->where($endwhere)->count();
		$this->assign('item_endtime', $item_endtime);
		$user_total = $this->_user_mod->count();
		$this->assign('user_total', $user_total);
		$regwhere['reg_time'] = array('egt',strtotime(date("Y-m-d")));
		$user_today = $this->_user_mod->where($regwhere)->count();
		$this->assign('user_today', $user_today);
		$online_total = $this->_online_mod->count();
		$this->assign('online_total', $online_total);
		$onlinewhere['uid'] = array('gt',0);
		$user_online = $this->_online_mod->where($onlinewhere)->count();
		$this->assign('user_online', $user_online);
		if($online_total > $user_online){$line_total = $online_total - $user_online ;$this->assign('line_total', $line_total);}
		$this->assign('my_admin', $my_admin);
		$this->assign('time',date('Y-m-d H:i'));
		$this->assign('ip',get_client_ip());
        $this->display();
    }

    public function login() {
        if (IS_POST) {
            $username = $this->_post('username', 'trim');
            $password = $this->_post('password', 'trim');
			if(!$username || !$password ){
                $this->error(L('input_empty'));
            }
            $verify_code = $this->_post('verify_code', 'trim');
            if(session('verify') != md5($verify_code)){
                $this->error(L('verify_code_error'));
            }
            $admin = M('admin')->where(array('username'=>$username, 'status'=>1))->find();
            if (!$admin) {
                $this->error(L('admin_not_exist'));
            }
            if ($admin['password'] != md5($password)) {
                $this->error(L('password_error'));
            }
            $admin_role = M('admin_role')->where(array('id'=>$admin['role_id']))->find();
            session('admin', array(
                'id' => $admin['id'],
                'role_id' => $admin['role_id'],
                'role_name' => $admin_role['name'],
                'username' => $admin['username'],
            ));
            M('admin')->where(array('id'=>$admin['id']))->save(array('last_time'=>time(), 'last_ip'=>get_client_ip()));
            $this->success(L('login_success'), U('index/index'));
        } else {
            $this->display();
        }
    }

    public function logout() {
        session('admin', null);
        $this->success(L('logout_success'), U('index/login'));
        exit;
    }

    public function verify_code() {
        Image::buildImageVerify(4,1,'png','300','100');
    }

    public function left() {
        $menuid = $this->_request('menuid', 'intval');
        if ($menuid) {
            $left_menu = $this->_mod->admin_menu($menuid);
            foreach ($left_menu as $key=>$val) {
                $left_menu[$key]['sub'] = $this->_mod->admin_menu($val['id']);
            }
        } else {
            $left_menu[0] = array('id'=>0,'name'=>L('common_menu'));
            $left_menu[0]['sub'] = array();
            if ($r = $this->_mod->where(array('often'=>1))->select()) {
                $left_menu[0]['sub'] = $r;
            }
            array_unshift($left_menu[0]['sub'], array('id'=>0,'name'=>L('common_menu_set'),'module_name'=>'index','action_name'=>'often_menu'));
        }
        $this->assign('left_menu', $left_menu);
        $this->display();
    }

    public function often() {
        if (isset($_POST['do'])) {
            $id_arr = isset($_POST['id']) && is_array($_POST['id']) ? $_POST['id'] : '';
            $this->_mod->where(array('ofen'=>1))->save(array('often'=>0));
            $id_str = implode(',', $id_arr);
            $this->_mod->where('id IN('.$id_str.')')->save(array('often'=>1));
            $this->success(L('operation_success'));
        } else {
            $r = $this->_mod->admin_menu(0);
            $list = array();
            foreach ($r as $v) {
                $v['sub'] = $this->_mod->admin_menu($v['id']);
                foreach ($v['sub'] as $key=>$sv) {
                    $v['sub'][$key]['sub'] = $this->_mod->admin_menu($sv['id']);
                }
                $list[] = $v;
            }
            $this->assign('list', $list);
            $this->display();
        }
    }

    public function map() {
        $r = $this->_mod->admin_menu(0);
        $list = array();
        foreach ($r as $v) {
            $v['sub'] = $this->_mod->admin_menu($v['id']);
            foreach ($v['sub'] as $key=>$sv) {
                $v['sub'][$key]['sub'] = $this->_mod->admin_menu($sv['id']);
            }
            $list[] = $v;
        }
        $this->assign('list', $list);
        $this->display();
    }
}