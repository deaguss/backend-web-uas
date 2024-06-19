<?php

namespace App\Controllers;

class Controller
{
    public function view($view, $data = [])
    {
        extract($data);

        require_once __DIR__ . "/../../resources/views/$view.php";
    }
}
