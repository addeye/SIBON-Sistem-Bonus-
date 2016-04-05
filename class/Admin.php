<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 15:13
 */
class Admin implements BaseData
{
        private $conn;

    public function __construct()
    {
        $database = new Koneksi();
        $db = $database->dbKoneksi();
        $this->conn = $db;
    }

    public function getAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM tbadmin");
        $stmt->execute();
        $adminRow=$stmt->fetchAll(PDO::FETCH_ASSOC);

        return $adminRow;
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM tbadmin WHERE id_admin=:uid_admin");
        $stmt->execute(array(':uid_admin'=>$id));
        $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

        return $userRow;
    }

    public function insert($data = array())
    {
        // TODO: Implement insert() method.
    }

    public function update($data = array(), $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}