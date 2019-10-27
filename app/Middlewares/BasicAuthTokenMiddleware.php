<?php 

namespace App\Middlewares;

use App\Middlewares\Middleware;

class BasicAuthTokenMiddleware extends Middleware {

  public function handle($headers, $body, $app) {
    $AUTH_SECRET_KEY = $app->config['auth']['secret'];
    if(isset($headers['Authorization'])) {
      try {
        $key = explode(" ", $headers['Authorization'])[1];
        return $key == $AUTH_SECRET_KEY;
      } catch(Exception $e) {
        return false;
      }
    } else {
      return false;
    }
  }
}
