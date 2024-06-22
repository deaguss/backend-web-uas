<?php

namespace App\Utils;

class Redirect
{
    public static function to($url)
    {
        return header("Location: $url");
    }
}
