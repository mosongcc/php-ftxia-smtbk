<?php
/**
 * 基本控制器
 *
 */
class TopAction extends FuncAction{
    protected function _initialize() {
        //消除所有的magic_quotes_gpc转义
        Input::noGPC();
        //初始化网站配置
        if (false === $setting = F('setting')) {
            $setting = D('setting')->setting_cache();
        }
        C($setting);
        //发送邮件
        $this->assign('async_sendmail', session('async_sendmail'));

		$url		=	get_url();
		$searchbot	=	get_spider();
		$ip			=	get_client_ip();
		if ($searchbot) {
			$showdate=date('Y-m-d');
			$file=FTX_DATA_PATH.'spider/'.$showdate.'.txt';
			$time=time();
			$data=fopen($file,'a');
			fwrite($data,"$searchbot|$url|$ip|$time\n");
			fclose($data);
		}
    }

	protected function html($url){
		$ftxia_https = new ftxia_https();
		$ftxia_https->html($url);
		$content = $ftxia_https->results;
		if(!$content){
			$content = $this->http($url);
		}
		return $content;
    }
/*
	private function http( $url, $ua = "" ){
        $opts = array(
            "http" => array(
                "header" => "USER-AGENT: ".$ua
            )
        );
        $context = stream_context_create( $opts );
        $html = @file_get_contents( $url, FALSE, $context );
        if($html === FALSE){
            $html = @file_get_contents( $url, FALSE, $context );
            if($html === FALSE){
                $html = @file_get_contents( $url, FALSE, $context );
            }
        }
        for($i = 0;$i <10;++$i){
            if(!($html === FALSE)){
                break;
            }
            $html = @file_get_contents( $url, FALSE, $context );
        }
        return $html;
    }
 */
    public function _empty() {
        $this->_404();
    }
    
    protected function _404($url = '') {
        if ($url) {
            redirect($url);
        } else {
            send_http_status(404);
            $this->display(TMPL_PATH . '404.html');
            exit;
        }
    }

}
?>