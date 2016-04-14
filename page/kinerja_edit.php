<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 22:05
 */
$id = 0;
$model = new Kinerja();
$modelPeg = new Pegawai();
$modelkejujuran = new Kejujuran();
$modelkualitaskerja = new KualitasKerja();
$modelKedisiplinan = new Kedisiplinan();
$modelSikap = new Sikap();
$modelTarget = new Target();

if($_GET['id']!=0) {
    $id = $_GET['id'];
    if (isset($_POST['simpan'])) {
        $data = $_POST;
        $result = $model->update($data, $id);

        if ($result) {
            $user->redirect('index.php?page=kinerjapegawai&id=1');
        }
    }
}
else
{
    if (isset($_POST['simpan'])) {
        $data = $_POST;
        $result = $model->insert($data);

        if ($result) {
            $user->redirect('index.php?page=kinerjapegawai&id=1');
        }
    }
}
$data = $model->getById($id);
$dataPegawai = $modelPeg->getById($_GET['idpegawai']);
?>

<h3>Form Kinerja Pegawai</h3>
<div class="grid-form">
<form class="form-horizontal" method="post">
    <input type="hidden" name="id_pegawai" value="<?=$_GET['idpegawai']?>">
    <input type="hidden" name="id_kinerja" value="<?=$id?>">
    <div class="form-group">
        <label class="col-sm-2 control-label">Nama</label>
        <div class="col-md-5">
            <label class="form-control-static"><?=$dataPegawai['nama']?></label>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Absensi</label>
        <div class="col-md-1">
            <input type="text" class="form-control" name="jml_absensi" value="<?=$data['jml_absensi']?>" required>
        </div>
        <label class="form-control-static">Kehadiran</label>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Kejujuran</label>
        <div class="col-md-5">
            <select name="kejujuran" class="form-control" required>
                <option value=""></option>
                <?php foreach($modelkejujuran->getAll() as $val) { ?>
                    <option value="<?=$val['id_kejujuran']?>" <?=$data['kejujuran']==$val['id_kejujuran'] ? 'selected' : '' ?> ><?=$val['ket']?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Kualitas Kerja</label>
        <div class="col-md-5">
            <select name="kualitas_kerja" class="form-control" required>
                <option value=""></option>
                <?php foreach($modelkualitaskerja->getAll() as $val) { ?>
                    <option value="<?=$val['id_kualitaskerja']?>" <?=$data['kualitas_kerja']==$val['id_kualitaskerja'] ? 'selected' : '' ?> ><?=$val['ket']?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Cuti</label>
        <div class="col-sm-1">
            <input type="text" name="cuti" class="form-control" value="<?=$data['cuti']?>" required>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Kedisiplinan</label>
        <div class="col-md-5">
            <select name="kedisiplinan" class="form-control" required>
                <option value=""></option>
                <?php foreach($modelKedisiplinan->getAll() as $val) { ?>
                    <option value="<?=$val['id_kedisiplinan']?>" <?=$data['kedisiplinan']==$val['id_kedisiplinan'] ? 'selected' : '' ?> ><?=$val['ket']?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Sikap</label>
        <div class="col-md-5">
            <select name="sikap" class="form-control" required>
                <option value=""></option>
                <?php foreach($modelSikap->getAll() as $val) { ?>
                    <option value="<?=$val['id_sikap']?>" <?=$data['sikap']==$val['id_sikap'] ? 'selected' : '' ?> ><?=$val['ket']?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Target</label>
        <div class="col-md-5">
            <select name="target" class="form-control" required>
                <option value=""></option>
                <?php foreach($modelTarget->getAll() as $val) { ?>
                    <option value="<?=$val['id_target']?>" <?=$data['target']==$val['id_target'] ? 'selected' : '' ?> ><?=$val['ket']?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Bulan/Tahun</label>
        <div class="col-sm-2">
            <select name="bulan" class="form-control" required>
                <option value=""></option>
                <?php foreach(getBulan() as $key => $val) {?>
                    <option value="<?=$key?>" <?= $key==$data['bulan'] ? 'selected' : '' ?> ><?=$val?></option>
                <?php } ?>
            </select>
            </div>
            <div class="col-sm-2">
            <select name="tahun" class="form-control" required>
                <option value=""></option>
                <?php foreach(getTahun() as $key => $val) {?>
                    <option value="<?=$key?>" <?= $key==$data['tahun']?'selected':'' ?> ><?=$val?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-5">
            <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
            <a href="?page=kinerjapegawai&id=<?=$_GET['idpegawai']?>" class="btn btn-warning">Kembali</a>
        </div>
    </div>
</form>
</div>