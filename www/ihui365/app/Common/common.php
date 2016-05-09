<?php

function p($arr){
	dump($arr);
    exit;
}
 
function objtoarr($obj){
	$ret = array();
	foreach($obj as $key =>$value){
		if(gettype($value) == 'array' || gettype($value) == 'object'){
			$ret[$key] = objtoarr($value);
		}
		else{
			$ret[$key] = $value;
		}
	}
	return $ret;
}

function lefttime($second){
	$times = '';
    $day = floor($second/(3600*24));
    $second = $second%(3600*24);//除去整天之后剩余的时间
    $hour = floor($second/3600);
    $second = $second-$hour*3600;//除去整小时之后剩余的时间
    $minute = floor($second/60);
    $second = fmod(floatval($second),60);//除去整分钟之后剩余的时间
	if($day){
		$times = $day.'天';
	}
	if($hour){
		$times.=$hour.'小时';
	}
	if($minute){
		$times.=$minute.'分';
	}
	if($second){
		$times.=$second.'秒';
	}
    //返回字符串
    return $times;
}

function fftime($time){
	$tomorrow = strtotime(date('Y-m-d',strtotime("+1 day")));
	if($tomorrow > $time){
		return '今日<i>'.date('H时i分',$time).'</i>开始';
	}else{
		$lefttime = $time - $tomorrow;
		if($lefttime < 86400){
			return '明日<i>'.date('H时i分',$time).'</i>开始';
		}else{
			return '<i>'.date('m月d日 H点i分',$time).'</i>开始';
		}
	}
}

//秒数转换时间
function changeTimeType($seconds){
	if ($seconds>3600){
		$hours = intval($seconds/3600);
		$minutes = $seconds600;
		$time = $hours."时".gmstrftime('%M分%S秒', $minutes);
	}else{
		$time = gmstrftime('%H时%M分%S秒', $seconds);
	}
	return $time;
}



function addslashes_deep($value) {
    $value = is_array($value) ? array_map('addslashes_deep', $value) : addslashes($value);
    return $value;
}

function stripslashes_deep($value) {
    if (is_array($value)) {
        $value = array_map('stripslashes_deep', $value);
    } elseif (is_object($value)) {
        $vars = get_object_vars($value);
        foreach ($vars as $key => $data) {
            $value->{$key} = stripslashes_deep($data);
        }
    } else {
        $value = stripslashes($value);
    }

    return $value;
}

function filter_default(&$value){
    $value = htmlspecialchars($value);
}

function Newiconv($_input_charset="GBK",$_output_charset="UTF-8",$input ) {
	$output = "";
	if(!isset($_output_charset) )$_output_charset = $this->parameter['_input_charset '];
	if($_input_charset == $_output_charset || $input ==null) { $output = $input;
	}
	elseif (function_exists("m\x62_\x63\x6fn\x76\145\x72\164_\145\x6e\x63\x6f\x64\x69\x6e\147")){
		$output = mb_convert_encoding($input,$_output_charset,$_input_charset);
	} elseif(function_exists("\x69\x63o\156\x76")) {
		$output = iconv($_input_charset,$_output_charset,$input);
		} 
		else die("对不起，你的服务器系统无法进行字符转码.请联系空间商。");
		return $output; 
}
function zk($coupon_rate){
	return round( $coupon_rate/1000,1);

}
function price($price){
	$s=explode('.',$price);  
    if (count($s)==2 && ($s[1]=rtrim($s[1],'0'))) return implode('.',$s);  
    return $s[0];  
}
function newicon($time){
	$date = '';
	if (date('Y-m-d') == date('Y-m-d',$time)){
		$date = '<span class="newicon"></span>';
	}
	return $date;
}

function todaytime() {
    return mktime(0, 0, 0, date('m'), date('d'), date('Y'));
}

