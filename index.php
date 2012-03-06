<?php
header("Cache-Control: must-revalidate, max-age=600");
header("Vary: Accept-Encoding");
require_once(dirname(__FILE__). '/inc/common.php');
require_once(dirname(__FILE__). '/inc/templates/head.php');

?>
<link href="/lib/launch.css" rel="stylesheet" type="text/css" media="screen" />
<script src="http://code.jquery.com/jquery-latest.js"></script>

<div id="outerbox">
<table id="links">
<tr>
<td>
	<div id="homelogoboxjp" onClick="initJp();">
		<div class="logolarge">
	   		<img class="japaneselogo" src="lib/images/logo_large_ja.png">
		</div>
	</div>
</td>
<td id="explore">
	<a href="../explore/?la=ja">
		<div class="homebuttonblack">
	 		<p class="japanesetitle txtwhite">現在の<br/>アーカイブ</p>
	 	</div>
	</a>
</td>
</tr>
<tr>
<td>
	<div id="homelogoboxen" onClick="initEn();">
		<div class="logolarge">
	   		<img class="englishlogo" src="lib/images/logo_large_w.png">
		</div>
	</div>
</td>
<td id="new" style="padding-bottom: 25px">
	<a href="../new/?la=ja">
		<div class="homebuttonwhite">
			<p class="japanesetitle txtgrey">これからの<br />アーカイブ</p>
		</div>
	</a>
</td>
</tr>
</table>
<script charset="utf-8" src="/lib/launch.js" type="text/javascript"></script>


</div>
<div id="footer-bgcontent">
  <div id="footer">
    <div class="footerleft">
    <a href="http://twitter.com/#!/jdarchive"><img style="padding-top:4px" src="/lib/images/t.png"></a> <br />
    <a href="https://www.facebook.com/pages/Digital-Archive-of-Japans-2011-Disasters/143040332434759"><img src="/lib/images/f.png"></a>
    </div>
    <p><a href="http://www.fas.harvard.edu/~rijs/"><img src="/lib/images/reisch_logo.png" style="margin-top:2px; border:none;" /></a></p>
</div>

