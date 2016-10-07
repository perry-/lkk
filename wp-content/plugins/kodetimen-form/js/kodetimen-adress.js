jQuery(document).ready(function($) {
	var map = new google.maps.Map(document.getElementById('kodetimen_map'), {
	  zoom: 12
	});

	var defaultBounds = new google.maps.LatLngBounds(
		new google.maps.LatLng(70.0000, 4.1759),
		new google.maps.LatLng(58.532423, 28.2631));
	map.fitBounds(defaultBounds);

	//Array of input fields ID.
	var gacFields = ["school", "street_address"];
    var componentForm = {
      locality: 'long_name',
      administrative_area_level_1: 'short_name',
	  administrative_area_level_2: 'long_name',
      postal_code: 'short_name'
    };

    function fillInAddress(place) {
		document.getElementById('kodetimen_lat').value = place.geometry.location.lat();
		document.getElementById('kodetimen_long').value = place.geometry.location.lng();

		var location = {lat: place.geometry.location.lat(), lng: place.geometry.location.lng()};

	    var marker = new google.maps.Marker({
	      position: location,
	      map: map
	    });

		map.setCenter(location);
		map.setZoom(16);

		if ($.inArray('school', place.types) !== -1) {
			document.getElementById('school').value = place.name;
		}

		var route = "";
		var streetNumber = "";
      // Get each component of the address from the place details
      // and fill the corresponding field on the form.
      for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];

		if(addressType === "route") {
			route = place.address_components[i].long_name;
		}

		if(addressType === "street_number") {
			streetNumber = place.address_components[i].long_name;
		}

        if (componentForm[addressType]) {
			var val = place.address_components[i][componentForm[addressType]];

			if(addressType === "administrative_area_level_2"){
				document.getElementById("locality").value = val;
			} else {
				document.getElementById(addressType).value = val;
			}
        }
      }

	  document.getElementById("street_address").value = route + ' ' + streetNumber;
    }

	$.each( gacFields, function( key, field ) {
		var input = document.getElementById(field);

		//verify the field
		if ( input != null ) {

			//basic options of Google places API.
			//see this page https://developers.google.com/maps/documentation/javascript/places-autocomplete
			//for other avaliable options
			var options = {
  				componentRestrictions: {country: 'no'}
			};

			var autocomplete = new google.maps.places.Autocomplete(input, options);

			google.maps.event.addListener(autocomplete, 'place_changed', function(e) {
				var place = autocomplete.getPlace();
                fillInAddress(place);

				if (!place.geometry) {
					return;
				}
			});
		}
	});
});
