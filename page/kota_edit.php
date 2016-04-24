<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 24/04/2016
 * Time: 21:30
 */

$model = new Kota();

$id = 0;

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $data = $_POST;
    if(isset($_POST['simpan']))
    {
        $result = $model->update($data,$id);
        if($result)
        {
            $user->redirect('index.php?page=kota');
        }
    }
}
else
{
    if(isset($_POST['simpan']))
    {
        $data = $_POST;
        $result = $model->insert($data);

        if($result)
        {
            $user->redirect('index.php?page=kota');
        }
    }
}

$row = $model->getById($id);

?>

<h3>Form Kota</h3>
<div class="grid-form">
    <form class="form-horizontal" method="post">
        <div class="form-group">
            <label class="col-sm-2 control-label">Nama</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="nama_kota" value="<?=$row['nama_kota']?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
                <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
                <a href="?page=kota" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </form>
</div>
