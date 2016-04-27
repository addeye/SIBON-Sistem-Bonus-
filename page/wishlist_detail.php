<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 16:50
 */

$model = new Wishlist();
$trip = new Trip();
$wish = new Wish();
$customer = new Customer();

$wishrow = $wish->getById($_GET['idwish']);
$customerrow = $customer->getById($wishrow['id_customer']);

if($wishrow['status']==0)
{
    $result = $wish->updateStatus($_GET['idwish'],1); //merubah status menjadi dibaca
}

if(isset($_POST['simpan']))
{
    $result = $wish->updateStatus($_POST['idwish'],$_POST['status']);

    if($result)
    {
        $user->redirect('index.php?page=wish_pegawai');
    }
}


?>

<h3 class="head-top">Wishlist Detail</h3>
<h4><?=$customerrow['nama']?> / <?=$wishrow['ket']?></h4>
<hr>
<div class="row">
    <form class="form-inline" method="post">
        <input type="hidden" name="idwish" value="<?=$_GET['idwish']?>">
        <div class="form-group">
            <div class="col-md-4">
                <select name="status" class="form-control" required>
                    <option value="">Pilih Tindakan</option>
                    <option value="<?=SISBON_STATUS_WISH_DISETUJUI?>" <?=$wishrow['status']==SISBON_STATUS_WISH_DISETUJUI?'selected':''?> >DISETUJUI</option>
                    <option value="<?=SISBON_STATUS_WISH_DITOLAK?>" <?=$wishrow['status']==SISBON_STATUS_WISH_DITOLAK?'selected':''?> >DITOLAK</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success" name="simpan" value="Proses">
        </div>
    </form>
</div>
<table class="table table-bordered table-responsive">
    <tr>
        <th>No</th>
        <th>Nama Wisata</th>
    </tr>
<?php
$no=1;
foreach($model->getDataByIdWish($_GET['idwish']) as $row){
?>
    <tr>
        <td><?=$no++?></td>
        <td><?=$trip->getById($row['id_trip'])['nama_wisata']?></td>
    </tr>
<?php } ?>
</table>