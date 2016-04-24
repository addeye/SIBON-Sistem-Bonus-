<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 24/04/2016
 * Time: 23:43
 */
$model = new Trip();
$data= $model->getByIdKota(1);
?>

<div class="row" id="connected">
    <div class="col-md-5">
        <div class="panel-title">
            <h3>Daftar Wisata</h3>
        </div>
        <div class="content-box">
            <div style="height: 100px;" class="list-group list-group-alternate connected">
                <?php foreach($data as $row) { ?>
                    <span class="list-group-item">
                <?=$row['nama_wisata']?>
            </span>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="panel-title">
            <h3>Wishlist Wisata</h3>
        </div>
        <form id="listwisata">
            <div class="content-box">
                <div style="height: 100px;" class="list-group list-group-alternate connected list no2"></div>
            </div>
            <button class="btn btn-info">Simpan</button>
        </form>
    </div>
</div>
