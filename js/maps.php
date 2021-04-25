<?php 
require_once "./Models/isochrone.php";
$coords = array("lat"=>43.64538993070304,"lng"=>-79.38089475089429);
$today = "\"".date("c")."\"";
$isoBounds = new DistanceTimeRequest($coords,$today);
$data = $isoBounds->getIsoPoints();
?>
<script>
function initMap() {
  var data = <?= $data ?>;
  const isoShell = data.results[0].shapes[0].shell;
  //Initialize new map object
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 43.64538993070304, lng: -79.38089475089429 },
    zoom: 4,
  });
  const isoBorders = new google.maps.Polygon({
    paths: isoShell,
    strokeColor: "#FF0000",
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: "#FF0000",
    fillOpacity: 0.35,
  });
  isoBorders.setMap(map);
  //Created using the events sample at https://developers.google.com/maps/documentation/javascript/events#maps_event_simple-javascript
  // map.addListener("click", (e) => {
  //   new google.maps.Marker({
  //     position: e.latLng,
  //     map: map
  //   });
  //   map.panTo(e.latLng)
  //   map.setZoom(8);
  // });
}
</script>