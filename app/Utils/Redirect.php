<?php

namespace App\Utils;

class Redirect
{
    public static function to($url)
    {
        header("Location: $url");
        exit;
    }
}
