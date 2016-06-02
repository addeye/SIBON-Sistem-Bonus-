<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 16:50
 */

$model = new Bobot();
$jml = 0;
if(isset($_POST['simpan']))
{
    $bobot = $_POST['bobot'];
    $idbobot = $_POST['idbobot'];

    for($a=0; $a<count($idbobot);$a++)
    {
        $result = $model->updateBobot($bobot[$a],$idbobot[$a]);
        if($result)
        {
            $jml++;
        }
    }

    $alert = '<div class="alert alert-success" role="alert">
        <strong>Berhasil !</strong> Anda berhasil update data bobot.
       </div>';

}

?>

<h3 class="head-top">Data Bobot</h3>
<?=isset($alert)?$alert:''?>
<form method="post">
    <div class="row">
<table class="table table-bordered table-responsive">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Bobot</th>
    </tr>
<?php
$no=1;
foreach($model->getAll() as $row){
?>
    <tr>
        <td><?=$no++?></td>
        <td><?=$row['nama']?></td>
        <td>
            <div class="form-group">
                <div class="col-md-2">
                    <input class="form-control" name="bobot[]" value="<?=$row['bobot']?>">
                    <input type="hidden" name="idbobot[]" value="<?=$row['id']?>">
                </div>
                <div class="col-md-2"> <label>%</label> </div>
            </div>
        </td>
    </tr>
<?php } ?>
</table>
        <hr>
    <div class="form-group">
        <div class="col-md-12">
            <div class="pull-right"><input type="submit" name="simpan" class="btn btn-success" value="Simpan"></div>
        </div>
    </div>
    </div>
</form>
