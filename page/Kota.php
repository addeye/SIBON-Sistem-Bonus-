<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 16:50
 */

$model = new Kota();

?>

<h3 class="head-top">Data Kota</h3>
<a href="?page=kota_edit" class="btn btn-primary"> Tambah</a>
<hr>
<table class="table table-bordered table-responsive">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
<?php
$no=1;
foreach($model->getAll() as $row){
?>
    <tr>
        <td><?=$no++?></td>
        <td><?=$row['nama_kota']?></td>
        <td>
            <a href="?page=kota_edit&id=<?=$row['id_kota']?>" class="btn btn-primary">Edit</a>
            <a href="#" id="<?=$row['id_kota']?>" class="btn btn-danger btn-del">Delete</a>
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
                url: "page/kota_act.php?delete&id="+id
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
