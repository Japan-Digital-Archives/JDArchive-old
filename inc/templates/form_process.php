<?php

$message = false;

// self-submitted form, so check $_POST
if (isset($_POST['url']) && isset($_POST['title'])) {

  // clean
  $bk_url = '';
  $bk_title = '';
  $bk_description = '';

  $url = $_POST['url'];
  $title = $_POST['title'];
  $description = isset($_POST['description']) ? $_POST['description'] : '';
  $frequency = isset($_POST['frequency']) ? $_POST['frequency'] : '';
  $scope = isset($_POST['scope']) ? $_POST['scope'] : '';
  $category = isset($_POST['category']) ? $_POST['category'] : '';
  //echo implode(',', $_POST['language']);
  $language = isset($_POST['language']) ? implode(',', $_POST['language']) : '';
  
  
  $name = isset($_POST['name']) ? $_POST['name'] : '';
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $tags = isset($_POST['tags']) ? $_POST['tags'] : '';
  
  // new fields!
  $location = isset($_POST['location']) ? $_POST['location'] : '';
  $lat = isset($_POST['lat']) ? $_POST['lat'] : '';
  $lng = isset($_POST['lng']) ? $_POST['lng'] : '';
  
  $verified = $internal ? 1 : 0;
  
  $data = compact('url', 'title', 'description', 'frequency', 'scope', 'category', 'language', 'name', 'email', 'tags', 'verified', 'location', 'lat', 'lng');
  
  if ($url && $title) {
    add_seed($data);
    
    // currently, all additions will fakely be successes
    $message = true;
  }
}
