<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 16/04/2016
 * Time: 6:36
 */
?>

<h3>Reward Pegawai</h3>
<div class="row">
    <div class="col-md-4 col-md-offset-3">
<form id="form" class="form-inline" method="post">
    <div class="form-group">
        <select class="form-control" name="bulan">
            <option value="">Pilih Bulan</option>
            <?php
            foreach(getBulan() as $key=>$val){
                ?>
                <option value="<?=$key?>"><?=$val?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <select class="form-control" name="tahun">
            <option value="">Pilih Tahun</option>
            <?php foreach(getTahun() as $key=>$val) { ?>
                <option value="<?=$key?>"><?=$val?></option>
            <?php } ?>
        </select>
    </div>
    <button class="btn btn-primary btn-proses">Proses</button>
</form>
    </div>
</div>
