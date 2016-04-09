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
    <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">Manajemen</span><span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li><a href="?page=admin" class=" hvr-bounce-to-right"> <i class="fa fa-area-chart nav_icon"></i>User</a></li>
        <li><a href="maps.html" class=" hvr-bounce-to-right"><i class="fa fa-map-marker nav_icon"></i>Setting</a></li>
    </ul>
</li>
<li>
    <a href="?page=pegawai" class=" hvr-bounce-to-right"><i class="fa fa-inbox nav_icon"></i> <span class="nav-label">Pegawai</span> </a>
</li>
<li>
    <a href="gallery.html" class=" hvr-bounce-to-right"><i class="fa fa-picture-o nav_icon"></i> <span class="nav-label">Customer</span> </a>
</li>
<li>
    <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-list nav_icon"></i> <span class="nav-label">Data Master</span><span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li><a href="forms.html" class=" hvr-bounce-to-right"><i class="fa fa-align-left nav_icon"></i>Kriteria</a></li>
        <li><a href="validation.html" class=" hvr-bounce-to-right"><i class="fa fa-check-square-o nav_icon"></i>Data</a></li>
    </ul>
</li>
<?php } ?>

<?php if($_SESSION['user_level']=='pegawai'){?>
    <li>
        <a href="index.php" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboards</span> </a>
    </li>
    <li>
        <a href="?page=customer" class=" hvr-bounce-to-right"><i class="fa fa-inbox nav_icon"></i> <span class="nav-label">Customer</span> </a>
    </li>
    <li>
        <a href="?page=profile" class=" hvr-bounce-to-right"><i class="fa fa-picture-o nav_icon"></i> <span class="nav-label">Profil</span> </a>
    </li>
    <li>
        <a href="gallery.html" class=" hvr-bounce-to-right"><i class="fa fa-picture-o nav_icon"></i> <span class="nav-label">Ganti Password</span> </a>
    </li>
    <li>
        <a href="gallery.html" class=" hvr-bounce-to-right"><i class="fa fa-picture-o nav_icon"></i> <span class="nav-label">Laporan</span> </a>
    </li>
<?php } ?>

<?php if($_SESSION['user_level']=='customer'){?>
    <li>
        <a href="index.php" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboards</span> </a>
    </li>
    <li>
        <a href="?page=pegawai" class=" hvr-bounce-to-right"><i class="fa fa-inbox nav_icon"></i> <span class="nav-label">Reward</span> </a>
    </li>
    <li>
        <a href="gallery.html" class=" hvr-bounce-to-right"><i class="fa fa-picture-o nav_icon"></i> <span class="nav-label">Info Trip</span> </a>
    </li>
<?php } ?>
