<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 15:24
 */
class User
{
    private $conn;
    private $admin;
    public $nama_user;
    public $email_user;

    public function __construct(){

        $database = new Koneksi();
        $db = $database->dbKoneksi();
        $this->conn = $db;

        $admin = new Admin();
        $this->admin = $admin;

        if(isset($_SESSION['user_session']))
        {
            $this->getIdentitas();
        }
    }

    public function getlogin($data=array())
    {
        try
        {
            $stmt = $this->conn->prepare("SELECT * FROM tbadmin WHERE email=:uemail and password=:upassword");
            $stmt->execute(array(':uemail'=>$data['email'],':upassword'=>$data['password']));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

            if($stmt->rowCount() == 1)
            {
                $_SESSION['user_session'] = $userRow['id_admin'];
                return true;
            }
             return false;
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

    public function getIdentitas()
    {
        $d = $this->admin->getById($_SESSION['user_session']);
        $this->nama_user = $d['nama'];
        $this->email_user = $d['email'];
    }

}