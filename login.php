<?php
session_start();
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 15:52
 */
spl_autoload_register(function ($class) {
    include 'class/'.$class.'.php';
 });

$user = new User();

if($user->cekLogin())
{
    $user->redirect('home.php');
}

if(isset($_POST['login'])) {
    $data = $_POST;
    $result =  $user->getlogin($data) ;

    if($result)
    {
        $user->redirect('home.php');
    }
    else
    {
        $error = 'Pastikan Email dan Password Sesuai';
    }
}
?>

<html>
<head></head>
<body>
<?= isset($error)? $error : '' ?>
<form method="post">
<input type="text" name="email">
<input type="password" name="password">
    <input type="submit" name="login" value="Login">
</form>
</body>
</html>
