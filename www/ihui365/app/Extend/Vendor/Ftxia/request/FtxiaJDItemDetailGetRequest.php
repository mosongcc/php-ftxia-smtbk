<?php
/**
 * TOP API: ftxia.jd.item.get request
 * @author Ftxia ftxia.COM
 * 2015-06-15 12:00:00
 */
class FtxiaJDItemDetailGetRequest{

	private $num_iid;
	private $apiParas = array();

	public function setNumiid($num_iid)
	{
		$this->num_iid = $num_iid;
		$this->apiParas["num_iid"] = $num_iid;
	}

	public function getNumiid()
	{
		return $this->num_iid;
	} 
	

	public function getApiMethodName()
	{
		return "ftxia.jd.item.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
