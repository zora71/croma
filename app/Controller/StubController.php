<?php

namespace Controller;

use \W\Controller\Controller;
use \Utils\Random\ImageGenerator;
use \Utils\Random\TextGenerator;
use \Utils\Random\UuidGenerator;

class StubController extends Controller {

    public function __construct() {
        if (!isset($_SESSION['STUB'])) $_SESSION['STUB'] = [];
    }

    private function getRandomChannel() {
        return [
            'uuid' => UuidGenerator::generate('whirlpool'),
            'label' => TextGenerator::generatePseudo(),
            'avatar' => 'http://rendez-vous.olivier.marino.name/avatar-zombie.jpeg'
        ];
    }

    private function getRandomVideo() {
        return [
            'uuid' => UuidGenerator::generate('whirlpool'),
            'url' => 'http://vodin.olivier.marino.name',
            'thumbnail' => 'http://rendez-vous.olivier.marino.name/scratch.jpeg',
            'title' => TextGenerator::generateTitle(),
            'description' => 'Lorem ipsum dolor sit amet...',
            'duration' => rand(120, 600),
            'uploadedTime' => time() - (43800 * 60) + mt_rand(0, 43800 * 60)
        ];
    }

    public function hash() {
        $algos = hash_algos();
        for ($i = 0; $i < 3; $i++) {
            foreach ($algos as $algo) {
                $hash1 = hash($algo, 'a');
                $hash2 = hash($algo, 'a');
                $begin = microtime(true);
                for ($j = 0; $j < 10000; $j++)
                    hash($algo, 'a');
                $time = microtime(true) - $begin;
                echo "$algo produce ".($hash1 == $hash2 ? 'same' : 'different')." hash in $time seconds<br>";
            }
        }
    }

    public function videos($uri = '') {
        // parse unordered slugs pairs from uri tail
        $slugs = strlen($uri) ? explode('/', $uri) : [];
        $currentValue = null;
        foreach ($slugs as $slug) {
            if (in_array($slug, ['page', 'search', 'limit'])) {
                $$slug = ''; // create var with slug name
                $currentValue = &$$slug; // reference it
            }
            else if (isset($currentValue)) {
                $currentValue = $slug; // affect value to previously defined '$$slug'
                unset($currentValue); // unset $currentValue for next round
            }
            else $this->showJson([ 'error' => 'missconstructed uri with '.$uri ]);
        }

        // Set default value for non
        if (!isset($search)) $search = '__vodin__default__search';
        if (!isset($limit))  $limit  = 10;
        if (!isset($page))   $page   = 1;

        $_STUB = &$_SESSION['STUB'];
        if (!isset($_STUB[$search])) $_STUB[$search] = [];
        $videos = &$_STUB[$search];

        $maxIndex = $page-- * $limit;
        $minIndex = $page * $limit;
        $videosCount = count($videos);
        if ($page < 0) { $this->showNotFound(); }
        if ($maxIndex > $videosCount) {
            while ($videosCount++ < $maxIndex) {
                $videos[] = $this->getRandomVideo();
            }
        }

        $this->showJson(array_slice($videos, $minIndex, $limit));
    }

    /**
     * Retourne l'id de l'utilisateur correspondant a la clé api
     */
    public function userId($apiKey) {
        $_STUB = &$_SESSION['STUB'];
        if (!isset($_STUB[$apiKey])) $_STUB[$apiKey] = time();
        return $this->showJson([ 'uuid' => $_STUB[$apiKey]]);
    }

    /**
     * Retourne les chaines de l'utilisateur correspondant au userId donné
     */
    public function userChannels($userId) {
        $_STUB = &$_SESSION['STUB'];
        if (!isset($_STUB[$userId])) $_STUB[$userId] = [];
        $channels = &$_STUB[$userId];

        $rand = mt_rand(5, 15);
        for ($i = 0; $i < $rand; $i++) {
            $channel = $this->getRandomChannel();
            $_STUB[$channel['uuid']] = &$channel;
            $channels[] = &$channel;
        }

        return $this->showJson($channels);
    }


    /**
     * Retourne les videos de la chaine correspondant au channelId
     */
    public function channelVideos($channelId) {
        $_STUB = &$_SESSION['STUB'];
        if (isset($_STUB[$channelId])) return $_STUB[$channelId];

        $rand = mt_rand(5, 35);
        for ($i = 0; $i < $rand; $i++) {
            $videos[] = $this->getRandomVideo();
        }

        $_STUB[$channelId]['videos'] = $videos;
        return $videos;
    }

    /* Methodes de debug */
    public function debug() {
        echo '<pre>';
        var_dump($_SESSION['STUB']);
        echo '</pre>';
    }

    public function clear() { $_SESSION['STUB'] = []; die('stub cleared');}
}
