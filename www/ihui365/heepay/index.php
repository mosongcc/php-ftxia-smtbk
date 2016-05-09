<?php 
include 'config.php';
/*
 * 发起支付页面
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>
	网关支付DEMO
</title>
    <script src="static/js/jquery.min.js"></script>
    <script>
        $(function(){
            $("#Button1").click(function(){
                if($("#agent_id").val()!="" && $("#bank_type").val()!="" && $("#pay_code") && $("#agent_bill_id").val()!="" && $("#goods_name").val()!="" &&$("#remark").val()!="" &&$("#sign_key").val()!="")
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
                                                   汇付宝网关支付DEMO
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
                    支付类型：<span style="color: Red">*</span>
                </td>
                <td>
                    <select name="pay_type" id="pay_type">
						<option value="20">银行支付</option>
					</select>
                </td>
				<td></td>
            </tr>
			
            <tr id="bank_id">
                <td align="left">
                    银行编码：
                </td>
                <td>
                    <select name="bank_type" id="bank_type">
					<option value="">==请选择==</option>
					<option value="001">中国工商银行</option>
					<option value="002">招商银行</option>
					<option value="003">中国建设银行</option>
					<option value="004">中国银行</option>
					<option value="005">中国农业银行</option>
					<option value="006">交通银行</option>
					<option value="007">上海浦东发展银行</option>
					<option value="016">广东发展银行</option>
					<option value="015">中信银行</option>
					<option value="010">中国光大银行</option>
					<option value="011">兴业银行</option>
					<option value="012">平安银行</option>
					<option value="013">中国民生银行</option>
					<option value="014">华夏银行</option>
					<option value="020">中国邮政储蓄银行</option>
					<option value="024">宁波银行</option>
					<option value="045">北京银行</option>
					<option value="030">中国农业银行企业银行</option>
                    <option value="046">中信银行企业银行</option>
                    <option value="047">招商银行企业银行</option>
                    <option value="048">中国建设银行企业银行</option>		
				</select>
                </td>
				<td>此为编码银行见接口开发文档7.3表</td>
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
                    <input type="text"  name="pay_amt" id="pay_amt" value="0.01" />
                </td>
				<td>单位：元，小数点后保留两位</td>
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
				<td>与商户有关</td>
            </tr>
			<td></td>
            <tr>
                <td align="center" colspan="3">
                    <input type="submit" name="Button1" value="支付" id="Button1" />
                </td>
            </tr>
        </table>
    </div>
    </form>
</body>
</html>

