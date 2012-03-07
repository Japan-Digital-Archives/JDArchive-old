<?php

// Zend library include path
set_include_path(get_include_path() . PATH_SEPARATOR . "/lib/ZendGdata-1.8.1/library");
 
include_once("lib/Google_Spreadsheet/Google_Spreadsheet.php");
 
$u = "admin@jdarchive.org";
$p = "edwin2011";
 
$ss = new Google_Spreadsheet($u,$p);
$ss->useSpreadsheet("prototype applicants");


$name = $_POST["name"];
$email = $_POST["email"];

  
$row = array
(
    "name" => $name
    , "email" => $email
);
 
if ($ss->addRow($row)) echo "Thank you for registering";
else echo "Error: Unable to Submit";
 
?>