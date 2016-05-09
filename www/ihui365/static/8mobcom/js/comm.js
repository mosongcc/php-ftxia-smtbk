(function($) {
 
	$('.J_coupon').live('click', function(){
		if(!$.ftxia.dialog.islogin()) return !1;
		var link=$(this).data('href');
		$(this).attr({'href':link,'target':'_blank'}); 
	});

	var sign = $("div.sign");
	sign.hover(function() {
		$(this).find(".box-sign").show();
	}, function() {
		$(this).find(".box-sign").hide();
	});

	$("#J_UlThumb li").click(function(){
		  $(this).parents("ul").find("li").removeClass("tb-selected");
		  $(this).addClass('tb-selected');
		  var src=$(this).find("img").data('src');
		  $("#J_ImgBooth").attr("src",src); 
	});

	$("#J_UlThumb li").hover(function(){
		  $(this).parents("ul").find("li").removeClass("tb-selected");
		  $(this).addClass('tb-selected');
		  var src=$(this).find("img").data('src');
		  $("#J_ImgBooth").attr("src",src); 
	});


	$(".normal-a:last,#top-side-box").live({
        mouseover:function(){
            $("#top-side-box").show();
        },
        mouseout:function(){
            $("#top-side-box").hide();
        }
    });
	$(".logined-show").live({
        mouseover:function(){
            $(this).addClass("hover");
        },
        mouseout:function(){
            $(this).removeClass("hover");
        }
    });


	$('.mark').live('click', function(){
		if(!$.ftxia.dialog.islogin()) return !1;
		var link=$(this).data('href');
		$(this).attr({'href':link,'target':'_blank'}); 
	});




})(jQuery);