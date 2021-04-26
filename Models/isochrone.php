<?php
class DistanceTimeRequest {
    private $coordinates;
    private $selectedTime;

    public function __construct($coordinates,$selectedTime) {
        $this->coordinates = $coordinates;
        $this->selectedTime = $selectedTime;
    }
    public function getIsoPoints() {
        // POSTMAN rocks!
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
                        "lat": '.$this->coordinates->lat.',
                        "lng": '.$this->coordinates->lng.'
                    },
                    "transportation": {
                        "type": "public_transport"
                    },
                    "departure_time": '.$this->selectedTime.',
                    "travel_time": 900
                }
            ]
        }',
        CURLOPT_HTTPHEADER => array(
            'X-Api-Key: '.getenv("API_KEY"),
            'X-Application-Id: '.getenv("APP_ID"),
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}
?>