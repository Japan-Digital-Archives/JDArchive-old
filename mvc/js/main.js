/////////////////////////////////////////////////////////////////////////////////////////////////
// JA_Marker

function JA_Marker(map, latlng) {
    this.initialize(map, latlng);
}
JA_Marker.prototype = new google.maps.Marker();
JA_Marker.count = 0;
JA_Marker.all = [];
JA_Marker.getSouthWest = function() 
{
    var lat = 90, lng = 180;
    $.each(JA_Marker.all, function(i, mark) {
        mark = mark.getPosition();
        if (mark.lat() < lat) {
            lat = mark.lat()
        }
        if (mark.lng() < lng) {
            lng = mark.lng()
        }
        
    });
    return new google.maps.LatLng(lat, lng);
}

JA_Marker.getNorthEast = function() 
{
    var lat = -90, lng = -180;
    $.each(JA_Marker.all, function(i, mark) {
        mark = mark.getPosition();
        if (mark.lat() > lat) {
            lat = mark.lat()
        }
        if (mark.lng() > lng) {
            lng = mark.lng()
        }
    });
    return new google.maps.LatLng(lat, lng);
}

JA_Marker.getBounds = function() 
{
    return new google.maps.LatLngBounds(this.getSouthWest(), this.getNorthEast());
}

JA_Marker.latest = function() {
    return JA_Marker.all[JA_Marker.all.length - 1];
}

JA_Marker.prototype.initialize = function(map, latlng) 
{
    this.index = JA_Marker.count++;
    JA_Marker.all[this.index] = this;
    
    this.setPosition(latlng);
    this.setDraggable(true);
    this.setIcon(new google.maps.MarkerImage(this.iconUrl()));
    this.setMap(map);
    $('#location_list').append('<li id="ja_marker_' + this.index + '" rel="' + this.index + '" >\
<img src="' + this.iconUrl() + '" /> \
<a class="panTo caption" href="#"></a> \
<a class="remove" href="#">(remove)</a> \
<input type="hidden" class="lat" name="lat[' + this.index + ']" value="" /> \
<input type="hidden" class="lng" name="lng[' + this.index + ']" value="" /> \
</li>');

    this.updateHtml();
    google.maps.event.addListener(
        this,
        'dragend',
        this.updateHtml
    );

    $('#ja_marker_' + this.index + ' img, #ja_marker_' + this.index + ' .panTo').click(function() {
        idx = parseInt($(this).parent().attr('rel'));
        marker = JA_Marker.all[idx]
        marker.getMap().panTo(marker.getPosition());
        return false;
    });

    $('#location_list .remove').click(function() {
        idx = parseInt($(this).parent().attr('rel'));
        marker = JA_Marker.all[idx]
        $('#ja_marker_' + $(this).parent().attr('rel')).remove();
        marker.setMap(null);
        return false;
    })
}

JA_Marker.prototype.iconUrl = function()
{
    return '/mvc/img/markers/orange_' + String.fromCharCode(65 + this.index) + '.png';
}

JA_Marker.prototype.toString = function() 
{
    return Math.round(this.getPosition().lat()*10000)/10000 + ', ' + Math.round(this.getPosition().lng()*10000)/10000;
}

JA_Marker.prototype.updateHtml = function() 
{
    this.setCaption(this.toString());
    latlng = this.getPosition();
    lat = latlng.lat();
    lng = latlng.lng();
    $('#ja_marker_' + this.index + ' .lat').attr('value', lat);
    $('#ja_marker_' + this.index + ' .lng').attr('value', lng);
}

JA_Marker.prototype.setCaption = function(caption)
{
    $('#ja_marker_' + this.index + ' .caption').html(caption);
}

/////////////////////////////////////////////////////////////////////////////////////////////////
// JA_Button

function JA_Button(map) {
    this.button = document.createElement("div");
    this.button.innerHTML = "+ Add location";

    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(this.button);

    this.setButtonStyle_ = function(button) {
        $(button).attr('style', '\
            color: #0000cc;\
            background-color: #fff;\
            font-family: "Trebuchet MS", Helvetica, Arial, sans-serif;\
            font-size: 15px;\
            padding: 1px;\
            margin-top: 5px;\
            text-align: center;\
            width: 10em;\
            cursor: pointer;\
            border-radius: 8px;\
            -webkit-border-radius: 8px;\
            -moz-border-radius: 8px;\
            border: 1px solid black;'
        );
    }

    this.setButtonStyle_(this.button);
};

/////////////////////////////////////////////////////////////////////////////////////////////////
// JA_Map


function JA_Map(lat, lng, zoom, id, type) 
{
    this.latlng = new google.maps.LatLng(lat, lng);
    this.options = {
        zoom: zoom,
        center: this.latlng,
        mapTypeId: type
    };
    this.map = new google.maps.Map(document.getElementById(id), this.options);
    this.geocoder = new google.maps.Geocoder();

    this.addButton = new JA_Button(this.map);

    this.showAddress = function(address) {
        geocoderRequest = {
            address: address
        };
        var map = this.map;
        var marker = this.marker;
        this.geocoder.geocode(
            geocoderRequest,
            function(result, status) {
                if (status != 'OK') {
                    alert('Google could not locate this address. '+status);
                    return;
                }
                var latlng = result[0].geometry.location;
                map.setCenter(latlng);
                var marker = new JA_Marker(map, map.getCenter());
                marker.setCaption(address);
            }
        );
    }

}


$(document).ready(function() {
    JA_Map.instance = new JA_Map(38.268215, 140.869356, 8, 'map_canvas', google.maps.MapTypeId.ROADMAP);

    $(JA_Map.instance.addButton.button).click(function() {
        new JA_Marker(JA_Map.instance.map, JA_Map.instance.map.getCenter());
    });

    $('#geocode_button').click(function() {
        JA_Map.instance.showAddress($('#address').val());
    });

    $('input#address').bind("keypress", function(e) {
        if (e.keyCode == 13) {
            JA_Map.instance.showAddress($('#address').val());
            return false;
        }
    });

    if (typeof JA.lat == 'object') {
        $.each(JA.lat, function(idx, val) {        
            latlng = new google.maps.LatLng(parseFloat(val), parseFloat(JA.lng[idx]));
            new JA_Marker(JA_Map.instance.map, latlng);
        });
    }

    if (JA_Marker.count == 1) {
        JA_Map.instance.map.panTo(JA_Marker.latest().getPosition());
    } 
    if (JA_Marker.count > 1) {
        JA_Map.instance.map.fitBounds(JA_Marker.getBounds());
    }

    $('#delete_dialog').dialog(
        {
            autoOpen: false,
            width: 400,
            modal: true,
            resizable: false,
            buttons: {
                "Delete submission": function() {
                    window.location.href = $('a.delete_link').attr('href');
                },
                "Cancel": function() {
                    $('#delete_dialog').dialog('close');
                }
            }
        }
    );

    $('a.delete_link').click(function() {
        $('#delete_dialog').dialog('open');
        return false;
    })
});
