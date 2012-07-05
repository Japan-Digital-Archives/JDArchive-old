<?php

// This is a simple API created in response to SaveMLAK request to have ability to confirm whether or not a given link has
// been submitted to our seed database. - Konrad

//NOTE: This only finds *exact matches* - I think we should add another command, 
//perhaps "c=similar" allowing outsiders to find similar urls and returns them in an array.

$u = isset($_GET['u']) ? $_GET['u'] : false; //The url to supply for the command
$c = isset($_GET['c']) ? $_GET['c'] : false; //The command 

require_once('inc/common.php');


if(!$c) {
	echo "ERROR: No request command found.\n";
} 

if (!$u) {
	echo "ERROR: No request parameter found.\n";
	exit;
} 



//This script only supports a 'url' command, otherwise return error

switch($c)
      {
	  //URL CHECK COMMAND
	  // USAGE: jdarchive.org/check/url/[address to check]
	  // RETURNS: JSON of the information we have for the url or the fact it does not exist
	  // NOTE: URLs must be HTML encoded with urlencode() or similar, or else URLs with "?" or "&" will not be found
      case 'url' :
                echo getinfo($u);   
                break;
  
      default:
                echo "ERROR: The '$command' command is not supported.\n";
                  break;
      }
      

function getinfo($url) {
	
	if($url==""){
		echo "ERROR: No url was supplied.";
		return;
	}
	
	//$url=html_entity_decode($url,ENT_QUOTES,'UTF-8');
	
	$urlquery= "SELECT * FROM `seeds` WHERE `url` LIKE '".$url."'";
	
	$numresults=mysql_query($urlquery);
	$numrows=mysql_num_rows($numresults);
	
	//Prepare the array for JSON encoding
	if($numrows>0){
		$row=mysql_fetch_array($numresults);
		$response = array(
		  "found" => 1,
		  "title" => $row["title"],
		  "url" => $row["url"],
		  "id" => $row["sid"],
		  "frequency" => $row["frequency"],
		  "scope" => $row["scope"],
		  "submitter" => $row["name"],
		  "added" => $row["added"],
		  "archived" => $row["isArchived"]
		);

	} else {
		$response = array(
			"found" => 0
		);
	}
	
	return json_encode($response);
	
}