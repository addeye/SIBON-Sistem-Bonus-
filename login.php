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
    if($_POST['level']==1)
    {
        $result =  $user->getloginAdmin($data) ;
    }
    elseif($_POST['level']==2)
    {
        $result =  $user->getLoginPegawai($data) ;
    }
    else
    {
        $result = $user->getLoginCustomer($data);
    }


    if($result)
    {
        $user->redirect('index.php');
    }
    else
    {
        $error = 'Pastikan Email dan Password Sesuai';
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Minimal an Admin Panel Category Flat Bootstrap Responsive Website Template | Signin :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/font-awesome.css" rel="stylesheet">
    <script src="js/jquery.min.js"> </script>
    <script src="js/bootstrap.min.js"> </script>
</head>
<body>
<div class="login">
    <h1><a href="index.html">SISBON </a></h1>
    <div class="login-bottom">
        <h2>Login</h2>

            <?= isset($error)? '<div class="alert alert-danger">'.$error.'</div>' : '' ?>

        <form method="post">
            <div class="col-md-6">
                <div class="login-mail">
                    <input type="text" name="email" placeholder="Email" required="">
                    <i class="fa fa-envelope"></i>
                </div>
                <div class="login-mail">
                    <input type="password" name="password" placeholder="Password" required="">
                    <i class="fa fa-lock"></i>
                </div>
                <div class="">
                    <select name="level" class="form-control" required>
                        <option value="">Pilih Sebagai</option>
                        <?php foreach($user->getLevelUser() as $key=>$val){ ?>
                            <option value="<?=$key?>"><?=$val?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6 login-do">
                <label class="hvr-shutter-in-horizontal login-sub">
                    <input type="submit" name="login" value="login">
                </label>
                <p>Ada Masalah ?</p>
                <a href="#" class="hvr-shutter-in-horizontal">Contact Admin</a>
            </div>

            <div class="clearfix"> </div>
        </form>
    </div>
</div>
<!---->
<div class="copy-right">
    <p> &copy; 2016 Minimal. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>	    </div>
<!---->
<!--scrolling js-->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!--//scrolling js-->
</body>
</html>


