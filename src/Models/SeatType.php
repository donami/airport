<?php
namespace Src\Models;

class SeatType {
  private $SeatTypeID;
  private $Description;

  public function __construct($data = []) {

  }

  /**
  * Get the value of Seat Type
  *
  * @return mixed
  */
  public function getSeatTypeID()
  {
    return $this->SeatTypeID;
  }

  /**
  * Get the value of Description
  *
  * @return mixed
  */
  public function getDescription()
  {
    return $this->Description;
  }

}
