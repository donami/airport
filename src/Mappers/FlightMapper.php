<?php
namespace Src\Mappers;

class FlightMapper extends \Src\Mappers\Mapper {

    /**
     * Get a list of all departures
     * @return array
     */
  public function findAll() {
    $stmt = $this->db->prepare(
      'SELECT
        F.FlightID,
      	T.*,
      	F.TakeOff,
        F.Landing,
        fromA.Name AS DepartureName,
        fromA.Country AS DepartureCountry,
      	toA.Name AS DestinationName,
        toA.Country AS DestinationCountry
      FROM Flight AS F
      	INNER JOIN Travel AS T
      		ON F.TravelID = T.TravelID
      	INNER JOIN AirPort AS fromA
      		ON fromA.ACR = T.Departure
      	INNER JOIN AirPort AS toA
      		ON toA.ACR = T.Destination'
    );
    $stmt->execute();
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    return $result;
  }

  public function findById($id)
  {
    $stmt = $this->db->prepare(
      'SELECT * FROM VSingleFlight WHERE FlightID = :id'
    );

    $stmt->bindValue(':id', $id, \PDO::PARAM_INT);

    $stmt->execute();
    $result = $stmt->fetch(\PDO::FETCH_ASSOC);

    $flight = new \Src\Models\Flight($result);

    return $flight;
  }

  /**
   * Get available seats for flight
   * @param  int $FlightID
   * @return array
   */
  public function getAvailableSeats($FlightID)
  {
    $stmt = $this->db->prepare(
      'SELECT
        SeatType,
        COUNT(SeatType)AS SeatsBooked
      FROM Ticket
      WHERE FlightID = :FlightID
        GROUP BY SeatType'
    );
    $stmt->bindValue(':FlightID', $FlightID, \PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    return $result;
  }

}
