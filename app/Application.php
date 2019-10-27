<?php

namespace App;

use App\Database;
use App\Middlewares\BasicAuthTokenMiddleware;


/**
 * 
 */
class Application
{
  private static $instance = null;
  protected $middlewares = [
    
  ];

  protected $commands = [

  ];

  public $router = [];

  public $config = [];

  public $database = NULL;

  public function __construct() {
    $this->collectConfig();
    $this->connectDatabaseServer();
    $this->router = require_once('./routes/web.php');

    // Registering Middleware
    $this->middlewares = [ new BasicAuthTokenMiddleware() ];
  }

  public function httpMiddlewares($headers, $body) {
    $verdict = true;
    foreach ($this->middlewares as $middleware) {
      if(!$middleware->handle($headers, $body, self::$instance)) {
        return false;
      } 
    }
    return true;
  }

  public function startConsumeRequest($server, $headers, $body) {
    $url = $server["REQUEST_URI"];
    $method = $server["REQUEST_METHOD"];
    foreach ($this->router->routes as $routes) {
      $regexUrl = $routes['regex'];
      preg_match($regexUrl, $url, $matches);
      if(count($matches) > 0 && $routes['method'] == $method) {
        $objectController =  new $routes['class'];
        switch ($routes['function']) {
          case 'index':
            return $objectController->index();
          case 'store':
            return $objectController->store($body);
          case 'detail':
            $id = $matches[1];
            return $objectController->detail($id);
          case 'update':
            $id = $matches[1];
            return $objectController->update($id, $body);
          case 'destroy':
            return $objectController->destroy();
        }
      }
    }

    header("HTTP/1.0 404 Not Found");
    return print('404 - Not found');
  }

  private function connectDatabaseServer() {
    try {
      $database = new Database($this->config['database']);
      $this->database = $database;
    } catch(Exception $e) {
      print($e);
    }
  }


  public static function getInstance() {
    if(is_null(self::$instance)) {
      self::$instance = new Application();
    }


    return self::$instance;
  }

  private function collectConfig() {
    $databaseConfig = require_once('./config/database.php');
    $appConfig      = require_once('./config/app.php');
    $authConfig     = require_once('./config/auth.php');
    $serviceConfig  = require_once('./config/services.php');

    $this->config = array_merge($this->config, $databaseConfig, $appConfig, $authConfig, $serviceConfig);
  }


}
