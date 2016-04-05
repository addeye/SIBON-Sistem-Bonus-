<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 23:04
 */

include "../session.php";

$admin = new Admin();

if(isset($_GET['delete'])){
    $result = $admin->delete($_GET['id']);

    echo $result;
}