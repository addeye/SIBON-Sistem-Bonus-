<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 17:06
 */
session_start();
spl_autoload_register(function ($class) {
    include 'class/'.$class.'.php';
});

$logout = new User();

if($logout->getLogout())
{
    $logout->redirect('login.php');
}