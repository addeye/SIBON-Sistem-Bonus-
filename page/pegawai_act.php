<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 23:04
 */

include "../session.php";

$model = new Pegawai();

if(isset($_GET['delete'])){
    $result = $model->delete($_GET['id']);
    echo $result;
}