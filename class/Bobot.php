<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 02/06/2016
 * Time: 13:39
 */
class Bobot implements BaseData
{
    //Koneksi
    private $conn;

    public function __construct()
    {
        $database = new Koneksi();
        $db = $database->dbKoneksi();
        $this->conn = $db;
    }
    //End Koneksi

    public function getAll()
    {
        try
        {
            $stmt = $this->conn->prepare("SELECT * FROM tbbobot ORDER BY id ASC");
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $row;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
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

    public function updateBobot($bobot,$id)
    {
        try
        {
            $stmt = $this->conn->prepare("UPDATE tbbobot SET bobot=:bobot WHERE id=$id");
            $stmt->execute(array(':bobot'=>$bobot));

            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}