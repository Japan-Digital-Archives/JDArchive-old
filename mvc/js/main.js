function JA_Location(lat, lng) 
{
    if (typeof JA_Location.count == 'undefined') {
        JA_Location.count = 0;
        JA_Location.all = [];
    }
    this.lat = lat;
    this.lng = lng;
    this.index = JA_Location.count++;
    JA_Location.all[this.index] = this;
    
    this.addToForm = function() {
        $('#location_list').append('<li>' + this.toString() + '<li>');
    }

    this.showLatLng = function() {
        $('#latlng').html(this.toString());
    }

    this.toString = function() {
        return Math.round(this.lat*10000)/10000 + ', ' + Math.round(this.lng*10000)/10000;
    }

    JA_Location.latest = function() {
        return JA_Location.all[JA_Location.all.length - 1];
    }
}

function JA_Map(lat, lng, zoom, id, type) 
{
    self = this;
    this.latlng = new google.maps.LatLng(lat, lng);
    this.options = {
        zoom: zoom,
        center: this.latlng,
        mapTypeId: type
    };
    this.map = new google.maps.Map(document.getElementById(id), this.options);
  
    this.geocoder = new google.maps.Geocoder();
  
    this.marker = new google.maps.Marker({
        position: this.latlng, 
        map: this.map, 
    });
  
    this.marker.setDraggable(true);

    this.onMoveMarker = function() {
        var newpos = self.marker.getPosition();
        loc = new JA_Location(newpos.lat(), newpos.lng());
        loc.showLatLng();
    }

    google.maps.event.addListener(
        this.marker,
        'dragend',
        this.onMoveMarker
    );

    this.showAddress = function(address) {
        geocoderRequest = {
            address: address
        };
        map = this.map;
        marker = this.marker;
        this.geocoder.geocode(
            geocoderRequest,
            function(result, status) {
                if (status != 'OK') {
                    alert('Google could not locate this address. '+status);
                    return;
                }
                latlng = result[0].geometry.location;
                map.setCenter(latlng);
                marker.setPosition(latlng);
                $('#latlng').html(latlng.toString());
            }
        );
    }

}





$(document).ready(function() {
    JA_Map.instance = new JA_Map(38.268215, 140.869356, 8, 'map_canvas', google.maps.MapTypeId.ROADMAP);

    $('#geocode_button').click(function() {
        JA_Map.instance.showAddress($('#address').val());
    });
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