<?php
namespace Src\Library;

class Controller {
  public function __construct($container)
  {
    $this->db = $container->get('db');
    $this->flash = $container->get('flash');
    $this->view = $container->get('view');
    $this->router = $container->get('router');
  }
}
