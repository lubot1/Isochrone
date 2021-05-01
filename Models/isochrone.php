<?php
class DistanceTimeRequest {
    private $coordinates;
    private $mode;
    private $timeRange;

    public function __construct($coordinates,$mode, $timeRange) {
        $this->coordinates = $coordinates;
        $this->mode = $mode;
        $this->timeRange = $timeRange;
    }

    public function getIsoPoints() {
        // GET request for geoapify API
        $baseURL = "https://api.geoapify.com/v1/isoline";
        $lat = "lat=".$this->coordinates->lat;
        $lng = "&lon=".$this->coordinates->lng;
        $mode = "&mode=".$this->mode;
        $type = "&type=time";
        $range = "&range=".$this->timeRange;
        $ApiKey = "&apiKey=".getenv('API_KEY');

        $request = $baseURL."?".$lat.$lng.$mode.$type.$range.$ApiKey;

        // POSTMAN rocks!
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $request,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        // CURLOPT_HTTPHEADER => array(
        //     'Cookie: __cfduid=d472e16553cac5c583b11cda905f0e4361619898057'
        // ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
}
?>