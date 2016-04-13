<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 12/04/2016
 * Time: 20:20
 */
class Sikap implements BaseData
{

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
    }

    public function insert($data = array())
    {
        // TODO: Implement insert() method.
    }

    public function update($data = array(), $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function transformasiData($data = array())
    {
        $result = array();
        if($data['ket']!='')
        {
            $result[]=$data['ket'];
        }
        if($data['nilai']!='')
        {
            $result[]=$data['nilai'];
        }

        return $result;
    }
}