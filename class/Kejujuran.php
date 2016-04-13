<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 12/04/2016
 * Time: 20:19
 */
class Kejujuran implements BaseData
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
            $stmt = $this->conn->prepare("SELECT * FROM tbkejujuran");
            $stmt->execute();
            $rowKejujuran = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $rowKejujuran;
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
            $stmt = $this->conn->prepare("SELECT * FROM tbkejujuran WHERE id_kejujuran=$id");
            $stmt->execute();
            $rowKejujuran = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $rowKejujuran;
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
            $stmt = $this->conn->prepare("INSERT INTO tbkejujuran (id_kejujuran,ket,nilai) VALUES (NULL,?,?)");
            $stmt->execute($data);

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
            $stmt = $this->conn->prepare("UPDATE tbkejujuran SET ket=?,nilai=? WHERE id_kejujuran=$id");
            $stmt->execute($data);

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
            $stmt = $this->conn->prepare("DELETE FROM tbkejujuran WHERE id_kejujuran=$id");
            $stmt->execute();

            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function transformasiData($data = array())
    {
        $result = array();
        if($data['ket']!='')
        {
            $result[]=$data['ket'];
        }
        if($data['nilai']!='')
        {
            $result[]=$data['nilai'];
        }

        return $result;
    }
}