<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 12/04/2016
 * Time: 20:20
 */
class Sikap implements BaseData
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
            $stmt = $this->conn->prepare("SELECT * FROM tbsikap");
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
            $stmt = $this->conn->prepare("SELECT * FROM tbsikap WHERE id_sikap=$id");
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
            $data = $this->transformasiData($data);
            $stmt = $this->conn->prepare("INSERT INTO tbsikap (id_sikap,ket,nilai) VALUES (NULL,?,?)");
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
            $data=$this->transformasiData($data);
            $stmt = $this->conn->prepare("UPDATE tbsikap SET ket=?,nilai=? WHERE id_sikap=$id");
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
            $stmt = $this->conn->prepare("DELETE FROM tbsikap WHERE id_sikap=$id");
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