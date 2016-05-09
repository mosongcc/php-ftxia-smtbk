<!doctype html>
<html>
<head>
<include file="public:head" />
</head>
<body>
<include file="public:header" />

<style> 
.top-banner {width: 100%;height: 260px;position: relative}
.top-banner img {width: 1010px;margin: 0 auto;display: block}
.top-banner .info-box {position: absolute;width: 270px;height: 165px;background-color: #fff;filter: alpha(opacity=80);-moz-opacity: .8;opacity: .8;left: 50%;margin-left: 174px;margin-top: 38px;text-align: center;font-family: '微软雅黑';padding: 0 18px}
.top-banner .info-box .brand-img {width: 90px;height: 45px;display: block;margin: 10px auto 3px}
.top-banner .info-box .brand-name {font-size: 20px;color: #000;font-weight: bold}
.top-banner .info-box .brand-intro {color: #677072;font-size: 14px;text-align: left;height: 60px;overflow: hidden}
.con-wrap{margin: 10px auto 0;}
.main{margin: 0px auto 0;}
.con-wrap .line-title {height: 28px;line-height: 30px;background-color: #cbb79e;color: #fff;font: 20px '微软雅黑';padding-left: 12px;padding-top: 2px;margin: 10px 0}
.top-banner{background: url("https://gju1.alicdn.com/bao/uploaded/i1/100000112912229842/TB24xHReXXXXXX_XpXXXXXXXXXX_!!0-0-juitemmedia.jpg") no-repeat top center;}
#content{width: 100%;padding-top: 0;}
</style>
<div class="top-banner">
        <div class="info-box">
         <br /><br /><br />
        <p class="brand-name">{$name}特卖专场</p>
        <p class="brand-intro"> </p>
    </div>
</div>

<div class=" {:C('ftx_site_width')} con-wrap clear">
<p class="line-title line-bao">爆款专区</p>
</div>

<include file="public:list" />
<include file="public:footer" />
</body>
</html>