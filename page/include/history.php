<?php
$normalisasi = new Normalisasi();
isset($_POST['tahun'])?:$_POST['tahun']=date('Y');
?>

<div class="row">
    <div class="col-md-3">
        <form method="post">
        <div class="form-group">
            <select class="form-control" name="tahun">
                <option value="">Pilih Tahun</option>
                <?php
                foreach(getTahun() as $key=>$val){
                    ?>
                    <option value="<?=$key?>" <?= isset($_POST['tahun'])? $_POST['tahun']==$key? 'selected':'':'' ?> ><?=$val?></option>
                <?php } ?>
            </select>
        </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Cari</button>
            </div>
        </form>
    </div>
    <div class="col-md-12">
        <table class="table table-bordered">
            <?php foreach(getBulan() as $key=>$val){?>
                <tr>
                    <td><?=$val?></td>
                    <td><?=$normalisasi->metodeSaw($user::pengguna_id(),$key,$_POST['tahun'])?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>