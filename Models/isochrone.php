<?php
class DistanceTimeRequest {
    private $url = "https://api.traveltimeapp.com/v4/time-map";
    private $header;
    private $AppId;
    private $ApiKey;
    private $coordinates;
    private $selectedTime;
    private $postFields;

    public function __construct($keysInfo) {
        $this->AppId = $keysInfo["APP_ID"];
        $this->ApiKey = $keysInfo["API_KEY"];

        $this->header = array(
            //"Host: api.traveltimeapp.com",
            "Content-Type: application/json;charset=UTF-8",
            "Accept: application/json",
            "X-Application-Id: ".$this->AppId,
            "X-Api-Key: ".$this->ApiKey
        );
        //$this->coordinates = $coordinates;
        //$this->selectedTime = $selectedTime;
        $this->postFields = array(
            "departure-searches" => array(
                array(
                    "id" => "Public Transport",
                    "coords" => array(
                        "lat" => 51.507609,
                        "lng" => -0.128315
                    )
                ),
                array(
                    "transportation" => array(
                        "type" => "public_transport"
                    )
                ),
                array(
                    "departure_time" => "2021-04-24T14:00:00Z",
                    "travel_time" => 900
                )
                ),
            "arrival-searches" => array()
        );
    }
    public function getIsoPoints() {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.traveltimeapp.com/v4/time-map',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "departure_searches": [
                {
                    "id": "public transport from Trafalgar Square",
                    "coords": {
                        "lat": 51.507609,
                        "lng": -0.128315
                    },
                    "transportation": {
                        "type": "public_transport"
                    },
                    "departure_time": "2021-04-24T08:00:00Z",
                    "travel_time": 900
                }
            ],
            "arrival_searches": [
                {
                    "id": "public transport to Trafalgar Square",
                    "coords": {
                        "lat": 51.507609,
                        "lng": -0.128315
                    },
                    "transportation": {
                        "type": "public_transport"
                    },
                    "arrival_time": "2021-04-24T08:00:00Z",
                    "travel_time": 900,
                    "range": {
                        "enabled": true,
                        "width": 3600
                    }
                }
            ]
        }',
        CURLOPT_HTTPHEADER => array(
            'X-Api-Key: '.getenv("API_KEY"),
            'X-Application-Id: e84d498f'.getenv("APP_ID"),
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

    }
}
?>