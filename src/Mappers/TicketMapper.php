<?php
namespace Src\Mappers;

class TicketMapper extends \Src\Mappers\Mapper {

  public function findAll()
  {
    # code...
  }

  public function findById($id)
  {
    $stmt = $this->db->prepare('SELECT * FROM VTicket WHERE TicketID = :TicketID');
    $stmt->bindValue(':TicketID', $id, \PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch();

    return $result;
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

    $stmt->execute();

    return $this->db->lastInsertId();
  }

  public function search($ticketId, $email)
  {
    $stmt = $this->db->prepare('SELECT * FROM VTicket WHERE TicketID = :TicketID && Email = :Email');
    $stmt->bindValue(':TicketID', $ticketId, \PDO::PARAM_INT);
    $stmt->bindValue(':Email', $email, \PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch();

    return $result;
  }

}
