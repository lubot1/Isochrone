<?php
require_once "../Models/isochrone.php";
include "../config.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// Example request to /Api/getIsoShape.php
// {"coordinates": {"lat": 43.64538993070304, "lng": -79.38089475089429}, "mode": "transit", "timeRange": 300}
$data = json_decode(file_get_contents("php://input"));

if (!empty($data->coordinates) && !empty($data->mode) && !empty($data->timeRange)) {
    $isoBounds = new DistanceTimeRequest($data->coordinates,$data->mode,$data->timeRange);
    
    $dataOut = $isoBounds->getIsoPoints();
    $dataOut = json_decode($dataOut);

    if (isset($dataOut->features->geometry)) {
        http_response_code(200);
        echo(json_encode($dataOut->features->geometry->coordinates));
    }
    else {
        http_response_code(503);
        echo(json_encode(array("message"=>"Something went wrong on our side")));
        var_dump(json_encode($dataOut));
    }
}
else {
    http_response_code(400);
    echo(json_encode(array("message"=>"Missing data")));
}
?>