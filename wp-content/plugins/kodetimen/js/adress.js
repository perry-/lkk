jQuery(document).ready(function($) {
	//Array of input fields ID.
	var gacFields = ["autocomplete"];
    var componentForm = {
      street_number: 'short_name',
      route: 'long_name',
      locality: 'long_name',
      administrative_area_level_1: 'short_name',
      country: 'long_name',
      postal_code: 'short_name'
    };

    function fillInAddress(place) {

      for (var component in componentForm) {
        document.getElementById(component).value = '';
        document.getElementById(component).disabled = false;
      }

      // Get each component of the address from the place details
      // and fill the corresponding field on the form.
      for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
          var val = place.address_components[i][componentForm[addressType]];
          document.getElementById(addressType).value = val;
        }
      }
    }

	$.each( gacFields, function( key, field ) {
		var input = document.getElementById(field);

		//varify the field
		if ( input != null ) {

			//basic options of Google places API.
			//see this page https://developers.google.com/maps/documentation/javascript/places-autocomplete
			//for other avaliable options
			var options = {
				types: ['geocode'],
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
