<?php

require_once(dirname(__FILE__). '/inc/common.php');

// simply get all the tags
$tags = tags();

$results = array();

foreach ($tags as $tag) {
  $result = array($tag["tid"], $tag["name"], null, $tag["name"]);
  $results[] = $result;
}

echo json_encode($results);

?>
