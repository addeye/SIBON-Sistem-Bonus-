<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 10/04/2016
 * Time: 20:37
 */
class Kinerja implements BaseData
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
            $stmt = $this->conn->prepare("SELECT * FROM tbkinerja");
            $stmt->execute();
            $rowKinerja = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $rowKinerja;
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
            $stmt = $this->conn->prepare("SELECT * FROM tbkinerja WHERE id_kinerja=$id");
            $stmt->execute();

            $rowKinerja = $stmt->fetch(PDO::FETCH_ASSOC);

            return $rowKinerja;
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
            $stmt = $this->conn->prepare("INSERT INTO tbkinerja (id_kinerja,id_pegawai,jml_absensi,kejujuran,kualitas_kerja,cuti,kedisiplinan,sikap,target,bulan,tahun) VALUES (NULL,?,?,?,?,?,?,?,?,?,?)");
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
            $stmt = $this->conn->prepare("UPDATE tbkinerja SET id_pegawai=?,jml_absensi=?,kejujuran=?,kualitas_kerja=?,cuti=?,kedisiplinan=?,sikap=?,target=?,bulan=?,tahun=? WHERE id_kinerja=$id");
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
            $stmt = $this->conn->prepare("DELETE FROM tbkinerja WHERE id_kinerja=$id");
            $stmt->execute();

            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function getAllDataByIdPegawai($id)
    {
        try
        {
            $stmt = $this->conn->prepare("SELECT * FROM tbkinerja WHERE id_pegawai=$id");
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $row;
        }
        catch(PDOException $e)
        {
            return $e->getMessage();
        }
    }

    public function transformasiData($data = array())
    {
        $result = array();

        if($data['id_pegawai']!='')
        {
            $result[]=$data['id_pegawai'];
        }
        if($data['jml_absensi']!='')
        {
            $result[]=$data['jml_absensi'];
        }
        if($data['kejujuran']!='')
        {
            $result[]=$data['kejujuran'];
        }
        if($data['kualitas_kerja']!='')
        {
            $result[]=$data['kualitas_kerja'];
        }
        if($data['cuti']!='')
        {
            $result[]=$data['cuti'];
        }
        if($data['kedisiplinan']!='')
        {
            $result[]=$data['kedisiplinan'];
        }
        if($data['sikap']!='')
        {
            $result[]=$data['sikap'];
        }
        if($data['target']!='')
        {
            $result[]=$data['target'];
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