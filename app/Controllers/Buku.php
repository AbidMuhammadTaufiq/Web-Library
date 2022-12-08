<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\GenreModel;
use App\Models\PenerbitModel;
use CodeIgniter\Validation\Rules;

class Buku extends BaseController
{
    protected $bukuModel;
    protected $genreModel;
    protected $penerbitModel;
    public function __construct()
    {
        $this->bukuModel = new BukuModel();
        $this->genreModel = new GenreModel();
        $this->penerbitModel = new PenerbitModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Judul',
            'buku' => $this->bukuModel->getBuku()
        ];

        return view('admin/buku/bukuIndex', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Add | Judul',
            // 'buku' => $this->bukuModel->getBuku(),
            'genre' => $this->genreModel->orderBy('nama_genre', 'ASC')->findAll(),
            'penerbit' => $this->penerbitModel->orderBy('nama_penerbit', 'ASC')->findAll(),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/buku/bukuTambah', $data);
    }

    public function save()
    {
        //input validation
        if (!$this->validate([
            'sampul' => [
                'rules' => 'max_size[sampul,3069]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => '{field} must fill less then 3mb',
                    'is_image' => 'image must be img',
                    'mime_in' => 'the extension must be jpg, jpeg, or png'
                ]
            ]

        ])) {
            return redirect()->to('/Buku/create')->withInput();
        }

        $fileSampul = $this->request->getFile('sampul');

        //there is image or not
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.png';
        } else {
            // generate sampul's name randomly
            $namaSampul = $fileSampul->getRandomName();

            // move file to folder img
            $fileSampul->move('img/', $namaSampul);

            // // get sampul's  file name
            // $namaSampul = $fileSampul->getName();
        }


        // $slug = url_title($this->request->getVar('judul_buku'), '-', true);

        $this->bukuModel->save([
            'judul_buku' => $this->request->getVar('judul_buku'),
            // 'slug' => $slug,
            'isbn' => $this->request->getVar('isbn'),
            'id_genre' => $this->request->getVar('id_genre'),
            'penulis' => $this->request->getVar('penulis'),
            'id_penerbit' => $this->request->getVar('id_penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'jumlah_halaman' => $this->request->getVar('jumlah_halaman'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil Ditambahkan.');

        return redirect()->to('/Buku/index');
    }

    public function delete($id_judul)
    {
        // find image according to id
        $buku = $this->bukuModel->find($id_judul);

        // if image is default.png
        if ($buku['sampul'] != 'default.png') {

            // delete image
            unlink('img/' . $buku['sampul']);
        }

        $this->bukuModel->delete($id_judul);

        session()->setFlashdata('pesan', 'Data berhasil Dihapus.');

        return redirect()->to('/Buku/index');
    }

    public function edit($id_judul)
    {
        $data = [
            'title' => 'Edit | Judul',
            'validation' => \Config\Services::validation(),
            'buku' => $this->bukuModel->find($id_judul),
            'genre' => $this->genreModel->getGenre(),
            'penerbit' => $this->penerbitModel->getPenerbit()
        ];
        return view('admin/buku/bukuEdit', $data);
    }

    public function update($id_judul)
    {
        // check judul
        // $bukuLama = $this->bukuModel->getBuku($this->request->getVar('judul_buku'));
        // if ($bukuLama['judul_buku'] == $this->request->getVar('judul_buku')) {
        //     $rule_judul = 'required';
        // } else {
        //     $rule_judul = 'required|is_unique[judul.nama_judul]';
        // }


        if (!$this->validate([
            'judul_buku' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} coloumn must be filled',
                    'is_unique' => '{field} must be different from other'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,3069]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => '{field} must fill less then 3mb',
                    'is_image' => 'image must be img',
                    'mime_in' => 'the extension must be jpg, jpeg, or png'
                ]
            ]

        ])) {
            return redirect()->to('/Buku/edit/' . $this->request->getVar('id_judul'))->withInput();
        }

        $sampulLama = $this->request->getVar('sampulLama');
        $fileSampul = $this->request->getFile('sampul');
        if ($fileSampul->isValid() && !$fileSampul->hasMoved()) {
            if (file_exists("img/" . $sampulLama)) {
                unlink("img/" . $sampulLama);
            }
            $namaSampul = $fileSampul->getRandomName();
            $fileSampul->move("img/", $namaSampul);
        } else {
            $namaSampul = $sampulLama;
        }

        // $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->bukuModel->save([
            'id_judul' => $id_judul,
            'judul_buku' => $this->request->getVar('judul_buku'),
            'isbn' => $this->request->getVar('isbn'),
            'id_genre' => $this->request->getVar('id_genre'),
            'penulis' => $this->request->getVar('penulis'),
            'id_penerbit' => $this->request->getVar('id_penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'jumlah_halaman' => $this->request->getVar('jumlah_halaman'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil Diubah.');

        return redirect()->to('/Buku/index');
    }
}
