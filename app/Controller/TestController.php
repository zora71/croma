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
        $data = $stub->connect();
        echo '<pre>';
        var_dump($data);
    }

    public function userChannels($id) {
        $stub = new Stub();
        $data = $stub->getUserChannels($id);
        echo '<pre>';
        var_dump($data);
    }

    public function channelVideos($id) {
        $stub = new Stub();
        $data = $stub->getChannelVideos($id);
        echo '<pre>';
        var_dump($data);
    }

    public function videos() {
        $stub = new Stub();
        $data = $stub->searchVideos();
        echo '<pre>';
        var_dump($data);
    }

    public function searchVideos($search) {
        $stub = new Stub();
        $data = $stub->searchVideos($search);
        echo '<pre>';
        var_dump($data);
    }
}