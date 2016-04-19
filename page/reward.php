<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 16/04/2016
 * Time: 6:36
 */
$data = array();
$customer = new Customer();

if(isset($_POST['proses']))
{
    $data = $_POST;
    $row = $customer->getPegawaiByBulanTahun($data);
}

?>

<h3>Reward Pegawai</h3>
<div class="row">
    <div class="col-md-4 col-md-offset-3">
<form id="form" class="form-inline" method="post">
    <input type="hidden" name="id" value="<?=$user->pengguna_id()?>">
    <div class="form-group">
        <select class="form-control" name="bulan">
            <option value="">Pilih Bulan</option>
            <?php
            foreach(getBulan() as $key=>$val){
                ?>
                <option value="<?=$key?>" <?= isset($_POST['bulan'])? $_POST['bulan']==$key? 'selected':'':'' ?> ><?=$val?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <select class="form-control" name="tahun">
            <option value="">Pilih Tahun</option>
            <?php foreach(getTahun() as $key=>$val) { ?>
                <option value="<?=$key?>" <?= isset($_POST['tahun'])? $_POST['tahun']==$key? 'selected':'':'' ?> ><?=$val?></option>
            <?php } ?>
        </select>
    </div>
    <input type="submit" name="proses" value="Proses" class="btn btn-primary">
</form>
    </div>
</div>
<hr>
<div class="row">
    <?php if(isset($_POST['proses'])) {?>
        <div class="col-md-12">
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Pegawai : </label>
                    <div class="col-md-10">
                        <label class="form-control-static"><?=$row['nama_pegawai']?></label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat : </label>
                    <div class="col-md-10">
                        <label class="form-control-static"><?=$row['alamat_pegawai']?></label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Email : </label>
                    <div class="col-md-10">
                        <label class="form-control-static"><?=$row['email_pegawai']?></label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Reward : </label>
                    <div class="col-md-4">
                        <select style="font-size: 25px" class="form-control" name="jumlah_nilai" required>
                            <option value=""></option>
                            <option value="1">*</option>
                            <option value="2">**</option>
                            <option value="3">***</option>
                            <option value="4">****</option>
                            <option value="5">*****</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-info" name="submit" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    <?php } ?>
</div>
