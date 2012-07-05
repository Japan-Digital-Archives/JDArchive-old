<?php

// This is a simple API created in response to SaveMLAK request to have ability to confirm whether or not a given link has
// been submitted to our seed database. - Konrad

// .htaccess has been set to allow for /command/parameter/parameter structured URIs
// simplify the resulting info:

require_once('../inc/common.php');

$requestURI = explode('/', $_SERVER['REQUEST_URI']);
$scriptName = explode('/',$_SERVER['SCRIPT_NAME']);
 
for($i= 0;$i < sizeof($scriptName);$i++)
        {
      if ($requestURI[$i]     == $scriptName[$i])
              {
                unset($requestURI[$i]);
            }
      }
 
$query = array_values($requestURI);

//There should be one command and one parameter

if(!$query[0]) {
	echo "ERROR: No request command found.\n";
} else {
	$command=$query[0];
}

if (count($query)<2) {
	echo "ERROR: No request parameter found.\n";
	exit;
} 



//This script only supports a 'url' command, otherwise return error

switch($command)
      {
	  //URL CHECK COMMAND
	  // USAGE: jdarchive.org/check/url/[address to check]
	  // RETURNS: JSON of the information we have for the url or the fact it does not exist
      case 'url' :
                //collapse all parameters that follow, assume it is all one url
                $url=$query;
                //exclude the command, the rest will be the url
                unset($url[0]);
                $url=implode("/",$url);
                getinfo($url);   
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
	
	$urlquery= "SELECT * FROM `seeds` WHERE `url` LIKE '".$url."' LIMIT 1";
	
	$numresults=mysql_query($query);
	$numrows=mysql_num_rows($numresults);
	
	if($numrows>0){
		echo "FOUND";
	} else {
		echo "NOT FOUND";
	}
	
}