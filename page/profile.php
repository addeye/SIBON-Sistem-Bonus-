<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 09/04/2016
 * Time: 22:59
 */

$model = new Pegawai();

$data = $model->getById($user::pengguna_id());

?>

<div class=" profile">

    <div class="profile-bottom">
        <h3><i class="fa fa-user"></i>Profile</h3>
        <div class="profile-bottom-top">
            <div class="col-md-4 profile-bottom-img">
                <img src="images/pr.jpg" alt="">
            </div>
            <div class="col-md-8 profile-text">
                <h6><?=$data['nama']?></h6>
                <table>
                    <tr><td>Tanggal Lahir</td>
                        <td>:</td>
                        <td><?=$data['tgl_lahir']?></td>
                    </tr>
                    <tr><td>No Telepon</td>
                        <td>:</td>
                        <td><?=$data['no_telp']?></td>
                    </tr>
                    <tr><td>Alamat</td>
                        <td>:</td>
                        <td><?=$data['alamat']?></td>
                    </tr>
                    <tr><td>Masuk Sejak</td>
                        <td>:</td>
                        <td><?=$data['tgl_masuk']?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td> :</td>
                        <td><a href="#"><?=$data['email']?></a></td>
                    </tr>
                </table>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="profile-bottom-bottom">
            <div class="col-md-6 profile-fo">
                <h4><?=$model->getCountCustomerByPegawai($user::pengguna_id())?></h4>
                <p>Customer</p>
                <a href="?page=customer" class="pro"><i class="fa fa-plus-circle"></i>Customer</a>
            </div>
            <div class="col-md-6 profile-fo">
                <h4>-</h4>
                <p>Edit Profil</p>
                <a href="?page=profile_edit&id=<?=$data['id_pegawai']?>" class="pro1"><i class="fa fa-user"></i>Edit</a>
            </div>
            <div class="clearfix"></div>
        </div>
<!--        <div class="profile-btn">-->
<!--            <button type="button" href="#" class="btn bg-red">Save changes</button>-->
<!--            <div class="clearfix"></div>-->
<!--        </div>-->


    </div>
</div>
