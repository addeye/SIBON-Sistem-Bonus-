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

if(!function_exists('countDate'))
{
    function countDate($date)
    {
        $dt1 = new DateTime($date);
        $dt2 = new DateTime(date('Y-m-d'));
        $telat = $dt1->diff($dt2);

        return $telat->days;
    }
}