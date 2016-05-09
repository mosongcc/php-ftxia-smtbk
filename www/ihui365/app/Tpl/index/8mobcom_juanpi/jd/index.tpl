<!doctype html>
<html>
<head>
<include file="public:head" />
<script type="text/javascript" src="__STATIC__/8mobcomjuanpi/js/index.js"></script>
</head>
<body>
<include file="public:header" />

<include file="public:list" />
<script>
$(function() {
    var $navFuns = function() {
        var st = $(document).scrollTop(), 
            headh = $("div.header").height()+$("div#toolbar").height(); 
            $nav_classify = $("div.jiu-nav-main");

        if(st > headh){
            $nav_classify.addClass("fixed");
        } else {
            $nav_classify.removeClass("fixed");
        }
    };

    var F_nav_scrolls = function () {
        if(navigator.userAgent.indexOf('iPad') > -1){
            return false;
        }      
        if (!window.XMLHttpRequest) {
           return;          
        }else{
            //默认执行一次
            $navFuns();
            $(window).bind("scroll", $navFuns);
        }
    }
    F_nav_scrolls();

});
</script>
<include file="public:footer" />
</body>
</html>