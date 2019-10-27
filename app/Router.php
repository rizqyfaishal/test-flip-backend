<?php

namespace App;

class Router {

  public $routes;

  public function __construct() {
    $this->routes = [];
  }

  public function get($urlRegex, $class,  $function) {
    array_push($this->routes, [ 'regex' => $urlRegex, 'method' => 'GET', 'class' => $class, 'function' => $function ]);
  }

  public function post($urlRegex, $class,  $function) {
    array_push($this->routes, [ 'regex' => $urlRegex, 'method' => 'POST', 'class' => $class, 'function' => $function ]);
  }

  public function patch($urlRegex, $class,  $function) {
    array_push($this->routes, [ 'regex' => $urlRegex, 'method' => 'POST', 'class' => $class, 'function' => $function ]);
  }

  public function delete($urlRegex, $class,  $function) {
    array_push($this->routes, [ 'regex' => $urlRegex, 'method' => 'DESTROY', 'class' => $class, 'function' => $function ]);
  }

  public function getDetail($urlRegex, $class,  $function) {
    array_push($this->routes, [ 'regex' => $urlRegex, 'method' => 'GET', 'class' => $class, 'function' => $function ]);
  }
  
}
