<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 15:30
 */
class Pegawai implements BaseData
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
            $stmt = $this->conn->prepare("SELECT * FROM tbpegawai");
            $stmt->execute();
            $rowPegawai = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $rowPegawai;

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
           $stmt = $this->conn->prepare("SELECT * FROM tbpegawai WHERE id_pegawai=$id");
           $stmt->execute();
           $rowPegawai = $stmt->fetch(PDO::FETCH_ASSOC);

           return $rowPegawai;
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
            $data=$this->transformasiData($data);
            $stmt = $this->conn->prepare("INSERT INTO tbpegawai (id_pegawai,nama,tgl_lahir,no_telp,alamat,tgl_masuk,email,password) VALUES (NULL,?,?,?,?,?,?,?)");
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
            $stmt = $this->conn->prepare("UPDATE tbpegawai SET nama=?,tgl_lahir=?,no_telp=?,alamat=?,tgl_masuk=?,email=?,password=? WHERE id_pegawai=$id");
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
            $stmt = $this->conn->prepare("DELETE FROM tbpegawai WHERE id_pegawai=$id");
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
        if($data['nama']!='')
        {
            $result[]=$data['nama'];
        }
        if($data['tgl_lahir']!='')
        {
            $result[]=$data['tgl_lahir'];
        }
        if($data['no_telp']!='')
        {
            $result[]=$data['no_telp'];
        }
        if($data['alamat']!='')
        {
            $result[]=$data['alamat'];
        }
        if($data['tgl_masuk']!='')
        {
            $result[]=$data['tgl_masuk'];
        }
        if($data['email']!='')
        {
            $result[]=$data['email'];
        }
        if($data['password']!='')
        {
            $result[]=$data['password'];
        }

        return $result;
    }
}