<include file="public:header" />
<!--商品列表-->
<div class="subnav">
	<div class="content_menu ib_a blue line_x">
		<a class="add fb " href="javascript:auto_check()" ><em>下架商品检测</em></a>
		<a class="add fb " href="javascript:auto_taoquan()" ><em>优惠券检测</em></a>
	</div>

</div>
<div class="pad_lr_10" >
    


 
</div>
<include file="public:footer" />
<script>
    var collect_url = "{:U('robots/item_checks')}";
    var taoquan_url = "{:U('robots/taoquan')}";
    var p = 1;
    function auto_check(){
        $.getJSON(collect_url, {auto:1}, function(result){
            if(result.status == 1){
                $.dialog({id:'cmt_ftxia', title:result.msg.title, content:result.data, padding:'', lock:true});
                p = result.msg.p;
                setTimeout("auto_check_page("+p+")",1000);
            }else{
                $.ftxia.tip({content:result.msg});
            }
        });
    }
    function auto_check_page(p){ 
	var ps = p+1;
	var intervalProcess = setInterval("auto_check_page("+ ps+")",50000);
        $.getJSON(collect_url, {p:p,auto:1}, function(result){
            if(result.status == 1){
                $.dialog.get('cmt_ftxia').content(result.data);
                p = result.msg.p;
		clearInterval(intervalProcess);
                setTimeout("auto_check_page("+ p+")",1000);
            }else{
                $.dialog.get('cmt_ftxia').close();
                $.ftxia.tip({content:result.msg});
            }
        });
    }



    function auto_taoquan(){
        $.getJSON(taoquan_url, {auto:1}, function(result){
            if(result.status == 1){
                $.dialog({id:'cmt_ftxia', title:result.msg.title, content:result.data, padding:'', lock:true});
                p = result.msg.p;
                setTimeout("auto_taoquan_page("+p+")",1000);
            }else{
                $.ftxia.tip({content:result.msg});
            }
        });
    }
    function auto_taoquan_page(p){ 
	var ps = p+1;
	var intervalProcess = setInterval("auto_taoquan_page("+ ps+")",500000);
        $.getJSON(taoquan_url, {p:p,auto:1}, function(result){
            if(result.status == 1){
                $.dialog.get('cmt_ftxia').content(result.data);
                p = result.msg.p;
		clearInterval(intervalProcess);
                setTimeout("auto_taoquan_page("+ p+")",1000);
            }else{
                $.dialog.get('cmt_ftxia').close();
                $.ftxia.tip({content:result.msg});
            }
        });
    }
</script>
</body>
</html>