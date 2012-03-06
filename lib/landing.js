/* Javascript(JQuery) for new landing page (Zeega alpha)
 * Mar 6, 2012
 * Enables reloading of languages on launch page by clicking language button
 * Could definitely be more efficient, but this was quick
 */
 
 
 // change to English
$('#lang').click(function() {
	if ($(this).html() == 'English') {
	
		// change title
	    $('#title').html('<img src="/lib/images/header-en.png">');
		
		// change language bar
		$(this).html('日本語');
		
		// change text in register header
		$('#register-header').html('Register to use our archive prototype');
		
		// change archive links
		$("#archi-links").html( 
		'<ul>\
			<li id="l1"><a href="../explore/?la=en">\
				<button class="btn shadow archi">About the Archive</button>\
			</a></li>\
			<li id="l2"><a href="../search/?la=en">\
				<button class="btn shadow archi">Search the Website Archive</button>\
			</a></li>\
			<li id="l3"><a href="http://worldmap.harvard.edu/japanmap/">\
				<button class="btn shadow archi">Browse our Map Layers</button>\
			</a></li>\
			<li id="l4"><a href="../featured/?la=en">\
				<button class="btn shadow archi">Testimonials</button>\
			</a></li>\
		</ul>');
		
		// change form
		$('#name').html('Name');
		$('#email').html('Email');
		$('button#register-button').html('Register');
		
		// change logo
		$('#logo').html('<img class="japaneselogo" src="lib/images/logo_large_w.png">');
	}
	
	// change to Japanese
	else {
		// change title
		$('#title').html('<img src="/lib/images/header-jp.png">');
		
		// change language bar
		$(this).html('English');
		
		// change text in register header
		$('#register-header').html('試作モデル αlfa（要登録）');
		
		// change archive links
		$("#archi-links").html( 
		'<ul>\
			<li id="l1"><a href="../explore/?la=ja">\
				<button class="btn shadow archi">このアーカイブについて</button>\
			</a></li>\
			<li id="l2"><a href="../search/?la=ja">\
				<button class="btn shadow archi">ウェブ・アーカイブ検索</button>\
			</a></li>\
			<li id="l3"><a href="http://worldmap.harvard.edu/japanmap/">\
				<button class="btn shadow archi">震災情報レイヤー地図</button>\
			</a></li>\
			<li id="l4"><a href="../featured/?la=ja">\
				<button class="btn shadow archi">わたしの「東日本大震災」</button>\
			</a></li>\
		</ul>');
		
		// change form
		$('#name').html('お名前');
		$('#email').html('Eメール');
		$('button#register-button').html('新規登録');
		
		// change logo
		$('#logo').html('<img class="japaneselogo" src="lib/images/logo_large_ja.png">');
	}
});

// submit name and email data
$('button#register-button').click(function () {

});

