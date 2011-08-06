<?php

require_once(dirname(__FILE__). '/inc/common.php');

if (isset($_POST['candidates'])) {

  $candidates = $_POST['candidates'];
  $partial = $_POST['partial'];
  
  } else {
	// echo "No search terms received.";
}

start('_newabout');

function checkDuplicates($urls,$wild) {

	global $found, $notfound;
	
	$found=array();
	$notfound=array();
	
	foreach($urls as $term) {
		if ($wild=="true") {
		 $addwild='%';
		} else {
		 $addwild='';
		}
		$query = "SELECT title,frequency,scope,sid,url FROM `seeds` WHERE `url` LIKE '%".trim($term).$addwild."' LIMIT 500";
	 	
		$numresults=mysql_query($query);
		$numrows=mysql_num_rows($numresults);

		if ($numrows>0) {
			while ($row=mysql_fetch_array($numresults)) {
				array_push($found,$row);
			}
			
		} else {
			array_push($notfound,$term);
		}
	
	
	} 
	


}

if (isset($candidates)) {
	
	$candidates_array=explode("\n",$candidates);
	
	if (count($candidates_array)>100) {
		$error="No more than 3 URLs may be checked at one time. You submitted ".count($candidates_array).".";
	} elseif ($candidates=='') {
		$error="You did not enter any URLs.";
	} else {
		checkDuplicates($candidates_array,$partial);
	}
		
}	

?>

<div>
<div><h2>Check Database for URLs</h2></div>
<p>Enter one or more links in the field below, one on each line (maximum 100). Pressing "Check for Duplicates" will then, for each link, check the JDArchive seed database to see if there is a match.</p>
</div>
<?php if (isset($error)): ?>
<div style="color:red;" id="error"><p><?php echo $error; ?></p></div>
<? endif ?>

<form id="form1" name="form1" method="post" action="">
  <p>
    <textarea name="candidates" id="candidates" cols="90" rows="10" wrap="off"><?php echo $candidates; ?></textarea>
  </p>
  <p>
  <input type="checkbox" name="partial" value="true"><strong> Partial Matches:</strong> Accept any number of characters after the end of the URL </p>
  <p style='color: #888;'>For example, in a partial match search, entering asahi.com will show all entries in the database with asahi.com somewhere in the URL. It already accepts partial matches to the left of the search term, so http://www.asahi.com and http://asahi.com will produce the same results as merely asahi.com. <strong>Note:</strong> A maximum of 500 items will be returned total.</p>
  <p>
    <input type="submit" name="submit"  id="submit" value="Check for Duplicates" />
  </p>
  
 <?php if (isset($found)): ?>
  <div id="searchresults">
  <h2>URLs Not Found in Database (<?php echo count($notfound); ?>)</h2>
  <p>
    <textarea name="notfound" id="notfound" cols="90" rows="10" wrap="off"><?php 
    
    foreach($notfound as $text) {
    	echo $text;
    }
    
     ?></textarea>
  </p>
  <h2>URLs Found in Database (<?php echo count($found); ?>)</h2><?php 
  
  $last_exported=last_exported_seed();
  
  $counter=0;
  
  foreach($found as $seed) { 
  		$counter++;
		echo "<p class='seed'><h3><strong>$counter. <a href='/edit/?sid=".$seed['sid']."'>".$seed['title']."</a></strong></h3>
		<a href='".$seed['url']." style='color: #888;'>".$seed['url']."</a><br />";
	
		if ($last_exported['sid']<$seed['sid']) {
			echo "<strong>Not Yet Submitted</strong>&nbsp;&nbsp;";
		} else {
			echo "<strong>Archived Copies: <a href='http://wayback.archive-it.org/2438/9/".$seed['url']."'>Most Recent</a> </strong> | <strong>
			<a href='http://wayback.archive-it.org/2438/20110301000000/".$seed['url']."'>Earliest</a> </strong>
			| <strong>
			<a href='http://wayback.archive-it.org/2438/*/".$seed['url']."'>All</a> &nbsp;&nbsp;";
		}
  		echo " Scope: </strong>".ucfirst($seed['scope'])." &nbsp;&nbsp;<strong>Frequency:</strong> ".ucfirst($seed['frequency'])."<br /> </p>";

  }
    
  ?>
  </div>
  <?php endif ?>
</form>


<?php 

stop(0);