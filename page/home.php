<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 16:50
 */

include "normalisasi_act.php";
$admin = new Admin();
$pegawai = new Pegawai();
?>

<h3>Selamat Datang <?= $user->nama_user ?> </h3>
<hr>
<?= $user::pengguna_id()==$idpegawai? '<div class="alert alert-success">Selamat Anda Mendapatkan Bonus dengan nilai Normalisasi '.$terbesar.'</div>' : '' ?>
