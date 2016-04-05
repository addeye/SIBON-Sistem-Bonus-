<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 17:02
 */
session_start();

spl_autoload_register(function ($class) {
    include 'class/'.$class.'.php';
});

$user = new User();

// if user session is not active(not loggedin) this page will help 'home.php and profile.php' to redirect to login page
// put this file within secured pages that users (users can't access without login)

if(!$user->cekLogin())
{
    // session no set redirects to login page
    $user->redirect('login.php');
}