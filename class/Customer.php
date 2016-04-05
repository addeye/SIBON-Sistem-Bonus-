<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 15:33
 */
class Customer implements BaseData
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
        try
        {
            $stmt = $this->conn->prepare("SELECT * FROM tbcustomer");
            $stmt->execute();
            $rowCustomer = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $rowCustomer;

        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function getById($id)
    {
        try
        {
            $stmt = $this->conn->prepare("SELECT * FROM tbcustomer WHERE id_customer = $id");
            $stmt->execute();
            $rowCustomer = $stmt->fetch(PDO::FETCH_ASSOC);

            return $rowCustomer;

        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
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
        try
        {
            $stmt = $this->conn->prepare("DELETE FROM tbcustomer WHERE id_customer=$id");
            $stmt->execute();

            $data = [
                'message'=>'Data Berhasil Dihapus',
                'status' => true
            ];

            return $data;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}