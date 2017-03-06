<?php

namespace Model;

use \Google_Client as Google_Client;
use \Google_Service_YouTube as Google_Service_YouTube;
use \Google_Service_Exception as Google_Service_Exception;
use \Google_Exception as Google_Exception;


class YoutubeApi {

    private $apiKey;
    private $apiSecret;
    private $api;
    private $client;
    private $userToken;
    private $channels;

    public function __construct($userToken = null) {
        if (!isset($_SESSION['youtube']['channels'])) $_SESSION['youtube']['channels'] = [];
        $this->channels = &$_SESSION['youtube']['channels'];

        $this->apiKey = getApp()->getConfig('youtube_api_key');
        $this->apiSecret = getApp()->getConfig('youtube_api_secret');

        $client = new Google_Client();
        $client->setClientId($this->apiKey);
        $client->setClientSecret($this->apiSecret);
        $client->setScopes('https://www.googleapis.com/auth/youtube');
        $redirect = filter_var('http://' . $_SERVER['HTTP_HOST'] . '/ytauth',
                FILTER_SANITIZE_URL);
        $client->setRedirectUri($redirect);

        // Define an object that will be used to make all API requests.
        $youtube = new Google_Service_YouTube($client);

        $this->api = $youtube;
        $this->client = $client;


        $tokenSessionKey = 'token-' . $this->client->prepareScopes();
        if (isset($_SESSION[$tokenSessionKey])) {
            $this->client->setAccessToken($_SESSION[$tokenSessionKey]);
            $this->userToken = $_SESSION[$tokenSessionKey];
        }
    }

    /**
     * Redirige  la clé utilisateur a utiliser pour acceder a l'api
     */
    public function connect($callback = null) {
        $this->userToken = null;
        // Check if an auth token exists for the required scopes
        $tokenSessionKey = 'token-' . $this->client->prepareScopes();
        if (!$this->userToken) {
            if (isset($_GET['code'])) {
                if (strval($_SESSION['state']) !== strval($_GET['state'])) {
                    die('The session state did not match.');
                }

                $this->client->authenticate($_GET['code']);
                $_SESSION[$tokenSessionKey] = $this->client->getAccessToken();
                header('Location: ' . getApp()->getRouter()->generate('default_index'));
            } else {
                $state = mt_rand();
                $this->client->setState($state);
                $_SESSION['state'] = $state;

                $authUrl = $this->client->createAuthUrl();
                header("Location: $authUrl");
            }
        }

    }

    public function disconnect() {
    }