function get_word($html,$star,$end){
	$pat = '/'.$star.'(.*?)'.$end.'/s';
	if(!preg_match_all($pat, $html, $mat)) {                
	}else{
		$wd= $mat[1][0];
	}
	return $wd;
}
function get_words($html,$star,$end){
	$pat = '/'.$star.'(.*?)'.$end.'/s';
	if(!preg_match_all($pat, $html, $mat)) {                
	}else{
		return $mat[1];
	}
	return null;
}

/**
 * 友好时间
 */
function frienddate($time) {
    $rtime = date("m-d H:i",$time);
    $htime = date("H:i",$time);
    $timetime = time() - $time;

    if ($timetime < 60) {
       $str = '刚刚';
    }
    else if ($timetime < 60 * 60) {
       $min = floor($timetime/60);
       $str = $min.'分钟前';
    }
    else if ($timetime < 60 * 60 * 24) {
       $h = floor($timetime/(60*60));
       $str = $h.'小时前 ';
    }
    else if ($timetime < 60 * 60 * 24 * 3) {
       $d = floor($timetime/(60*60*24));
       if($d==1)
       $str = '昨天 '.$htime;
    else
       $str = '前天 '.$htime;
    }
    else {
       $str = $rtime;
    }
    return $str;
}


function fdate($time) {
    if (!$time)
        return false;
    $fdate = '';
    $d = time() - intval($time);
    $ld = $time - mktime(0, 0, 0, 0, 0, date('Y')); //年
    $md = $time - mktime(0, 0, 0, date('m'), 0, date('Y')); //月
    $byd = $time - mktime(0, 0, 0, date('m'), date('d') - 2, date('Y')); //前天
    $yd = $time - mktime(0, 0, 0, date('m'), date('d') - 1, date('Y')); //昨天
    $dd = $time - mktime(0, 0, 0, date('m'), date('d'), date('Y')); //今天
    $td = $time - mktime(0, 0, 0, date('m'), date('d') + 1, date('Y')); //明天
    $atd = $time - mktime(0, 0, 0, date('m'), date('d') + 2, date('Y')); //后天
    if ($d == 0) {
        $fdate = '刚刚';
    } else {
        switch ($d) {
            case $d < $atd:
                $fdate = date('Y年m月d日', $time);
                break;
            case $d < $td:
                $fdate = '后天' . date('H:i', $time);
                break;
            case $d < 0:
                $fdate = '明天' . date('H:i', $time);
                break;
            case $d < 60:
                $fdate = $d . '秒前';
                break;
            case $d < 3600:
                $fdate = floor($d / 60) . '分钟前';
                break;
            case $d < $dd:
                $fdate = floor($d / 3600) . '小时前';
                break;
            case $d < $yd:
                $fdate = '昨天' . date('H:i', $time);
                break;
            case $d < $byd:
                $fdate = '前天' . date('H:i', $time);
                break;
            case $d < $md:
                $fdate = date('m月d日 H:i', $time);
                break;
            case $d < $ld:
                $fdate = date('m月d日', $time);
                break;
            default:
                $fdate = date('Y年m月d日', $time);
                break;
        }
    }
    return $fdate;
}

function utf_substr($str, $len) {
	for ($i = 0; $i < $len; $i++) {
		$temp_str = substr($str, 0, 1);
		if (ord($temp_str) > 127) {
			$i++;
			if ($i < $len) {
				$new_str[] = substr($str, 0, 3);
				$str = substr($str, 3);
			}
		} else {
			$new_str[] = substr($str, 0, 1);
			$str = substr($str, 1);
		}
	}
	return join($new_str).'......';
}
 
/**
 * 获取用户头像
 */
function avatar($uid, $size) {
    $avatar_size = explode(',', C('ftx_avatar_size'));
    $size = in_array($size, $avatar_size) ? $size : '100';
    $avatar_dir = avatar_dir($uid);
    $avatar_file = $avatar_dir . md5($uid) . "_{$size}.jpg";
    if (!is_file(C('ftx_attach_path') . 'avatar/' . $avatar_file)) {
        $avatar_file = "default_{$size}.jpg";
    }
    return __ROOT__ . '/' . C('ftx_attach_path') . 'avatar/' . $avatar_file;
}

