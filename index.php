<?php
header("Cache-Control: must-revalidate, max-age=600");
header("Vary: Accept-Encoding");
require_once(dirname(__FILE__). '/inc/common.php');
require_once(dirname(__FILE__). '/inc/templates/head.php');
//test
//$language = language();

?>
<link href="/lib/launch2.css" rel="stylesheet" type="text/css" media="screen" />

<div id="outerbox">
<table>
<tr>
<td>
	<div class="homebuttonblack">
		<a href="../explore/?la=en">
		<div class="buttontextright">
	 		<h2 style="color:white;">Explore the<br/>Archive Now</h2>
	 	</div>
	 	</a>
	</div>
</td>
<td>
		<div class="homelogoleft">
	   		<img src="lib/images/logo120.png">
		</div>	
</td>
</tr>
<tr>
<td>
	<div class="homebuttonwhite">
		<a href="../new/?la=en">
	 	<div class="buttontextleft">
			<h2 style="text-align:center; color:2E2E2E;">The Archive<br/> We Are Building</h2>
		</div>
		</a>
	</div>
</td>
<td>
	<div class="homebuttonblack">
		<a href="../explore/?la=ja">
		<div class="buttontextright">
	 		<h2 style="color:white;">ここまでの<br/>アーカイブ</h2>
	 	</div>
		</a>
	</div>
</td>
</tr>
<tr>
<td>
	<div class="buttonblack">
		<div style="margin: 25px 0 0 50px;">
	   		<img src="lib/images/logo5.png">
		</div>
	</div>
</td>
<td>
	<div class="homebuttonwhite">
		<a href="../new/?la=ja">
		<div class="buttontextright">
			<h2 style="color:2E2E2E;">これからの<br />アーカイブ</h2>
		</div>
		</a>
	</div>
</td>
</tr>
</table>

</div>
<div id="footer">
    <div class="footerleft">
    <img src="lib/images/logo-trans.png">
    </div>
    <p><a href="http://www.fas.harvard.edu/~rijs/"><img src="/lib/images/reisch_logo.png" style="margin-top:2px; border:none;" /></a></p>
</div>


