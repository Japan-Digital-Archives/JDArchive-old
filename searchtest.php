<?php

require_once(dirname(__FILE__). '/inc/common.php');

require(dirname(__FILE__) . '/inc/templates/search_process.php');

$q = $_GET['q'];

//$sql = "SELECT * FROM `seeds_test` WHERE MATCH (description) AGAINST ('$q')";

$sql = "SELECT * FROM seeds_test WHERE description LIKE '%$q%' OR title LIKE '%$q%' OR url LIKE '%$q%'";

$result = mysql_query($sql);
$count = mysql_num_rows($result);

start();


echo $sql; echo "\n";
echo $count; echo "\n";

function is_eal($string)
{
    return !preg_match("/^[\x2E80-\x9FFF]/i", $string);
}

if (is_eal($q) == 1) {
  echo "<br />is EAL!";
} else if (is_eal($q) == 0) {
  echo "<br />isn't EAL...";
}


stop();