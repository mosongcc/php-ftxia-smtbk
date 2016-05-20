<!doctype html>
<html>
<head>
    <include file="public:head" />
    <link rel=stylesheet type=text/css href="__STATIC__/jky/css/user.css" />
    <style>

    </style>
</head>
<body>
<include file="public:header" />
<div class="main mb20 {:C('ftx_site_width')} clear">
    <div class="user_main">
        <include file="user/left" />
        <div class="right">
            <div class="menu-tag">
                <ul>
                    <li><a href="{:U('user/mingxi')}">收入明细</a></li>
                    <li><a href="{:U('user/gift')}">兑换明细</a></li>
                    <li  class="active"><a href="{:U('point/chongzhi')}">积分充值</li>
                </ul>
            </div>
            <div class="log-table">
                <div>
                    <p>数量：<input width="100"> &nbsp;<span> (1元 = 100积分)</span></p>
                </div>
                <div>
                    <p>选择支付方式：</p>
                    <p>
                        <div id="ctl00_MainContent_payCardtype" class="payCardtype" style="display:block;">
                            <ul class="SingleSelect" id="SingleSelectcardtype">
                                <li id="ctl00_MainContent_chu" class="ListShortpay Cur" cardtype="0">储蓄卡<span class="Radio"></span><span class="Corner"></span></li>
                                <li id="ctl00_MainContent_dai" class="ListShortpay" cardtype="1">信用卡<span class="Radio"></span></li>
                                <input type="hidden" name="ctl00$MainContent$hidCardType" id="ctl00_MainContent_hidCardType" value="0">
                            </ul>
                        </div>
                    </p>
                </div>
            </div>

        </div>

    </div>
</div>
<!--主部结束-->
<include file="public:footer" />
</body>
</html>