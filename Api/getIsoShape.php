<?php
require_once "../Models/isochrone.php";
include "../config.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));
echo(json_encode($data));
if (!empty($data->coords) && !empty($data->selectedTime)) {
    $isoBounds = new DistanceTimeRequest($data->coords,$data->selectedTime);
    $dataOut = $isoBounds->getIsoPoints();
    $dataOut = json_decode($dataOut);

    if (isset($dataOut->results)) {
        http_response_code(200);
        echo(json_encode($dataOut->results[0]->shapes));
    }
    else {
        http_response_code(503);
        echo(json_encode(array("message"=>"Something went wrong on our side")));
    }
}
else {
    http_response_code(400);
    echo(json_encode(array("message"=>"Missing data")));
}
?>