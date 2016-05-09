<?php
/**
 * TOP API: ftxia.meili.items.get request
 * @author Ftxia 8mob.COM
 * 2015-03-20 10:30:25
 */
class FtxiaMeiliItemsGetRequest
{
	private $fields;
	private $pageNo;
	private $cid;
	private $sort;
	private $na_id;
	private $time;
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

	public function setPageNo($pageNo)
	{
		$this->pageNo = $pageNo;
		$this->apiParas["page_no"] = $pageNo;
	}

	public function getPageNo()
	{
		return $this->pageNo;
	}
	public function setSort($sort)
	{
		$this->sort = $sort;
		$this->apiParas["sort"] = $sort;
	}
	public function getSort()
	{
		return $this->sort;
	}
	public function setNaid($na_id)
	{
		$this->na_id = $na_id;
		$this->apiParas["na_id"] = $na_id;
	}
	public function getNaid()
	{
		return $this->na_id;
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
	

	public function getApiMethodName()
	{
		return "ftxia.meili.items.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->fields,"fields");
		RequestCheckUtil::checkMaxValue($this->cid,99999,"cid");
		RequestCheckUtil::checkMinValue($this->cid,0,"cid");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
