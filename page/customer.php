<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 16:50
 */

$model = new Customer();
?>

<h3 class="head-top">Data Customer</h3>
<a href="?page=customer_edit" class="btn btn-primary"> Tambah</a>
<table class="table table-bordered table-responsive">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No Telp</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    <?php
    $no=1;
    foreach($model->getAllByIdPegawai($_SESSION['user_session']) as $data){
        ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$data['nama']?></td>
            <td><?=$data['alamat']?></td>
            <td><?=$data['no_telp']?></td>
            <td><?=$data['email']?></td>
            <td>
                <a href="?page=customer_edit&id=<?=$data['id_customer']?>" class="btn btn-primary">Edit</a>
                <button id="<?=$data['id_customer']?>" class="btn btn-danger btn-del">Delete</button>
            </td>
        </tr>
    <?php } ?>
</table>

<script>
    $('.btn-del').click(function(){
        var id = this.id;
        console.log(id);
        var rest = confirm('Apakah Anda yakin');
        if(rest) {
            $.ajax({
                method: "GET",
                url: "page/customer_act.php?delete&id="+id
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