function avatar_dir($uid) {
    $uid = abs(intval($uid));
    $suid = sprintf("%09d", $uid);
    $dir1 = substr($suid, 0, 3);
    $dir2 = substr($suid, 3, 2);
    $dir3 = substr($suid, 5, 2);
    return $dir1 . '/' . $dir2 . '/' . $dir3 . '/';
}


function http( $url, $ua = "" ){
	$opts = array(
		"http" => array(
			"header" => "USER-AGENT: ".$ua)
	);
	$context = stream_context_create( $opts );
    $html = @file_get_contents( $url, FALSE, $context );
	if(!$html){
		$html = @file_get_contents( $url, FALSE, $context );
		if(!$html){
			$html = @file_get_contents( $url, FALSE, $context);
		}
	}
	for($i=0; $i < 10; $i++ ){
		if(!($html=== FALSE )){
			break;
		}
		$html = @file_get_contents( $url, FALSE, $context );
	}
	return $html;
}

function utf8( $string, $code = "" ){
	$code = @mb_detect_encoding($string,array("UTF-8", "GBK"));
	return mb_convert_encoding( $string, "UTF-8", $code );
}

function attach($attach, $type) {
    if (false === strpos($attach, 'http')) {
        //本地附件
		if(false === strpos($attach, C('ftx_attach_path'))){
			return __ROOT__ . '/' . C('ftx_attach_path') . $type . '/' . $attach;
		}else{
			return $attach;
		}
        //远程附件
        //todo...
    } else {
        //URL链接
        return $attach;
    }
}
function get_id($url) {
        $id = 0;
        $parse = parse_url($url);
        if (isset($parse['query'])) {
            parse_str($parse['query'], $params);
            if (isset($params['id'])) {
                $id = $params['id'];
            } elseif (isset($params['item_id'])) {
                $id = $params['item_id'];
            } elseif (isset($params['default_item_id'])) {
                $id = $params['default_item_id'];
            } elseif (isset($params['amp;id'])) {
                $id = $params['amp;id'];
            } elseif (isset($params['amp;item_id'])) {
                $id = $params['amp;item_id'];
            } elseif (isset($params['amp;default_item_id'])) {
                $id = $params['amp;default_item_id'];
            }
        }
        return $id;
    }
/*
 * 获取缩略图
 */
function get_thumb($img, $suffix = '_thumb') {
    if (false === strpos($img, 'http')) {
		$thumb = $img;
    } else {
        if (false !== strpos($img, 'taobaocdn.com') || false !== strpos($img, 'taobao.com') || false !== strpos($img, 'alicdn.com')) {
            //淘宝图片 _s _m _b
            switch ($suffix) {
                case '_s':
                    $thumb = $img . '_100x100.jpg';
                    break;
                case '_m':
                    $thumb = $img . '_230x230.jpg';
                    break;
                case '_b':
                    $thumb = $img . '_310x310.jpg';
                    break;
            }
        }else{
			$thumb = $img;
		}
    }
    return $thumb;
}


/**
 * 将数组键名变成大写或小写
 * @param array $arr 数组
 * @param int $type 转换方式 1大写   0小写
 * @return array
 */
function array_change_key_case_d($arr, $type = 0)
{
    $function = $type ? 'strtoupper' : 'strtolower';
    $newArr = array(); //格式化后的数组
    if (!is_array($arr) || empty($arr))
        return $newArr;
    foreach ($arr as $k => $v) {
        $k = $function($k);
        if (is_array($v)) {
            $newArr[$k] = array_change_key_case_d($v, $type);
        } else {
            $newArr[$k] = $v;
        }
    }
    return $newArr;
}
/**
 * 对象转换成数组
 */
function object_to_array($obj) {
    $_arr = is_object($obj) ? get_object_vars($obj) : $obj;
    foreach ($_arr as $key => $val) {
        $val = (is_array($val) || is_object($val)) ? object_to_array($val) : $val;
        $arr[$key] = $val;
    }
    return $arr;
}

