<?php

namespace Model;

use \TwitchApi\TwitchApi as Twitch;


class TwitchApi {

    private $apiKey;
    private $apiSecret;
    private $api;
    private $userToken;
    private $user;
    private $channels;

    public function __construct($userToken = null) {
        if (!isset($_SESSION['twitch']['channels'])) $_SESSION['twitch']['channels'] = [];
        $this->channels = &$_SESSION['twitch']['channels'];

        $this->apiKey = getApp()->getConfig('twitch_api_key');
        $this->apiSecret = getApp()->getConfig('twitch_api_secret');
        $redirect = filter_var('http://' . $_SERVER['HTTP_HOST'] . '/twauth', FILTER_SANITIZE_URL);
        $options = [
            'client_id' => $this->apiKey,
            'client_secret' => $this->apiSecret,
            'redirect_uri' => $redirect,
            'scope' => ['user_read','channel_read']
        ];

        $this->api = new Twitch($options);

        if (isset($_SESSION['twitch']['access_token'])) $this->userToken = $_SESSION['twitch']['access_token'];
        if (isset($_SESSION['twitch']['user'])) $this->user = $_SESSION['twitch']['user'];
    }

    /**
     * Redirige  la clé utilisateur a utiliser pour acceder a l'api
     */
    public function connect($callback = null) {
        $this->userToken = null;
        // Check if an auth token exists for the required scopes
        if (!$this->userToken) {
            if (isset($_GET['code'])) {
                if (strval($_SESSION['state']) !== strval($_GET['state'])) {
                    die('The session state did not match.');
                }

                $credentials = $this->api->getAccessCredentials($_GET['code'], $_SESSION['state']);
                $_SESSION['twitch']['access_token'] = $credentials['access_token'];
                $_SESSION['twitch']['user'] = $this->api->getAuthenticatedUser($credentials['access_token']);
                header('Location: ' . getApp()->getRouter()->generate('default_index'));
            } else if (empty($_GET)) {
                $state = mt_rand();
                $_SESSION['state'] = $state;

                $authUrl = $this->api->getAuthenticationUrl($state);
                header("Location: $authUrl");
            } else {
                echo 'error';
            }
        }
    }

    public function disconnect() {
    }

    /**
     * Retourne les chaines de l'utilisateur
     */
    public function getChannels() {
        $data = $this->api->getUsersFollowedChannels($this->user['_id']);
        $channelsData = $data['follows'];
        $channels = [];
        foreach ($channelsData as $channelData) {
            $channels[] =
            new Channel($channelData['channel']['_id'],
                        $channelData['channel']['name'],
                        $channelData['channel']['logo'],
                        'twitch');
        }

        return $channels;
    }

    /**
     * Retourne les vidéos de la chaine passée en paramètre
     */
    public function getChannelVideos($channelId) {
        $data = $this->api->getChannelVideos($channelId);
        $videosData = $data['videos'];
        $videos = [];
        foreach ($videosData as $videoData) {
            $videos [] =
            new Video($videoData['_id'],
                      $videoData['title'],
                      $videoData['description'],
                      $videoData['length'],
                      $videoData['preview']['large'],
                      $videoData['url'],
                      $videoData['published_at'],
                      'twitch');
        }

        return $videos;
    }

    /**
     * Retourne les vidéos correspondant à la recherche.
     *
     */
    public function search($search = null) {
        $data = $this->api->getTopVideos();
        $videosData = $data['vods'];
        $videos = [];
        foreach ($videosData as $videoData) {
            $videos [] =
            new Video($videoData['_id'],
                      $videoData['title'],
                      $videoData['description'],
                      $videoData['length'],
                      $videoData['preview']['large'],
                      $videoData['url'],
                      $videoData['published_at'],
                      'twitch');
        }

        return $videos;
    }

}
