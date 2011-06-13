<?php

// don't use this unless you know what you're doing!
die();
require_once(dirname(__FILE__). '/inc/common.php');

// get all seeds
$seeds = get_seeds();

// get all tags
$tags = array();
$sql = "SELECT * FROM tags";
$result = mysql_query($sql);
while ($o = mysql_fetch_object($result)) {
  $tags[$o->name] = $o->tid;
}

//print_r($tags);
$count = 0;

foreach ($seeds as $seed) {
  $seedtags = explode(',', $seed->tags);
  foreach ($seedtags as $st) {
    $st = trim($st);
    if ($st != '' && $st != ' ') {
      $count++;
      $tid = $tags[$st];
      $sql = "INSERT IGNORE INTO relations (tid, sid) VALUES ($tid, {$seed->sid})";
      $result = mysql_query($sql);
    }
  }
}

echo $count;

?>