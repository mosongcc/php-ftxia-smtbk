<?php
/*
 * 发起支付页面
 */ 
include 'config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>微信支付DEMO</title>
    <script src="static/js/jquery.min.js"></script>
    <script>
        $(function(){
            $("#Button1").click(function(){
                if($("#agent_id").val()!="" &&$("#agent_bill_id").val()!="" &&$("#goods_name").val()!="" &&$("#remark").val()!="" &&$("#sign_key").val()!="")
                {document.form1.submit();}
                else
                {alert("*必填项，请正确填写！");return false;}
                return false;
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
    <form name="form1" method="post" action="post_action.php" id="form1" target="_blank">
    <div style="height: 50px">
    </div>
    <div>
        <table class="tab" width="100%" border="0" align="center">
			<tr>
                <td align="center" colspan="3">
                                                     支付
                    <a href="view_order.php">订单查询</a>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="3">
                                           汇付宝微信支付DEMO
                </td>
            </tr>
			<tr>
                <td align="left">
                    商户号：<span style="color: Red" >*</span>
                </td>
                <td>
                    <input type="text" name="agent_id" id="agent_id" value="<?php echo AGENT_ID;?>" />
                </td>
				<td>请替换自己的商户号</td>
            </tr>
			<tr>
                <td align="left">
                    微信支付类型：<span style="color: Red" >*</span>
                </td>
                <td>
                <select name="wxpay_type">
                    <option value="0">微信扫码支付</option>
                    <option value="1">微信WAP支付</option>
                    <option value="2">微信公众号支付</option>
                </select>
                </td>
				<td></td>
            </tr>

            <tr>
                <td align="left" style="width: 150px">
                    定单号：<span style="color: Red;">*</span>
                </td>
                <td>
                    <input name="agent_bill_id" id="agent_bill_id" type="text" value="<?php echo date("YmdHis", time());?>" />
                </td>
				<td>商户定单号<span style="color: Red;">(要保证唯一)</span>。长度最长50字符</td>
            </tr>
            <tr>
                <td align="left">
                    支付金额：<span style="color: Red">*</span>
                </td>
                <td>
                    <input type="text"  name="order_amt" id="order_amt" value="0.1" />
                </td>
				<td>金额取值范围（0.1-3000.00），单位：元</td>
            </tr> 
            <tr>
                <td align="left" style="width: 150px">
                    商品名称：<span style="color: Red;">*</span>
                </td>
                <td>
                    <input type="text" name="goods_name" id="goods_name" value="测试" />
                </td>
				<td>长度最长50字符</td>
            </tr>
            <tr>
                <td align="left" style="width: 150px">
                    产品数量：
                </td>
                <td>
                    <input type="text" name="goods_num" id="goods_num" value="1" />
                </td>
				<td>长度最长20字符</td>
            </tr>
            <tr>
                <td align="left" style="width: 150px">
                    商户自定义信息：<span style="color: Red;">*</span>
                </td>
                <td>
                    <input type="text" name="remark" id="remark" value="测试"  />
                    
                </td>
				<td>商户自定义原样返回,最长50字符</td>
            </tr>
            <tr>
                <td>
                    支付说明：
                </td>
                <td>
                    <input name="goods_note" id="goods_note" type="text" value="测试" />
                </td>
				<td>支付说明, 长度50字符</td>
            </tr>
			<tr>
                <td align="left">
                    签名密钥：<span style="color: Red" >*</span>
                </td>
                <td>
                    <input name="sign_key" type="text" id="sign_key" value="<?php echo SIGN_KEY;?>" />
                </td>
				<td>请替换自己的签名密钥</td>
            </tr>
			<td></td>
            <tr>
                <td align="center" colspan="3">
                    <input type="submit" name="Button1" value="测试" id="Button1" />
                </td>
            </tr>
        </table>
    </div>
    </form>
</body>
</html>

