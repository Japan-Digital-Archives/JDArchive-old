<?php

require_once(dirname(__FILE__). '/inc/common.php');

if (!isset($_GET['id']) || !isset($_GET['new'])) {
  header("Location: /tags/");
}

$id = $_GET['id'];
$new = $_GET['new'];

edit_tag($id, $new);

header("Location: /tags/");

?>