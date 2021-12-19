<?php

namespace App\Controllers;

class Coba extends BaseController
{
    public function index($nama = '', $umur = 0)
    {
        echo "hello saya $nama umur saya $umur tahun";
    }

    public function coba()
    {
        echo "hello world";
    }
}
