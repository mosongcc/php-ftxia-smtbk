<include file="public:header" />
<div class="subnav">
    <h1 class="title_2 line_x">采集器修改</h1>
</div>
<div class="pad_lr_10" >
    <form id="info_form" action="{:U('ftxrobots/edit')}" name="searchform" method="post" >
    <table width="100%" cellspacing="0" class="table_form">
        <tbody>
			<tr>
                <th width="150">{:L('tbk_name')}：</th>
                <td>
                    <input name="name" type="text" id="J_name" class="input-text" size="20" value="{$info.name}"/>
                    <span class="gray ml10">{:L('tbk_name_desc')}</span>
		    <input type="hidden" name="http_mode"  value="{$info.http_mode}" />
                </td>
            </tr>
 
            <tr class="api_mod">
                <th>{:L('tbk_item_cate')}：</th>
                <td>
                    <select class="J_tbcats mr10">
                        <option value="0">--{:L('all')}--</option>
                        <volist name="items_cate" id="cate">
                        <option value="{$cate.cid}" <if condition="$cate['cid'] eq $info['cid']"> selected="selected" </if> >{$cate.name}</option>
                        </volist>
                    </select>

					<select class="J_tbcats mr10" data-pid="0" data-uri="{:U('items_cate/ajax_getchilds', array('type'=>0))}" data-selected="{$selected_ids}"></select>
                    <input type="hidden" id="J_cid" name="cid" value="{$info.cid}">
                    <span class="gray ml10">API的分类ID</span>
                </td>
            </tr>
 
			<tr>
				<th>所属分类：</th>
                <td><select class="J_cate_select mr10" data-pid="0" data-uri="{:U('items_cate/ajax_getchilds', array('type'=>0))}" data-selected="{$selected_ids}"></select>
                <input type="hidden" name="cate_id" id="J_cate_id" value="{$info.cate_id}" /></td></td>
			</tr>


            <tr>
                <th>{:L('keyword')}：</th>
                <td>
                    <input name="keyword" type="text" class="input-text" size="20" value="{$info.keyword}" />
                    <span class="gray ml10">填写一个，不可多个</span>
                </td>
            </tr>

			<tr>
                <th>采集页数：</th>
                <td>

					<select name="page" id="page">
					<?php for($a=1;$a<=100;$a++){?>
						<option value="<?php echo $a;?>" <if condition="$info.page eq $a"> selected</if> >采集<?php echo $a; ?>页</option>
					<?php 
					}
					?>
                    </select>
                </td>
            </tr>

 

            <tr>
                <th>{:L('sort_order')}：</th>
                <td>
                    <select name="sort">
			<option value="normal" <if condition="$info.sort eq 'normal'"> selected</if>>默认</option>
			<option value="commission_rate" <if condition="$info.sort eq 'commission_rate'"> selected</if>>佣金比率</option>
			<option value="total_num" <if condition="$info.sort eq 'total_num'"> selected</if>>30天推广量</option>
			<option value="total_free" <if condition="$info.sort eq 'total_free'"> selected</if>>30天支出佣金</option>
                    </select>
                </td>
            </tr>


	     <tr>
                <th>佣金比率：</th>
                <td>
                    <input type="text" name="start_commissionRate" size="10" class="input-text" value="{$info.start_commissionRate}"  />- 
                    <input type="text" name="end_commissionRate" size="10" class="input-text" value="{$info.end_commissionRate}" />
                    <span class="gray ml10">{:L('tbk_item_coupon_rate_desc')}</span>
                </td>
            </tr>

 
	    <tr>
                <th>{:L('tbk_item_coupon_rate')}：</th>
                <td>
                    <input type="text" name="start_coupon_rate" size="10" class="input-text" value="{$info.start_coupon_rate}"  />- 
                    <input type="text" name="end_coupon_rate" size="10" class="input-text" value="{$info.end_coupon_rate}" />
                    <span class="gray ml10">{:L('tbk_item_coupon_rate_desc')}</span>
                </td>
            </tr>
			<tr>
                <th>价格：</th>
                <td>
                    <input type="text" name="start_price" size="10" class="input-text" value="{$info.start_price}"/> - 
                    <input type="text" name="end_price" size="10" class="input-text" value="{$info.end_price}"/> 
                    <span class="gray ml10">可不填，最低价格和最高最高一起设置才有效</span>
                </td>
            </tr>
            <tr>
                <th>{:L('tbk_item_commission_num')}：</th>
                <td>
                    <input type="text" name="start_volume" size="10" class="input-text" value="{$info.start_volume}" /> - 
                    <input type="text" name="end_volume" size="10" class="input-text" value="{$info.end_volume}" /> 
                    <span class="gray ml10">{:L('tbk_item_commission_num_desc')}</span>
                </td>
            </tr>
           
			<tr>
				<th><font color="red">[新]</font> 是否包邮：</th>
				<td>
					<input name="ems" id="ems0" value="0"  type="radio"  <if condition="$info.ems eq '0'"> checked</if>><label for="ems0">&nbsp;默&nbsp;认&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input name="ems" id="ems1" value="1"  type="radio"  <if condition="$info.ems eq '1'"> checked</if>><label for="ems1">&nbsp;包&nbsp;邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<span class="gray ml10"></span>
				</td>
			</tr>

			<tr>
				<th><font color="red">[新]</font> 是否更新分类：</th>
				<td>
					<input name="recid" id="recid0" value="0"  type="radio" <if condition="$info.recid eq '0'"> checked</if>><label for="recid0">&nbsp;不&nbsp;更&nbsp;新&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input name="recid" id="recid1" value="1"  type="radio" <if condition="$info.recid eq '1'"> checked</if>><label for="recid1">&nbsp;更&nbsp;新&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<span class="gray ml10">如果采集的商品之前已经采集过更新信息时更正目前选择的分类</span>
				</td>
			</tr>

            <tr>
                <th>是否商城：</th>
                <td>
                    <label class="mr10"><input type="checkbox" name="shop_type" value="B" <if condition="$info.shop_type eq 'B'"> checked</if>> {:L('only_tmall')}</label>
                </td>
            </tr>

            <tr>
                <th></th>
                <td>
		    <input type="hidden" name="id"  value="{$info.id}" />
                    <input type="submit" name="search" class="smt  mr10" value="{:L('submit')}" />
                </td>
            </tr>
        </tbody>
    </table>
    </form>
