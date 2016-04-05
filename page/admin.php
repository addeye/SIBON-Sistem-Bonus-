<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 21:07
 */
$admin = new Admin();
?>
<h3 class="head-top">Data Admin</h3>
<a href="?page=admin_edit" class="btn btn-primary"> Tambah</a>
<table class="table table-bordered table-responsive">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>E-Mail</th>
        <th>Action</th>
    </tr>
    <?php
    $no=1;
    foreach($admin->getAll() as $data){
    ?>
    <tr>
        <td><?=$no++?></td>
        <td><?=$data['nama']?></td>
        <td><?=$data['email']?></td>
        <td>
            <a href="?page=admin_edit&id=<?=$data['id_admin']?>" class="btn btn-primary">Edit</a>
            <button id="<?=$data['id_admin']?>" class="btn btn-danger btn-del">Delete</button>
        </td>
    </tr>
    <?php } ?>
</table>

<script>
    $('.btn-del').click(function(){
        var id = this.id;
        console.log(id);
        var rest = confirm('Apakah Nada yakin');
        if(rest) {
            $.ajax({
                method: "GET",
                url: "page/admin_act.php?delete&id="+id
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

