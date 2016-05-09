<?php
/*
 * 异步通知页面
 */
	
	$result=$_GET['result'];
	$pay_message=$_GET['pay_message'];
	$agent_id=$_GET['agent_id'];
	$jnet_bill_no=$_GET['jnet_bill_no'];
	$agent_bill_id=$_GET['agent_bill_id'];
	$pay_type=$_GET['pay_type'];
	
	$pay_amt=$_GET['pay_amt'];
	$remark=$_GET['remark'];
	
	$returnSign=$_GET['sign'];
	//商户的KEY
	$key = '264A681B5043449F95F62C2D';
	
	$remark="%e5%a8%b4%ef%bf%bd%ef%bf%bd%ef%bf%bd%e3%83%a9%ef%bf%bd";
	$remark =urldecode($remark);
	$remark = iconv("GB2312","UTF-8//IGNORE",$remark);//urldecode($remark);
	
	echo $remark;
	exit();
	//$remark = "再测一回";
	//$remark = urlencode($remark);
	//$remark = iconv("GB2312","UTF-8//IGNORE",$remark);//urldecode($remark);
	//echo $remark;// = iconv("GB2312","UTF-8//IGNORE",$remark) ;
	
	$signStr='';
	$signStr  = $signStr . 'result=' . $result;
	$signStr  = $signStr . '&agent_id=' . $agent_id;
	$signStr  = $signStr . '&jnet_bill_no=' . $jnet_bill_no;
	$signStr  = $signStr . '&agent_bill_id=' . $agent_bill_id;
	$signStr  = $signStr . '&pay_type=' . $pay_type;
	
	$signStr  = $signStr . '&pay_amt=' . $pay_amt;
	$signStr  = $signStr .  '&remark=' . $remark;
	
	$signStr = $signStr . '&key=' . $key;
	
	$sign='';
	$sign=md5($signStr);
	//请确保 notify.php 和 return.php 判断代码一致
	if($sign==$returnSign){   //比较MD5签名结果 是否相等 确定交易是否成功  成功返回ok 否则返回error
		echo 'ok';	
	}
	else{
		echo 'error';	
	}
	
?>
