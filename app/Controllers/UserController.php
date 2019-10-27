<?php 

namespace App\Controllers;

use App\Controllers\Controller;
use App\Utils\ViewTemplate;

class UserController extends Controller {


  protected $name = 'users';

  public function index() {
    $view = $this->getViewHtml()['index'];
    $args = ['user' => 'Rizqy Faishal'];
    $viewTemplate = new ViewTemplate($view, $args);

    return print($viewTemplate->render());
  }
}
