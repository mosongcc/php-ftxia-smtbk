﻿<?php
/*
 * 参数提交页面
 */
	
include 'config.php';

	//获取用户IP
	$user_ip = "";
	if(isset($_SERVER['HTTP_CLIENT_IP']))
	{
		$user_ip = $_SERVER['HTTP_CLIENT_IP'];
	}
	else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		$user_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}else
	{
		$user_ip = $_SERVER['REMOTE_ADDR'];
	}
	
	//获取项目URL
	$url = 'http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$project_url = str_replace('post_action.php','',$url);
	
	$version = 1;
	$agent_id = $_POST['agent_id'];
	$agent_bill_id = $_POST['agent_bill_id'];
	$agent_bill_time = date('YmdHis', time());
    $pay_type = 22; //支付宝支付代码,int型
	$pay_code = ""; //char型，空字符串
	$pay_amt = $_POST['order_amt'];
	$notify_url = $project_url."notify.php";
	$return_url = "https://www.heepay.com/"; //微信支付不涉及同步返回，此处可填写任意URL，没有实际使用
	$goods_name = $_POST['goods_name'];
	$goods_num = $_POST['goods_num'];
	$goods_note = $_POST['goods_note'];
	$remark = $_POST['remark'];
	$wxpay_type = $_POST['wxpay_type'];
    $sign_key = $_POST['sign_key']; //签名密钥，需要商户使用为自己的真实KEY
	//支付类型（扫码支付、WAP支付）
	if($wxpay_type == 1) //WAP支付
	{
		$is_phone = 1;
		$is_frame = 0;
	}
	else if($wxpay_type == 0) 
	{
		$is_phone = 0;
		$is_frame = 0;
	}
	/*************创建签名***************/
	$sign_str = '';
	$sign_str  = $sign_str . 'version=' . $version;
	$sign_str  = $sign_str . '&agent_id=' . $agent_id;
	$sign_str  = $sign_str . '&agent_bill_id=' . $agent_bill_id;
	$sign_str  = $sign_str . '&agent_bill_time=' . $agent_bill_time;
	$sign_str  = $sign_str . '&pay_type=' . $pay_type;
	$sign_str  = $sign_str . '&pay_amt=' . $pay_amt;
	$sign_str  = $sign_str .  '&notify_url=' . $notify_url;
	$sign_str  = $sign_str . '&return_url=' . $return_url;
	$sign_str  = $sign_str . '&user_ip=' . $user_ip;
	$sign_str = $sign_str . '&key=' . $sign_key;
	
	$sign = md5($sign_str); //签名值
?>
<textarea name="card_data" id="card_data" rows="10" cols="70"><?php echo '签名原始数据：'.strtolower($sign_str);?></textarea>
<textarea name="sign" id="sign" rows="10" cols="70"><?php echo '签名加密后数据数据：'.$sign;?></textarea>

<form id='frmSubmit' method='post' name='frmSubmit' action='<?php echo PAY_URL;?>'>
<input type='hidden' name='version' value='<?php echo $version;?>' />
<input type='hidden' name='agent_id' value='<?php echo $agent_id;?>' />
<input type='hidden' name='agent_bill_id' value='<?php echo $agent_bill_id;?>' />
<input type='hidden' name='agent_bill_time' value='<?php echo  $agent_bill_time;?>' />
<input type='hidden' name='pay_type' value='<?php echo $pay_type;?>' />
<input type='hidden' name='pay_code' value='<?php echo $pay_code;?>' />
<input type='hidden' name='pay_amt' value='<?php echo $pay_amt;?>' />
<input type='hidden' name='notify_url' value='<?php echo $notify_url;?>' />
<input type='hidden' name='return_url' value='<?php echo $return_url;?>' />
<input type='hidden' name='user_ip' value='<?php echo $user_ip;?>' />
<input type='hidden' name='goods_name' value='<?php echo urlencode($goods_name);?>' />
<input type='hidden' name='goods_num' value='<?php echo  urlencode($goods_num);?>' />
<input type='hidden' name='goods_note' value='<?php echo urlencode($goods_note);?>' />
<input type='hidden' name='remark' value='<?php echo urlencode($remark);?>' />
<input type='hidden' name='is_phone' value='<?php echo $is_phone;?>' />
<input type='hidden' name='is_frame' value='<?php echo $is_frame;?>' />
<input type='hidden' name='sign' value='<?php echo $sign;?>' />
<input type="button" value="提交订单" onclick="gatewayPaySubmit()">
</form>
<script language='javascript'>
function gatewayPaySubmit(){document.frmSubmit.submit();}
</script>
