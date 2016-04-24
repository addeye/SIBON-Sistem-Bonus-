<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 16:50
 */

$model = new Wish();

?>

<h3 class="head-top">Data Wish</h3>
<a href="?page=wish_edit" class="btn btn-primary"> Tambah</a>
<table class="table table-bordered table-responsive">
    <tr>
        <th>No</th>
        <th>Ket</th>
        <th>Rombongan</th>
        <th>Action</th>
    </tr>
<?php
$no=1;
foreach($model->getAll() as $row){
?>
    <tr>
        <td><?=$no++?></td>
        <td><?=$row['ket']?></td>
        <td><?=$row['jml']?></td>
        <td>
            <a href="?page=wishlist&idwish=<?=$row['id_wish']?>" class="btn btn-info">Wishlist</a>
            <a href="?page=wish_edit&id=<?=$row['id_wish']?>" class="btn btn-primary">Edit</a>
            <button type="button" id="<?=$row['id_wish']?>" class="btn btn-danger btn-del">Delete</button>
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
                url: "page/wish_act.php?delete&id="+id
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
