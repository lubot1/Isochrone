function initMap() {
  var data;
  var newLayer;
  var city;
  var mode;
  var range;

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