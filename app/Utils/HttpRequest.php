<?php 

namespace App\Utils;

class HttpRequest {

  static function post($url, $data, $optionalHeaders) {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $optionalHeaders);
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
  }

  static function get($url,  $optionalHeaders) {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $optionalHeaders);
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
  }
}
