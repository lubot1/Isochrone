<?php 
require_once "./Models/isochrone.php";
$coords->lat = 43.64538993070304;
$coords->lng = -79.38089475089429;
$today = "\"".date("c")."\"";

$isoBounds = new DistanceTimeRequest($coords,$today);
$data = $isoBounds->getIsoPoints();
?>

<script>
function initMap() {
  // TODO: Add an api to serve JSON data of shells and holes on click
  var data = <?= $data ?>;
  console.log(data);
  const isoShell = data.results[0].shapes[0].shell;
  //Initialize new map object
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 43.64538993070304, lng: -79.38089475089429 },
    zoom: 6,
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
}
</script>