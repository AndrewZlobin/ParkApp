<?php

namespace Andrew\ParkApp\Models;
use Andrew\ParkApp\Core\Repository;
use Andrew\ParkApp\Core\DB;

class UsersRepository implements Repository
{

    private $db;

    public function __construct()
    {
        $this->db = DB::getDB();
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM Users';
        return $this->db->getAll($sql);
    }

    public function getById(int $id)
    {
        $sql = 'SELECT * FROM Users WHERE idUser=:idUser';
        $params = ['idUser' => $id];
        return $this->db->paramsGetOne($sql, $params);
    }

    public function save($data)
    {
        $sql = 'INSERT INTO Users (userEmail, `userLogin`, userHash, userPhone, userParkSystem, userRole)
                VALUES (:userEmail, :userLogin, :userHash, :userPhone, :userParkSystem, :userRole)';
        return $this->db->insertIntoTable($sql, $data);
    }

    public function isAuth($post)
    {
        $sql = 'SELECT * FROM Users WHERE userEmail=:email';
        $params = [
            'email' => $post['email']
        ];
        $result = $this->db->paramsGetOne($sql, $params);
        if (!$result) return false; //если по email записи не найдено - получил false
        if(!password_verify($post['password'], $result['userHash'])) return false;
        session_start();
        $_SESSION['name'] = $result['userLogin'];
        $_SESSION['role'] = $result['userRole'];
        $_SESSION['ID'] = $result['idUser'];
        return true;
    }

    public function usersHasParkings($params)
    {
        $sql = "SELECT users.`userLogin`, users.`userEmail`, users.`userPhone`, users.`userParkSystem`, 
                parkings.parkingName, parkings.parkingAddress, parkings.parkingDescription 
                FROM users 
                LEFT JOIN users_has_parkings 
                ON users_has_parkings.Users_idUser = users.idUser 
                LEFT JOIN parkings 
                ON users_has_parkings.Parkings_idParking = parkings.idParking 
                WHERE users.userRole LIKE :userRole";
        return $this->db->paramsGetAll($sql, $params);
    }
}