function initMap() {
  var holesArray = [];
  var shellArray = [];

  map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: 43.64538993070304, lng: -79.38089475089429 },
      zoom: 8,
    });

    map.addListener("click", (res) => {
      holesArray.forEach(element => {
        element.setMap(null);
      });
      shellArray.forEach(element => {
        element.setMap(null);
      });

      var currTime = new Date(Date.now());

      var location = res.latLng.toJSON();

      var data = {
        coordinates: location,
        mode: "transit",
        timeRange: 300,
      };
      $.post("../Api/getIsoShape.php",JSON.stringify(data),function (response, status) {
        //response is an array of shapes to draw on the map
        // response.forEach(shapeObject => {

        //   var hole = new google.maps.Polygon({
        //     paths: shapeObject.hole,
        //     strokeColor: "#FF0000",
        //     strokeOpacity: 0.8,
        //     strokeWeight: 2,
        //     fillColor: "#FF0000",
        //     fillOpacity: 0,
        //     map: map,
        //   });
        //   holesArray.push(hole);

        //   var shell = new google.maps.Polygon({
        //     paths: shapeObject.shell,
        //     strokeColor: "#FF0000",
        //     strokeOpacity: 0.8,
        //     strokeWeight: 2,
        //     fillColor: "#FF0000",
        //     fillOpacity: 0.35,
        //     map: map,
        //   });
        //   shellArray.push(hole);
        // });
        console.log(response);

      });
      map.panTo(res.latLng);
    });
}