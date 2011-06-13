<?php

require_once(dirname(__FILE__). '/inc/common.php');

$conditions = array("frequency" => "once");

$seeds = get_seeds($conditions, 100);

$channel = array(
  "title" => "Digital Archive of the Japan 2011 Earthquake and Aftermath",
  "description" => "This rss feed contains the 100 most recent links added to the collection for archiving once.",
  "link" => "http://www.jedarchive.org/rss.php"
);


$output = '<?xml version="1.0" encoding="UTF-8"?>';
$output .= "\n";
$output .= '<rss version="2.0">';
$output .= "\n<channel>";
$output .= "\n  <title>" . $channel["title"] . "</title>";
$output .= "\n  <description>" . $channel["description"] . "</description>";
$output .= "\n  <link>" . $channel["link"] . "</link>\n";


foreach ($seeds as $seed) { 
  $output .= "  <item>\n";
  $output .= "    <title>" . $seed->title . "</title>\n";
  $output .= "    <description>" . $seed->description . "</description>\n";
  $output .= "    <category>" . $seed->category . "</category>\n";
  $output .= "    <link>" . htmlentities($seed->url) . "</link>\n";
  $output .= "    <pubDate>" . date("D, d M Y H:i:s O", strtotime($seed->added)) . "</pubDate>\n";
  $output .= "  </item>\n";
}

$output .= "</channel>\n";
$output .= "</rss>";

header("Content-Type: application/rss+xml; charset=utf-8");
echo $output;

?>
