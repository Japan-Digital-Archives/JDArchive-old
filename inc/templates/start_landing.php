<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--[if lt IE 9 ]>    <html xmlns="http://www.w3.org/1999/xhtml" class="ie8">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://www.w3.org/2005/10/profile">
<link rel="icon" 
      type="image/png" 
      href="lib/images/favicon-white.png" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Digital Archive of Japan's 2011 Disasters</title>
<meta name="keywords" content="digital archive japan 2011 earthquake tsunami aftermath reischauer institute harvard" />
<meta name="description" content="Digital Archive of the Japan 2011 Earthquake and Aftermath" />
<link href="lib/landing.css" rel="stylesheet" type="text/css" media="screen" />
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
<script charset="utf-8" src="lib/landing.js" type="text/javascript"></script>

<script type="text/javascript">

var lang = "<?php echo language(); ?>";

$(function(){
	// change to Japanese
	if (lang == 'ja') {
	  
		// change title
		$('#title').html('<img src="lib/images/header-jp.png">');
		
		// change text in register header
		$('#register-header').html('試作モデル αlpha（要登録）:');
		
		// change archive links
		$("#archi-links").html( 
		'<ul>\
			<li id="l1"><a href="../explore/?la=ja">\
				<div class="btn shadow archi">このアーカイブについて</div>\
			</a></li>\
			<li id="l2"><a href="../seeds/?la=ja">\
				<div class="btn shadow archi">ウェブ・アーカイブ検索</div>\
			</a></li>\
			<li id="l3"><a href="http://worldmap.harvard.edu/japanmap/">\
				<div class="btn shadow archi">震災情報レイヤー地図</div>\
			</a></li>\
			<li id="l4"><a href="../featured/?la=ja">\
				<div class="btn shadow archi">わたしの「東日本大震災」</div>\
			</a></li>\
		</ul>');
		
		// change form
		$('#name').html('お名前');
		$('#email').html('Eメール');
		$('input#l').attr('value', '日本語');
		$('input#register-button').attr('value', '新規登録');
		
		// change logo
		$('#logo').html('<img class="japaneselogo" src="lib/images/logo_large_ja.png">');
	}
	 // change to English
	else if (lang == 'en') {
		
		// change title
	    $('#title').html('<img src="lib/images/header-en.png">');

		// change text in register header
		$('#register-header').html('Register to use our archive prototype:');
		
		// change archive links
		$("#archi-links").html( 
		'<ul>\
			<li id="l1"><a href="../explore/?la=en">\
				<div class="btn shadow archi">About the Archive</div>\
			</a></li>\
			<li id="l2"><a href="../seeds/?la=en">\
				<div class="btn shadow archi">Search the Website Archive</div>\
			</a></li>\
			<li id="l3"><a href="http://worldmap.harvard.edu/japanmap/">\
				<div class="btn shadow archi">Browse our Map Layers</div>\
			</a></li>\
			<li id="l4"><a href="../featured/?la=en">\
				<div class="btn shadow archi">Testimonials</div>\
			</a></li>\
		</ul>');
		
		// change form
		$('#name').html('Name');
		$('#email').html('Email');
		$('input#l').attr('value', 'English');
		$('input#register-button').attr('value', 'Register');
		
		// change logo
		$('#logo').html('<img class="japaneselogo" src="lib/images/logo_large_w.png">');
	}
});

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22729281-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>

<body>

<div id="content">
