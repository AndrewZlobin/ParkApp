<?php


namespace Andrew\ParkApp\Models;


use Andrew\ParkApp\Core\DB;
use Andrew\ParkApp\Core\Repository;

class ParkingsRepository implements Repository
{
    private $db;

    public function __construct()
    {
        $this->db = DB::getDB();
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM Parkings';
        return $this->db->getAll($sql);
    }

    public function getById(int $id)
    {
        $sql = 'SELECT * FROM Parkings WHERE id=:id';
        $params = ['id'=>$id];
        return $this->db->paramsGetOne($sql, $params);
    }

    public function save($params)
    {
        $sql = 'INSERT INTO Parkings(`parkingName`, `parkingCoordinatesX`, `parkingCoordinatesY`, `parkingURL`, `parkingAddress`, `parkingDescription`,`parkingSystem`, `parkingCity`)
                VALUES (:parkingName, :parkingCoordinatesX, :parkingCoordinatesY, :parkingURL, :parkingAddress, :parkingDescription, :parkingSystem, :parkingCity)';
        return $this->db->insertIntoTable($sql, $params);
    }

    public function parkingsOnMap()
    {

        $sql = 'SELECT parkings.`idParking`, parkings.`parkingName`, parkings.`parkingAddress`,
                parkings.`parkingDescription`, 
                parkings.`parkingCoordinatesX`, parkings.`parkingCoordinatesY`, 
                parkingtechinfo.parkingTariff, parkingtechinfo.parkingFreePlaces 
                FROM parkings 
                LEFT JOIN parkingtechinfo 
                ON parkings.idParking = parkingtechinfo.techInfo 
                ORDER BY parkings.idParking;';
        return $this->db->getAll($sql);

    }

    public function saveCity($params)
    {
        $sql = 'INSERT INTO Cities(cityName) VALUES (:cityName)';
        return $this->db->nonSelectQuery($sql, $params);
    }

    public function getCities()
    {
        $sql = "SELECT * FROM `Cities`";
        return $this->db->getAll($sql);
    }

    public function getCitiesNames()
    {
        $sql = "SELECT cityName FROM cities GROUP BY cityName ASC;";
        return $this->db->getAll($sql);
    }

    public function getCitiesByName($params)
    {
        $sql = "SELECT idCity FROM `Cities` WHERE cityName=:cityName";
        return $this->db->paramsGetOne($sql, $params);
    }

    public function linkUserAndParking($params)
    {
        $sql = 'INSERT INTO Users_has_Parkings VALUES (:Users_idUser, :Parking_idParking)';
        return $this->db->nonSelectQuery($sql, $params);
    }

    public function updateObj($params)
    {
        $sql = 'UPDATE Parkings SET `parkingName`=:parkingName, `parkingCoordinatesX`=:parkingCoordinatesX, `parkingCoordinatesY`=:parkingCoordinatesY, `parkingURL`=:parkingURL, `parkingAddress`=:parkingAddress, `parkingDescription`=:parkingDescription, `parkingSystem`=:parkingSystem, `parkingCity`=:parkingCity WHERE `idParking`=:idParking';
        return $this->db->nonSelectQuery($sql, $params);
    }

    public function addTech($params)
    {
        $sql = 'INSERT INTO ParkingTechInfo(`parkingTariff`, `parkingFreePlaces`, `techInfo`) VALUES (:parkingTariff, :parkingFreePlaces, :techInfo)';
        return $this->db->nonSelectQuery($sql, $params);
    }

    public function updateTech($params)
    {
        $sql = 'UPDATE ParkingTechInfo SET `parkingTariff`=:parkingTariff, `parkingFreePlaces`=:parkingFreePlaces WHERE `techInfo`=:techInfo';
        return $this->db->nonSelectQuery($sql, $params);
    }

    public function addClient($params)
    {
        $sql = 'INSERT INTO ParkingClientInfo(`parkingNews`, `parkingPromotions`, `clientInfo`) VALUES (:parkingNews, :parkingPromotions, :clientInfo)';
        return $this->db->nonSelectQuery($sql, $params);
    }

