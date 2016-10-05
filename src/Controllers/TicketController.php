<?php
namespace Src\Controllers;

class TicketController extends \Src\Library\Controller {
  public function view($request, $response, $args)
  {
    $ticketId = (int)$args['id'];
    $ticketMapper = new \Src\Mappers\TicketMapper($this->db);

    // Make sure ticket exists
    if (!$ticket = $ticketMapper->findById($ticketId)) {
      die('404');
    }

    return $this->view->render($response, 'ticket.view.html', ['ticket' => $ticket]);
  }

  public function search($request, $response, $args)
  {
    return $this->view->render($response, 'ticket.search.html', []);
  }

  public function submitSearch($request, $response, $args)
  {
    $data = $request->getParam('ticket');


    if (!$data['TicketID'] || !$data['Email']) {
      $error = 'You cannot leave any empty fields';
    }

    $ticketMapper = new \Src\Mappers\TicketMapper($this->db);

    if (!$ticket = $ticketMapper->search($data['TicketID'], $data['Email'])) {
      $error = 'There was no tickets found matching the information you entered';
    }

    if ($error) {
      $this->flash->addMessage('warning', $error);
      return $response->withRedirect($this->router->pathFor('ticket.search'));
    }

    return $response->withRedirect($this->router->pathFor('ticket.view', ['id' => $ticket['TicketID']]));
  }
}
