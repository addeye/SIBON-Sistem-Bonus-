<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 07/04/2016
 * Time: 14:11
 */
?>

<?php if($_SESSION['user_level']=='admin'){?>

<li>
    <a href="index.php" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboards</span> </a>
</li>
    <li>
        <a href="?page=admin" class=" hvr-bounce-to-right"><i class="fa fa-user-secret nav_icon"></i> <span class="nav-label">User Admin</span> </a>
    </li>
<li>
    <a href="?page=pegawai" class=" hvr-bounce-to-right"><i class="fa fa-user nav_icon"></i> <span class="nav-label">Pegawai</span> </a>
</li>
<li>
    <a href="?page=customer_all" class=" hvr-bounce-to-right"><i class="fa fa-user-md nav_icon"></i> <span class="nav-label">Customer</span> </a>
</li>
    <li>
        <a href="?page=kinerjalistpegawai" class=" hvr-bounce-to-right"><i class="fa fa-area-chart nav_icon"></i> <span class="nav-label">Kinerja</span> </a>
    </li>
    <li>
        <a href="?page=normalisasi" class=" hvr-bounce-to-right"><i class="fa fa-area-chart nav_icon"></i> <span class="nav-label">Normalisasi</span> </a>
    </li>
<li>
    <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-cc-discover nav_icon"></i> <span class="nav-label">Data Master</span><span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li><a href="?page=kota" class=" hvr-bounce-to-right"><i class="fa fa-align-left nav_icon"></i>Data Kota</a></li>
        <li><a href="?page=trip" class=" hvr-bounce-to-right"><i class="fa fa-align-left nav_icon"></i>Data Trip</a></li>
        <li><a href="?page=bobot" class=" hvr-bounce-to-right"><i class="fa fa-align-left nav_icon"></i>Data Bobot</a></li>
    </ul>
</li>
<?php } ?>

<?php if($_SESSION['user_level']=='pegawai'){?>
    <li>
        <a href="index.php" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboards</span> </a>
    </li>
    <li>
        <a href="?page=customer" class=" hvr-bounce-to-right"><i class="fa fa-user-plus nav_icon"></i> <span class="nav-label">Customer</span> </a>
    </li>
    <li>
        <a href="?page=profile" class=" hvr-bounce-to-right"><i class="fa fa-user nav_icon"></i> <span class="nav-label">Profil</span> </a>
    </li>
    <li>
        <a href="?page=wish_pegawai" class=" hvr-bounce-to-right"><i class="fa fa-list-alt nav_icon"></i> <span class="nav-label">WishCustomer</span> </a>
    </li>
<?php } ?>

<?php if($_SESSION['user_level']=='customer'){?>
    <li>
        <a href="index.php" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboards</span> </a>
    </li>
    <li>
        <a href="?page=reward" class=" hvr-bounce-to-right"><i class="fa fa-inbox nav_icon"></i> <span class="nav-label">Reward</span> </a>
    </li>
    <li>
        <a href="?page=wish" class=" hvr-bounce-to-right"><i class="fa fa-picture-o nav_icon"></i> <span class="nav-label">Wishlist Trip</span> </a>
    </li>
<?php } ?>
