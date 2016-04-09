<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 15:24
 */

include "SisbonConstant.php";
include "SisbonHelper.php";

class User
{
    use SessionTrait;
    private $conn;
    private $admin;
    private $pegawai;
    private $customer;
    public $nama_user;
    public $email_user;

    public function __construct(){

        $database = new Koneksi();
        $db = $database->dbKoneksi();
        $this->conn = $db;

        $admin = new Admin();
        $this->admin = $admin;

        $pegawai = new Pegawai();
        $this->pegawai = $pegawai;

        $customer = new Customer();
        $this->customer = $customer;

        if(isset($_SESSION['user_session']))
        {
            if($_SESSION['user_level']=='admin')
            {
                $this->getIdentitasAdmin();
            }
            elseif($_SESSION['user_level']=='pegawai')
            {
                $this->getIdentitasPegawai();
            }
            else
            {
                $this->getIdentitasCustomer();
            }
        }
    }

    public function getloginAdmin($data=array())
    {
        try
        {
            $stmt = $this->conn->prepare("SELECT * FROM tbadmin WHERE email=:uemail and password=:upassword");
            $stmt->execute(array(':uemail'=>$data['email'],':upassword'=>$data['password']));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

            if($stmt->rowCount() == 1)
            {
                $_SESSION['user_session'] = $userRow['id_admin'];
                $_SESSION['user_level'] = 'admin';
                return true;
            }
             return false;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();

        }

    }

    public function getLoginPegawai($data=array())
    {
        try
        {
            $stmt = $this->conn->prepare("SELECT * FROM tbpegawai WHERE  email=:uemail and password=:upassword");
            $stmt->execute(array(
                ':uemail'=>$data['email'],
                ':upassword'=>$data['password']
            ));
            $pegawaiRow = $stmt->fetch(PDO::FETCH_ASSOC);

            if($stmt->rowCount() ===1)
            {
                $_SESSION['user_session'] = $pegawaiRow['id_pegawai'];
                $_SESSION['user_level'] = 'pegawai';
                return true;
            }
            return false;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function getLoginCustomer($data=array())
    {
        try
        {
            $stmt = $this->conn->prepare("SELECT * FROM tbcustomer WHERE email=:uemail and password=:upassword");
            $stmt->execute(array(
                ':uemail'=>$data['email'],
                ':upassword'=>$data['password']
            ));
            $customerRow = $stmt->fetch(PDO::FETCH_ASSOC);

            if($stmt->rowCount() == 1)
            {
                $_SESSION['user_session'] = $customerRow['id_customer'];
                $_SESSION['user_level'] = 'customer';
                return true;
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function cekLogin()
    {
        if(isset($_SESSION['user_session']))
        {
            return true;
        }
    }

    public function redirect($url)
    {
        header("Location: $url");
    }

    public function getLogout()
    {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }

    public function getIdentitasAdmin()
    {
        $d = $this->admin->getById($_SESSION['user_session']);
        $this->nama_user = $d['nama'];
        $this->email_user = $d['email'];
    }

    public function getIdentitasPegawai()
    {
        $d = $this->pegawai->getById($_SESSION['user_session']);
        $this->nama_user = $d['nama'];
        $this->email_user = $d['email'];
    }

    public function getIdentitasCustomer()
    {
        $d = $this->customer->getById($_SESSION['user_session']);
        $this->nama_user = $d['nama'];
        $this->email_user = $d['email'];
    }

    public function getLevelUser()
    {
        return [
            SISBON_LEVEL_USER_ADMIN => 'Admin',
            SISBON_LEVEL_USER_PEGAWAI=>'Pegawai',
            SISBON_LEVEL_USER_CUSTOMER=>'Customer'
        ];
    }
}