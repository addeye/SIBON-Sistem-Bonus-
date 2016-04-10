<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 16:50
 */

$model = new Pegawai();

?>

<h3 class="head-top">Data Pegawai</h3>
<table class="table table-bordered table-responsive">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    <?php
    $no=1;
    foreach($model->getAll() as $data){
        ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$data['nama']?></td>
            <td><?=$data['alamat']?></td>
            <td><?=$data['email']?></td>
            <td>
                <a href="?page=kinerjapegawai&id=<?=$data['id_pegawai']?>" class="btn btn-info">Kinerja</a>
            </td>
        </tr>
    <?php } ?>
</table>
