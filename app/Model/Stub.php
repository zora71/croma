<?php

const CROMAPI_DEFAULT_LIMIT = 10;

private $key;
private $page;
private $limit;

public function __construct($key = null) {
	$this->key = $key;
}

public function getPage() { return $this->page; }
public function setPage($page) { return $this->page = $page > 0 ? $page : 0; }
public function getLimit() { return $this->limit; }
public function setLimit($limit) { $this->limit = $limit > 0 ? $limit : CROMAPI_DEFAULT_LIMIT; }

private function get($url) {
	$r = new HttpRequest($url, HttpRequest::METH_GET);
	try {
	    $r->send();
	    if ($r->getResponseCode() == 200) {
	        return $r->getResponseBody();
	    }
	} catch (HttpException $ex) {
	    echo $ex;
	}

	return null;
}

public function getUserKey() {
	if (!isset($_SESSION['stubApi']['key'])) {
		$this->get('/stub/form');
	}

	return $_SESSION['stubApi']['key'];
}

public function getUserChannels($userId) {
	$data = $this->get('/stub/channels/'.$userId);
}

public function getChannelVideos($channelId) {

	$data = $this->get('/stub/videos/'.$channelId);
}

public function searchVideos($search = null, $page = 0, $limit = 10) {
    if ($search) {
    	$data = $this->get('/videos/search/'.$search);
    } else {
    	$data = $this->get('/videos');

    }
}

public function nextPage() {

}