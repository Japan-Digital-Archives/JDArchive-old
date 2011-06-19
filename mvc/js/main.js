
var lang = 'en';//"<?php echo language(); ?>";

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
    
    // fix the urls
	$('#jdarchive_logo').attr('href', href+'?la=ko');
    $('a[data-ko]').each(function() {
      var href = $(this).attr('href');
      $(this).attr('href', href + '?la=ko');
    });
  } else if (lang == 'zh') {
	    $('[data-zh]').each(function() {
	      $(this).text($(this).attr('data-zh'));
	    });

	    // fix the urls
		$('#jdarchive_logo').attr('href', href+'?la=zh');
	    $('a[data-zh]').each(function() {
	      var href = $(this).attr('href');
	      $(this).attr('href', href + '?la=zh');
	    });
	  }
});