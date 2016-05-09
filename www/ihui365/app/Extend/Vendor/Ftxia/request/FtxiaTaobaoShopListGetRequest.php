<?php
/**
 * TOP API: ftxia.taobaoshop.list.get request
 * @author Ftxia 8mob.COM
 * 2015-08-12 12:00:00
 */
class FtxiaTaobaoShopListGetRequest{

	private $fields;
	private $url;
	private $sprice;
	private $eprice;
	private $keyword;
	private $sort;
	private $pageNo;

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

	public function setUrl($url)
	{
		$this->url = $url;
		$this->apiParas["url"] = $url;
	}

	public function getUrl()
	{
		return $this->url;
	}

	public function setSprice($sprice)
	{
		$this->sprice = $sprice;
		$this->apiParas["sprice"] = $sprice;
	}

	public function getSprice()
	{
		return $this->sprice;
	}

	public function setEprice($eprice)
	{
		$this->eprice = $eprice;
		$this->apiParas["eprice"] = $eprice;
	}

	public function getEprice()
	{
		return $this->eprice;
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


	public function setSort($sort)
	{
		$this->sort = $sort;
		$this->apiParas["sort"] = $sort;
	}

	public function getSort()
	{
		return $this->sort;
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

	

	public function getApiMethodName()
	{
		return "ftxia.taobaoshop.list.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->url,"url");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
