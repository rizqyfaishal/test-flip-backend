<?php 

namespace App\Services;

use App\Utils\HttpRequest;


class Flip {


  public function __construct($serviceConfig) {

    $this->serviceBaseURL = $serviceConfig['services']['flip']['base_url'];
    $this->serviceSecretKey = $serviceConfig['services']['flip']['secret_key'];

    $this->serviceHeaders = array(
      "Content-Type: application/x-www-form-urlencoded",
      "Authorization: Basic " . base64_encode($this->serviceSecretKey . ':')
    );
    
  }

  public function createDisbursement($requestData) {
    $url = $this->serviceBaseURL . '/disburse';
    $response = HttpRequest::post($url, $requestData, $this->serviceHeaders);
    return json_decode($response);
  }

  public function getDisbursementData($transactionId) {
    $url = $this->serviceBaseURL . '/disburse/' . $transactionId;
    $response = HttpRequest::get($url, $this->serviceHeaders);
    return json_decode($response);
  }
}
