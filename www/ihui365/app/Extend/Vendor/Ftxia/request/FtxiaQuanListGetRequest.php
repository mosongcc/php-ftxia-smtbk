<?php
/**
 *  API: ftxia.quan.list.get request
 */
class FtxiaQuanListGetRequest
{
 
	private $cid;					//分类ID  16
	private $fields;
	private $keyword;				//关键词  女
	private $pageNo;				//页码	1
	private $pageSize;				//每页大小 目前60
	private $sort;					//排序 normal     ratedesc thirtyvolume 
	private $time;

	public function setTime($time)
	{
		$this->time = $time;
		$this->apiParas["time"] = $time;
	}

	public function getTime()
	{
		return $this->time;
	}

	private $apiParas = array();

	public function setCid($cid)
	{
		$this->cid = $cid;
		$this->apiParas["cid"] = $cid;
	}

	
	public function getCid()
	{
		return $this->cid;
	}

	
	public function setFields($fields)
	{
		$this->fields = $fields;
		$this->apiParas["fields"] = $fields;
	}

	
	public function getFields()
	{
		return $this->fields;
	}

	
	public function setKeyword($keyword)
	{
		$this->keyword = $keyword;
		$this->apiParas["keyword"] = $keyword;
	}


	public function getKeyword()
	{
		return $this->keyword;
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

	public function getApiMethodName(){
		return "ftxia.quan.list.get";
	}

	public function getApiParas(){
		return $this->apiParas;
	}
	
	public function check(){
		RequestCheckUtil::checkNotNull($this->fields,"fields");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}