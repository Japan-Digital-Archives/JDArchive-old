<?php

require_once(dirname(__FILE__). '/inc/common.php');

require(dirname(__FILE__) . '/inc/templates/search_process.php');

start();

?>

<div>
<div><h2>Quick Search</h2></div>
</div>

<?php


require(dirname(__FILE__) . '/inc/templates/searchform.php');

if (isset($term)) {
	if($term=="") {
		?><p>You did not enter any search term. A full listing of seeds is not supported.</p>
		<?php
	} else {
		?>
		<div>
			<h2>Results</h2>
			<p><strong>Search:</strong> <?php echo $term; ?><br />
			<strong>Hits:</strong> <?php 
				echo $numrows; 
				if ($numrows>399) {
					echo " (400 limit reached)";
				}
				?><p>
			
			<?php if($numrows>0) {
				echo "<p>";
				$count=1;
				// now you can display the results returned
				  while ($row=mysql_fetch_array($numresults)) {
					  $title = $row["title"];
					  $zurl = $row["url"];
					  $zid = $row["sid"];
					  $frequency = $row["frequency"];
					  $scope = $row["scope"];
					  $name = $row["name"];
					  $added = $row["added"];
					  $isArchived = $row["isArchived"];
					  if ($isArchived==1) {
	  						$archived="Yes";
	  				  } else {
	  				  	$archived="No";
	  				  }
				
					  echo("<p>".$count.")&nbsp;<strong><a href=\"http://www.jdarchive.org/edit/?sid=$zid\">$title</a></strong> <br />");
					  echo("<p>Name: ".$name." Frequency: ".$frequency." Scope: ".$scope." Archived: ".$archived);
					  echo("<a href=\"$zurl\">$zurl</a></p>");
					  $count++ ;
					  }
				
			
				?>
				</p>
				<?php
			} else {
				echo "<br />";
			} ?>
				</div>
			<?php 
	}
}



stop(4);