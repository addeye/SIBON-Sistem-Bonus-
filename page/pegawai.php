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
<a href="?page=pegawai_edit" class="btn btn-primary"> Tambah</a>
<hr>
<table class="table table-bordered table-responsive">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
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
                <a href="?page=pegawai_edit&id=<?=$data['id_pegawai']?>" class="btn btn-primary">Edit</a>
                <button id="<?=$data['id_pegawai']?>" class="btn btn-danger btn-del">Delete</button>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<script>
    $('.btn-del').click(function(){
        var id = this.id;
        console.log(id);
        var rest = confirm('Apakah Anda yakin');
        if(rest) {
            $.ajax({
                method: "GET",
                url: "page/pegawai_act.php?delete&id="+id
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
