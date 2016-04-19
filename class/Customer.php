<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 15:33
 */
class Customer implements BaseData
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
            $stmt = $this->conn->prepare("SELECT * FROM tbcustomer");
            $stmt->execute();
            $rowCustomer = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $rowCustomer;

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
            $stmt = $this->conn->prepare("SELECT * FROM tbcustomer WHERE id_customer=$id");
            $stmt->execute();
            $rowCustomer = $stmt->fetch(PDO::FETCH_ASSOC);

            return $rowCustomer;

        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function insert($data = array())
    {
        $stmt = $this->conn->prepare("INSERT INTO tbcustomer (id_customer,id_pegawai,nama,no_telp,alamat,email,password,tgl_input,bulan,tahun) VALUES (NULL,:uid_pegawai,:unama,:uno_telp,:ualamat,:uemail,:upassword,:utgl_input,:ubulan,:utahun)");
        $stmt->execute(array(
            ':uid_pegawai'=>$data['id_pegawai'],
            ':unama'=>$data['nama'],
            ':uno_telp'=>$data['no_telp'],
            ':ualamat'=>$data['alamat'],
            ':uemail'=>$data['email'],
            ':upassword'=>$data['password'],
            ':utgl_input'=>$data['tgl_input'],
            ':ubulan'=>$data['bulan'],
            ':utahun'=>$data['tahun']
        ));

        return true;
    }

    public function update($data = array(), $id)
    {
        $data = $this->transformasiData($data);
        $stmt = $this->conn->prepare("UPDATE tbcustomer SET id_pegawai=?,nama=?,no_telp=?,alamat=?,email=?,password=?,tgl_input=?,bulan=?,tahun=? WHERE id_customer=$id");
        $stmt->execute($data);

        return true;
    }

    public function delete($id)
    {
        try
        {
            $stmt = $this->conn->prepare("DELETE FROM tbcustomer WHERE id_customer=$id");
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

    public function getAllByIdPegawai($id)
    {
        try
        {
            $stmt = $this->conn->prepare("SELECT * FROM tbcustomer WHERE id_pegawai=$id");
            $stmt->execute();
            $rowCustomer = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $rowCustomer;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function getPegawaiByBulanTahun($data = array())
    {
        try
        {
            $stmt = $this->conn->prepare("SELECT c.*,p.nama nama_pegawai,p.email email_pegawai, p.alamat alamat_pegawai FROM tbcustomer c inner join tbpegawai p on c.id_pegawai=p.id_pegawai WHERE c.bulan=:bulan and c.tahun=:tahun and c.id_customer=:idcus");
            $stmt->execute(array(':bulan'=>$data['bulan'],':tahun'=>$data['tahun'],':idcus'=>$data['id']));
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
        if($data['nama']!='')
        {
            $result[]=$data['nama'];
        }
        if($data['no_telp']!='')
        {
            $result[]=$data['no_telp'];
        }
        if($data['alamat']!='')
        {
            $result[]=$data['alamat'];
        }
        if($data['email']!='')
        {
            $result[]=$data['email'];
        }
        if($data['password']!='')
        {
            $result[]=$data['password'];
        }
        if($data['tgl_input']!='')
        {
            $result[]=$data['tgl_input'];
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

    public function getCustomerByBulanTahun($month,$year,$idpeg)
    {
        $stmt = $this->conn->prepare("SELECT * FROM tbcustomer WHERE bulan='$month' and tahun=$year and id_pegawai=$idpeg");
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $stmt->rowCount();
    }
}