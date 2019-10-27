<?php 

namespace App\Controllers;

use App\Application;

use App\Controllers\Controller;
use App\Utils\ViewTemplate;

use App\Models\Disbursement;

use App\Services\Flip;

class DisburseController extends Controller {


  protected $name = 'disbursement';

  public function index() {
    $view = $this->getViewHtml()['index'];
    $disbursements = Disbursement::all();
    $args = ['title' => 'Disburesment', 'disbursements' => $disbursements];
    $viewTemplate = new ViewTemplate($view, $args);
    return print($viewTemplate->render());
  }

  public function store($data) {
    $app = Application::getInstance();

    $flip = new Flip($app->config);

    $response = (array) $flip->createDisbursement($data);
    
    $disbursement = new Disbursement();
    $disbursement->setData($response);
    if($disbursement->save()) {
      header("Location: /disbursements");
      return;
    } else {
      $view = $this->getViewHtml()['index'];
      $disbursements = Disbursement::all();
      $args = ['title' => 'Disburesment', 'disbursements' => $disbursements, 'error' => 'Something happen!'];
      $viewTemplate = new ViewTemplate($view, $args);
      return print($viewTemplate->render());
    }
  }

  public function detail($id) {
    $disbursement = Disbursement::find($id);
    if($disbursement) {
      $view = $this->getViewHtml()['detail'];
      $args = ['id' => $id, 'disbursement' => $disbursement];
      $viewTemplate = new ViewTemplate($view, $args);
      return print($viewTemplate->render());
    } else {
      header("HTTP/1.0 404 Not Found");
      return print('404 - Not found');
    }
  }

  public function update($id, $data) {
    $check = Disbursement::find($id);
    if($check) {
      $app = Application::getInstance();
      $flip = new Flip($app->config);
      $response = (array) $flip->getDisbursementData($id);
      $disbursement = new Disbursement();

      $dataToUpdate = [];
      $dataToUpdate['status'] = $response['status'];
      $dataToUpdate['receipt'] = $response['receipt'];
      $dataToUpdate['time_served'] = $response['time_served'];
      $dataToUpdate['id'] = $id;

      $disbursement->setData($dataToUpdate);

      if($disbursement->update()) {
        header("Location: /disbursements/" . $id);
        return;
      }
      return print('Error occured.');
    } else {
      header("HTTP/1.0 404 Not Found");
      return print('404 - Not found');
    }
  }

}
