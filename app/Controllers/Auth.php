<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        $data['config'] = config('Auth');

        return view('Auth/login', $data);
    }

    public function register()
    {
        return view('Auth/register');
    }
}
