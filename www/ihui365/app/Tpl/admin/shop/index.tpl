<include file="public:header" />
<link rel="stylesheet" type="text/css" href="__STATIC__/js/calendar/calendar-blue.css"/>
<script type="text/javascript" src="__STATIC__/js/calendar/calendar.js"></script>
<div class="subnav">
<h1 class="title_2 line_x">天猫整店采集</h1>
</div>
<div class="pad_lr_10">
	<form id="J_info_form" action="{:U('shop/setting')}" method="post">
	<table width="100%" cellspacing="0" class="table_form">       
		<tr>
			<th width="150">天猫店铺地址 :</th>
			<td>
				<input name="url" type="text" class="input-text" size="50" />
				<span class="red ml10">必填。如：https://handuyishe.tmall.com/</span>
			</td>
		</tr>
		<tr>
			<th width="150">关键词 :</th>
			<td>
				<input name="q" type="text" class="input-text" size="30" />
				<span class="red ml10">选填，多个关键词用空格隔开。</span>
			</td>
		</tr>
		<tr>
			<th width="150">排序 :</th>
			<td>
				<select name="sort">
					<option value="default">综合</option>
					<option value="hotsell_desc">销量</option>
					<option value="newOn_desc">上新</option>	
					<option value="price_asc">价格从低到高</option>
					<option value="price_desc">价格从高到低</option>
				</select>            
			</td>
		</tr>	
		<tr>
			<th width="150">价格范围 :</th>
			<td>           
				<input type="text" name="sprice" size="5" class="input-text" value=""/> - 
				<input type="text" name="eprice" size="5" class="input-text" value=""/> 
				<span class="gray ml10">可不填，最低价格和最高最高一起设置才有效</span>
			</td>
		</tr>		
		<tr>
			<th>采集页数：</th>
			<td>
			<select name="page">
			<?php for($a=1;$a<=1000;$a++){?>
				<option value="<?php echo $a; ?>" <if condition="100 eq $a"> selected</if> >采集<?php echo $a; ?>页</option>
			<?php  } ?>
			</select>
			</td>
		</tr>
		<tr>
			<th width="150">入库分类 :</th>
			<td>
				<select class="J_cate_select mr10" data-pid="0" data-uri="{:U('items_cate/ajax_getchilds', array('type'=>0))}"></select>
				<span class="red ml10">必选，请选择采集后要写入的分类。</span>
			</td>			
		</tr>
		<tr>
			<th>设置开始时间 :</th>
			<td><input type="text" name="coupon_start_time" id="coupon_start_time"  class="date" value="<?php echo $showtime=date("Y-m-d 10:00:00",strtotime("+1 day"));?>"/></td>
		</tr>
		<tr>
			<th>设置结束时间 :</th>
			<td><input type="text" name="coupon_end_time" id="coupon_end_time" class="date" value="<?php echo $now = date('Y-m-d 09:59:59',strtotime('next week')); ?>"/></td>
		</tr>		
		<tr>
			<th></th>
			<td>
				<input type="hidden" name="cate_id" id="J_cate_id" value="0" />	
				<input type="submit" value="开始采集" name="dosubmit" class="smt mr10">
			</td>
		</tr>
	</table>
</form>
</div>
<include file="public:footer" />
<script type="text/javascript">

$(function(){
    var collect_url = "{:U('shop/collect')}";
    $('#J_info_form').ajaxForm({success:complete, dataType:'json'});
    var p = 2;
    function complete(result){
        if(result.status == 1){
            $.dialog({id:'shop', title:result.msg, content:result.data, padding:'', lock:true});
            p = 2;
            collect_page();
        } else {
            $.ftxia.tip({content:result.msg, icon:'alert'});
        }
    }
    function collect_page(){
        $.getJSON(collect_url, {p:p}, function(result){
            if(result.status == 1){
                $.dialog.get('shop').content(result.data);
                p++;
                collect_page(p);
            }else{
                $.dialog.get('shop').close();
                $.ftxia.tip({content:result.msg});
            }
        });
    }
    $('.J_cate_select').cate_select({field:'J_cate_id'});
});
</script>
<script language="javascript" type="text/javascript">
	Calendar.setup({
		inputField     :    "coupon_start_time",
		ifFormat       :    "%Y-%m-%d %H:%M",
		showsTime      :    'true',
		timeFormat     :    "24"
	});
</script>
<script language="javascript" type="text/javascript">
	Calendar.setup({
		inputField     :    "coupon_end_time",
		ifFormat       :    "%Y-%m-%d %H:%M",
		showsTime      :    'true',
		timeFormat     :    "24"
	});
</script>
</body>
</html>