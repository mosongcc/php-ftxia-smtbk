<?php 
/*
 * 配置文件
 */
date_default_timezone_set('PRC');
header("Content-type: text/html; charset=utf-8");

define('PAY_URL', 'https://pay.Heepay.com/Payment/Index.aspx'); //网银支付接口地址
define('QUERY_URL', 'https://query.heepay.com/Payment/Query.aspx');
define('AGENT_ID', '1664502');
define('SIGN_KEY', '33B1FEF26A9E445A9E683EEC');


?>