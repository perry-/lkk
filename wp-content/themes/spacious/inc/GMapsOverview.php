

    <style>
      html, body, #map-canvas {
        margin: 0px;
        padding: 0px
      }
      .controls {
        margin-top: 16px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
     <script>
// This example adds a search box to a map, using the Google Place Autocomplete
// feature. People can enter geographical searches. The search box will return a
// pick list containing a mix of places and predicted search terms.

function initialize() {

    var myVariable = <?php echo(json_encode($kodePlaces)); ?>;


  var map = new google.maps.Map(document.getElementById('map-canvas'), {
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

  var defaultBounds = new google.maps.LatLngBounds(
      new google.maps.LatLng(70.0000, 4.1759),
      new google.maps.LatLng(58.532423, 28.2631));
  map.fitBounds(defaultBounds);

 
 
  // [END region_getplaces]
        //document.write(myVariable[0].name);
        var arrayLength = myVariable.length;
        var bounds = new google.maps.LatLngBounds();
    for (index = 0; index < arrayLength; ++index) {

      var pos = new google.maps.LatLng(myVariable[index].lat, myVariable[index].long); 
        new google.maps.Marker({
            position: pos,
            map: map,
            title: myVariable[index].name
        });
        bounds.extend(new google.maps.LatLng(myVariable[index].lat, myVariable[index].long));
    }




}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>

    
    <div id="map-canvas"></div>
