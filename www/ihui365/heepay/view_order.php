<?php 
/*
 * 订单查询页面
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>
	网关支付DEMO-订单查询
</title>
    <script src="static/js/jquery.min.js"></script>
    <script>
        $(function(){
            $("#Button1").click(function(){
                if($("#agent_id").val()!="" && "#agent_bill_id").val()!="" && $("#agent_bill_time").val()!="" && $("#return_mode").val()!="" && $("#remark").val()!="" && $("#sign_key").val()!="")
                {document.form1.submit();}
                else
                {alert("*必填项，请正确填写！");return false;}
                return false;
            });
			
            $("#pay_type").change(function(){
                var obj = $(this);
                if(obj.val() == "20")
                {
                    $("#bank_id").show();
                }
                else{
                    $("#bank_id").hide();
                }
            });
			
        });
        
    </script>

    <style>
        .tab
        {
            border-collapse: collapse;
            width: 700px;
            border: #999 1px dashed;
        }
        .tab td
        {
            padding: 5px;
            border: #999 1px dashed;
        }
    </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

    <form name="form1" method="post" action="ViewPostAction.php" id="form1" target="_blank">
    <div style="height: 50px">
    </div>
    <div>
        <table class="tab" width="100%" border="0" align="center">
		<tr>
                <td align="center" colspan="3">
                    <a href="index.php">支付</a>
                                                     订单查询
                </td>
            </tr>
            <tr>
                <td align="center" colspan="3">
                                            汇付宝网关支付DEMO
                </td>
            </tr>
			<tr>
                <td align="left">
                    商户号：<span style="color: Red" >*</span>
                </td>
                <td>
                    <input name="agent_id" type="text" id="agent_id" value='<?php echo AGENT_ID;?>' />
                </td>
				<td>请替换自己的商户号</td>
            </tr>
			<tr>
                <td align="left">
                    商户订单号：<span style="color: Red" >*</span>
                </td>
                <td>
                    <input name="agent_bill_id" type="text" id="agent_bill_id" value='' />
                </td>
				<td>商家提交的唯一订单号（必填）必须唯一,最长50字符</td>
            </tr>
			<tr>
                <td align="left">
                    单据的时间：<span style="color: Red" >*</span>
                </td>
                <td>
                    <input name="agent_bill_time" type="text" id="agent_bill_time" value='' />
                </td>
				<td>单据的时间yyyyMMddHHmmss 20091112102000</td>
            </tr>
			<tr>
                <td align="left">
                    返回类型：<span style="color: Red" >*</span>
                </td>
                <td>
                    <input name="return_mode" type="text" id="return_mode" value='1' />
                </td>
				<td>查询结果返回类型1=字符串返回</td>
            </tr>
			<tr>
                <td align="left">
                    商户返回信息：<span style="color: Red" >*</span>
                </td>
                <td>
                    <input name="remark" type="text" id="remark" value='' />
                </td>
				<td>商家数据包，原样返回, 长度最长50字符</td>
            </tr>
			<tr>
                <td align="left">
                                              签名密钥：<span style="color: Red" >*</span>
                </td>
                <td>
                    <input name="sign_key" type="text" id="sign_key" value='<?php echo SIGN_KEY;?>' />
                </td>
				<td>与商户有关</td>
            </tr>
            <tr>
                <td align="center" colspan="3">
                    <input type="submit" name="Button1" value="查 询" id="Button1" />
                </td>
            </tr>
        </table>
    </div>
    </form>
</body>
</html>

