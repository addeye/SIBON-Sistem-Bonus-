<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 22:05
 */
$id = 0;
$admin = new Admin();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['simpan'])) {
        $data = $_POST;
        $result = $admin->update($data, $id);

        if ($result) {
            $user->redirect('index.php?page=admin');
        }
    }

}
else
{
    if (isset($_POST['simpan'])) {
        $data = $_POST;
        $result = $admin->insert($data);

        if ($result) {
            $user->redirect('index.php?page=admin');
        }
    }
}
$data = $admin->getById($id);


?>

<h3>Edit User Admin</h3>
<div class="grid-form">
<form class="form-horizontal" method="post">
    <div class="form-group">
        <label class="col-sm-2 control-label">Nama</label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="nama" value="<?=$data['nama']?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="email" value="<?=$data['email']?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-5">
            <input type="text" name="password" class="form-control" value="<?=$data['password']?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-5">
            <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
            <a href="?page=admin" class="btn btn-warning">Kembali</a>
        </div>
    </div>
</form>
</div>