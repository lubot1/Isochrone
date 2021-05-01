function initMap() {
  var newLayer

  map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: 43.64538993070304, lng: -79.38089475089429 },
      zoom: 8,
    });

    map.addListener("click", (res) => {
      map.data.remove(newLayer);
      var location = res.latLng.toJSON();

      var data = {
        coordinates: location,
        mode: "approximated_transit",
        timeRange: 1800,
      };
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