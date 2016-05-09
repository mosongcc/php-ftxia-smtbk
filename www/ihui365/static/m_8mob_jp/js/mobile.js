//公用toast弹出框方法
var t_top=$(window).height()/2.5;
function toast_show(alertdetail,gourl,time){
	var html='<div class="alert_fullbg_other" style="display:block;"></div><div class="toast_alert" style="display:block;top:'+t_top+'px"><div class="box">'+alertdetail+'</div></div>';
	$(".app").append(html);
	var default_time=null;
	var count=$(".toast_alert .box").text().length;
	if(count>=12){default_time=1500;
	}else{
		default_time=3000
	}
	time = time == undefined?default_time:time;
	var timer=null;
	clearInterval(timer);
	timer=setTimeout(function(){
		$(".toast_alert").remove();
		$(".alert_fullbg_other").remove();
		if(gourl==undefined){
			return false;
		}
		else{
			location.href = gourl;
		}
	},time);
}