<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 16:50
 */

require_once("session.php");
$user = new User();
$admin = new Admin();

?>

<html>
<head></head>
<body>
<?=$user->email_user?> <a href="logout.php">Logout</a>
<h1>Selamat Datang <?= $user->nama_user ?> </h1>
<?php
foreach($admin->getAll() as $val){
    echo $val['nama'];
}
?>
</body>
</html>
