<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\Stub;

/**
 * Ce controller est utilisé comme une api distante
 * c-a-d qu'il aurait pu être développé dans un projet a part
 */
class TestController extends Controller {
    
    
    public function userKey() {
        $stub = new Stub();
        echo '<pre>';
        var_dump($stub->getUserKey());
    }

    public function userChannels($id) {
        $stub = new Stub();
        echo '<pre>';
        var_dump($stub->getUserChannels($id));
    }

    public function channelVideos($id) {
        $stub = new Stub();
        echo '<pre>';
        var_dump($stub->getChannelVideos($id));
    }

    public function videos() {
        $stub = new Stub();
        echo '<pre>';
        var_dump($stub->searchVideos());
    }

    public function searchVideos($search) {
        $stub = new Stub();
        echo '<pre>';
        var_dump($stub->searchVideos($search));
    }
}