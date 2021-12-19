<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | WebProgramming'
        ];
        return view('pages/home', $data);
    }
    public function about()
    {
        $data = [
            'title' => 'About Me | WebProgramming'
        ];
        return view('pages/about', $data);
    }
    public function contact()
    {
        $data = [
            'title' => 'Contact Us',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl. Cendrawasih',
                    'kota' => 'solo'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jl. Subroto',
                    'kota' => 'Sukoharjo'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }
}
