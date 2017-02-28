<?php

namespace \Croma;

class Video {
	private $uuid;
	private $title;        // DM: title
	private $description;  // DM: description
	private $duration;     // DM: duration (in seconds)
	private $thumbnail;    // DM: thumbnail_url, thumbnail_(60, 120, 180, 240, 360, 480, 720)_url
	private $url;          // DM: embed_url (embed_html)
	private $uploadedDate; // DM: created_time (timestamp s)



	private $private;      // DM: private ?? normally always false
    private $published     // DM: published ?? normally always true
	//private $allowEmbed;
}
