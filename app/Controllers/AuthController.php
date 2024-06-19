<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Middleware\Middleware;
use App\Models\User;
use App\Utils\Redirect;

class AuthController extends Controller
{

    public function auth($data)
    {
        Middleware::forGuest();
        session_start();
        $user = (new User())->auth($data);

        if (!$user) {
            $_SESSION['error'] = [
                'title' => "Invalid credential.",
                'message' => "The credential that you have provided didn't match any data in our system."
            ];
            Redirect::to('/');
        }

        $_SESSION['id'] = $user->id;
        $_SESSION['username'] = $user->username;

        Redirect::to('/');
        exit;
    }

    public function logout()
    {
        Middleware::forAuth();
        session_start();
        session_destroy();

        Redirect::to('/');
        exit;
    }

}
