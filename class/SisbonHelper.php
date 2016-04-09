<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 09/04/2016
 * Time: 17:32
 */

if(!function_exists('getBulan'))
{
    function getBulan()
    {
        return [
            'januari' => 'Januari',
            'februari' => 'Februari',
            'maret' => 'Maret',
            'april' => 'April',
            'mei' => 'Mei',
            'juni' => 'Juni',
            'juli' => 'Juli',
            'agustus' => 'Agustus',
            'september' => 'September',
            'oktober' => 'Oktober',
            'november'=>'November',
            'desember' => 'Desember'
        ];
    }
}

if(!function_exists('getTahun'))
{
    function getTahun()
    {
        return [
            '2016' => '2016',
            '2017' => '2017',
        ];
    }
}