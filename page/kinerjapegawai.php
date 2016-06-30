<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 21:07
 */
$model = new Kinerja();
$modelPeg = new Pegawai();
$dataPeg = $modelPeg->getById($_GET['id']);
$modelCus = new Customer();

$modelKejujuran = new Kejujuran();
$modelKualitaskerja = new KualitasKerja();
$modelKedisiplinan = new Kedisiplinan();
$modelSikap = new Sikap();
$modelTarget = new Target();
$modelReward = new Reward();

?>
<h3 class="head-top">Kinerja <?=$dataPeg['nama']?></h3>
<div class="row">
    <div class="col-md-12">
        <a href="?page=kinerja_edit&idpegawai=<?=$_GET['id']?>&id=0" class="btn btn-primary"> Tambah</a>
        <a href="?page=kinerjalistpegawai" class="btn btn-warning"> Kembali</a>
        <hr>
        <div class="table-responsive">
            <table style="font-size: 12px;" class="table table-striped">
                <thead>
                <tr>
                    <th>No</th>
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
                    <th>Bulan/Tahun</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                foreach($model->getAllDataByIdPegawai($_GET['id']) as $data){
                    ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=countDate($dataPeg['tgl_masuk'])?> Hari</td>
                        <td><?=$data['jml_absensi']?></td>
                        <td><?= $modelKejujuran->getById($data['kejujuran'])['ket'] ?></td>
                        <td><?= $modelKualitaskerja->getById($data['kualitas_kerja'])['ket'] ?></td>
                        <td><?=$data['cuti']?></td>
                        <td><?= $modelKedisiplinan->getById($data['kedisiplinan'])['ket']?></td>
                        <td><?= $modelSikap->getById($data['sikap'])['ket']?></td>
                        <td><?= $modelTarget->getById($data['target'])['ket']?></td>
                        <td><?= $modelCus->getCustomerByBulanTahun($data['bulan'],$data['tahun'],$_GET['id']) ?></td>
                        <td><?= $modelReward->getDataWherePegawai($data['bulan'],$data['tahun'],$_GET['id'])['total'] ?></td>
                        <td><?=$data['bulan']?>/<?=$data['tahun']?></td>
                        <td>
                            <a href="?page=kinerja_edit&idpegawai=<?=$data['id_pegawai']?>&id=<?=$data['id_kinerja']?>" class="btn btn-primary btn-xs">Edit</a>
                            <button id="<?=$data['id_kinerja']?>" class="btn btn-danger btn-del btn-xs">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $('.btn-del').click(function(){
        var id = this.id;
        console.log(id);
        var rest = confirm('Apakah Anda yakin');
        if(rest) {
            $.ajax({
                method: "GET",
                url: "page/kinerja_act.php?delete&id="+id
//                data: { name: "John", location: "Boston" }
            })
                .success(function(msg){
                    console.log(msg);
                })
                .done(function() {
                    location.reload();
                });
        } else {
            return false;
        }
    });
</script>

