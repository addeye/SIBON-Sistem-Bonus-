<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 15:13
 */
class Admin implements BaseData
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
        $stmt = $this->conn->prepare("SELECT * FROM tbadmin");
        $stmt->execute();
        $adminRow=$stmt->fetchAll(PDO::FETCH_ASSOC);

        return $adminRow;
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM tbadmin WHERE id_admin=:uid_admin");
        $stmt->execute(array(':uid_admin'=>$id));
        $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

        return $userRow;
    }

    public function insert($data = array())
    {
        try
        {
            $stmt = $this->conn->prepare("INSERT INTO tbadmin (id_admin,nama,email,password) VALUES (NULL,:unama,:uemail,:upassword)");
            $stmt->execute(array(
                ':unama'=>$data['nama'],
                ':uemail'=>$data['email'],
                ':upassword'=>$data['password']
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
            $data = $this->transformasiData($data);

            $stmt = $this->conn->prepare("UPDATE tbadmin SET nama=?,email=?,password=? WHERE id_admin=$id");
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
            $stmt = $this->conn->prepare("DELETE FROM tbadmin WHERE id_admin=$id");
            $stmt->execute();

            $data = [
                    'message'=>'Data Berhasil Dihapus',
                    'status' => true
            ];

            return $data;
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