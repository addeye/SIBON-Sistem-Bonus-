<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 22:05
 */
$id = 0;
$model = new Pegawai();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['simpan'])) {
        $data = $_POST;
        $result = $model->update($data, $id);

        if ($result) {
            $user->redirect('index.php?page=pegawai');
        }
    }

}
else
{
    if (isset($_POST['simpan'])) {
        $data = $_POST;
        $result = $model->insert($data);

        if ($result) {
            $user->redirect('index.php?page=pegawai');
        }
    }
}
$data = $model->getById($id);


?>

<h3>Form Pegawai</h3>
<div class="grid-form">
<form class="form-horizontal" method="post">
    <div class="form-group">
        <label class="col-sm-2 control-label">Nama</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="nama" value="<?=$data['nama']?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Tanggal Lahir</label>
        <div class="col-md-5">
            <input type="date" class="form-control" name="tgl_lahir" value="<?=$data['tgl_lahir']?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">No Telepon</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="no_telp" value="<?=$data['no_telp']?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Alamat</label>
        <div class="col-md-5">
            <textarea class="form-control" name="alamat"><?=$data['alamat']?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Tanggal Masuk</label>
        <div class="col-md-5">
            <input type="date" name="tgl_masuk" class="form-control" value="<?=$data['tgl_masuk']?>" required>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="email" value="<?=$data['email']?>" required>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-5">
            <input type="text" name="password" class="form-control" value="<?=$data['password']?>" required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-5">
            <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
            <a href="?page=pegawai" class="btn btn-warning">Kembali</a>
        </div>
    </div>
</form>
</div>