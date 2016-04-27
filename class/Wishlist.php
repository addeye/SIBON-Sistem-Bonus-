<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 24/04/2016
 * Time: 21:04
 */
class Wishlist implements BaseData
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
            $stmt = $this->conn->prepare("SELECT * FROM tbwishlist");
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
            $stmt = $this->conn->prepare("SELECT * FROM tbwishlist WHERE id_wishlist=$id");
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
            $stmt = $this->conn->prepare("INSERT INTO tbwishlist (id_wishlist,id_wish,id_trip) VALUES (NULL,:idwish,:idtrip)");
            $stmt->execute(array(
                ':idwish'=>$data['id_wish'],
                ':idtrip' => $data['id_trip']
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
            $stmt = $this->conn->prepare("UPDATE tbwishlist SET id_trip=:idtrip WHERE id_wishlist=$id");
            $stmt->execute(array(':idtrip'=>$data['id_trip']));

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
            $stmt = $this->conn->prepare("DELETE FROM tbwishlist WHERE id_wishlist=$id");
            $stmt->execute();

            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function deleteByIdWish($id)
    {
        try
        {
            $stmt = $this->conn->prepare("DELETE FROM tbwishlist WHERE id_wish=$id");
            $stmt->execute();

            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function getDataByIdWish($idwish)
    {
        try
        {
            $stmt = $this->conn->prepare("SELECT * FROM tbwishlist WHERE id_wish=:idwish");
            $stmt->execute(array(
                ':idwish'=>$idwish,
            ));
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $row;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function CekData($data = array())
    {
        try
        {
            $stmt = $this->conn->prepare("SELECT * FROM tbwishlist WHERE id_wish=:idwish and id_trip=:idtrip");
            $stmt->execute(array(
                ':idwish'=>$data['id_wish'],
                ':idtrip'=>$data['id_trip']
            ));
            $jml = $stmt->rowCount();
            if($jml==0)
            {
                return true;
            }
            return false;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}