<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 24/04/2016
 * Time: 21:30
 */

$model = new Trip();
$modelKota = new Kota();

$id = 0;

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $data = $_POST;
    if(isset($_POST['simpan']))
    {
        $result = $model->update($data,$id);
    }
}
else
{
    if(isset($_POST['simpan']))
    {
        $data = $_POST;
        $result = $model->insert($data);

    }
}

if(isset($result))
{
    $user->redirect('index.php?page=trip');
}

$row = $model->getById($id);
$datKota = $modelKota->getAll();

?>

<h3>Form Trip</h3>
<div class="grid-form">
    <form class="form-horizontal" method="post">
        <div class="form-group">
            <label class="col-sm-2 control-label">Nama Kota</label>
            <div class="col-md-5">
                <select name="id_kota" class="form-control" required>
                    <option value=""></option>
                    <?php foreach($datKota as $rowKota) { ?>
                    <option value="<?=$rowKota['id_kota']?>" <?=$rowKota['id_kota']==$row['id_kota']?'selected':''?> ><?=$rowKota['nama_kota']?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Nama</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="nama_wisata" value="<?=$row['nama_wisata']?>" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Harga</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="harga" value="<?=$row['harga']?>" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
                <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
                <a href="?page=trip" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </form>
</div>
