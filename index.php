<?php
include "./Views/Components/header.php";
include "config.php";
?>

<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script src="./js/maps.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1iQJm4S8GybM8MysZdPXvERLs6cFpCtk&callback=initMap&libraries=geometry" defer></script>

<link rel="stylesheet" href="./Stylesheets/map.css">

<h1>Isochrone</h1>
<form action="" method="post" name="controls" class="row gy-2 gx-3 align-items-center">
    <div class="col-auto">
        <label class="visually-hidden" for="city">City</label>
        <input type="text" class="form-control" id="city" name="city" placeholder="City">
    </div>
    <div class="col-auto">
        <label class="visually-hidden" for="range">Time Range</label>
        <div class="input-group">
            <div class="input-group-text">Range</div>
            <select class="form-select" id="range" name="range">
                <option value="300">5 min</option>
                <option value="600">10 min</option>
                <option value="1800">30 min</option>
            </select>
        </div>
    </div>
    <div class="col-auto">
        <label class="visually-hidden" for="mode">Mode</label>
        <div class="input-group">
            <div class="input-group-text">Mode</div>
            <select class="form-select" id="mode" name="mode">
                <option value="walk">Walk</option>
                <option value="bicycle">Cycle</option>
                <option value="approximated_transit">Transit</option>
                <option value="drive">Drive</option>
            </select>
        </div>
    </div>
    <div class="col-auto">
        <input type="submit" value="Submit" class="btn btn-success">
    </div>
</form>

<div id="map"></div>

<section id="features" class="d-flex flex-column justify-content-center align-items-center border-top">
    <h2>Features</h2>
    <blockquote class="shadow p-3 mb-5 bg-white rounded">
        <p class="mb-0">
        <em>Isochrone</em> - An imaginary line or a line on a chart connecting points at which an event occurs simultaneously or which represents the same time or time difference.
        </p>
        <cite title="Source"><a href="https://www.merriam-webster.com/dictionary/isochron">Merriam-Webster Dictionary</a></cite>
    </blockquote>
    <p>
        This deliverable for the API project allows users to click on the map anywhere and the page returns an isochrone map.
        An Isochrone map displays areas which can be travelled under the amount of time chosen in the range form input. Users can
        also choose which method of transportation to generate an isochrone map for.
    </p>
    <p>
        Some potential use cases of this project include real estate, Tourism, or corporate planning. Users can click on a location
        where they are interested in purchasing a home and see what businesses are located within a 15 minute walk, companies can use
        this website to determine how much of a metropolitan centre is covered by their locations. Users preparing for a trip can see 
        what restaurants are located near to the destination hotel.
    </p>
</section>