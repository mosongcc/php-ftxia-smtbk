<include file="public:header" />
<div class="subnav">
    <h1 class="title_2 line_x">文章采集</h1>
</div>

<div class="pad_lr_10">
    <form id="J_info_form" action="{:U('article_caiji/setting')}" method="post">
    <table width="100%" cellspacing="0" class="table_form">
		<tr>
            <th width="150">采集分类 :</th>
            <td><select class="J_tejia_select mr10" data-pid="0" data-uri="{:U('article_caiji/ajax_getchilds', array('type'=>0))}"></select></td>
        </tr>
        <tr>
            <th width="150">对应分类 :</th>
            <td><select class="J_cate_select mr10" data-pid="0" data-uri="{:U('article_cate/ajax_getchilds', array('type'=>0))}"></select></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="采集" name="dosubmit" class="smt mr10"></td>
        </tr>
    </table>
    <input type="hidden" name="cate_id" id="J_cate_id" value="0" />
	<input type="hidden" name="article_cate_id" id="J_tejia_cate_id" value="0" />
    </form>
</div>
<include file="public:footer" />
<script>
$(function(){
    var collect_url = "{:U('article_caiji/collect')}";
    $('#J_info_form').ajaxForm({success:complete, dataType:'json'});
    var p = 2;
    function complete(result){
        if(result.status == 1){
            $.dialog({id:'article_caiji', title:result.msg, content:result.data, padding:'', lock:true});
            p = 2;
            collect_page();
        } else {
            $.ftxia.tip({content:result.msg, icon:'alert'});
        }
    }
    function collect_page(){
        $.getJSON(collect_url, {p:p}, function(result){
            if(result.status == 1){
                $.dialog.get('article_caiji').content(result.data);
                p++;
                collect_page(p);
            }else{
                $.dialog.get('article_caiji').close();
                $.ftxia.tip({content:result.msg});
            }
        });
    }
    //分类联动
	$('.J_tejia_select').tejia_select({field:'J_tejia_cate_id'});
    $('.J_cate_select').cate_select({field:'J_cate_id'});
});
</script>
</body>
</html>