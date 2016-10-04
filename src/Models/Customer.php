<?php
namespace Src\Models;

class Customer {
  private $CustomerID;
  private $FirstName;
  private $LastName;
  private $Address;
  private $Email;
  private $PhoneNr;

  public function __construct($data = []) {
    $data['FirstName'] ? $this->FirstName = $data['FirstName'] : false;
    $data['LastName'] ? $this->LastName = $data['LastName'] : false;
    $data['Address'] ? $this->Address = $data['Address'] : false;
    $data['Email'] ? $this->Email = $data['Email'] : false;
    $data['PhoneNr'] ? $this->PhoneNr = $data['PhoneNr'] : false;
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
  * Get the value of First Name
  *
  * @return mixed
  */
  public function getFirstName()
  {
    return $this->FirstName;
  }

  /**
  * Set the value of First Name
  *
  * @param mixed FirstName
  *
  * @return self
  */
  public function setFirstName($FirstName)
  {
    $this->FirstName = $FirstName;

    return $this;
  }

  /**
  * Get the value of Last Name
  *
  * @return mixed
  */
  public function getLastName()
  {
    return $this->LastName;
  }

  /**
  * Set the value of Last Name
  *
  * @param mixed LastName
  *
  * @return self
  */
  public function setLastName($LastName)
  {
    $this->LastName = $LastName;

    return $this;
  }

  /**
  * Get the value of Address
  *
  * @return mixed
  */
  public function getAddress()
  {
    return $this->Address;
  }

  /**
  * Set the value of Address
  *
  * @param mixed Address
  *
  * @return self
  */
  public function setAddress($Address)
  {
    $this->Address = $Address;

    return $this;
  }

  /**
  * Get the value of Email
  *
  * @return mixed
  */
  public function getEmail()
  {
    return $this->Email;
  }

  /**
  * Set the value of Email
  *
  * @param mixed Email
  *
  * @return self
  */
  public function setEmail($Email)
  {
    $this->Email = $Email;

    return $this;
  }

  /**
  * Get the value of Phone Nr
  *
  * @return mixed
  */
  public function getPhoneNr()
  {
    return $this->PhoneNr;
  }

  /**
  * Set the value of Phone Nr
  *
  * @param mixed PhoneNr
  *
  * @return self
  */
  public function setPhoneNr($PhoneNr)
  {
    $this->PhoneNr = $PhoneNr;

    return $this;
  }

}
