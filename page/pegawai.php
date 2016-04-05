<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 16:50
 */

$admin = new Admin();

?>

<html>
<head></head>
<body>
<?=$user->email_user?> <a href="../logout.php">Logout</a>
<h3>Selamat Datang Pegawai <?= $user->nama_user ?> </h3>
<?php
foreach($admin->getAll() as $val){
    echo $val['nama'];
}
?>
</body>
</html>
