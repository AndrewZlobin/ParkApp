<?php

namespace Andrew\ParkApp\Models;

use Andrew\ParkApp\Core\DB;
use Andrew\ParkApp\Core\Repository;

class NewsRepository implements Repository
{
    private $db;

    public function __construct()
    {
        $this->db = DB::getDB();
    }

    public function getAll()
    {
        $sql = 'SELECT parkings.`parkingName`, parkings.`parkingAddress`, parkings.`parkingDescription`, 
                parkingclientinfo.parkingNews, parkingclientinfo.parkingPromotions 
                FROM parkings 
                LEFT JOIN parkingclientinfo 
                ON parkings.idParking = parkingclientinfo.clientInfo';
        return $this->db->getAll($sql);
    }


    public function getById(int $id)
    {
        $sql = 'SELECT * FROM News WHERE id=:id';
        $params = ['id'=>$id];
        return $this->db->paramsGetOne($sql, $params);
    }

    public function save($params)
    {
        $sql = 'INSERT INTO News 
                (`lastNews`, `lastPromotions`, `Parkings_idParking`)
                VALUES (:news, :promotion, :idParking)';
        return $this->db->nonSelectQuery($sql, $params);
    }
}