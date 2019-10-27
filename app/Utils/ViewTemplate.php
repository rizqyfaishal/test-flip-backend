<?php 
namespace App\Utils;


class ViewTemplate {

  private $filename;
  private $args;

  public function __construct($filename, $args) {
    $this->filename = $filename;
    $this->args = $args;
  }

  public function render() {

    if(!file_exists($this->filename)) {
      return 'Error ' . $this->filename . ' did not exists';
    }

    if(is_array($this->args)) {
      extract($this->args);
    }
    
    ob_start();
      include $this->filename;
    return ob_get_clean();
  }


}
