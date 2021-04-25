<?php 
require_once "./Models/isochrone.php";
$coords = array("lat"=>43.64538993070304,"lng"=>-79.38089475089429);
$today = "\"".date("c")."\"";
$isoBounds = new DistanceTimeRequest($coords,$today);
$data = $isoBounds->getIsoPoints();
?>
<script>
function initMap() {
  var data = <?= $data ?>
  console.log(data);
  //Initialize new map object
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 0, lng: 0 },
    zoom: 1,
  });
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