<?php

namespace App\Controllers;

use App\Models\RekomendasiModel;
use App\Models\BukuModel;
use CodeIgniter\Validation\Rules;

class Rekomendasi extends BaseController
{
    protected $rekomendasiModel;
    protected $bukuModel;
    public function __construct()
    {
        $this->rekomendasiModel = new RekomendasiModel();
        $this->bukuModel = new BukuModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Rekomendasi Buku',
            'rekomendasi' => $this->rekomendasiModel->getRekomendasi()
        ];

        return view('admin/rekomendasi/rekomendasiIndex', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Add | Rekomendasi Buku',
            'buku' => $this->bukuModel->orderBy('judul_buku', 'ASC')->findAll(),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/rekomendasi/rekomendasiTambah', $data);
    }

    public function save()
    {
        $this->rekomendasiModel->save([
            'id_judul' => $this->request->getVar('id_judul'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil Ditambahkan.');

        return redirect()->to('/Rekomendasi/index');
    }

    public function delete($id_rekomendasi)
    {
        $this->rekomendasiModel->delete($id_rekomendasi);

        session()->setFlashdata('pesan', 'Data berhasil Dihapus.');

        return redirect()->to('/Rekomendasi/index');
    }
}
