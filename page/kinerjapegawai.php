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
?>
<h3 class="head-top">Kinerja <?=$dataPeg['nama']?></h3>
<div class="row">
    <div class="col-md-12">
        <a href="?page=kinerja_edit&idpegawai=<?=$_GET['id']?>&id=0" class="btn btn-primary"> Tambah</a>
        <a href="?page=kinerjalistpegawai" class="btn btn-warning"> Kembali</a>
        <div class="table-responsive">
            <table style="font-size: 12px;" class="table table-striped">
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
                <?php
                $no=1;
                foreach($model->getAllDataByIdPegawai($_GET['id']) as $data){
                    ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=2?></td>
                        <td><?=$data['jml_absensi']?></td>
                        <td><?=$data['kejujuran']?></td>
                        <td><?=$data['kualitas_kerja']?></td>
                        <td><?=$data['cuti']?></td>
                        <td><?=$data['kedisiplinan']?></td>
                        <td><?=$data['sikap']?></td>
                        <td><?=$data['target']?></td>
                        <td><?= 2 ?></td>
                        <td><?= 2 ?></td>
                        <td><?=$data['bulan']?>/<?=$data['tahun']?></td>
                        <td>
                            <a href="?page=kinerja_edit&idpegawai=<?=$data['id_pegawai']?>&id=<?=$data['id_kinerja']?>" class="btn btn-primary btn-xs">Edit</a>
                            <button id="<?=$data['id_kinerja']?>" class="btn btn-danger btn-del btn-xs">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
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

