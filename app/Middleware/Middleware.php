<?php

namespace App\Middleware;
use App\Utils\Redirect;

class Middleware
{
    public static function forGuest()
    {
        if (isset($_SESSION['id'])) Redirect::to('/');
    }
    public static function forAuth()
    {
        if (!isset($_SESSION['id'])) Redirect::to('/');
    }
}
