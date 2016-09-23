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

    <script src=<?php echo SPACIOUS_JS_URL . '/markerclusterer.js'; ?>></script>

     <script>
// This example adds a search box to a map, using the Google Place Autocomplete
// feature. People can enter geographical searches. The search box will return a
// pick list containing a mix of places and predicted search terms.

function initialize() {

  var kodetimenList = <?php echo(json_encode($kodetimen_attendees)); ?>;

  var map = new google.maps.Map(document.getElementById('map-canvas'), {
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    minZoom: 4
  });

  var defaultBounds = new google.maps.LatLngBounds(
      new google.maps.LatLng(70.0000, 4.1759),
      new google.maps.LatLng(58.532423, 28.2631));
  map.fitBounds(defaultBounds);

  var infoWindow;

  function showInfo() {
    if(map.getZoom() < 8) {
      map.setZoom(8);
    }
    map.setCenter(this.getPosition());

    if(infoWindow) {
      infoWindow.close();
    }
    infoWindow = new google.maps.InfoWindow({
      content: this.contentString
    });

    infoWindow.open(map, this);
  }

  // [END region_getplaces]
        //document.write(kodetimenList[0].name);
  var arrayLength = kodetimenList.length;
  var bounds = new google.maps.LatLngBounds();
  var markers = [];

  for (index = 0; index < arrayLength; ++index) {
    var kodetimen = kodetimenList[index]
    if(isNaN(parseFloat(kodetimen.lat)) || !isFinite(kodetimen.lat)){
      continue;
    }
    if(isNaN(parseFloat(kodetimen.long)) || !isFinite(kodetimen.long)){
      continue;
    }
    var pos = new google.maps.LatLng(parseFloat(kodetimen.lat), parseFloat(kodetimen.long));
      var marker = new google.maps.Marker({
        position: pos,
        map: map,
        title: kodetimen.name,
        contentString: kodetimen.name
      });
      markers.push(marker);

    bounds.extend(new google.maps.LatLng(parseFloat(kodetimen.lat), parseFloat(kodetimen.long)));

    marker.addListener('click', showInfo);
  }

  var markerCluster = new MarkerClusterer(map, markers, {'imagePath': '../../wp-content/themes/spacious/images/m'});

  markerCluster.setGridSize(35);
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
    <div id="map-canvas"></div>
