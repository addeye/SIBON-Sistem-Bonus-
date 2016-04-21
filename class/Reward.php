<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 16/04/2016
 * Time: 7:07
 */
class Reward implements BaseData
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
            $stmt = $this->conn->prepare("SELECT * FROM tbreward");
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
            $stmt = $this->conn->prepare("SELECT * FROM tbreward WHERE id_reward=$id");
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
            $stmt = $this->conn->prepare("INSERT INTO tbreward (id_reward,id_pegawai,id_customer,jumlah_nilai,bulan,tahun) VALUES (NULL,?,?,?,?,?)");
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
            $data = $this->transformasiData($data);
            $stmt = $this->conn->prepare("UPDATE tbreward SET id_pegawai=?,id_customer=?,jumlah_nilai=?,bulan=?,tahun=? WHERE id_reward=$id");
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
            $stmt = $this->conn->prepare("DELETE FROM tbreward WHERE id_reward=$id");
            $stmt->execute();

            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function getDataWhere($bulan,$tahun,$id_pegawai,$id_customer)
    {
        try
        {
            $stmt = $this->conn->prepare("SELECT * FROM tbreward WHERE id_pegawai=:idpegawai and id_customer=:idcustomer and bulan=:bulan and tahun=:tahun");
            $stmt->execute(array(':idpegawai'=>$id_pegawai,':idcustomer'=>$id_customer,':bulan'=>$bulan,':tahun'=>$tahun));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function transformasiData($data = array())
    {
        $result = array();
        if($data['id_pegawai']!='')
        {
            $result[]=$data['id_pegawai'];
        }
        if($data['id_customer']!='')
        {
            $result[]=$data['id_customer'];
        }
        if($data['jumlah_nilai']!='')
        {
            $result[]=$data['jumlah_nilai'];
        }
        if($data['bulan']!='')
        {
            $result[]=$data['bulan'];
        }
        if($data['tahun']!='')
        {
            $result[]=$data['tahun'];
        }
        return $result;
    }
}