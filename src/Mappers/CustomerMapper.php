<?php
namespace Src\Mappers;

class CustomerMapper extends \Src\Mappers\Mapper {

    /**
     * Get a list of all customers
     * @return array
     */
  public function getCustomers() {
    $stmt = $this->db->prepare('SELECT * FROM Customer');
    $stmt->execute();
    $result = $stmt->fetchAll(\PDO::FETCH_CLASS, '\Src\Models\Customer');

    return $result;
  }

  /**
   * Get a single customer by it's id
   * @param  int  $id
   * @return Customer
   */
  public function findById($id)
  {
    $stmt = $this->db->prepare('SELECT * FROM Customer WHERE CustomerID = :id');
    $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(\PDO::FETCH_CLASS, '\Src\Models\Customer');
    $result = $stmt->fetch();

    return $result;
  }

  public function save($customer)
  {
    $stmt = $this->db->prepare(
      'INSERT INTO Customer (FirstName, LastName, Address, Email, PhoneNr) VALUES (:FirstName, :LastName, :Address, :Email, :PhoneNr)'
    );
    $stmt->bindValue(':FirstName', $customer->getFirstName(), \PDO::PARAM_STR);
    $stmt->bindValue(':LastName', $customer->getLastName(), \PDO::PARAM_STR);
    $stmt->bindValue(':Address', $customer->getAddress(), \PDO::PARAM_STR);
    $stmt->bindValue(':Email', $customer->getEmail(), \PDO::PARAM_STR);
    $stmt->bindValue(':PhoneNr', $customer->getPhoneNr(), \PDO::PARAM_STR);

    $stmt->execute();

    return $this->db->lastInsertId();
  }

}
