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
            $stmt = $this->conn->prepare("INSERT INTO tbpegawai (id_pegawai,nama,tgl_lahir,no_telp,alamat,tgl_masuk) VALUES (NULL,?,?,?,?,?)");
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
            $stmt = $this->conn->prepare("UPDATE tbpegawai SET nama=?,tgl_lahir=?,no_telp=?,alamat=?,tgl_masuk=? WHERE id_pegawai=?");
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
}