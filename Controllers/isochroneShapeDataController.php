<?php
require_once "../Models/isochrone.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->coords) && !empty($data->selectedTime)) {
    $isoBounds = new DistanceTimeRequest($data->coords,$data->selectedTime);
    $dataOut = $isoBounds->getIsoPoints();
    if (true) {
        # code...
    }
}
?>