</div>
<include file="public:footer" />
<script>
$('.J_cate_select').cate_select('请选择');
$(function(){
    var uri = "{:U('ftxrobots/ajax_get_tbcats')}";
	var selectcid= "{$info.cid}";
    $('.J_tbcats').die('change').live('change', function(){
        var _this = $(this),
            _cid = _this.val();
        _this.nextAll('.J_tbcats').remove();
        $.getJSON(uri, {cid:_cid}, function(result){
            if(result.status == '1'){
                var _childs = $('<select class="J_tbcats mr10"><option value="0">--'+lang.all+'--</option></select>')
                for(var i=0; i<result.data.length; i++){
					if(result.data[i].cid == selectcid){
						$('<option value="'+result.data[i].cid+'" selected>'+result.data[i].name+'</option>').appendTo(_childs);
					}else{
						$('<option value="'+result.data[i].cid+'">'+result.data[i].name+'</option>').appendTo(_childs);
					}
                }
                _childs.insertAfter(_this);
            }
        });
        $('#J_cid').val(_cid);
    });

	$.formValidator.initConfig({formid:"info_form",autotip:true});
	$("#J_name").formValidator({onshow:'请填写采集器名称',onfocus:'请填写采集器名称'}).inputValidator({min:1,onerror:'请填写采集器名称'});
 

});
</script>
</body>
</html>
