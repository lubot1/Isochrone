<?php 
require_once "./Models/isochrone.php";
// $coords->lat = 43.64538993070304;
// $coords->lng = -79.38089475089429;
// $today = "\"".date("c")."\"";

//$isoBounds = new DistanceTimeRequest($coords,$today);
//$data = $isoBounds->getIsoPoints();
?>

<script>
function initMap() {
  var data;
  // var data = $data;
  map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: 43.64538993070304, lng: -79.38089475089429 },
      zoom: 8,
    });

    map.addListener("click", (res) => {
      data = res.latLng.toJSON();
      console.log(data);
      map.panTo(res.latLng);
      map.setZoom(8);
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
</script>