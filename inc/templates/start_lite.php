<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://www.w3.org/2005/10/profile">
<link rel="icon" 
      type="image/png" 
      href="/lib/images/favicon-white.png" /><meta http-equiv="content-type" content="text/html; charset=utf-8" />
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

<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

<script type="text/javascript">

$(function(){
  // populate with correct language
  if (lang == 'ja') {
    $('[data-jp]').each(function() {
      $(this).text($(this).attr('data-jp'));
    });
    
    // fix the urls
    $('a[data-jp]').each(function() {
      var href = $(this).attr('href');
      $(this).attr('href', href + '?la=ja');
    });
  } else if (lang == 'ko') {
    $('[data-ko]').each(function() {
      $(this).text($(this).attr('data-ko'));
    });
    
    // fix the urls
    $('a[data-ko]').each(function() {
      var href = $(this).attr('href');
      $(this).attr('href', href + '?la=ko');
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
