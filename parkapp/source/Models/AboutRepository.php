<?php


namespace Andrew\ParkApp\Models;


use Andrew\ParkApp\Core\DB;
use Andrew\ParkApp\Core\Repository;

class AboutRepository implements Repository
{
    private $db;

    public function __construct()
    {
        $this->db = DB::getDB();
    }

    public function save($data)
    {
        $sql = 'INSERT INTO Offices(`officeAddress`, `officeEmail`, `officePhone`, `officeTechSupport`) VALUES (:officeAddress, :officeEmail, :officePhone, :officeTechSupport)';
        return $this->db->insertIntoTable($sql, $data);
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM Offices';
        return $this->db->getAll($sql);
    }

    public function getById(int $id)
    {
        $sql = 'SELECT * FROM About WHERE id=:id';
        $params = ['id'=>1];
        return $this->db->paramsGetAll($sql, $params);
    }

    public function updateOffice($params)
    {
        $sql = 'UPDATE Offices SET `officeAddress`=:officeAddress, `officeEmail`=:officeEmail, `officePhone`=:officePhone, `officeTechSupport`=:officeTechSupport WHERE `idOffice`=:idOffice';
        $this->db->nonSelectQuery($sql, $params);
    }


}