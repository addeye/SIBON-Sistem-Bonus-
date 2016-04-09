<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 09/04/2016
 * Time: 15:59
 */
trait SessionTrait
{
    function pengguna_id()
    {
        return $_SESSION['user_session'];
    }

    function pengguna_level()
    {
        return $_SESSION['user_level'];
    }

}