    /**
     * Retourne les chaines de l'utilisateur
     */
    public function getChannels() {
        try {

            /*
             * Before channel shelves will appear on your channel's web page, browse
             * view needs to be enabled. If you know that your channel already has
             * it enabled, or if you want to add a number of sections before enabling it,
             * you can skip the call to enable_browse_view().
             */

            // Call the YouTube Data API's channels.list method to retrieve your channel.
            $channelsData = [];
            $options = array('mine' => true, 'maxResults' => 50);
            do {
                $listResponse = $this->api->subscriptions->listSubscriptions('snippet', $options);
                $options['pageToken'] = isset($listResponse['nextPageToken']) ? $listResponse['nextPageToken'] : null;
                $channelsData = array_merge($channelsData, $listResponse['items']);
            } while (isset($options['pageToken']));
        } catch (Google_Service_Exception $e) {
            echo $e->getMessage();
            return null;
        } catch (Google_Exception $e) {
            echo $e->getMessage();
            return null;
        }


        // {
        //  "kind": "youtube#subscriptionListResponse",
        //  "etag": "\"uQc-MPTsstrHkQcRXL3IWLmeNsM/XIcj_S9BlUnQmZ_07v_quFiEq9E\"",
        //  "prevPageToken": "CEYQAQ",
        //  "pageInfo": {
        //   "totalResults": 79,
        //   "resultsPerPage": 10
        //  },
        //  "items": [
        //   {
        //    "kind": "youtube#subscription",
        //    "etag": "\"uQc-MPTsstrHkQcRXL3IWLmeNsM/1eyqWQmwKNO3-tyBckbuhf7cgCw\"",
        //    "id": "1BWYHpqRgwmIqli_G_PTNb-8xsNYnNG9kx9_IZVGUoY",
        //    "snippet": {
        //     "publishedAt": "2014-05-01T13:23:40.000Z",
        //     "title": "Kriss Papillon",
        //     "description": "Abonne-toi si tu veux voir des vidéos différentes des autres Youtubers !! (Attention, j'ai pas dit mieux…)\n\nChaîne officielle de \"Minute Papillon\", \"RealEr\", \"Qu'est devenu?\" et d'autres trucs, mais bon je vais pas tout mettre ! \nJe fais des vidéos pour m'amuser et c'est déjà pas mal ^^\n\nPour me soutenir sur Tipeee : https://www.tipeee.com/kriss",
        //     "resourceId": {
        //      "kind": "youtube#channel",
        //      "channelId": "UCBOEy0ETYHd5gWQ2DayMv_g"
        //     },
        //     "channelId": "UCR6C4-fKBxGOCgeKtp21wOg",
        //     "thumbnails": {
        //      "default": {
        //       "url": "https://yt3.ggpht.com/-Lqic1KnG8so/AAAAAAAAAAI/AAAAAAAAAAA/vjXxIpgRhwc/s88-c-k-no-mo-rj-c0xffffff/photo.jpg"
        //      },
        //      "medium": {
        //       "url": "https://yt3.ggpht.com/-Lqic1KnG8so/AAAAAAAAAAI/AAAAAAAAAAA/vjXxIpgRhwc/s240-c-k-no-mo-rj-c0xffffff/photo.jpg"
        //      },
        //      "high": {
        //       "url": "https://yt3.ggpht.com/-Lqic1KnG8so/AAAAAAAAAAI/AAAAAAAAAAA/vjXxIpgRhwc/s240-c-k-no-mo-rj-c0xffffff/photo.jpg"
        //      }
        //     }
        //    }
        //   },
        foreach ($channelsData as $channelData) {
            $channelId = $channelData['snippet']['resourceId']['channelId'];
            $this->channels[$channelId] =
                new Channel($channelId,
                        $channelData['snippet']['title'],
                        $channelData['thumbnail']['default'],
                        'youtube');
        }

        return $this->channels;
    }


