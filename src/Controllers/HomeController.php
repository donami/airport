<?php
namespace Src\Controllers;

class HomeController extends \Src\Library\Controller {
  public function index($request, $response, $args)
  {
    return $this->view->render($response, 'index.html', []);
  }
}
