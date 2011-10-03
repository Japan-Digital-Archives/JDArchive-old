<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Digital Archive of Japan's 2011 Disasters</title>
<meta name="keywords" content="digital archive japan 2011 earthquake tsunami aftermath reischauer institute harvard" />
<meta name="description" content="Digital Archive of the Japan 2011 Earthquake and Aftermath" />
<link href="/lib/style.css" rel="stylesheet" type="text/css" media="screen" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<!-- required stylesheet for TextboxList --> 
<link rel="stylesheet" href="/lib/TextboxList/TextboxList.css" type="text/css" media="screen" charset="utf-8" /> 
<!-- required stylesheet for TextboxList.Autocomplete --> 
<link rel="stylesheet" href="/lib/TextboxList/TextboxList.Autocomplete.css" type="text/css" media="screen" charset="utf-8" /> 

<!-- required for TextboxList --> 
<script src="/lib/TextboxList/GrowingInput.js" type="text/javascript" charset="utf-8"></script> 
    
<script src="/lib/TextboxList/TextboxList.js" type="text/javascript" charset="utf-8"></script>
<script src="/lib/TextboxList/TextboxList.Autocomplete.js" type="text/javascript" charset="utf-8"></script> 
<!-- required for TextboxList.Autocomplete if method set to 'binary' --> 
<script src="/lib/TextboxList/TextboxList.Autocomplete.Binary.js" type="text/javascript" charset="utf-8"></script>

<script src="/lib/search.js" type="text/javascript" charset="utf-8"></script>
<script src="/lib/jquery.watermark.min.js" type="text/javascript" charset="utf-8"></script>


<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

<script type="text/javascript">

var lang = "<?php echo language(); ?>";

$(function(){
   var href = $('#jdarchive_logo').attr('href');
  // populate with correct language

  if (lang == 'ja') {
    $('[data-jp]').each(function() {
      $(this).text($(this).attr('data-jp'));
    });
    
    // fix the urls
	$('#jdarchive_logo').attr('href', href+'?la=ja');
    $('a[data-jp]').each(function() {
      var href = $(this).attr('href');
      $(this).attr('href', href + '?la=ja');
    });
  } else if (lang == 'ko') {
    $('[data-ko]').each(function() {
      $(this).text($(this).attr('data-ko'));
    });
    // fix the logo
    $('#logo').css('background-image', 'url(http://jdarchive.org/lib/images/logo5.png)'); 
    // fix the urls
	$('#jdarchive_logo').attr('href', href+'?la=ko');
    $('a[data-ko]').each(function() {
      var href = $(this).attr('href');
      $(this).attr('href', href + '?la=ko');
    });
  } else if (lang == 'en') {
    // fix the logo
    $('#logo').css('background-image', 'url(http://jdarchive.org/lib/images/logo5.png)');  
    // fix the urls
	$('#jdarchive_logo').attr('href', href+'?la=en');
    $('a[data-en]').each(function() {
      var href = $(this).attr('href');
      $(this).attr('href', href + '?la=en');
    });
  } else if (lang == 'zh') {
	    $('[data-zh]').each(function() {
	      $(this).text($(this).attr('data-zh'));
	    });
		// fix the logo
    	$('#logo').css('background-image', 'url(http://jdarchive.org/lib/images/logo5.png)'); 
	    // fix the urls
		$('#jdarchive_logo').attr('href', href+'?la=zh');
	    $('a[data-zh]').each(function() {
	      var href = $(this).attr('href');
	      $(this).attr('href', href + '?la=zh');
	    });
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
<div id="wrapper">
  <div id="wrapper-bgtop">
    <div id="header">
      <div id="logo">
        <a id="jdarchive_logo" href="/"><h1><span style="display:none;">Digital Archive</span></h1></a>
       </div>
      <!-- end #logo -->
      <div id="menu">
        <ul>
          <li><a href="/" class="first" data-en="About" data-jp="当企画について" data-zh="关于我们" data-ko="소개 ">About</a></li>
          <li class="current_page_item"><a href="/contribute/" data-en="Contribute" data-zh="投稿方法" data-jp="投稿方法" data-ko="제출">Contribute</a></li>
          <li class="current_page_item"><a href="/testimonial/" data-en="Testimonial" data-zh="我的“日本东北大地震”" data-ko="개인체험수기" data-jp="わたしの「東日本大震災」">Testimonial</a></li>
          <li class="current_page_item"><a href="/news/" data-en="News" data-zh="最新消息" data-ko="뉴스" data-jp="News">News</a></li>
          <li class="last"><a href="/contact/" data-en="Contact" data-jp="お問い合わせ" data-zh="联系我们" data-ko="운영자에게">Contact</a></li>
        </ul>
      </div>
    </div>
    <!-- end #header -->
    <!-- end #header-wrapper -->
    <div id="page">
      <div id="contentwide">