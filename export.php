<?php

require_once(dirname(__FILE__). '/inc/common.php');



if (!isset($_GET['start']) && !isset($_GET['end'] )) {
  die();
}

$start = mysql_escape_string($_GET['start']);
$end = mysql_escape_string($_GET['end']);

if (!is_numeric($start) && !is_numeric($end)) {
  die();
}

$conditions = array();

if (!isset($_GET['all'])) {
  $conditions['verified'] = 1;
}
$conditions['start'] = $start;
if ($end) {
  $conditions['end'] = $end;
}

$seeds = get_seeds($conditions);

$lastsid = 0;
if ($seeds) {
  $last = $seeds[0];
  $last_sid = $last->sid;
}

$sql = "UPDATE global SET value = '$last_sid' WHERE name = 'last_export_start'";
@mysql_query($sql);

// open stdout
$handle = fopen("php://output", "w");

$list = array();

$today = date('n/j/Y');
$list[] = "Date Added" . "@@@" . "Site Group" . "@@@" . "Seed URL" . "@@@" . "Frequency" . "@@@" . "Scope" . "@@@" . "Notes"; 

foreach ($seeds as $seed) {
  $line = $today . "@@@" . $seed->category . "@@@" . $seed->url . "@@@" . $seed->frequency . "@@@" . $seed->scope . "@@@" . "seed ID: " . $seed->sid;
  $list[] = $line;
}

 // output headers
 header("Content-type: text/csv");
 header('Content-Disposition: attachment; filename="seeds_' . $today . '.csv"');

foreach ($list as $line) {
  fputcsv($handle, split('@@@', $line));
}

?>