    private function getVideos($options = null) {


        /*
           {
               "kind": "youtube#searchListResponse",
               "etag": "\"uQc-MPTsstrHkQcRXL3IWLmeNsM/1PFgUvZ26cAWD7znVFNCCQKTx6s\"",
               "nextPageToken": "CAUQAA",
               "regionCode": "FR",
               "pageInfo": {
                   "totalResults": 1000000,
                   "resultsPerPage": 5
               },
               "items": [
               {
                   "kind": "youtube#searchResult",
                   "etag": "\"uQc-MPTsstrHkQcRXL3IWLmeNsM/hsQmFEqp1R_glFpcQnpnOLbbxCg\"",
                   "id": {
                       "kind": "youtube#video",
                       "videoId": "d8kCTPPwfpM"
                   },
                   "snippet": {
                       "publishedAt": "2012-02-21T14:00:00.000Z",
                       "channelId": "UCp0hYYBW6IMayGgR-WeoCvQ",
                       "title": "Taylor Swift and Zac Efron Sing a Duet!",
                       "description": "This incredible duo teamed up to perform an original song for Ellen! They may not have had a lot of rehearsal, but it's clear that this is one musical combo it ...",
                       "thumbnails": {
                           "default": {
                               "url": "https://i.ytimg.com/vi/d8kCTPPwfpM/default.jpg",
                               "width": 120,
                               "height": 90
                           },
                           "medium": {
                               "url": "https://i.ytimg.com/vi/d8kCTPPwfpM/mqdefault.jpg",
                               "width": 320,
                               "height": 180
                           },
                           "high": {
                               "url": "https://i.ytimg.com/vi/d8kCTPPwfpM/hqdefault.jpg",
                               "width": 480,
                               "height": 360
                           }
                       },
                       "channelTitle": "TheEllenShow",
                       "liveBroadcastContent": "none"
                    }
                }]
            }
         */



        /*
           {
               "kind": "youtube#videoListResponse",
               "etag": "\"uQc-MPTsstrHkQcRXL3IWLmeNsM/BuvuqQcZAI4nAMEMRUumgOVfOJA\"",
               "pageInfo": {
                   "totalResults": 1,
                   "resultsPerPage": 1
               },
               "items": [
               {
                   "kind": "youtube#video",
                   "etag": "\"uQc-MPTsstrHkQcRXL3IWLmeNsM/WxctkYgX4nAeaZXQn8PDpJwyWn4\"",
                   "id": "d8kCTPPwfpM",
                   "contentDetails": {
                       "duration": "PT3M41S",
                       "dimension": "2d",
                       "definition": "hd",
                       "caption": "false",
                       "licensedContent": false,
                       "projection": "rectangular"
                   },
                   "status": {
                       "uploadStatus": "processed",
                       "privacyStatus": "public",
                       "license": "youtube",
                       "embeddable": true,
                       "publicStatsViewable": true
                   },
                   "player": {
                        "embedHtml": "\u003ciframe width=\"480\" height=\"270\" src=\"//www.youtube.com/embed/d8kCTPPwfpM\" frameborder=\"0\" allowfullscreen\u003e\u003c/iframe\u003e"
                   }
               }
               ]
           }
         */
        try {

            $defaultOptions = array('type' => 'video',
                    'maxResults' => 10);
            $defaultOptions['relevanceLanguage'] = 'fr'; // get user lang

            $options = array_merge($options, $defaultOptions);

            $videosData = [];
            do {
                $listResponse = $this->api->search->listSearch('snippet', $options);
                $options['pageToken'] = null;//isset($listResponse['nextPageToken']) ? $listResponse['nextPageToken'] : null;
                $pageSearchData = $listResponse['items'];
                if (!empty($pageSearchData)) {
                    $videoIds = [];
                    foreach ($pageSearchData as $searchData) {
                        $videoId = $searchData['id']['videoId'];
                        $videosData[$videoId] = [ 'id' => $videoId ];
                        $videosData[$videoId]['snippet'] = $searchData['snippet'];
                        $videoIds[] = $videoId;
                    }

                    $options = [ 'id' => implode(',', $videoIds), 'maxResults' => 10 ];
                    $listResponse = $this->api->videos->listVideos('player,status,contentDetails', $options);

                    $pageVideosData = $listResponse['items'];
                    if (!empty($pageVideosData)) foreach ($pageVideosData as $key => $videoData) {
                        $videoId = $videoData['id'];
                        $videosData[$videoId]['player'] = $videoData['player'];
                        $videosData[$videoId]['status'] = $videoData['status'];
                        $videosData[$videoId]['contentDetails'] = $videoData['contentDetails'];
                    }
                }
            } while (isset($options['pageToken']));
        } catch (Google_Service_Exception $e) {
            echo 'Google_Service_Exception:'.$e->getMessage();
            return null;
        } catch (Google_Exception $e) {
            echo 'Google_Exception:'.$e->getMessage();
            return null;
        }



        $videos = [];
        foreach ($videosData as $videoData) {
            $videoId = $videoData['id'];
            $durationString = $videoData['contentDetails']['duration'];
            preg_match('/PT(\d*)H?(\d*)M?(\d*)S?/', $durationString, $matches);
            $duration = 0;
            if (!empty($matches[1])) $duration += $matches[1] * 3600;
            if (!empty($matches[2])) $duration += $matches[2] * 60;
            if (!empty($matches[3])) $duration += $matches[3];

            $url = $videoData['player']['embedHtml'];
            $videos[$videoId] = new video($videoId,
                    $videoData['snippet']['title'],
                    $videoData['snippet']['description'],
                    $duration,
                    $videoData['snippet']['thumbnails']['high']['url'],
                    $url,
                    $videoData['snippet']['publishedAt'],
                    'youtube');
        }
        return $videos;

    }

    /**
     * Retourne les vidéos de la chaine passée en paramètre
     */
    public function getChannelVideos($channelId) {
        if (isset($this->channels[$channelId])) $channel = $this->channels[$channelId];
        else return null;

        $options = ['channelId' => $channelId];
        $videos = $this->getVideos($options);
        foreach ($videos as $video) {
            $channel->addVideo($video);
        }

        return $channel->getVideos();
    }

    /**
     * Retourne les vidéos correspondant à la recherche.
     *
     */
    public function search($search = null) {
        $options = [];
        if ($search) $options['q'] = $search;
        $videos = $this->getVideos($options);
        $_SESSION['youtube'][$search] = $videos; // TODO : pagination

        return $videos;
    }

}
