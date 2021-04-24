<?php 
include "./Views/Components/header.php";
require_once "./Models/isochrone.php";

//$json = file_get_contents('./keys.json');
//$keysInfo = json_decode($json);
$keysInfo = ["APP_ID" => getenv("APP_ID"), "API_KEY" => getenv("API_KEY")];
var_dump(getenv("APP_ID"));
$isoBounds = new DistanceTimeRequest($keysInfo);
$isoBounds->getIsoPoints();

?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1iQJm4S8GybM8MysZdPXvERLs6cFpCtk&callback=initMap&libraries=geometry" defer></script>
<script src="./js/maps.js"></script>
<link rel="stylesheet" href="./Stylesheets/map.css">

<h1>Test</h1>
<div id="map"></div>