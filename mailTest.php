<?php
$to = "ebensing@bensing-webdesigns.com";
$subject = "Test mail";
$message = "Hello! This is a simple email message.";
$from = "ej@jdarchive.org";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
echo "Mail Sent.";
?> 
