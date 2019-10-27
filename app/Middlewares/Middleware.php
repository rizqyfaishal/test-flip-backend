<?php

namespace App\Middlewares;

use App\Application;


class Middleware {

  public function handle($headers, $body, $app) {
    return true;
  }
  
}
