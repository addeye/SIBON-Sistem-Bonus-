<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 24/04/2016
 * Time: 21:04
 */
class Trip implements BaseData
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
            $stmt = $this->conn->prepare("SELECT t.*,k.nama_kota FROM tbtrip t INNER JOIN tbkota k ON t.id_kota=k.id_kota ORDER BY id_trip DESC ");
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
            $stmt = $this->conn->prepare("SELECT t.*,k.nama_kota FROM tbtrip t INNER JOIN tbkota k ON t.id_kota=k.id_kota WHERE t.id_trip=$id");
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
            $stmt = $this->conn->prepare("INSERT INTO tbtrip (id_trip,id_kota,nama_wisata) VALUES (NULL,:idkota,:namawisata)");
            $stmt->execute(array(':idkota'=>$data['id_kota'],':namawisata'=>$data['nama_wisata']));

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
            $stmt = $this->conn->prepare("UPDATE tbtrip SET id_kota=:idkota,nama_wisata=:namawisata WHERE id_trip=$id");
            $stmt->execute(array(':namawisata'=>$data['nama_wisata'],':idkota'=>$data['id_kota']));

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
            $stmt = $this->conn->prepare("DELETE FROM tbtrip WHERE id_trip=$id");
            $stmt->execute();

            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function getByIdKota($id)
    {
        try
        {
            $stmt = $this->conn->prepare("SELECT * FROM tbtrip WHERE id_kota=$id");
            $stmt->execute();
            $row=$stmt->fetchAll(PDO::FETCH_ASSOC);

            return $row;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function getByIdKotaNotInWishlist($id,$idcustomer)
    {
        try
        {
            $stmt = $this->conn->prepare("SELECT * FROM tbtrip WHERE id_kota =$id and id_trip NOT IN (SELECT id_trip FROM tbwishlist wl INNER JOIN tbwish w ON wl.id_wish=w.id_wish WHERE w.id_customer=$idcustomer)");
            $stmt->execute();
            $row=$stmt->fetchAll(PDO::FETCH_ASSOC);

            return $row;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}