function get_spider(){
	$useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
	if (strpos($useragent,'googlebot') !== false){return 'Google';}
	if (strpos($useragent,'msnbot') !== false){return 'MSN';}
	if (strpos($useragent,'bingbot') !== false){return 'Bing';}
	if (strpos($useragent,'slurp') !== false){return 'Yahoo!';}
	if (strpos($useragent,'baiduspider') !== false){return '百度';}
	if (strpos($useragent,'sohu-search')!== false){return '搜狐';}
	if (strpos($useragent,'lycos') !== false){return 'Lycos';}
	if (strpos($useragent,'robozilla') !== false){return 'Robozilla';}
	if (strpos($useragent,'soso') !== false){return '腾讯Soso';}
	if (strpos($useragent,'sogou') !== false){return '搜狗';}
	if (strpos($useragent,'xunlei') !== false){return '迅雷';}
	if (strpos($useragent,'youdao') !== false){return '有道';}
	if (strpos($useragent,'360Spider') !== false){return '360';}
	return false;
}

function get_url(){
	$ServerName = $_SERVER['SERVER_NAME'] ;
	$ServerPort = $_SERVER['SERVER_PORT'] ;
	$ScriptName = $_SERVER['SCRIPT_NAME'] ;
	$QueryString = $_SERVER['QUERY_STRING']  ;
	$serverip = $_SERVER['REMOTE_ADDR'] ;
	$Url='http://'.$ServerName ;
	If ($ServerPort != '80') 
	{$Url = $Url.':'.$ServerPort ;}
	$Url=$Url.$ScriptName ;
	If ($QueryString !='')
	{$Url=$Url.'?'.$QueryString  ;}
	$GetLocationURL=$Url ;
	return $GetLocationURL;
}


function Ftxiacom($name,$value=null,$expire=null) {
	$temp = C('DATA_CACHE_PATH');
	
		//$name	=	md5($name);
        if(C('DATA_CACHE_SUBDIR')) {
            // 使用子目录
            $dir   ='';
			if(strpos($name,'_')){
				$dirarr = explode("_",$name);
					$dir    .= $dirarr[0].'/';
			}
            if(!is_dir($temp.$dir)) {
                mkdir($temp.$dir,0755,true);
            }
            $filename	=	$dir.$name.'.ftxia';
        }else{
            $filename	=	$name.'.ftxia';
        }
        $path =  $temp.$filename;
		if(!$value){
			if (!is_file($path)) {
			   return false;
			}
			$content    =   file_get_contents($path);
			if( false !== $content) {
				$expire  =  (int)substr($content,8, 12);
				if($expire != 0 && time() > filemtime($path) + $expire) {
					//缓存过期删除缓存文件
					unlink($path);
					return false;
				}
				$content    =   unserialize($content);
				return $content;
			}
			else {
				return false;
			}
		}else{
			if(!$expire){
				$expire = C('DATA_CACHE_TIME');
			}
			$data   =   serialize($value);
			$data    = "<?php\n//".sprintf('%012d',$expire).$data."\n?>";
			$result  =   file_put_contents($path,$data);
			if($result){
				return true;
			}else {
				return false;
			}
		}
}


