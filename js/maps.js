function initMap() {
  // var data = $data;
  map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: 43.64538993070304, lng: -79.38089475089429 },
      zoom: 8,
    });

    map.addListener("click", (res) => {
      var currTime = new Date(Date.now());
      var location = res.latLng.toJSON();
      var data = {
        coords: location,
        selectedTime: currTime.toISOString()
      };
      console.log(data);
      $.post("../Api/getIsoShape.php",JSON.stringify(data),function (response, status) {
        console.log(response);
      });
      map.panTo(res.latLng);
    });

  // const isoShell = data.results[0].shapes[0].shell;
  // //Initialize new map object
  // const isoBorders = new google.maps.Polygon({
  //   paths: isoShell,
  //   strokeColor: "#FF0000",
  //   strokeOpacity: 0.8,
  //   strokeWeight: 2,
  //   fillColor: "#FF0000",
  //   fillOpacity: 0.35,
  // });
  // isoBorders.setMap(map);
}