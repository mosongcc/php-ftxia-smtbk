<?php if (!defined('THINK_PATH')) exit();?><div class="dialog_content pad_10">
	<div class="loading">
		正在采集第 [ <b class="blue"><?php echo ($result_data["p"]); ?></b> ] 页，本页成功添加 [<span class="blue"><?php echo ($result_data["coll"]); ?></span> ]个商品， 本页采集到 [<span class="blue"><?php echo ($result_data["thiscount"]); ?></span>]个商品
	</div>
	<?php if(!empty($result_data['msg'])): endif; ?>
	<?php if(!empty($result_data['totalnum'])): ?><div align="center">
	本次成功采集 [<span class="blue"><?php echo ($result_data["totalcoll"]); ?></span>]个商品	共有：<?php echo ($result_data["totalnum"]); ?> 条数据
	</div><?php endif; ?>
</div>