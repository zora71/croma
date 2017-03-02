<?php

namespace Model;

class Channel {
    private $uuid;
    private $title;
    private $avatar;
    private $platform;
    private $videos;

    public function __construct($uuid, $title, $avatar, $platform) {
        $this->setUuid($uuid);
        $this->setTitle($title);
        $this->setAvatar($avatar);
        $this->setPlatform($platform);
    }

    public function getUuid()      { return $this->uuid; }
    public function setUuid($uuid) { $this->uuid = $uuid; }
    public function getTitle()       { return $this->title; }
    public function setTitle($title) { $this->title = $title; }
    public function getAvatar()        { return $this->avatar; }
    public function setAvatar($avatar) { $this->avatar = $avatar; }
    public function getPlatform()          { return $this->platform; }
    public function setPlatform($platform) { $this->platform = $platform; }

    public function getVideos() { return $this->videos; }
    public function addVideo($video) { $this->videos[$video->getUuid()] = $video; }
}
