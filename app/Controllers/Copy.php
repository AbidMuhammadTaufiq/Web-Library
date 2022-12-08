<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\CopyModel;
use App\Models\GenreModel;
use App\Models\PenerbitModel;
use CodeIgniter\Validation\Rules;

class Copy extends BaseController
{
    protected $copyModel;
    protected $bukuModel;
    public function __construct()
    {
        $this->copyModel = new CopyModel();
        $this->bukuModel = new BukuModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Copy',
            'copy' => $this->copyModel->getCopy()
        ];

        return view('admin/copy/copyIndex', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Add | Copy',
            'buku' => $this->bukuModel->orderBy('judul_buku', 'ASC')->findAll(),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/copy/copyTambah', $data);
    }

    public function save()
    {
        $this->copyModel->save([
            'id_judul' => $this->request->getVar('id_judul'),
            'eksemplar' => $this->request->getVar('eksemplar'),
            'kondisi' => $this->request->getVar('kondisi')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil Ditambahkan.');

        return redirect()->to('/Copy/index');
    }

    public function delete($id_copy)
    {
        $this->copyModel->delete($id_copy);

        session()->setFlashdata('pesan', 'Data berhasil Dihapus.');

        return redirect()->to('/Copy/index');
    }

    public function edit($id_copy)
    {
        $data = [
            'title' => 'Edit | Comic',
            'validation' => \Config\Services::validation(),
            'copy' => $this->copyModel->find($id_copy),
            'copyy' => $this->copyModel->getCopy(),
            'buku' => $this->bukuModel->getBuku()
        ];
        return view('admin/copy/copyEdit', $data);
    }

    public function update($id_copy)
    {
        $this->copyModel->save([
            'id_copy' => $id_copy,
            'id_judul' => $this->request->getVar('id_judul'),
            'eksemplar' => $this->request->getVar('eksemplar'),
            'kondisi' => $this->request->getVar('kondisi')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil Diubah.');

        return redirect()->to('/Copy/index');
    }
}
