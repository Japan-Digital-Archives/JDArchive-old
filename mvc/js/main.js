var map;
var geocoder;
var marker;

function initializeMap() {
  var latlng = new google.maps.LatLng(38.268215,140.869356);
  var myOptions = {
    zoom: 8,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById("map_canvas"),
      myOptions);
  
  geocoder = new google.maps.Geocoder();
  
  marker = new google.maps.Marker({
    position: latlng, 
    map: map, 
  });
  
  marker.setDraggable(true);
  google.maps.event.addListener(
    marker,
    'dragend',
    function() {
      var newpos = marker.getPosition();
      $('#latlng').html(newpos.toString());
      $('#lat').val(newpos.lat());
      $('#lng').val(newpos.lng());
    });
}

$(document).ready(function(){
    initializeMap();
});

/*
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
});*/