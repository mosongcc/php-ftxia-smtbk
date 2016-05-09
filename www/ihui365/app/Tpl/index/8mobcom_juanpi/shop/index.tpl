<div style="display:none"><script src="http://s22.cnzz.com/stat.php?id=3103357&web_id=3103357" language="JavaScript"></script></div> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<script language="javascript">
	window.onerror = function(){return true;}
</script>
<script type="text/javascript" src="/static/js/jquery/jquery.js"></script>
<!--淘点金代码开始-->
<script type="text/javascript"> 
(function(win,doc){ 
	var s = doc.createElement("script"), h = doc.getElementsByTagName("head")[0]; 
	if (!win.alimamatk_show) { 
		s.charset = "gbk"; 
		s.async = true; 
		s.src = "http://a.alimama.cn/tkapi.js"; 
		h.insertBefore(s, h.firstChild); 
	}; 
	var o = { 
		pid: "{$pid}",/*推广单元ID，用于区分不同的推广渠道*/ 
		appkey: "",/*通过TOP平台申请的appkey，设置后引导成交会关联appkey*/ 
		unid: ""/*自定义统计字段*/ 
	}; 
	win.alimamatk_onload = win.alimamatk_onload || []; 
	win.alimamatk_onload.push(o); 
})(window,document);

function get_et()
{
  var s = new Date(),
  l = +s / 1000 | 0,
  r = s.getTimezoneOffset() * 60,
  p = l + r,
  m = p + (3600 * 8),
  q = m.toString().substr(2, 8).split(""),
  o = [6, 3, 7, 1, 5, 2, 0, 4],
  n = [];
  for (var k = 0; k < o.length; k++) {
	  n.push(q[o[k]])
  }
  n[2] = 9 - n[2];
  n[4] = 9 - n[4];
  n[5] = 9 - n[5];
  return n.join("")
}
function setCookie(j, k)
{
    document.cookie = j + "=" + encodeURIComponent(k.toString()) + "; path=/"
}
function getCookie(l)
{
	var m = (" " + document.cookie).split(";"),
	j = "";
	for (var k = 0; k < m.length; k++) {
		if (m[k].indexOf(" " + l + "=") === 0) {
			j = decodeURIComponent(m[k].split("=")[1].toString());
			break
		}
	}
	return j
}
function get_pgid()
{
  var l = "",
  k = "",
  n,
  o,
  t,
  u,
  s = location,
  m = "",
  q = Math;
  function r(x, z) {
	  var y = "",
	  v = 1,
	  w;
	  v = Math.floor(x.length / z);
	  if (v == 1) {
		  y = x.substr(0, z)
	  } else {
		  for (w = 0; w < z; w++) {
			  y += x.substr(w * v, 1)
		  }
	  }
	  return y
  }
  
 n = (" " + document.cookie).split(";");
  for (o = 0; o < n.length; o++) {
	  if (n[o].indexOf(" cna=") === 0) {
		  k = n[o].substr(5, 24);
		  break
	  }
  }
  
  if (k === "") {
	  cu = (s.search.length > 9) ? s.search: ((s.pathname.length > 9) ? s.pathname: s.href).substr(1);
	  n = document.cookie.split(";");
	  for (o = 0; o < n.length; o++) {
		  if (n[o].split("=").length > 1) {
			  m += n[o].split("=")[1]
		  }
	  }
	  if (m.length < 16) {
		  m += "abcdef0123456789"
	  }
	  k = r(cu, 8) + r(m, 16)
  }
  for (o = 1; o <= 32; o++) {
	  t = q.floor(q.random() * 16);
	  if (k && o <= k.length) {
		  u = k.charCodeAt(o - 1);
		  t = (t + u) % 16
	  }
	  l += t.toString(16)
  }
  setCookie('amvid', l);
  var p = getCookie('amvid');
  if (p) {
	  return p
  }
  return l
}
	
var click_url = 'http://s.click.taobao.com/t?e=m%3D2%26s%3D%2FloZ%2BAhqnuIcQipKwQzePCperVdZeJvipRe%2F8jaAHci5VBFTL4hn2bhYJYl%2B74j1D%2FHdSRms18imNviRFuzl6YN3AzOwGCHVqMCeJ0ooGUDoEaiNhje5dr0CYBEjBf0rLxRPKN2FDAck%2FCKKDVvEs%2BY%2BGpeaDc52civL%2BMG4kCbEn65QSclhw2xE1xr%2BTMltjDC1npSG4yx3B2YSpGr%2BDRdM9%2FYrgL99xXzSsyFAkGY%3D';
var pid = '{$pid}';
var wt = '1';
var ti = '3';
var tl = '140x190';
var rd = '2';
var ct = encodeURIComponent('sellerid={$id}');
var st = '2';
var rf = encodeURIComponent(document.URL);
var et = get_et();
var pgid = get_pgid();
var v = '2.0';
$(function(){
	$.ajax({
 		url: 'http://g.click.taobao.com/display?cb=?',
    	type: 'GET',    
     	dataType: 'jsonp',
    	jsonp: 'cb', 
    	data: 'pid='+pid+'&wt='+wt+'&ti='+ti+'&tl='+tl+'&rd='+rd+'&ct='+ct+'&st='+st+'&rf='+rf+'&et='+et+'&pgid='+pgid+'&v='+v,
    	success: function(msg) {
			if(msg.code == 200){
				var url = msg.data.items[0].ds_shop_click;
				document.location.href = url;
			}else if(msg.code == 201){
				var url = msg.data.items[0].ds_shop_click;
				document.location.href = url;
			}else{
				//alert(msg.error_msg);
				document.location.href = click_url;
			}
		},    
		error: function(msg){  
			//alert(msg.error_msg);
        		document.location.href = click_url;
		}    
	});  
});

</script>
