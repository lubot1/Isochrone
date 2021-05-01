<?php
require_once "../Models/isochrone.php";
include "../config.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// Example request to /Api/getIsoShape.php
// {"coords": {"lat": 43.64538993070304, "lng": -79.38089475089429}, "selectedTime": "2021-04-26T15:17:34+0000"}
$data = json_decode(file_get_contents("php://input"));

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
        var_dump($dataOut);
    }
}
else {
    http_response_code(400);
    echo(json_encode(array("message"=>"Missing data")));
}
?>