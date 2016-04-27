<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 24/04/2016
 * Time: 23:43
 */
$model = new Trip();
$wish = new Wish();
$kota = new Kota();
$wishlist = new Wishlist();
$idwish=0;

if(isset($_GET['idwish']))
{
    $idwish = $_GET['idwish'];
}

if(isset($_POST['simpan']))
{
    $idwish = $_POST['id_wish'];

    $wishlist->deleteByIdWish($idwish); //Hapus semua data tabel wishlist berdasarkan id_wish

    for($a=0; $a<count($_POST['id_trip']); $a++)
    {
        $data['id_wish'] = $_POST['id_wish'];
        $data['id_trip'] = $_POST['id_trip'][$a];

        $result = $wishlist->insert($data); //insert data baru ke tabel wishlist
    }

    $mesaage = "Data Berhasil Masuk";
}

$rowwish = $wish->getById($idwish);
$data= $model->getByIdKotaNotInWishlist($rowwish['id_kota'],$user->pengguna_id());

$leftData = $wishlist->getDataByIdWish($_GET['idwish']);

$height = count($data)*50;

?>

<div class="row" id="connected">
    <div class="col-md-12">
        <?= isset($mesaage)? '<div class="alert alert-success">'.$mesaage.'</div>' : '' ?>
    </div>
    <div class="col-md-5">
        <div class="panel-title">
            <h3>Daftar Wisata <?=$kota->getById($rowwish['id_kota'])['nama_kota']?></h3>
        </div>
        <div class="form-group">
            <div class="content-box">
                <div style="height: <?=$height?>px;" class="list-group list-group-alternate connected list-group-item">
                    <?php foreach($data as $row) { ?>
                        <div class="col-md-12 list-group-item">
                            <?=$row['nama_wisata']?>
                            <input type="hidden" name="id_trip[]" value="<?=$row['id_trip']?>">
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="panel-title">
            <h3>Wishlist Wisata</h3>
        </div>
        <form id="listwisata" method="post">
            <input type="hidden" value="<?=$_GET['idwish']?>" name="id_wish">
           <div class="form-group">
               <div class="content-box">
                   <div style="height: 500px;" class="list-group list-group-alternate connected list no2 list-group-item">
                       <?php foreach($leftData as $wisata){ ?>
                           <div class="col-md-12 list-group-item">
                               <?=$model->getById($wisata['id_trip'])['nama_wisata']?>
                               <input type="hidden" name="id_trip[]" value="<?=$wisata['id_trip']?>">
                           </div>
                       <?php } ?>
                   </div>
               </div>
           </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info" name="simpan" value="Simpan">
            </div>
        </form>
    </div>
</div>
