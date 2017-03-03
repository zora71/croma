<?php

namespace Model;

use \Utils\Random\TextGenerator;
use \Model\Video;
use \Model\Channel;

class MarbleApi {

    private static function _getVideos() {
        static $videos;
        if (!$videos) {
            $videos = [
                new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ),
                new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ),
                new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ),
                new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ),
                new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ),
                new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ),
                new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ),
                new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ),
                new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ),
                new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ),
                new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ),
                new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ),
                new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ),
                new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ),
                new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ),
                new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ),
                new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ),

            ];
        }

        return $videos;
    }

    private static function _getChannels() {

        static $channels;
        if (!$channels) {
            $channels = [
                $zombie = new Channel(1, 'Mister Rotted', 'http://rendez-vous.olivier.marino.name/avatar-zombie.jpeg', 'marble'),
                $skull = new Channel(2, 'Oscar', 'http://rendez-vous.olivier.marino.name/avatar-skull.jpeg', 'marble'),
                $wolf = new Channel(3, 'Grougrou le loup', 'http://rendez-vous.olivier.marino.name/avatar-loup-garou.jpeg', 'marble'),
                $pumpkin = new Channel(4, 'Courge', 'http://rendez-vous.olivier.marino.name/avatar-citrouille.jpeg', 'marble'),
            ];

            $zombie->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $zombie->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $zombie->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $zombie->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $zombie->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $zombie->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));

            $skull->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $skull->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $skull->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $skull->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $skull->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $skull->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $skull->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $skull->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $skull->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $skull->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $skull->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $skull->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));

            $wolf->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $wolf->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $wolf->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $wolf->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $wolf->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $wolf->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $wolf->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $wolf->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $wolf->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $wolf->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $wolf->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $wolf->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $wolf->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $wolf->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
            $wolf->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));

            $pumpkin->addVideo(new Video(1, TextGenerator::generateTitle(), 'Lorem ipsum dolor sit amet...', rand(120, 600), 'http://rendez-vous.olivier.marino.name/scratch.jpeg', 'https://www.youtube.com/embed/YE7VzlLtp-4', time() - (43800 * 60) + mt_rand(0, 43800 * 60), 'marble' ));
        }

        return $channels;
    }

    public $key;

    public function __construct($key = null) {
        $this->key = $key;
    }

    /**
     * Redirige  la clé utilisateur a utiliser pour acceder a l'api
     */
    public function connect($callback) {
        header("Location: $callback/token/ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789");
    }

    /**
     * Retourne les chaines de l'utilisateur
     */
    public function getChannels() {
        if (!$this->key) return null;

        return self::_getChannels();
    }

    /**
     * Retourne les vidéos de la chaine passée en paramètre
     */
    public function getChannelVideos(Channel $channel) {
        if (!$this->key) return null;

        return $channel->getVideos();
    }

    /**
     * Retourne les vidéos correspondant à la recherche.
     *
     */
    public function search($search = null) {
        return self::_getVideos();
    }
}


?>
