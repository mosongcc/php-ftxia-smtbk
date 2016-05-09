<include file="public:header" />
<div class="subnav">
	<div class="content_menu ib_a blue line_x">
		<a class="on"><em>首页参数设置</em></a>
	</div>
</div>
<div class="pad_lr_10">
	<form id="info_form" action="{:u('setting/edit')}" method="post">
	<table width="100%" class="table_form contentWrap">

			<tr width="150">
            <th>{:L('index_page_size')} :</th>
            <td><input type="text" name="setting[index_page_size]" size="5" class="input-text" value="{:C('ftx_index_page_size')}" /></td>
        </tr>

		<tr width="150">
            <th>屏蔽关键字 :</th>
            <td><input type="text" name="setting[index_not_text]" size="30" class="input-text" value="{:C('ftx_index_not_text')}" />以,分隔</td>
        </tr>

	<tr>
            <th>显示分类 :</th>
            <td>
	    
		<table width="100%" class="table_form contentWrap">
			<tr >
				<td align="right" width="50">
				    <label><input name="selectall" type="checkbox" checked="checked" value="" onclick="javascript:$('.J_checkitem').attr('checked', this.checked);" /> {:L('select_all')} :</label>
				</td>
				<td >
				    <volist name="cate_data" id="cat">
					<label class="fl" style="width:150px;"><input name="setting[index_cids][]" type="checkbox" <range name="cat['id']" value="$index_cids" type="in" >checked</range>  value="{$cat.id}" class="J_checkitem" />&nbsp;&nbsp;{$cat.name}</label>
				    </volist>
				</td>
			</tr>
		</table>

	     </td>
        </tr>

	

	<tr>
            <th width="150">排序方式 :</th>
            <td>
                    <select name="setting[index_sort]" class="J_tbcats mr10">
                        <option value="volume desc"  <if condition="C('ftx_index_sort') eq 'volume desc'">selected</if> >销量从高到低</option>
			<option value="volume asc"   <if condition="C('ftx_index_sort') eq 'volume asc'">selected</if>>销量从低到高</option>
			<optgroup label="──────"></optgroup>
			<option value="coupon_price desc" <if condition="C('ftx_index_sort') eq 'coupon_price desc'">selected</if> >价格从高到低</option>
			<option value="coupon_price asc"  <if condition="C('ftx_index_sort') eq 'coupon_price asc'">selected</if> >价格从低到高</option>
			<optgroup label="──────"></optgroup>
			<option value="coupon_rate  desc" <if condition="C('ftx_index_sort') eq 'coupon_rate  desc'">selected</if> >折扣从高到低</option>
			<option value="coupon_rate  asc"  <if condition="C('ftx_index_sort') eq 'coupon_rate  asc'">selected</if> >折扣从低到高</option>
			<optgroup label="──────"></optgroup>
			<option value="id  desc"  <if condition="C('ftx_index_sort') eq 'id  desc'">selected</if> >刚上架排前</option>
			<option value="id  asc"   <if condition="C('ftx_index_sort') eq 'id  asc'">selected</if> >刚上架排后</option>
			<optgroup label="──────"></optgroup>
			<option value="commission  desc"  <if condition="C('ftx_index_sort') eq 'commission  desc'">selected</if> >高佣金排前</option>
			<optgroup label="──────"></optgroup>
			<option value="magic"  <if condition="C('ftx_index_sort') eq 'magic'">selected</if> >魔法排序</option>
                    </select>
              </td>

        </tr>

		<tr>
            <th>店铺类型 :</th>
            <td>
                    <select name="setting[index_shop_type]" class="J_tbcats mr10">
                        <option value=""  <if condition="C('ftx_index_shop_type')  eq ''">selected</if> >所有</option>
						<option value="B"   <if condition="C('ftx_index_shop_type')  eq 'B'">selected</if>>天猫商城</option>
						<option value="C" <if condition="C('ftx_index_shop_type') eq 'C'">selected</if> >淘宝集市</option>
                    </select>
              </td>
        </tr>


		<tr>
            <th width="150">价格 :</th>
            <td>
				最低：<input type="text" name="setting[index_mix_price]" size="5" class="input-text" value="{:C('ftx_index_mix_price')}" />&nbsp; 
				最高：<input type="text" name="setting[index_max_price]" size="5" class="input-text" value="{:C('ftx_index_max_price')}" />
			</td>
        </tr>

		<tr>
            <th width="150">销量 :</th>
            <td>
				最低：<input type="text" name="setting[index_mix_volume]" size="5" class="input-text" value="{:C('ftx_index_mix_volume')}" />&nbsp; 
				最高：<input type="text" name="setting[index_max_volume]" size="5" class="input-text" value="{:C('ftx_index_max_volume')}" />
			</td>
        </tr>



		<tr>
            <th width="150">商品预告 :</th>
            <td>
                <label><input type="radio" <if condition="C('ftx_wait_time') eq '0'">checked="checked"</if> value="0" name="setting[wait_time]"> 默认</label> &nbsp;&nbsp;
                <label><input type="radio" <if condition="C('ftx_wait_time') eq '1'">checked="checked"</if> value="1" name="setting[wait_time]"> 只显示未开始</label>
				<label><input type="radio" <if condition="C('ftx_wait_time') eq '2'">checked="checked"</if> value="2" name="setting[wait_time]"> 不显示未开始</label>
            </td>
        </tr>

		<tr>
            <th width="150">已结束商品 :</th>
            <td>
                <label><input type="radio" <if condition="C('ftx_end_time') eq '0'">checked="checked"</if> value="0" name="setting[end_time]"> 默认</label> &nbsp;&nbsp;
				<label><input type="radio" <if condition="C('ftx_end_time') eq '1'">checked="checked"</if> value="1" name="setting[end_time]"> 不显示已结束商品</label>
            </td>
        </tr>
	</table>

	<table width="100%" class="table_form contentWrap">
    	<tr class="y-bg">
        	<th width="150">是否包邮 :</th>
        	<td>
            	<input type="radio" <if condition="C('ftx_index_ems') eq '0'">checked="checked"</if> value="0" name="setting[index_ems]"> 默认 &nbsp;&nbsp;
            	<input type="radio" <if condition="C('ftx_index_ems') eq '1'">checked="checked"</if> value="1" name="setting[index_ems]"> 包邮 &nbsp;&nbsp;<span class="gray">API采集不到包邮，如果一定要包邮，请选择淘宝网采集模式</span>
            </td>
    	</tr>

   
        <tr>
        	<th></th>
        	<td><input type="hidden" name="menuid"  value="{$menuid}"/><input type="submit" class="smt mr10" name="do" value="{:L('submit')}"/></td>
    	</tr>
	</table>
	</form>
</div>
<include file="public:footer" />
</body>
</html>