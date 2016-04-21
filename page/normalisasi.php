<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 16:50
 */

$model = new Kinerja();
$modelCus = new Customer();
$modelReward = new Reward();
$normalisasi = new Normalisasi();

$kriteria = array(
    0.1,
    0.1,
    0.05,
    0.05,
    0.05,
    0.2,
    0.05,
    0.05,
    0.05,
    0.3);

if(isset($_POST['proses']))
{
    $row = $model->getAllByBulanTahun($_POST['bulan'],$_POST['tahun']);
}

?>

<h3 class="head-top">Data Customer</h3>
<div class="row">
<div class="col-md-5 col-md-offset-3">
    <form method="post" class="form-inline">
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
<?php if(isset($_POST['proses'])) { ?>
    <div class="table-responsive">
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Lama Kerja</th>
        <th>Absensi</th>
        <th>Kejujuran</th>
        <th>Kualitas Kerja</th>
        <th>Cuti</th>
        <th>Kedisiplinan</th>
        <th>Sikap</th>
        <th>Target</th>
        <th>Customer</th>
        <th>Reward</th>
    </tr>
    <?php
    $no=1;
    foreach($row as $data){

        ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$data['nama']?></td>
            <td><?=$lamaKerja[]=countDate($data['tgl_masuk'])?></td>
            <td><?=$jmlAbsensi[]=$data['jml_absensi']?></td>
            <td><?=$kejujuran[]=$data['kejujuran']?></td>
            <td><?=$kualitasKerja[]=$data['kualitas_kerja']?></td>
            <td><?=$cuti[]=$data['cuti']+1?></td>
            <td><?=$kedisiplinan[]=$data['kedisiplinan']?></td>
            <td><?=$sikap[]=$data['sikap']?></td>
            <td><?=$target[]=$data['target']?></td>
            <td><?= $cus[]= $modelCus->getCustomerByBulanTahun($data['bulan'],$data['tahun'],$data['id_pegawai']) ?></td>
            <td><?= $reward[]= $modelReward->getDataWherePegawai($data['bulan'],$data['tahun'],$data['id_pegawai'])['total'] ?></td>
        </tr>
    <?php } ?>
</table>
    </div>
<?php } ?>

    <hr>
<?php if(isset($_POST['proses'])) { ?>
    <div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Lama Kerja</th>
            <th>Absensi</th>
            <th>Kejujuran</th>
            <th>Kualitas Kerja</th>
            <th>Cuti</th>
            <th>Kedisiplinan</th>
            <th>Sikap</th>
            <th>Target</th>
            <th>Customer</th>
            <th>Reward</th>
        </tr>
        <?php
        $no=1;
        foreach($row as $data){
            ?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$data['nama']?></td>
                <td><?=$blamaKerja[] = countDate($data['tgl_masuk'])/$normalisasi->getHeightValue($lamaKerja)?></td>
                <td><?=$bjmlAbsensi[] = $data['jml_absensi']/$normalisasi->getHeightValue($jmlAbsensi)?> </td>
                <td><?=$bkejujuran[] = $data['kejujuran']/$normalisasi->getHeightValue($kejujuran)?></td>
                <td><?=$bkualitasKerja[] = $data['kualitas_kerja']/$normalisasi->getHeightValue($kualitasKerja)?></td>
                <td><?=$bcuti[] = $normalisasi->getLowValue($cuti)/($data['cuti']+1)?></td>
                <td><?=$bkedisiplinan[] = $data['kedisiplinan']/$normalisasi->getHeightValue($kedisiplinan)?></td>
                <td><?=$bsikap[] = $data['sikap']/$normalisasi->getHeightValue($sikap)?></td>
                <td><?=$btarget[] = $data['target']/$normalisasi->getHeightValue($target)?></td>
                <td><?=$bcus[] = $modelCus->getCustomerByBulanTahun($data['bulan'],$data['tahun'],$data['id_pegawai'])/$normalisasi->getHeightValue($cus)?></td>
                <td><?=$breward[] = $modelReward->getDataWherePegawai($data['bulan'],$data['tahun'],$data['id_pegawai'])['total']/$normalisasi->getHeightValue($reward)?></td>
            </tr>
        <?php } ?>
    </table>
    </div>
<?php } ?>

<hr>
<?php if(isset($_POST['proses'])) { ?>
    <div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Lama Kerja</th>
            <th>Absensi</th>
            <th>Kejujuran</th>
            <th>Kualitas Kerja</th>
            <th>Cuti</th>
            <th>Kedisiplinan</th>
            <th>Sikap</th>
            <th>Target</th>
            <th>Customer</th>
            <th>Reward</th>
        </tr>
        <?php
        $no=1;
        $a=0;
        foreach($row as $data){
            ?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$data['nama']?></td>
                <td><?=$sawNormalisasi[$a][] = $normalisasi->prosentase($kriteria[0],$blamaKerja[$a])?></td>
                <td><?=$sawNormalisasi[$a][] = $normalisasi->prosentase($kriteria[1],$bjmlAbsensi[$a])?> </td>
                <td><?=$sawNormalisasi[$a][] = $normalisasi->prosentase($kriteria[2],$bkejujuran[$a])?></td>
                <td><?=$sawNormalisasi[$a][] = $normalisasi->prosentase($kriteria[3],$bkualitasKerja[$a])?></td>
                <td><?=$sawNormalisasi[$a][] = $normalisasi->prosentase($kriteria[4],$bcuti[$a])?></td>
                <td><?=$sawNormalisasi[$a][] = $normalisasi->prosentase($kriteria[5],$bkedisiplinan[$a])?></td>
                <td><?=$sawNormalisasi[$a][] = $normalisasi->prosentase($kriteria[6],$bsikap[$a])?></td>
                <td><?=$sawNormalisasi[$a][] = $normalisasi->prosentase($kriteria[7],$btarget[$a])?></td>
                <td><?=$sawNormalisasi[$a][] = $normalisasi->prosentase($kriteria[8],$bcus[$a])?></td>
                <td><?=$sawNormalisasi[$a][] = $normalisasi->prosentase($kriteria[9],$breward[$a])?></td>
            </tr>
        <?php $a++;} ?>
    </table>
    </div>
<?php } ?>

<hr>
<?php if(isset($_POST['proses'])) { ?>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Normalisasi</th>
            </tr>
            <?php
            $no=1;
            $a=0;
            foreach($row as $data){
                ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=$data['nama']?></td>
                    <td><?=array_sum($sawNormalisasi[$a])?></td>
                </tr>
                <?php $a++;} ?>
        </table>
    </div>
<?php } ?>
