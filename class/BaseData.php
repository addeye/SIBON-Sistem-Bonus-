<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 15:36
 */
interface BaseData
{
    public function getAll();

    public function getById($id);

    public function insert($data = array());

    public function update($data = array(),$id);

    public function delete($id);

}