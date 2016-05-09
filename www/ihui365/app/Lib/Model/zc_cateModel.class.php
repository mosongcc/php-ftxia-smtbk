<?php
class zc_cateModel extends Model
{
      
    /**
     * 根据ID获取分类名称
     */
    public function get_name($id) {
        //分类数据
        if (false === $cate_data = F('zc_cate_data')) {
            $cate_data = $this->cate_data_cache();
        }
        return $cate_data[$id]['name'];
    }
 

 /**
     * 生成spid 
     * 
     * @param int $pid 父级ID
     */
    public function get_spid($pid) {
        if (!$pid) {
            return 0; 
        }
        $pspid = $this->where(array('id'=>$pid))->getField('spid');
        if ($pspid) {
            $spid = $pspid . $pid . '|';
        } else {
            $spid = $pid . '|';
        }
        return $spid;
    }

	/**
     * 获取分类下面的所有子分类的ID集合
     * 
     * @param int $id
     * @param bool $with_self
     * @return array $array 
     */
    public function get_child_ids($id, $with_self=false) {

		if(C('ftx_site_cache')){
			$file = 'get_child_ids_'.$id;
			if(false === $array = S($file)){
				$spid = $this->where(array('id'=>$id))->getField('spid');
				$spid = $spid ? $spid .= $id .'|' : $id .'|';
				$id_arr = $this->field('id','status')->where(array('spid'=>array('like', $spid.'%')))->select();
				$array = array();
				foreach ($id_arr as $val) {
					if($val['status']==1){
						$array[] = $val['id'];
					}
				}

				S($file,$array);
			}
		}else{
			$spid = $this->where(array('id'=>$id))->getField('spid');
			$spid = $spid ? $spid .= $id .'|' : $id .'|';
			$id_arr = $this->field('id')->where(array('spid'=>array('like', $spid.'%')))->select();
			$array = array();
			foreach ($id_arr as $val) {
				$array[] = $val['id'];
			}
		}
        $with_self && $array[] = $id;
        return $array;
    }

    /**
     * 读取写入缓存(无层级分类列表)
     */
    public function cate_data_cache() {
        $cate_data = array();
        $result = $this->where('status=1')->order('ordid')->select();
        foreach ($result as $val) {
            $cate_data[$val['id']] = $val;
        }
       
        F('zc_cate_data', $cate_data);
        return $cate_data;
    }
 

    /**
     * 检测分类是否存在
     * 
     * @param string $name
     * @param int $pid
     * @param int $id
     * @return bool 
     */
    public function name_exists($name, $pid, $id=0) {
        $where = "ename='" . $name . "'  AND id<>'" . $id . "'";
        $result = $this->where($where)->count('id');
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 更新则删除缓存
     */
    protected function _before_write(&$data) {
        F('zc_cate_data', NULL);
    }

    /**
     * 删除也删除缓存
     */
    protected function _after_delete($data, $options) {
        F('zc_cate_data', NULL);
    }
}