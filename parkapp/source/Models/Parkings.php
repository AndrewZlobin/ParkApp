<?php


namespace Andrew\ParkApp\Models;


class Parkings
{
    private $idParking;
    private $parkingName;
    private $parkingAddress;

    public function __construct($idParking, $parkingName, $parkingAddress)
    {
        $this->idParking = $idParking;
        $this->parkingName = $parkingName;
        $this->parkingAddress = $parkingAddress;
    }

    public function getIdParking()
    {
        return $this->idParking;
    }

    public function getParkingName()
    {
        return $this->parkingName;
    }

    public function getParkingAddress()
    {
        return $this->parkingAddress;
    }


}