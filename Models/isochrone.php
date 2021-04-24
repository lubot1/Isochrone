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
        $this->AppId = $keysInfo->APP_ID;
        $this->ApiKey = $keysInfo->API_KEY;

        $this->header = array(
            "Host: api.traveltimeapp.com",
            "Content-Type: application/json",
            "Accept: application/json",
            "X-Application-Id: ".$this->AppId,
            "X-Api-Key: ".$this->ApiKey
        );
        var_dump($this->header);
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
                    "departure_time" => "2021-04-24T08:00:00Z",
                    "travel_time" => 900
                )
            )
        );
    }
    public function getIsoPoints() {
        $c = curl_init();
        curl_setopt($c,CURLOPT_URL,$this->url);
        curl_setopt($c,CURLOPT_HTTPHEADER,$this->header);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, json_encode($this->postFields));
        curl_setopt($c, CURLOPT_SSLVERSION, 6);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
        $result = json_decode(curl_exec($c));
        curl_close($c);

        var_dump($result);
    }
}
?>