    public function updateClient($params)
    {
        $sql = 'UPDATE ParkingClientInfo SET `parkingNews`=:parkingNews, `parkingPromotions`=:parkingPromotions WHERE `clientInfo`=:clientInfo';
        return $this->db->nonSelectQuery($sql, $params);
    }

    public function parkingsInCities()
    {
        $sql = "SELECT parkings.`idParking`, parkings.`parkingName`, parkings.`parkingCoordinatesX`, parkings.`parkingCoordinatesY`, parkings.`parkingURL`, parkings.`parkingDescription`, parkings.`parkingSystem`, cities.cityName FROM parkings LEFT JOIN cities ON parkings.`parkingCity` = cities.idCity";
        return $this->db->getAll($sql);
    }

    public function parkingTechInfo()
    {
        $sql = "SELECT parkings.`idParking`, parkingtechinfo.parkingTariff, parkingtechinfo.parkingFreePlaces FROM parkings LEFT JOIN parkingtechinfo ON parkings.`idParking` = parkingtechinfo.techInfo";

        return $this->db->getAll($sql);
    }

    public function hyperQuery()
    {
        $sql = 'SELECT parkings.`idParking`, parkings.`parkingName`, parkings.`parkingCoordinatesX`, parkings.`parkingCoordinatesY`, parkings.`parkingAddress`, parkings.`parkingURL`, parkings.`parkingDescription`, parkings.`parkingSystem`, parkings.`parkingCity`, 
                parkingclientinfo.parkingNews, parkingclientinfo.parkingPromotions, 
                parkingtechinfo.parkingTariff, parkingtechinfo.parkingFreePlaces, 
                cities.cityName, cities.idCity
                FROM parkings 
                LEFT JOIN parkingclientinfo 
                ON parkings.`idParking`=parkingclientinfo.clientInfo
                LEFT JOIN parkingtechinfo 
                ON parkings.idParking=parkingtechinfo.techInfo 
                LEFT JOIN cities 
                ON parkings.parkingCity=cities.idCity
                ORDER BY cities.cityName ASC';
        return $this->db->getAll($sql);
    }

    public function getOffices()
    {
        $sql = 'SELECT * FROM Offices';
        return $this->db->getAll($sql);
    }

    public function transaction(...$params){
        try{
            $this->db->getConnection()->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->db->getConnection()->beginTransaction();
            $sql0 = 'INSERT INTO Users (userEmail, `userLogin`, userHash, userPhone, userParkSystem, userRole)
                            VALUES (:userEmail, :userLogin, :userHash, :userPhone, :userParkSystem, :userRole)';
            $userID = $this->db->insertIntoTable($sql0, $params[0]);
            $sql1 = "SELECT idCity FROM `Cities` WHERE cityName=:cityName";
            $cityID = $this->db->paramsGetOne($sql1, $params[1]);
            $params[2]['parkingCity'] = intval($cityID);
            $sgl2 = 'INSERT INTO Parkings(`parkingName`, `parkingCoordinatesX`, `parkingCoordinatesY`, `parkingAddress`, `parkingURL`, `parkingDescription`,`parkingSystem`, `parkingCity`)
                VALUES (:parkingName, :parkingCoordinatesX, :parkingCoordinatesY, :parkingURL, :parkingAddress, :parkingDescription, :parkingSystem, :parkingCity)';
            $parkingID = $this->db->insertIntoTable($sgl2, $params[2]);

            $params[3]['Users_idUser'] = intval($userID);
            $params[3]['Parking_idParking'] = intval($parkingID);

            $sql3 = 'INSERT INTO Users_has_Parkings VALUES (:Users_idUser, :Parking_idParking)';
            $this->db->nonSelectQuery($sql3, $params[3]);
//            $sql4 = 'INSERT INTO Cities(cityName) VALUES (:cityName)';
//            $params[4]['idCity'] = intval($cityID['idCity']);
//            var_dump($params);
//            $this->db->nonSelectQuery($sql4, $params[4]);
            return $this->db->getConnection()->commit();
        }
        catch (\PDOException $e){
            $this->db->getConnection()->rollBack();
            echo "Ошибка ". $e->getMessage();
        }
    }
}