<?php
namespace Src\Controllers;

class FlightController extends \Src\Library\Controller {

  // List all flights
  public function index($request, $response, $args)
  {
    $mapper = new \Src\Mappers\FlightMapper($this->db);

    $flights = $mapper->findAll();

    return $this->view->render($response, 'travel-list.html', ['flights' => $flights]);
  }

  // Display single flight
  public function single($request, $response, $args)
  {
    $travelId = (int)$args['id'];

    $flightMapper = new \Src\Mappers\FlightMapper($this->db);

    $flight = $flightMapper->findById($travelId);

    if (!$flight) {
      die('not found');
    }

    return $this->view->render($response, 'travel.html', ['flight' => $flight]);
  }

  // Display booking form for a flight
  public function book($request, $response, $args)
  {
    $travelId = (int)$args['id'];

    // Mappers
    $seatTypeMapper = new \Src\Mappers\SeatTypeMapper($this->db);
    $flightMapper = new \Src\Mappers\FlightMapper($this->db);

    $seatTypes = $seatTypeMapper->findAll();
    $flight = $flightMapper->findById($travelId);

    if (!$flight) {
      die('404');
    }

    return $this->view->render($response, 'travel-book.html', ['flight' => $flight, 'seatTypes' => $seatTypes]);
  }

  // Submit booking of flight
  public function submitBooking($request, $response, $args)
  {
    $booking = $request->getParam('booking');

    // TODO: form validation
    $customer = new \Src\Models\Customer([
      'FirstName' => $booking['FirstName'],
      'LastName' => $booking['LastName'],
      'Address' => $booking['Address'],
      'Email' => $booking['Email'],
      'PhoneNr' => $booking['PhoneNr'],
    ]);

    $flightMapper = new \Src\Mappers\FlightMapper($this->db);
    $flight = $flightMapper->findById($args['id']);

    if (!$flight) die('404');

    $customerMapper = new \Src\Mappers\CustomerMapper($this->db);
    $customerId = $customerMapper->save($customer);

    switch ($booking['SeatType']) {
      case 1: $price = $flight['StandardPriceCoach']; break;
      case 2: $price = $flight['StandardPriceBusiness']; break;
      case 3: $price = $flight['StandardpriceFirstClass']; break;

      default:
        die('404');
        break;
    }

    // insert into Ticket
    $ticket = new \Src\Models\Ticket([
      'CustomerID' => $customerId,
      'FlightID' => $args['id'],
    	'Price' => $price,
    	'SeatNumber' =>  4,                // TODO: what is this?
    	'SeatType' => $booking['SeatType'],
    ]);

    $ticketMapper = new \Src\Mappers\TicketMapper($this->db);
    $ticketId = $ticketMapper->save($ticket);

    $this->flash->addMessage('success', 'Your flight has been booked');

    return $response->withRedirect($this->router->pathFor('ticket.view', ['id' => $ticketId]));
  }
}
