<include file="public:header" />
<!--其他设置-->
<div class="pad_lr_10">
	<form id="info_form" action="{:u('setting/edit')}" method="post">
	<table width="100%" class="table_form contentWrap">
 
	<tr>
            <th width="150">首页广告 :</th>
            <td>
                <label><input type="radio" <if condition="C('ftx_ads_pp') eq '1'">checked="checked"</if> value="1" name="setting[ads_pp]"> 使用品牌团广告接管有广告</label> &nbsp;&nbsp;
                <label><input type="radio" <if condition="C('ftx_ads_pp') eq '0'">checked="checked"</if> value="0" name="setting[ads_pp]"> 使用自定义广告</label>
                <span class="gray ml10">品牌团广告会每天自动更新</span>
            </td>
        </tr>
	 

	<tr>
            <th>QQ :</th>
            <td><input type="text" name="setting[qq]" class="input-text" size="20" value="{:C('ftx_qq')}"></td>
        </tr>
	<tr>
            <th width="150">QQ特享群 :</th>
            <td><input type="text" name="setting[qq_qun]" size="20" class="input-text" value="{:C('ftx_qq_qun')}" />&nbsp;&nbsp;<span class="gray">QQ特享群</span></td>
        </tr>
	<tr>
            <th width="150">{:L('kefu_html')} :</th>
            <td>
                <input type="text" name="setting[kefu_html]" class="input-text" size="80" value="{:C('ftx_kefu_html')}">
                <span class="gray ml10"><br>前台客服链接：请填写如：http://amos.im.alisoft.com/msg.aw?v=2&uid=你的客服旺旺&site=cntaobao&s=2&charset=utf-8</span>
            </td>
        </tr>

	<tr>
            <th>预告分类ID :</th>
            <td><input type="text" name="setting[cat_yugao]" class="input-text" size="20" value="{:C('ftx_cat_yugao')}"></td>
        </tr>

	<tr>
            <th>九块九分类ID :</th>
            <td><input type="text" name="setting[cat_jiu]" class="input-text" size="20" value="{:C('ftx_cat_jiu')}"></td>
        </tr>

	<tr>
            <th>十九块九分类ID :</th>
            <td><input type="text" name="setting[cat_shijiu]" class="input-text" size="20" value="{:C('ftx_cat_shijiu')}"></td>
        </tr>

	<tr>
            <th>京东购分类ID :</th>
            <td><input type="text" name="setting[cat_jd]" class="input-text" size="20" value="{:C('ftx_cat_jd')}"></td>
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