<?php

namespace Model;

class Stub {
    const CROMAPI_DEFAULT_LIMIT = 10;

    private $key;
    private $page;
    private $limit;

    public function __construct($key = null, $page = 1, $limit = 10) {
        $this->key = $key;
        $this->page = $page;
        $this->limit = $limit;
    }

    public function getPage() { return $this->page; }
    public function setPage($page) { return $this->page = $page > 0 ? $page : 1; }
    public function getLimit() { return $this->limit; }
    public function setLimit($limit) { $this->limit = $limit > 0 ? $limit : CROMAPI_DEFAULT_LIMIT; }

    private function get($url) {
        $r = new \HttpRequest($url, HttpRequest::METH_GET);
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
        if (!isset($_SESSION['STUB_API']['key'])) {
            $this->get('/stub/form');
        }

        return $_SESSION['STUB_API']['key'];
    }

    public function getUserChannels($userId) {
        $data = $this->get('/stub/channels/'.$userId);
        $channelsData = json_decode($data);

        $channels = &$_STUB_API['channels'];
        $channelsData = json_decode($data);
        foreach ($channelsData as $channelData) {
            $channel = new Channel();
            $channel->setUuid($videoData['uuid']);
            $channel->setLabel($videoData['label']);
            $channel->setAvatar($videoData['avatar']);
            $channel->setPlatform('Stub');
            
            $channels[] = $channel;
        }
    }

    public function getChannelVideos($channelId) {
        $_STUB_API = &$_SESSION['STUB_API'];
        $data = $this->get('/stub/videos/'.$channelId);

        $channel = &$_STUB_API['channels'][$channelId];
        $videosData = json_decode($data);
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
    }

    public function searchVideos($search = null) {
        $_STUB_API = &$_SESSION['STUB_API'];
        $currentUri = $_STUB_API['__stub__current__uri'] = $search ? '/videos/search/'.$search : '/videos';
        $data = $this->get($currentUri);
        $videosData = json_decode($data);
        if (!$search) $search = '__stub__api__search';
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
            
            $videos[$search][$videoData['uuid']] = $video;
        }

        $startIndex = ($this->page - 1) * $this->limit;
        return array_slice(array_values($videos[$search]), $startIndex, $this->limit);
    }

    private function pageContent() {
        $_STUB_API = &$_SESSION['STUB_API'];
        if (isset($_STUB_API['__stub__current__uri'])) {
            $uri = $_STUB_API['__stub__current__uri'];
            if (!preg_match(uri, 'search/([^/]*)', $match)) return null; // A voir si le systeme est utilisé pour les chaines
            $search = $match[0];
            $this->get($_STUB_API['__stub__current__uri'].'/page/'.$this->page);
            
            $videosData = json_decode($data);
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

                $videos[$search][$videoData['uuid']] = $video;
            }

            $startIndex = ($this->page - 1) * $this->limit;
            return array_slice(array_values($videos[$search]), $startIndex, $this->limit);
        }

        return null;
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