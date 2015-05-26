jQuery(function() {

    var marker_added = false;

    jQuery(document).ready(function(){
        var geocoder = new window.google.maps.Geocoder();
        
        
        for (var entry in wpgmaps_localize) {
            google.maps.event.addListener(MYMAP[entry].map, 'rightclick', function(event) {
            if (marker_added === false) {
                
                var marker = new google.maps.Marker({
                    position: event.latLng, 
                    map: MYMAP[entry].map
                });
                marker.setDraggable(true);
                google.maps.event.addListener(marker, 'dragend', function(event) { 
                    jQuery("#wpgmza_ugm_add_address").val(event.latLng.lat()+','+event.latLng.lng());
                } );
                jQuery("#wpgmza_ugm_add_address").val(event.latLng.lat()+', '+event.latLng.lng());
                marker_added = true;
            }
//            
//            jQuery("#wpgm_notice_message_save_marker").show();
//            setTimeout(function() {
//                jQuery("#wpgm_notice_message_save_marker").fadeOut('slow')
//            }, 3000);

        });


        }
        
        
        
        jQuery('#wpgmza_ugm_addmarker').click(function(){
            form = document.forms['wpgmaps_ugm'];
            var isChecked = jQuery('#wpgmza_ugm_spm:checked').val()?true:false;
            if (!isChecked) { alert(vgm_human_error_string); return; }

            jQuery('#wpgmza_ugm_addmarker').hide();
            jQuery('#wpgmza_ugm_addmarker_loading').show();
            var wpgm_address = '0';
            if (document.getElementsByName('wpgmza_ugm_add_address').length > 0) { wpgm_address = jQuery('#wpgmza_ugm_add_address').val(); }

            /* first check if user has added a GPS co-ordinate */
            checker = wpgm_address.split(",");
            var wpgm_lat = "";
            var wpgm_lng = "";
            wpgm_lat = checker[0];
            wpgm_lng = checker[1];
            checker1 = parseFloat(checker[0]);
            checker2 = parseFloat(checker[1]);
            if ((wpgm_lat.match(/[a-zA-Z]/g) === null && wpgm_lng.match(/[a-zA-Z]/g) === null) && checker.length === 2 && (checker1 != NaN && (checker1 <= 90 || checker1 >= -90)) && (checker2 != NaN && (checker2 <= 90 || checker2 >= -90))) {
                jQuery("#wpgmza_ugm_lat").val(wpgm_lat);
                jQuery("#wpgmza_ugm_lng").val(wpgm_lng);
                form.submit();
                return true;
                
            } else {            
                geocoder.geocode( { 'address': wpgm_address}, function(results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        wpgm_gps = String(results[0].geometry.location);
                        var latlng1 = wpgm_gps.replace('(','');
                        var latlng2 = latlng1.replace(')','');
                        var latlngStr = latlng2.split(',',2);
                        var wpgm_lat = parseFloat(latlngStr[0]);
                        var wpgm_lng = parseFloat(latlngStr[1]);

                        jQuery("#wpgmza_ugm_lat").val(wpgm_lat);
                        jQuery("#wpgmza_ugm_lng").val(wpgm_lng);




                        form.submit();
                        return true;

                    } else {
                        alert('The address you used could not be geocoded. Please use another address: ' + status);
                                jQuery('#wpgmza_ugm_addmarker').show();
                                jQuery('#wpgmza_ugm_addmarker_loading').hide();
                                return false;
                                }
                });
            }
        });

    });
});
