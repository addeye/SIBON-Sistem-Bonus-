<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 24/04/2016
 * Time: 23:16
 */
class Wish implements BaseData
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
            $stmt = $this->conn->prepare("SELECT * FROM tbwish");
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
        try
        {
            $stmt = $this->conn->prepare("SELECT * FROM tbwish WHERE id_wish=$id");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function insert($data = array())
    {
        try
        {
            $stmt = $this->conn->prepare("INSERT INTO tbwish (id_wish,id_kota,id_customer,ket,jml) VALUES (NULL,:idkota,:idcustomer,:ket,:jml)");
            $stmt->execute(array(
                ':idkota' => $data['id_kota'],
                ':idcustomer' => $data['id_customer'],
                ':ket'=>$data['ket'],
                ':jml' => $data['jml']
            ));

            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function update($data = array(), $id)
    {
        try
        {
            $stmt = $this->conn->prepare("UPDATE tbwish SET ket=:ket,jml=:jml WHERE id_wish=$id");
            $stmt->execute(array(
                ':ket'=>$data['ket'],
                ':jml'=>$data['jml'],
            ));

            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try
        {
            $stmt = $this->conn->prepare("DELETE FROM tbwish WHERE id_wish=$id");
            $stmt->execute();

            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function getDataByIdCustomer($id)
    {
        try
        {
            $stmt = $this->conn->prepare("SELECT * FROM tbwish WHERE id_customer=$id");
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $row;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function updateStatus($id,$val)
    {
        try
        {
            $stmt = $this->conn->prepare("UPDATE tbwish SET status=:status WHERE id_wish=$id");
            $stmt->execute(array(
                ':status'=>$val,
            ));

            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}