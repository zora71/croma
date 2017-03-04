<?php

namespace Model;

require_once $_SERVER['DOCUMENT_ROOT'].'/../vendor/dailymotion/sdk/Dailymotion.php';

use \Dailymotion as Dailymotion;

class DailymotionApi {

    private $apiKey;
    private $apiSecret;
    private $api;
    private $userToken;
    private $channels;

    public function __construct($userToken = null) {
        if (!isset($_SESSION['dailymotion']['channels'])) $_SESSION['dailymotion']['channels'] = [];
        $this->channels = &$_SESSION['dailymotion']['channels'];

        $this->apiKey = getApp()->getConfig('dailymotion_api_key');
        $this->apiSecret = getApp()->getConfig('dailymotion_api_secret');

        $this->userToken = $userToken;

        /*
        code=20abf37491b87e8ebdb867c5f8eedff45c704152&scope=read&uid=
        x1wvkta
        10ba986d4f855cd182c53865372a2a85#
        */
          
        // Instanciate the PHP SDK.
        $this->api = new Dailymotion();

        // Tell the SDK what kind of authentication you'd like to use.
        // Because the SDK works with lazy authentication, no request is performed at this point.
        $this->api->setGrantType(Dailymotion::GRANT_TYPE_AUTHORIZATION, $this->apiKey, $this->apiSecret, array('userinfo', 'manage_subscriptions'));
    }

    /**
     * Redirige  la clé utilisateur a utiliser pour acceder a l'api
     */
    public function connect($callback) {
        if (!$this->userToken) {
            $this->userToken = $this->api->getAccessToken();
        }
    }

    public function disconnect() {
        $session = $api->logout();
    }

    /**
     * Retourne les chaines de l'utilisateur
     */
    public function getChannels() {
        static $fields = [ 'fields' => [
            'id',
            'avatar_60_url',
            'screenname'
        ]];

        $data = $this->api->get('/user/me/following', $fields);
        $channelsData = $data['list'];
        foreach ($channelsData as $channelData) {
            $channelId = $channelData['id'];
            $this->channels[$channelId] =
            new Channel($channelId,
                        $channelData['screenname'],
                        $channelData['avatar_60_url'],
                        'dailymotion');
        }

        return $this->channels;
    }

    /**
     * Retourne les vidéos de la chaine passée en paramètre
     */
    public function getChannelVideos($channelId) {
        static $fields = [ 'fields' => [
            'id',
            'title',
            'description',
            'duration',
            'thumbnail_60_url',
            'embed_url',
            'created_time'
        ]];

        if (isset($this->channels[$channelId])) $channel = $this->channels[$channelId];
        else return null;

        $data = $this->api->get('/user/'.$channel->getUuid().'/videos', $fields);
        $videosData = $data['list'];
        foreach ($videosData as $videoData) {
            $video = new video($videoData['id'],
                               $videoData['title'],
                               $videoData['description'],
                               $videoData['duration'],
                               $videoData['thumbnail_60_url'],
                               $videoData['embed_url'],
                               $videoData['created_time'],
                               'dailymotion');
            $channel->addVideo($video);
        }

        return $channel->getVideos();
    }

    /**
     * Retourne les vidéos correspondant à la recherche.
     *
     */
    public function search($search = null) {
        $videos = &$_SESSION['dailymotion'][$search];
        static $fields = [ 'fields' => [
            'id',
            'title',
            'description',
            'duration',
            'thumbnail_60_url',
            'embed_url',
            'created_time'
        ]];
        if ($search) {
            $fields['search'] = $search;
            $fields['sort'] = 'relevance';
        } else {
            $fields['sort'] = 'visited-hour';
        }

        $data = $this->api->get('/videos', $fields);
        $videosData = $data['list'];
        foreach ($videosData as $videoData) {
            $videoId = $videoData['id'];
            $videos[$videoId] = new video($videoId,
                                  $videoData['title'],
                                  $videoData['description'],
                                  $videoData['duration'],
                                  $videoData['thumbnail_60_url'],
                                  $videoData['embed_url'],
                                  $videoData['created_time'],
                                  'dailymotion');
        }
        return $videos;
    }

}