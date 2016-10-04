<?php
namespace Src\Models;

class Ticket {
  private $TicketID;
  private $CustomerID;
  private $FlightID;
  private $Price;
  private $SeatNumber;
  private $SeatType;

  public function __construct($data = []) {
    $data['CustomerID'] ? $this->CustomerID = $data['CustomerID'] : false;
    $data['FlightID'] ? $this->FlightID = $data['FlightID'] : false;
    $data['Price'] ? $this->Price = $data['Price'] : false;
    $data['SeatNumber'] ? $this->SeatNumber = $data['SeatNumber'] : false;
    $data['SeatType'] ? $this->SeatType = $data['SeatType'] : false;
  }

  /**
  * Get the value of Ticket
  *
  * @return mixed
  */
  public function getTicketID()
  {
    return $this->TicketID;
  }

  /**
  * Set the value of Ticket
  *
  * @param mixed TicketID
  *
  * @return self
  */
  public function setTicketID($TicketID)
  {
    $this->TicketID = $TicketID;

    return $this;
  }

  /**
  * Get the value of Customer
  *
  * @return mixed
  */
  public function getCustomerID()
  {
    return $this->CustomerID;
  }

  /**
  * Set the value of Customer
  *
  * @param mixed CustomerID
  *
  * @return self
  */
  public function setCustomerID($CustomerID)
  {
    $this->CustomerID = $CustomerID;

    return $this;
  }

  /**
  * Get the value of Flight
  *
  * @return mixed
  */
  public function getFlightID()
  {
    return $this->FlightID;
  }

  /**
  * Set the value of Flight
  *
  * @param mixed FlightID
  *
  * @return self
  */
  public function setFlightID($FlightID)
  {
    $this->FlightID = $FlightID;

    return $this;
  }

  /**
  * Get the value of Price
  *
  * @return mixed
  */
  public function getPrice()
  {
    return $this->Price;
  }

  /**
  * Set the value of Price
  *
  * @param mixed Price
  *
  * @return self
  */
  public function setPrice($Price)
  {
    $this->Price = $Price;

    return $this;
  }

  /**
  * Get the value of Seat Number
  *
  * @return mixed
  */
  public function getSeatNumber()
  {
    return $this->SeatNumber;
  }

  /**
  * Set the value of Seat Number
  *
  * @param mixed SeatNumber
  *
  * @return self
  */
  public function setSeatNumber($SeatNumber)
  {
    $this->SeatNumber = $SeatNumber;

    return $this;
  }

  /**
  * Get the value of Seat Type
  *
  * @return mixed
  */
  public function getSeatType()
  {
    return $this->SeatType;
  }

  /**
  * Set the value of Seat Type
  *
  * @param mixed SeatType
  *
  * @return self
  */
  public function setSeatType($SeatType)
  {
    $this->SeatType = $SeatType;

    return $this;
  }

}
