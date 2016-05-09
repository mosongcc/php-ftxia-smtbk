<?php
/**
 *  API: ftxia.queqiao.click.get request
 */
class FtxiaQueqiaoClickGetRequest
{
 
	private $num_iid;
	private $pid;
	private $apiParas = array();

	public function setNumiid($num_iid){
		$this->num_iid = $num_iid;
		$this->apiParas["num_iid"] = $num_iid;
	}

	public function getNumiid(){
		return $this->num_iid;
	}

	public function setPid($pid)
{
		$this->pid = $pid;
		$this->apiParas["pid"] = $pid;
	}

	
	public function getPid()
{
		return $this->pid;
	}


	public function getApiMethodName(){
		return "ftxia.queqiao.click.get";
	}

	public function getApiParas(){
		return $this->apiParas;
	}
	
	public function check(){
		RequestCheckUtil::checkNotNull($this->num_iid,"num_iid");
		RequestCheckUtil::checkNotNull($this->pid,"pid");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}