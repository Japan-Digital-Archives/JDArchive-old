<?php

require_once(dirname(__FILE__). '/inc/common.php');

$internal = false;
$language = language();

$message = false;

// self-submitted form, so check $_POST
if (isset($_POST['url']) && isset($_POST['title'])) {

  $url = $_POST['url'];
  $title = $_POST['title'];
  $description = isset($_POST['description']) ? $_POST['description'] : '';
  $frequency = isset($_POST['frequency']) ? $_POST['frequency'] : '';
  $scope = isset($_POST['scope']) ? $_POST['scope'] : '';
  $category = isset($_POST['category']) ? $_POST['category'] : '';
  $language = isset($_POST['language']) ? implode(',', $_POST['language']) : '';
  $name = isset($_POST['name']) ? $_POST['name'] : '';
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $tags = isset($_POST['tags']) ? $_POST['tags'] : '';
  
  // new fields!
  $location = isset($_POST['location']) ? $_POST['location'] : '';
  $lat = isset($_POST['lat']) ? $_POST['lat'] : '';
  $lng = isset($_POST['lng']) ? $_POST['lng'] : '';
  
  $verified = isset($_POST['verified']) ? $_POST['verified'] : '';
  $sid = isset($_GET['sid']) ? $_GET['sid'] : 0;
  
  $data = compact('sid', 'url', 'title', 'description', 'frequency', 'scope', 'category', 'language', 'name', 'email', 'tags', 'verified', 'location', 'lat', 'lng');
  
  if ($url && $title) {
    edit_seed($data);
  }
}

$backurl = '/curate/';
if (isset($_GET['f']) && isset($_GET['p'])) {
  $backurl .= "?f={$_GET['f']}&p={$_GET['p']}";
} else if (isset($_GET['s']) && isset($_GET['p'])) {
  $backurl .= "?s={$_GET['s']}&p={$_GET['p']}";
} else if (isset($_GET['t']) && isset($_GET['p'])) {
  $backurl .= "?t={$_GET['t']}&p={$_GET['p']}";
} else if (isset($_GET['t'])) {
  $backurl .= "?t={$_GET['t']}";
} else if (isset($_GET['f'])) {
  $backurl .= "?f={$_GET['f']}";
} else if (isset($_GET['s'])) {
  $backurl .= "?s={$_GET['s']}";
} else if (isset($_GET['p'])) {
  $backurl .= "?p={$_GET['p']}";
}

start();

?>

<p><a href="<?php echo $backurl; ?>">&laquo; Back to All Seeds</a></p>

<div>
<div style="float:right;"><a href="" id="editme" onload="editme(); return false;" onclick="editme(); return false;">Edit Information</a></div>
<div><h2>Edit Submission</h2></div>
</div>



<?php


require(dirname(__FILE__) . '/inc/templates/form.php');
?>
<script type="text/javascript">
$(document).ready(editme);
</script>

<?php
stop('_edit');
