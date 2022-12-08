<?php

namespace App\Controllers;

use App\Models\GenreModel;
use CodeIgniter\Validation\Rules;

class Genre extends BaseController
{
    protected $genreModel;
    public function __construct()
    {
        $this->genreModel = new GenreModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Genre',
            'genre' => $this->genreModel->getGenre()
        ];

        return view('admin/genre/genreIndex', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Add | Genre',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/genre/genreTambah', $data);
    }

    public function save()
    {
        //input validation
        if (!$this->validate([
            'nama_genre' => [
                'rules' => 'required|is_unique[genre.nama_genre]',
                'errors' => [
                    'required' => '{field} coloumn must be filled',
                    'is_unique' => '{field} must be different from other'
                ]
            ]
        ])) {
            return redirect()->to('/Genre/create')->withInput();
        }


        $this->genreModel->save([
            'nama_genre' => $this->request->getVar('nama_genre'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil Ditambahkan.');

        return redirect()->to('/genre');
    }

    public function delete($id_genre)
    {
        $this->genreModel->delete($id_genre);

        session()->setFlashdata('pesan', 'Data berhasil Dihapus.');

        return redirect()->to('/Genre/index');
    }

    public function edit($id_genre)
    {
        $data = [
            'title' => 'Edit | Comic',
            'validation' => \Config\Services::validation(),
            'genre' => $this->genreModel->find($id_genre),
        ];
        return view('admin/genre/genreEdit', $data);
    }

    public function update($id_genre)
    {

        if (!$this->validate([
            'nama_genre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} coloumn must be filled',
                    'is_unique' => '{field} must be different from other'
                ]
            ]

        ])) {
            return redirect()->to('/Genre/edit/' . $this->request->getVar('id_genre'))->withInput();
        }

        $this->genreModel->save([
            'id_genre' => $id_genre,
            'nama_genre' => $this->request->getVar('nama_genre')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil Diubah.');

        return redirect()->to('/Genre/index');
    }
}
