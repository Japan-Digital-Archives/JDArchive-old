<?php

// self-submitted form, so check $_POST
if (isset($_POST['field']) && isset($_POST['term'])) {

  

  $field = $_POST['field'];
  $term = $_POST['term'];

  if($field=="url") {
  $query = "SELECT * FROM `seeds` WHERE `".$field."` LIKE '".$term."%' LIMIT 400";
} else {
	$query = "SELECT * FROM `seeds` WHERE `".$field."` LIKE '%".$term."%' LIMIT 400";
}


	$numresults=mysql_query($query);
	$numrows=mysql_num_rows($numresults);
  /*
  $data = compact('url', 'title', 'description', 'frequency', 'scope', 'category', 'language', 'name', 'email', 'tags', 'verified', 'location', 'lat', 'lng');
  
  if ($url && $title) {
    add_seed($data);
    
    // currently, all additions will fakely be successes
    $message = true;
  } */
} else {
	// echo "No search terms received.";
}

?>