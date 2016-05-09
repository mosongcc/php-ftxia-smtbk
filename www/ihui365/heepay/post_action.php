<?php
include 'config.php';
/*
 * 提交支付页面
 */
	
	//获取ip
	$user_ip = "";
	if(isset($_SERVER['HTTP_CLIENT_IP']))
	{
		$user_ip = $_SERVER['HTTP_CLIENT_IP'];
	}
	elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		$user_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else
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
	$pay_type = $_POST['pay_type'];
	$pay_code = $_POST['bank_type'];
	$pay_amt = $_POST['pay_amt'];
	$notify_url = $project_url."notify.php";
	$return_url = $project_url."return.php";
	$goods_name = $_POST['goods_name'];
	$goods_num = $_POST['goods_num'];
	$goods_note = $_POST['goods_note'];
	$remark = $_POST['remark'];
	$sign_key = $_POST['sign_key']; //签名密钥，需要商户使用为自己的真实KEY
	
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

	$sign = md5($sign_str); //计算签名值
?>
<textarea name="cardData" id="cardData" rows="10" cols="70"><?php echo '签名原始数据：'.strtolower($sign_str);?></textarea>
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
<input type='hidden' name='sign' value='<?php echo $sign;?>' />
<input type="button" value="提交支付" onclick="gatewayPaySubmit()">
</form>
<script language='javascript'>
function gatewayPaySubmit(){document.frmSubmit.submit();}
</script>



