<?php

namespace App\Models;

use App\Models\Model;

class User extends Model
{
    public $table = 'users';

    public function __construct()
    {
        parent::__construct($this->table);
    }

    public function auth($data)
    {
        $username = $data['username'];
        $password = $data['password'];
        $query = mysqli_query($this->db, "SELECT * FROM $this->table WHERE username='$username' AND password='$password'");
        return mysqli_fetch_object($query);
    }
}
