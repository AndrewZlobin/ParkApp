<?php


namespace Andrew\ParkApp\Models;


class News
{
    private $id;
    private $lastNews;
    private $lastPromotions;
    private $parkings_idParking;

    public function __construct($id, $lastNews, $lastPromotions, $parkings_idParking)
    {
        $this->id = $id;
        $this->lastNews = $lastNews;
        $this->lastPromotions = $lastPromotions;
        $this->parkings_idParking = $parkings_idParking;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLastNews()
    {
        return $this->lastNews;
    }

    public function getLastPromotions()
    {
        return $this->lastPromotions;
    }

    public function getParkingsIdParking()
    {
        return $this->parkings_idParking;
    }
}