<?php
include 'config.php';
/*
 * 异步通知处理页面
 */

	$result = $_GET['result'];
	$pay_message = $_GET['pay_message'];
	$agent_id = $_GET['agent_id'];
	$jnet_bill_no = $_GET['jnet_bill_no'];
	$agent_bill_id = $_GET['agent_bill_id'];
	$pay_type = $_GET['pay_type'];
	$pay_amt = $_GET['pay_amt'];
	$remark = $_GET['remark'];
	$return_sign=$_GET['sign'];

	$remark = iconv("GB2312","UTF-8//IGNORE",urldecode($remark));//签名验证中的中文采用UTF-8编码;

	$signStr='';
	$signStr  = $signStr . 'result=' . $result;
	$signStr  = $signStr . '&agent_id=' . $agent_id;
	$signStr  = $signStr . '&jnet_bill_no=' . $jnet_bill_no;
	$signStr  = $signStr . '&agent_bill_id=' . $agent_bill_id;
	$signStr  = $signStr . '&pay_type=' . $pay_type;
	
	$signStr  = $signStr . '&pay_amt=' . $pay_amt;
	$signStr  = $signStr .  '&remark=' . $remark;
	
	$signStr = $signStr . '&key=' . SIGN_KEY; //商户签名密钥
	
	$sign='';
	$sign=md5($signStr);
	if($sign==$return_sign){   //比较签名密钥结果是否一致，一致则保证了数据的一致性
		echo 'ok';
		//商户自行处理自己的业务逻辑
	}
	else{
		echo 'error';
		//商户自行处理，可通过查询接口更新订单状态，也可以通过商户后台自行补发通知，或者反馈运营人工补发
	}
	
?>
