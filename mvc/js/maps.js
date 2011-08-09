/////////////////////////////////////////////////////////////////////////////////////////////////
// JA_Marker

// Class methods/variables
JA_Marker = $.extend(
    function JA_Marker(map, latlng) {
        this.initialize(map, latlng);
    }, 

    {
        count: 0,
        all: [],

        getSouthWest: function() 
        {
            var lat = 90, lng = 180;
            $.each(JA_Marker.all, function(i, mark) {
                mark = mark.getPosition();
                if (mark.lat() < lat) {
                    lat = mark.lat();
                }
                if (mark.lng() < lng) {
                    lng = mark.lng();
                }
                
            });
            return new google.maps.LatLng(lat, lng);
        },
        
        getNorthEast: function() 
        {
            var lat = -90, lng = -180;
            $.each(JA_Marker.all, function(i, mark) {
                mark = mark.getPosition();
                if (mark.lat() > lat) {
                    lat = mark.lat();
                }
                if (mark.lng() > lng) {
                    lng = mark.lng();
                }
            });
            return new google.maps.LatLng(lat, lng);
        },
        
        getBounds: function() 
        {
            return new google.maps.LatLngBounds(this.getSouthWest(), this.getNorthEast());
        },
        
        latest: function() {
            return JA_Marker.all[JA_Marker.all.length - 1];
        },
        
        showAll: function() {
            if (this.count == 1) {
                JA_Map.instance.map.panTo(this.latest().getPosition());
            } 
            if (this.count > 1) {
                JA_Map.instance.map.fitBounds(this.getBounds());
            }
        }
    }
);

// Instance variables + inherit from google.maps.Marker
$.extend(
    JA_Marker.prototype,
    new google.maps.Marker(),
    {
        /**
         * Constructor
         */
        initialize: function(map, latlng) 
        {
            this.index = JA_Marker.count++;
            JA_Marker.all[this.index] = this;
            
            this.setPosition(latlng);
            this.setDraggable(JA.readonly ? false : true);
            this.setIcon(new google.maps.MarkerImage(this.iconUrl()));
            this.setMap(map);
            this.addToPage();

            this.updateHtml();
            google.maps.event.addListener(
                this,
                'dragend',
                this.updateHtml
            );
            
            $('#ja_marker_' + this.index + ' img, #ja_marker_' + this.index + ' .panTo').click(function(e) {
                idx = parseInt($(this).parent().attr('rel'));
                marker = JA_Marker.all[idx];
                marker.getMap().panTo(marker.getPosition());
                e.preventDefault();
            });
            
            $('#location_list .remove').click(function(e) {
                idx = parseInt($(this).parent().attr('rel'));
                marker = JA_Marker.all[idx];
                $('#ja_marker_' + $(this).parent().attr('rel')).remove();
                marker.setMap(null);
                e.preventDefault();
            });
        },

        iconUrl: function()
        {
            return '/mvc/img/markers/red_' + String.fromCharCode(65 + this.index) + '.png';
        },

        toStr: function() 
        {
            return '' + Math.round(this.getPosition().lat()*10000)/10000 + ', ' + Math.round(this.getPosition().lng()*10000)/10000;
        },

        addToPage: function()
        {
            $('#location_list').append('<li id="ja_marker_' + this.index + '" rel="' + this.index + '" >\
<img src="' + this.iconUrl() + '" /> \
<' + (JA.readonly ? 'span' : 'input') + ' type="text" class="location_name" name="location_name[' + this.index + ']" value="" /> \
<span class="panTo caption" href="#"></span> \
' + (JA.readonly ? '' : '<a class="remove" href="#">(' + JA.t('remove_location') + ')</a> ') + '\
<input type="hidden" class="lat" name="lat[' + this.index + ']" value="" /> \
<input type="hidden" class="lng" name="lng[' + this.index + ']" value="" /> \
</li>');
        },
        
        updateHtml: function() 
        {
            this.setCaption(this.toStr());
            latlng = this.getPosition();
            lat = latlng.lat();
            lng = latlng.lng();
            $('#ja_marker_' + this.index + ' .lat').attr('value', lat);
            $('#ja_marker_' + this.index + ' .lng').attr('value', lng);
        },

        setCaption: function(caption)
        {
            $('#ja_marker_' + this.index + ' .caption').html('(' + caption + ')');
        },

        setName: function(name)
        {
            if (JA.readonly) {
                $('#ja_marker_' + this.index + ' .location_name').html(name);
            } else {
                $('#ja_marker_' + this.index + ' .location_name').attr('value', name);
            }
        },
        
        makeVisible: function() {
            this.getMap().panTo(this.getPosition());
        }
    }
);

