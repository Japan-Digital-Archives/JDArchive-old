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
    
    new google.maps.Marker();
    this.setPosition(latlng);
    this.setDraggable(JA.readonly ? false : true);
    this.setIcon(new google.maps.MarkerImage(this.iconUrl()));
    this.setMap(map);
    $('#location_list').append('<li id="ja_marker_' + this.index + '" rel="' + this.index + '" >\
<img src="' + this.iconUrl() + '" /> \
<' + (JA.readonly ? 'span' : 'input') + ' type="text" class="location_name" name="location_name[' + this.index + ']" value="" /> \
<span class="panTo caption" href="#"></span> \
' + (JA.readonly ? '' : '<a class="remove" href="#">(' + JA.t('remove_location') + ')</a> ') + '\
<input type="hidden" class="lat" name="lat[' + this.index + ']" value="" /> \
<input type="hidden" class="lng" name="lng[' + this.index + ']" value="" /> \
</li>');

    this.updateHtml();
    google.maps.event.addListener(
        this,
        'dragend',
        this.updateHtml
    );

    $('#ja_marker_' + this.index + ' img, #ja_marker_' + this.index + ' .panTo').click(function(e) {
        idx = parseInt($(this).parent().attr('rel'));
        marker = JA_Marker.all[idx]
        marker.getMap().panTo(marker.getPosition());
        e.preventDefault();
    });

    $('#location_list .remove').click(function(e) {
        idx = parseInt($(this).parent().attr('rel'));
        marker = JA_Marker.all[idx]
        $('#ja_marker_' + $(this).parent().attr('rel')).remove();
        marker.setMap(null);
        e.preventDefault();
    })
}

JA_Marker.prototype.iconUrl = function()
{
    return '/mvc/img/markers/red_' + String.fromCharCode(65 + this.index) + '.png';
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
    $('#ja_marker_' + this.index + ' .caption').html('(' + caption + ')');
}

JA_Marker.prototype.setName = function(name)
{
    if (JA.readonly) {
        $('#ja_marker_' + this.index + ' .location_name').html(name);
    } else {
        $('#ja_marker_' + this.index + ' .location_name').attr('value', name);
    }
}

/////////////////////////////////////////////////////////////////////////////////////////////////
// JA_Button

function JA_Button(map) {
    this.button = document.createElement("div");
    this.button.innerHTML = JA.t('add_location');

    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(this.button);

    this.setButtonStyle_ = function(button) {
        $(button).attr('style', '\
            color: #44c;\
            background-color: #fff;\
            font-family: "Trebuchet MS", Helvetica, Arial, sans-serif;\
            font-size: 13px;\
            padding: 1px;\
            margin-top: 5px;\
            text-align: center;\
            width: 8em;\
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

    if (!JA.readonly) {
        this.addButton = new JA_Button(this.map);
    }

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
                    alert(JA.t('google_could_not_find_address'));
                    return;
                }
                var latlng = result[0].geometry.location;
                map.setCenter(latlng);
                var marker = new JA_Marker(map, map.getCenter());
                marker.setName(address);
            }
        );
    }

}


$(document).ready(function() {
    JA_Map.instance = new JA_Map(38.268215, 140.869356, 8, 'map_canvas', google.maps.MapTypeId.ROADMAP);

    if (!JA.readonly) {
        $(JA_Map.instance.addButton.button).click(function() {
            new JA_Marker(JA_Map.instance.map, JA_Map.instance.map.getCenter());
        });
    }

    $('#geocode_button').click(function() {
        JA_Map.instance.showAddress($('#address').val());
    });

    $('input#address').bind("keypress", function(e) {
        if (e.keyCode == 13) {
            JA_Map.instance.showAddress($('#address').val());
            e.preventDefault();
        }
    });

    // Prefill

    if (typeof JA.lat == 'object' & JA.lat != null) {
        $.each(JA.lat, function(idx, val) {        
            var latlng = new google.maps.LatLng(parseFloat(val), parseFloat(JA.lng[idx]));
            var marker = new JA_Marker(JA_Map.instance.map, latlng);
            marker.setName(JA.location_name[idx]);
        });
    }

    if (JA_Marker.count == 1) {
        JA_Map.instance.map.panTo(JA_Marker.latest().getPosition());
    } 
    if (JA_Marker.count > 1) {
        JA_Map.instance.map.fitBounds(JA_Marker.getBounds());
    }

    var buttonz = {}
    buttonz[JA.t('button_delete_submission')] = function() {
        window.location.href = $('.delete_link a').attr('href');
    };
    buttonz[JA.t('button_cancel')] = function() {
        $('#delete_dialog').dialog('close');
    }
    JA.buttons = buttonz;
    $('#delete_dialog').dialog(
        {
            autoOpen: false,
            width: 400,
            modal: true,
            resizable: false,
            buttons: buttonz
        }
    );

    $('.delete_link a').click(function(e) {
        $('#delete_dialog').dialog('open');
        e.preventDefault();
    })

    $('.testimonial-form .languagebar a').click(function(e) {
        $('#testimonial-form')
            .attr('action', $(this).attr('href'))
            .append('<input type="hidden" name="passthru" value="1" />');
        $('input[type="submit"]').click();
        e.preventDefault();
    })
});


//////////////////////////////////////////////////////////////////////////////////////////////
// i18n
JA.t = function(key) {
    if (JA.i18n[key]) {
        return JA.i18n[key];
    }
    if (typeof JA.i18n_missing == 'undefined') {
        JA.i18n_missing = [];
    }
    JA.i18n_missing[JA.i18n_missing.length] = key
    return key
}