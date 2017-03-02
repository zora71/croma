<?php

namespace Model;

class Video {
    private $uuid;
    private $title;        // DM: title
    private $description;  // DM: description
    private $duration;     // DM: duration (in seconds)
    private $thumbnail;    // DM: thumbnail_url, thumbnail_(60, 120, 180, 240, 360, 480, 720)_url
    private $url;          // DM: embed_url (embed_html)
    private $uploadedDate; // DM: created_time (timestamp s)
    private $platform;

    private $private;      // DM: private ?? normally always false
    private $published;     // DM: published ?? normally always true
    //private $allowEmbed;

    public function __construct($uuid, $title, $description, $duration, $thumbnail, $url, $uploadedDate, $platform) {
        $this->setUuid($uuid);
        $this->setTitle($title);
        $this->setDescription($description);
        $this->setDuration($duration);
        $this->setThumbnail($thumbnail);
        $this->setUrl($url);
        $this->setUploadedDate($uploadedDate);
        $this->setPlatform($platform);
    }

    public function getUuid()      { return $this->uuid; }
    public function setUuid($uuid) { $this->uuid = $uuid; }
    public function getTitle()       { return $this->title; }
    public function setTitle($title) { $this->title = $title; }
    public function getDescription()             { return $this->description; }
    public function setDescription($description) { $this->description = $description; }
    public function getDuration()          { return $this->duration; }
    public function setDuration($duration) { $this->duration = $duration; }
    public function getThumbnail()           { return $this->thumbnail; }
    public function setThumbnail($thumbnail) { $this->thumbnail = $thumbnail; }
    public function getUrl()     { return $this->url; }
    public function setUrl($url) { $this->url = $url; }
    public function getUploadedDate()              { return $this->uploadedDate; }
    public function setUploadedDate($uploadedDate) { $this->uploadedDate = $uploadedDate; }
    public function getPlatform()          { return $this->platform; }
    public function setPlatform($platform) { $this->platform = $platform; }
}
