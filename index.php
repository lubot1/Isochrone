<?php 
include "./Views/Components/header.php";
require_once "./Models/isochrone.php";

$isoBounds = new DistanceTimeRequest($keysInfo);
$data = json_decode($isoBounds->getIsoPoints());
?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1iQJm4S8GybM8MysZdPXvERLs6cFpCtk&callback=initMap&libraries=geometry" defer></script>
<script src="./js/maps.js"></script>
<link rel="stylesheet" href="./Stylesheets/map.css">

<h1>Test</h1>
<div id="map"></div>