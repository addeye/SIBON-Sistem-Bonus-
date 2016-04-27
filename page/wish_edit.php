<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 24/04/2016
 * Time: 21:30
 */

$model = new Wish();
$kota = new Kota();

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
    $user->redirect('index.php?page=wish');
}

$row = $model->getById($id);

?>

<h3>Form Wish</h3>
<div class="grid-form">
    <form class="form-horizontal" method="post">
        <input type="hidden" name="id_customer" value="<?=$user->pengguna_id()?>">
        <?php if(!isset($_GET['id'])){ ?>
            <div class="form-group">
                <label class="col-sm-2 control-label">Kota</label>
                <div class="col-md-5">
                    <select name="id_kota" class="form-control">
                        <option value=""></option>
                        <?php foreach($kota->getAll() as $city) {?>
                            <option value="<?=$city['id_kota']?>"><?=$city['nama_kota']?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        <?php }?>
        <div class="form-group">
            <label class="col-sm-2 control-label">Ket Wish Trip</label>
            <div class="col-md-5">
                <textarea class="form-control" name="ket" required><?=$row['ket']?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Jumlah Orang</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="jml" value="<?=$row['jml']?>" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
                <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
                <a href="?page=wish" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </form>
</div>
