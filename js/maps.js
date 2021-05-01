function initMap() {
  var data = {
    mode: 'drive',
    timeRange: 300
  };
  var newLayer;
  var city;
  var mode;
  var range;
  var geocoder = new google.maps.Geocoder();

  var control = document.forms.controls;
  var cityInput = control.city;
  var rangeInput = control.range;
  var modeInput = control.mode;
  var submit = control.submit;

  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 43.64538993070304, lng: -79.38089475089429 },
    zoom: 8,
  });

  control.onsubmit = function() {
    city = cityInput.value;
    mode = modeInput.value;
    range = rangeInput.value;

    geocoder.geocode({ 'address': city}, function(results, status) {
      if(status == 'OK') {
        console.log(results);
        map.panTo(results[0].geometry.location);
      }
    });

    data = {
      mode: mode,
      timeRange: range,
    };

    return false
  };

  map.addListener("click", (res) => {
    map.data.forEach((feature) => {
      map.data.remove(feature);
    });
    var location = res.latLng.toJSON();

    data.coordinates = location; 
    console.log(data);
    $.post("../Api/getIsoShape.php",JSON.stringify(data),function (response, status) {
      //response is an array of shapes to draw on the map
      newLayer = map.data.addGeoJson(response);
      map.data.setStyle({
        fillColor: 'blue',
        strokeWeight: 1,
      });
      console.log(map.data);

    });
    map.panTo(res.latLng);
  });

}