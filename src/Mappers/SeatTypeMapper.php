<?php
namespace Src\Mappers;

class SeatTypeMapper extends \Src\Mappers\Mapper {

  /**
   * Get a list of all seat types
   * @return array
   */
  public function findAll() {
    $stmt = $this->db->prepare('SELECT * FROM SeatType');
    $stmt->execute();
    $result = $stmt->fetchAll(\PDO::FETCH_CLASS, '\Src\Models\SeatType');

    return $result;
  }

}
