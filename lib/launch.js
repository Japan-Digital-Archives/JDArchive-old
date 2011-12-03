/* Javascript for launch page
 * Dec 1, 2011
 * Enables dynamic reloading of languages on launch page
 */
 
function initJp() {
	// change background
    $('#links').css('background-image', 'url(../lib/images/tab_bg_jp.png)');
	
	// change text in explore button
	document.getElementById("explore").innerHTML = 
	'<a href="../explore/?la=ja">\
		<div class="homebuttonblack">\
	 		<p class="japanesetitle txtwhite">現在の<br/>アーカイブ</p>\
	 	</div>\
	</a>';
	
	// change text in new button
	document.getElementById('new').innerHTML = 
	'<a href="../new/?la=ja">\
		<div class="homebuttonwhite">\
			<p class="japanesetitle txtgrey">これからの<br />アーカイブ</p>\
		</div>\
	</a>';

}

function initEn() {
	// change bg
	$('#links').css('background-image', 'url(../lib/images/tab_bg_en.png)');
	
	// change text in explore
	document.getElementById("explore").innerHTML = 
	'<a href="../explore/?la=en">\
		<div class="homebuttonblack">\
	 		<p class="englishtitle txtwhite">Explore the<br/>Archive Now</p>\
	 	</div>\
	</a>';
	
	// change text in new
	document.getElementById("new").innerHTML = 
	'<a href="../new/?la=en">\
		<div class="homebuttonwhite">\
			<p class="englishtitle txtgrey">The Archive<br/> We Are Building</p>\
		</div>\
	</a>';
}
