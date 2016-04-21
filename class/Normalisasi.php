<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 21/04/2016
 * Time: 21:18
 */
class Normalisasi
{
    public function benefitcost($pembilang,$pembagi)
    {
        $result = $pembilang/$pembagi;
        return $result;
    }

    public function getHeightValue($data= array())
    {
        $result = max($data);
        return $result;
    }

    public function getLowValue($data= array())
    {
        $result = min($data);
        return $result;
    }

    public function prosentase($kriteria,$bencost)
    {
        $result = $bencost*$kriteria;
        return $result;
    }

    public function metodeSaw($data=array())
    {

    }
}