function is_mobile(){  
    $user_agent = $_SERVER['HTTP_USER_AGENT'];  
  
    $mobile_agents = Array("240x320","acer","acoon","acs-","abacho","ahong","airness","alcatel","amoi","android","anywhereyougo.com","applewebkit/525","applewebkit/532","asus","audio","au-mic","avantogo","becker","benq","bilbo","bird","blackberry","blazer","bleu","cdm-","compal","coolpad","danger","dbtel","dopod","elaine","eric","etouch","fly ","fly_","fly-","go.web","goodaccess","gradiente","grundig","haier","hedy","hitachi","htc","huawei","hutchison","inno","ipad","ipaq","ipod","jbrowser","kddi","kgt","kwc","lenovo","lg ","lg2","lg3","lg4","lg5","lg7","lg8","lg9","lg-","lge-","lge9","longcos","maemo","mercator","meridian","micromax","midp","mini","mitsu","mmm","mmp","mobi","mot-","moto","nec-","netfront","newgen","nexian","nf-browser","nintendo","nitro","nokia","nook","novarra","obigo","palm","panasonic","pantech","philips","phone","pg-","playstation","pocket","pt-","qc-","qtek","rover","sagem","sama","samu","sanyo","samsung","sch-","scooter","sec-","sendo","sgh-","sharp","siemens","sie-","softbank","sony","spice","sprint","spv","symbian","tablet","talkabout","tcl-","teleca","telit","tianyu","tim-","toshiba","tsm","up.browser","utec","utstar","verykool","virgin","vk-","voda","voxtel","vx","wap","wellco","wig browser","wii","windows ce","wireless","xda","xde","zte");  
    $is_mobile = false;  
    foreach ($mobile_agents as $device) {//这里把值遍历一遍，用于查找是否有上述字符串出现过  
       if (stristr($user_agent, $device)) { //stristr 查找访客端信息是否在上述数组中，不存在即为PC端。  
            $is_mobile = true;  
            break;  
        }  
    }  
    return $is_mobile;  
}  


function is_email($user_email){
	$chars = "/^([a-z0-9+_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,6}\$/i";
	if (strpos($user_email, '@') !== false && strpos($user_email, '.') !== false){
		if (preg_match($chars, $user_email)){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}


/**
 * ID 字母 转换
 */
function id_num($in,$to_num = false,$pad_up = false,$passKey = null)  {
    if(!function_exists('bcpow')) {
            return $in;
    }
        $index = 'abcdefghijklmnopqrstuvwxyz0123456789';
        if ($passKey !== null) {
            for ($n = 0;$n<strlen($index);$n++) {
                $i[] = substr( $index,$n ,1);
            }
            $passhash = hash('sha256',$passKey);
            $passhash = (strlen($passhash) <strlen($index))?hash('sha512',$passKey) : $passhash;
            for ($n=0;$n <strlen($index);$n++) {
                $p[] =  substr($passhash,$n ,1);
            }
            array_multisort($p,SORT_DESC,$i);
            $index = implode($i);
        }
        $base  = strlen($index);
        if ($to_num) {
            $in  = strrev($in);
            $out = 0;
            $len = strlen($in) -1;
            for ($t = 0;$t <= $len;$t++) {
                $bcpow = bcpow($base,$len -$t);
                $out   = $out +strpos($index,substr($in,$t,1)) * $bcpow;
            }
            if (is_numeric($pad_up)) {
                $pad_up--;
                if ($pad_up >0) {
                    $out -= pow($base,$pad_up);
                }
            }
            $out = sprintf('%F',$out);
            $out = substr($out,0,strpos($out,'.'));
        }else {
            if (is_numeric($pad_up)) {
                $pad_up--;
                if ($pad_up >0) {
                    $in += pow($base,$pad_up);
                }
            }
            $out = '';
            for ($t = floor(log($in,$base));$t >= 0;$t--) {
                $bcp = bcpow($base,$t);
                $a   = floor($in / $bcp) %$base;
                $out = $out .substr($index,$a,1);
                $in  = $in -($a * $bcp);
            }
            $out = strrev($out);
        }
        return $out;
}
 
function num_format($number = 0) {
    $chs     = array ('0', '一', '二', '三', '四', '五', '六', '七', '八', '九','十','十一');
    return $chs[$number];
}
function getcontentpic($content,$order=0){
	$pattern="/<img.*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
	preg_match_all($pattern,$content,$match);
	if(isset($match[1])&&!empty($match[1])){
		if($order==='ALL'){
			return $match[1];
		}
		if(is_numeric($order)&&isset($match[1][$order])){
			return $match[1][$order];
		}
	}
	return '';
}