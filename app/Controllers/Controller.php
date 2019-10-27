<?php

namespace App\Controllers;

class Controller {

  protected $name = '';

  public function index() {

  }

  public function detail($id) {
    
  }

  public function store($data) {

  }

  public function destroy($id) {

  }

  public function update($id, $data) {

  }

  protected function getViewHtml() {
    return [
      'index' => './templates/' . $this->name . '/index.php',
      'detail' => './templates/' . $this->name . '/detail.php',
    ];
  }
}
