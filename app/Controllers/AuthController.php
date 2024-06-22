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
            return Redirect::to('/');
        }
    
        $_SESSION['id'] = $user->id;
        $_SESSION['username'] = $user->username;
    
        $_SESSION['success'] = [
            'title' => "Login successful.",
            'message' => "You have successfully logged in to our system."
        ];
    
        return Redirect::to('/');
    }
    

    public function logout()
    {
        Middleware::forAuth();
        session_start();
        session_destroy();

        $_SESSION['success'] = [
            'title' => "Logout successful.",
            'message' => "You have successfully logged out of our system."
        ];

        return Redirect::to('/');
    }

}