////////////////////////////////////////////////////////////////////////////////
// JA_Image_Marker
function JA_Image_Marker(map, latlng, image_id) {
    this.initialize(map, latlng, image_id);
}

$.extend(
        JA_Image_Marker.prototype,
        JA_Marker.prototype,
        {
            initialize: function(map, latlng, image_id) 
            {
                this.image_id = image_id;
                this.index = JA_Marker.count++;
                JA_Marker.all[this.index] = this;
                
                this.setPosition(latlng);
                this.setDraggable(JA.readonly ? false : true);
                this.setIcon(new google.maps.MarkerImage(this.iconUrl()));
                this.setMap(map);
                this.addToPage();
    
                this.updateHtml();
                google.maps.event.addListener(
                    this,
                    'dragend',
                    this.updateHtml
                );
                
                /*
                
                $('#ja_marker_' + this.index + ' img, #ja_marker_' + this.index + ' .panTo').click(function(e) {
                    idx = parseInt($(this).parent().attr('rel'));
                    marker = JA_Marker.all[idx];
                    marker.getMap().panTo(marker.getPosition());
                    e.preventDefault();
                });
                
                $('#location_list .remove').click(function(e) {
                    idx = parseInt($(this).parent().attr('rel'));
                    marker = JA_Marker.all[idx];
                    $('#ja_marker_' + $(this).parent().attr('rel')).remove();
                    marker.setMap(null);
                    e.preventDefault();
                });
                */
            },
            iconUrl: function()
            {
                return '/mvc/img/markers/green_' + String.fromCharCode(65 + this.index) + '.png';
            },
            addToPage: function()
            {
                $('#' + this.image_id + ' .marker_info').html('<div class="image_marker" id="ja_marker_' + this.index + '" rel="' + this.index + '" >' +
                        '<img src="' + this.iconUrl() + '" />' +
                        '<span class="caption" href="#"></span>' +
                        '</div>');
            },
            updateHtml: function() 
            {
                this.setCaption(this.toStr());
                latlng = this.getPosition();
                lat = latlng.lat();
                lng = latlng.lng();
                $('#' + this.image_id + ' .lat').attr('value', lat);
                $('#' + this.image_id + ' .lng').attr('value', lng);
            }
        }
);

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
    };

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
        mapTypeId: type,
        size: new google.maps.Size(520,300)
    };
    this.map = new google.maps.Map(document.getElementById(id), this.options);
    this.geocoder = new google.maps.Geocoder();
    
    if (!JA.readonly) {
        this.addButton = new JA_Button(this.map);
    }
}

JA_Map.prototype = {
    showAddress: function(address) {
        geocoderRequest = {
            address: address
        };
        var self = this;
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
                if (!self.marker) {
                    var marker = self.createMarker(map, map.getCenter());
                }
                marker.setName(address);
            }
        );
    },
    createMarker: function(map, center) {
        return new JA_Marker(map, center);
    }
};

$(document).ready(function() {
    JA_Map.instance = new JA_Map(38.268215, 140.869356, 5, 'map_canvas', google.maps.MapTypeId.ROADMAP);

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

    JA_Marker.showAll();
});

JA.setImageLocation = function(id) {
    if (typeof JA.images == 'undefined') {
        JA.images=[];        
    }
    if (JA.images[id]) { 
        var marker = JA.images[id];
        var image_id = id;
        var geocoderRequest = {
            address: $('#image_address_' + id).attr('value')
        };
        JA_Map.instance.geocoder.geocode(
            geocoderRequest,
            function(result, status) {
                if (status != 'OK') {
                    alert(JA.t('google_could_not_find_address'));
                    return;
                }
                var latlng = result[0].geometry.location;
                JA.images[id].setPosition(latlng);
                
                JA.images[id].updateHtml();
                JA.images[id].makeVisible();
            }
        );
    } else {
        var image_id = id;
        var geocoderRequest = {
            address: $('#image_address_' + id).attr('value')
        };
        JA_Map.instance.geocoder.geocode(
            geocoderRequest,
            function(result, status) {
                if (status != 'OK') {
                    alert(JA.t('google_could_not_find_address'));
                    return;
                }
                var latlng = result[0].geometry.location;
                var marker = new JA_Image_Marker(JA_Map.instance.map, latlng, 'image_location_' + image_id);
                JA.images[image_id] = marker;
                
                JA.images[id].updateHtml();
                JA.images[id].makeVisible();
            }
        );
    }
    return false;
};
