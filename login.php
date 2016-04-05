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
        $user->redirect('index.php');
    }
    else
    {
        $error = 'Pastikan Email dan Password Sesuai';
    }
}
?>


<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <title>Minimal an Admin Panel Category Flat Bootstrap Responsive Website Template | Signin :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
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
    <h1><a href="index.html">Minimal </a></h1>
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
                <a class="news-letter " href="#">
                    <label class="checkbox1"><input type="checkbox" name="checkbox" ><i> </i>Forget Password</label>
                </a>
            </div>
            <div class="col-md-6 login-do">
                <label class="hvr-shutter-in-horizontal login-sub">
                    <input type="submit" name="login" value="login">
                </label>
                <p>Do not have an account?</p>
                <a href="signup.html" class="hvr-shutter-in-horizontal">Signup</a>
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


