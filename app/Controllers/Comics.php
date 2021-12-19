<?php

namespace App\Controllers;

use App\Models\ComicsModel;
use CodeIgniter\Validation\Rules;

class Comics extends BaseController
{
    protected $comicsModel;
    public function __construct()
    {
        $this->comicsModel = new ComicsModel();
    }
    public function index()
    {
        // $comics = $this->comicsModel->findAll();
        $data = [
            'title' => 'Daftar Komik',
            'comics' => $this->comicsModel->getComics()
        ];

        // //cara connect db tanpa model

        // $db = \Config\Database::connect();
        // $comics = $db->query("SELECT * FROM comics ");

        // foreach ($comics->getResultArray() as $row) {
        //     dd($row);
        // }



        return view('Comics/index', $data);
    }
    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Comic',
            'comic' => $comics = $this->comicsModel->getComics($slug)
        ];

        // if comic didnt exist in table
        if (empty($data['comic'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul komik ' . $slug . ' tidak ditemukan');
        }
        return view('Comics/detail', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Add | Comic',
            'validation' => \Config\Services::validation()
        ];
        return view('Comics/create', $data);
    }

    public function save()
    {

        //input validation
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[comics.judul]',
                'errors' => [
                    'required' => '{field} coloumn must be filled',
                    'is_unique' => '{field} must be different from other'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => '{field} must fill less then 1mb',
                    'is_image' => 'image must be img',
                    'mime_in' => 'the extension must be jpg, jpeg, or png'
                ]
            ]

        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/Comics/create')->withInput()->with('validation', $validation);
            return redirect()->to('/Comics/create')->withInput();
        }

        $fileSampul = $this->request->getFile('sampul');

        //there is image or not
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.png';
        } else {
            // generate sampul's name randomly
            $namaSampul = $fileSampul->getRandomName();

            // move file to folder img
            $fileSampul->move('img', $namaSampul);

            // // get sampul's  file name
            // $namaSampul = $fileSampul->getName();
        }


        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->comicsModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil Ditambahkan.');

        return redirect()->to('/comics');
    }

    public function delete($id)
    {
        $this->comicsModel->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil Dihapus.');

        return redirect()->to('/Comics');
    }

    public function edit($slug)
    {
        // session();
        // if (!isset($_SESSION['Comics/edit'])) {
        //     $data = array(
        //         'judul' => '',
        //         'penulis' => '',
        //         'penerbit' => '',
        //         'sampul' => ''
        //     );
        //     session()->setFlashdata('Comics/edit', $data);
        // }
        $data = [
            'title' => 'Edit | Comic',
            'validation' => \Config\Services::validation(),
            'comic' => $this->comicsModel->getComics($slug)
        ];
        return view('Comics/edit', $data);
    }

    public function update($id)
    {
        // check judul
        $oldcomic = $this->comicsModel->getComics($this->request->getVar('slug'));
        if ($oldcomic['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[comics.judul]';
        }


        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} coloumn must be filled',
                    'is_unique' => '{field} must be different from other'
                ]
            ]

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/Comics/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->comicsModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil Diubah.');

        return redirect()->to('/comics');
    }
}
