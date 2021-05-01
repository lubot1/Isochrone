<?php
include "./Views/Components/header.php";
include "config.php";
?>

<script
  src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
  integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
  crossorigin="anonymous">
</script>
<script src="./js/maps.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1iQJm4S8GybM8MysZdPXvERLs6cFpCtk&callback=initMap&libraries=geometry" defer></script>

<link rel="stylesheet" href="./Stylesheets/map.css">

<h1>Isochrone</h1>
<form action="" method="post" name="isochroneControl">
    <label for="City" class="sr-only">City</label>
    <input type="text" name="City" id="CityInput" placeholder="City">
    <label for="DepartureTime" class="sr-only">Departure Time</label>
    <input type="time" name="DepartureTime" id="" placeholder="Departure Time">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Mobility method</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01">
            <option selected value="publicTransit">Public Transit</option>
            <option value="walk">Walking</option>
            <option value="car">Car</option>
            <option value="cycling">Cycling</option>
        </select>
    </div>
    <input type="submit" value="Search" name="submit" class="btn btn-success">
</form>
<div id="map"></div>