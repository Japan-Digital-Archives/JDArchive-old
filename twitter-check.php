<?php
require_once(dirname(__FILE__). '/inc/common.php');

/* Twitter collection stat page
 * Just an internal page to check our 'tweets' db status
 */

// total number of tweets
$result = mysql_query("SELECT COUNT(tweetId) FROM tweets");
$total = mysql_result($result, 0);

// last tweet time and date
$result = mysql_query("SELECT * FROM tweets ORDER BY tweetId DESC LIMIT 1");
$row = mysql_fetch_array($result);

$date = $row["added"];

start();
?>
<div><h2>Twitter Database Status</h2></div>

<div>
<table>
	<tr>
		<td>Tweets:</td>
		<td><? echo $total; ?></td>
	</tr>
	<tr>
		<td>Last Tweet:</td>
		<td><? echo $date; ?></td>
	</tr>
</table>
</div>


<?php

stop('9');
