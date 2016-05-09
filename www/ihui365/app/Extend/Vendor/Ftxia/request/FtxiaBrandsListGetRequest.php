<?php
/**
 * TOP API: ftxia.brand.lists.get request
 * @author Ftxia 8mob.COM
 */
class FtxiaBrandsListGetRequest
{
	private $fields;
	
	private $uid;

	private $cid;

	private $time;

	private $timefilter;

	private $pageNo;

	private $pageSize;

	private $apiParas = array();
	
	public function setFields($fields)
	{
		$this->fields = $fields;
		$this->apiParas["fields"] = $fields;
	}
	

	public function getFields()
	{
		return $this->fields;
	}

	public function setUid($uid)
	{
		$this->uid = $uid;
		$this->apiParas["uid"] = $uid;
	}
	
	public function getUid()
	{
		return $this->uid;
	}

	public function setCid($cid)
	{
		$this->cid = $cid;
		$this->apiParas["cid"] = $cid;
	}
	
	public function getCid()
	{
		return $this->cid;
	}

	public function setTime($time)
	{
		$this->time = $time;
		$this->apiParas["time"] = $time;
	}

	public function getTime()
	{
		return $this->time;
	}

	public function setTimeFilter($timefilter)
	{
		$this->timefilter = $timefilter;
		$this->apiParas["timefilter"] = $timefilter;
	}

	public function getTimeFilter()
	{
		return $this->timefilter;
	}

	public function setPageNo($pageNo)
	{
		$this->pageNo = $pageNo;
		$this->apiParas["page_no"] = $pageNo;
	}

	public function getPageNo()
	{
		return $this->pageNo;
	}

	public function setPageSize($pageSize)
	{
		$this->pageSize = $pageSize;
		$this->apiParas["page_size"] = $pageSize;
	}

	public function getPageSize()
	{
		return $this->pageSize;
	}


	public function getApiMethodName()
	{
		return "ftxia.brands.list.get";
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