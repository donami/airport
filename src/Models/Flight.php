<?php
namespace Src\Models;

class Flight {
  private $FlightID;
  private $TravelID;
  private $Departure;
  private $Destination;

  private $prices = [];

  private $TakeOff;
  private $Landing;
  private $DepartureName;
  private $DepartureCountry;
  private $DestinationName;
  private $DestinationCountry;

  private $Aircraft = [];
  private $bookedSeats = [];

  public function __construct($data = []) {
    $data['FlightID'] ? $this->FlightID = $data['FlightID'] : false;
    $data['TravelID'] ? $this->TravelID = $data['TravelID'] : false;
    $data['Departure'] ? $this->Departure = $data['Departure'] : false;
    $data['Destination'] ? $this->Destination = $data['Destination'] : false;

    $data['TakeOff'] ? $this->TakeOff = $data['TakeOff'] : false;
    $data['Landing'] ? $this->Landing = $data['Landing'] : false;
    $data['DepartureName'] ? $this->DepartureName = $data['DepartureName'] : false;
    $data['DepartureCountry'] ? $this->DepartureCountry = $data['DepartureCountry'] : false;
    $data['DestinationName'] ? $this->DestinationName = $data['DestinationName'] : false;
    $data['DestinationCountry'] ? $this->DestinationCountry = $data['DestinationCountry'] : false;

    $data['StandardPriceBusiness'] ? $this->prices['Business'] = $data['StandardPriceBusiness'] : false;
    $data['StandardPriceCoach'] ? $this->prices['Coach'] = $data['StandardPriceCoach'] : false;
    $data['StandardpriceFirstClass'] ? $this->prices['FirstClass'] = $data['StandardpriceFirstClass'] : false;

    $data['AircraftID'] ? $this->Aircraft['AircraftID'] = $data['AircraftID'] : false;
    $data['Model'] ? $this->Aircraft['Model'] = $data['Model'] : false;
    $data['Manufacturer'] ? $this->Aircraft['Manufacturer'] = $data['Manufacturer'] : false;
    $data['BusinessSeats'] ? $this->Aircraft['BusinessSeats'] = $data['BusinessSeats'] : false;
    $data['FirstClassSeats'] ? $this->Aircraft['FirstClassSeats'] = $data['FirstClassSeats'] : false;
    $data['CoachSeats'] ? $this->Aircraft['CoachSeats'] = $data['CoachSeats'] : false;
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
     * Get the value of Travel
     *
     * @return mixed
     */
    public function getTravelID()
    {
        return $this->TravelID;
    }

    /**
     * Set the value of Travel
     *
     * @param mixed TravelID
     *
     * @return self
     */
    public function setTravelID($TravelID)
    {
        $this->TravelID = $TravelID;

        return $this;
    }

    /**
     * Get the value of Departure
     *
     * @return mixed
     */
    public function getDeparture()
    {
        return $this->Departure;
    }

    /**
     * Set the value of Departure
     *
     * @param mixed Departure
     *
     * @return self
     */
    public function setDeparture($Departure)
    {
        $this->Departure = $Departure;

        return $this;
    }

    /**
     * Get the value of Destination
     *
     * @return mixed
     */
    public function getDestination()
    {
        return $this->Destination;
    }

    /**
     * Set the value of Destination
     *
     * @param mixed Destination
     *
     * @return self
     */
    public function setDestination($Destination)
    {
        $this->Destination = $Destination;

        return $this;
    }

    /**
     * Get the value of Prices
     *
     * @return mixed
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * Set the value of Prices
     *
     * @param mixed prices
     *
     * @return self
     */
    public function setPrices($prices)
    {
        $this->prices = $prices;

        return $this;
    }

    /**
     * Get the value of Take Off
     *
     * @return mixed
     */
    public function getTakeOff()
    {
        return $this->TakeOff;
    }

    /**
     * Set the value of Take Off
     *
     * @param mixed TakeOff
     *
     * @return self
     */
    public function setTakeOff($TakeOff)
    {
        $this->TakeOff = $TakeOff;

        return $this;
    }

    /**
     * Get the value of Landing
     *
     * @return mixed
     */
    public function getLanding()
    {
        return $this->Landing;
    }

    /**
     * Set the value of Landing
     *
     * @param mixed Landing
     *
     * @return self
     */
    public function setLanding($Landing)
    {
        $this->Landing = $Landing;

        return $this;
    }

    /**
     * Get the value of Departure Name
     *
     * @return mixed
     */
    public function getDepartureName()
    {
        return $this->DepartureName;
    }

    /**
     * Set the value of Departure Name
     *
     * @param mixed DepartureName
     *
     * @return self
     */
    public function setDepartureName($DepartureName)
    {
        $this->DepartureName = $DepartureName;

        return $this;
    }

    /**
     * Get the value of Departure Country
     *
     * @return mixed
     */
    public function getDepartureCountry()
    {
        return $this->DepartureCountry;
    }

    /**
     * Set the value of Departure Country
     *
     * @param mixed DepartureCountry
     *
     * @return self
     */
    public function setDepartureCountry($DepartureCountry)
    {
        $this->DepartureCountry = $DepartureCountry;

        return $this;
    }

    /**
     * Get the value of Destination Name
     *
     * @return mixed
     */
    public function getDestinationName()
    {
        return $this->DestinationName;
    }

    /**
     * Set the value of Destination Name
     *
     * @param mixed DestinationName
     *
     * @return self
     */
    public function setDestinationName($DestinationName)
    {
        $this->DestinationName = $DestinationName;

        return $this;
    }

    /**
     * Get the value of Destination Country
     *
     * @return mixed
     */
    public function getDestinationCountry()
    {
        return $this->DestinationCountry;
    }

    /**
     * Set the value of Destination Country
     *
     * @param mixed DestinationCountry
     *
     * @return self
     */
    public function setDestinationCountry($DestinationCountry)
    {
        $this->DestinationCountry = $DestinationCountry;

        return $this;
    }

    /**
     * Get the value of Aircraft
     *
     * @return mixed
     */
    public function getAircraft()
    {
        return $this->Aircraft;
    }

    /**
     * Set the value of Aircraft
     *
     * @param mixed aircraft
     *
     * @return self
     */
    public function setAircraft($aircraft)
    {
        $this->Aircraft = $aircraft;

        return $this;
    }

    public function setBookedSeats($seats)
    {
      $arr = [];
      foreach ($seats as $key => $seat) {
        if ($seat['SeatType'] == 1) {
          $this->bookedSeats[$seat['SeatType']] = $seat['SeatsBooked'];
        }
        $arr[$seat['SeatType']] = $seat['SeatsBooked'];

      }

      for ($i=1; $i <= 3; $i++) {
        if ($arr[$i] == null) {
          $arr[$i] = 0;
        }
      }

      $this->bookedSeats = $arr;
    }


    /**
     * Get the value of Booked Seats
     *
     * @return mixed
     */
    public function getBookedSeats()
    {
        return $this->bookedSeats;
    }

}
