<?php

namespace Model;

use \Utils\Http\Curl;

class Stub {
    const CROMAPI_DEFAULT_LIMIT = 10;

    private $key;
    private $page;
    private $limit;

    public function __construct($key = null, $page = 1, $limit = 10) {
    	if (!isset($_SESSION['STUB_API'])) $_SESSION['STUB_API'] = [];

        $this->key = $key;
        $this->page = $page;
        $this->limit = $limit;
    }

    public function getPage() { return $this->page; }
    public function setPage($page) { return $this->page = $page > 0 ? $page : 1; }
    public function getLimit() { return $this->limit; }
    public function setLimit($limit) { $this->limit = $limit > 0 ? $limit : CROMAPI_DEFAULT_LIMIT; }

    private function url($route = null, $options = []) {
    	$uri = getApp()->getRouter()->generate($route ? $route : getApp()->getCurrentRoute(), $options);

    	return (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$uri";
    }



    private function pageContent() {
        $_STUB_API = &$_SESSION['STUB_API'];
        if (isset($_STUB_API['__stub__current__route'])) {
            $route = $_STUB_API['__stub__current__route'];
            $routeOptions = [ 'tail' => '/page/'.$this->page];
            
        	$search = $_STUB_API['__stub__current__search'];
        	$routeOptions['search'] = $search;

            $data = Curl::get($this->url($route, $routeOptions));

            $videosData = json_decode($data, true);
        	$videos = &$_STUB_API[$search];
            foreach ($videosData as $videoData) {
                if (isset($videos[$search][$videoData['uuid']])) continue;
                
                $video = new Video();
                $video->setUuid($videoData['uuid']);
                $video->setTitle($videoData['title']);
                $video->setDescription($videoData['description']);
                $video->setDuration($videoData['duration']);
                $video->setUploadedTime($videoData['uploadedTime']);
                $video->setPlatform('Stub');
                $video->setUrl($videoData['url']);
                $video->setThumbnail($videoData['thumbnail']);

                $videos[$videoData['uuid']] = $video;
            }

            $startIndex = ($this->page - 1) * $this->limit;
            return array_slice(array_values($videos[$search]), $startIndex, $this->limit);
        }

        return null;
    }

    public function connect() {
    	if (!isset($_SESSION['STUB_API']['key']))
	    	if (!empty($_GET)) {
	    		if (!empty($_GET['key']))
	    			$_SESSION['STUB_API']['key'] = $_GET['key'];
	    		else header('Location: '.$this->url('default_home'));
	    	} else if (!isset($_SESSION['STUB_API']['key'])) {
	        	$url = $this->url('stub_form', [ 'callback' => urlencode(urlencode($this->url())) ]);
	        	header("Location: $url");
	        	die();
	        }

        return $_SESSION['STUB_API']['key'];
    }

    public function getUserChannels($userId) {
        $data = Curl::get($this->url('stub_user_channels', [ 'id' => $userId ]));
        $channelsData = json_decode($data, true);
        var_dump($channelsData); die();

        $channels = &$_STUB_API['channels'];
        foreach ($channelsData as $channelData) {
            $channel = new Channel();
            $channel->setUuid($channelData['uuid']);
            $channel->setTitle($channelData['label']);
            $channel->setAvatar($channelData['avatar']);
            $channel->setPlatform('Stub');
            
            $channels[$channelData['uuid']] = $channel;
        }

        return $channels;
    }

    public function getChannelVideos($channelId) {
        $_STUB_API = &$_SESSION['STUB_API'];
        $data = Curl::get($this->url('stub_channel_videos', [ 'id' => $channelId ]));

        $channel = &$_STUB_API['channels'][$channelId];
        $videosData = json_decode($data, true);
        foreach ($videosData as $videoData) {
            $video = new Video();
            $video->setUuid($videoData['uuid']);
            $video->setTitle($videoData['title']);
            $video->setDescription($videoData['description']);
            $video->setDuration($videoData['duration']);
            $video->setUploadedTime($videoData['uploadedTime']);
            $video->setPlatform('Stub');
            $video->setUrl($videoData['url']);
            $video->setThumbnail($videoData['thumbnail']);
            
            $channel->addVideo($video);
        }

        return $channel->getVideos();
    }

    public function searchVideos($search = null) {
        $_STUB_API = &$_SESSION['STUB_API'];
        $route = $_STUB_API['__stub__current__route'] = 'stub_videos';
        $_STUB_API['__stub__current__search'] = $search ? $search : '__stub__api__search';
        return $this->pageContent();
    }

    public function nextPage() {
        $this->page++;
        return $this->pageContent();
    }

    public function previousPage() {
        if (--$this->page < 1) $this->page = 1;
        return $this->pageContent();
    }
}