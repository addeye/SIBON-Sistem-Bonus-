<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 12/04/2016
 * Time: 20:19
 */
class Kedisiplinan implements BaseData
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
            $stmt = $this->conn->prepare("SELECT * FROM tbkedisiplinan");
            $stmt->execute();
            $rowKedisiplinan = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $rowKedisiplinan;
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
            $stmt = $this->conn->prepare("SELECT * FROM tbkedisiplinan WHERE id_kedisiplinan=$id");
            $stmt->execute();
            $rowKedisiplinan = $stmt->fetch(PDO::FETCH_ASSOC);

            return $rowKedisiplinan;
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
            $stmt = $this->conn->prepare("INSERT INTO tbkedisiplinan (id_kedisiplinan,ket,nilai) VALUES (NULL,?,?)");
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
            $stmt = $this->conn->prepare("UPDATE tbkedisiplinan SET ket=?,nilai=? WHERE id_kedisiplinan=$id");
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
            $stmt = $this->conn->prepare("DELETE FROM tbkedisiplinan WHERE id_kedisiplinan=$id");
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