<?php
namespace Src\Mappers;

class TicketMapper extends \Src\Mappers\Mapper {

  public function findAll()
  {
    # code...
  }

  public function findById($id)
  {
    # code...
  }

  public function save($ticket)
  {
    $stmt = $this->db->prepare(
      'INSERT INTO Ticket (CustomerID, FlightID, Price, SeatNumber, SeatType) VALUES (:CustomerID, :FlightID, :Price, :SeatNumber, :SeatType)'
    );
    $stmt->bindValue(':CustomerID', $ticket->getCustomerID(), \PDO::PARAM_INT);
    $stmt->bindValue(':FlightID', $ticket->getFlightID(), \PDO::PARAM_INT);
    $stmt->bindValue(':Price', $ticket->getPrice(), \PDO::PARAM_STR);
    $stmt->bindValue(':SeatNumber', $ticket->getSeatNumber(), \PDO::PARAM_INT);
    $stmt->bindValue(':SeatType', $ticket->getSeatType(), \PDO::PARAM_INT);

    return $stmt->execute();
  }

}
