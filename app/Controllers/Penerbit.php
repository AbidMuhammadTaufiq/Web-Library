<?php

namespace App\Controllers;

use App\Models\PenerbitModel;
use CodeIgniter\Validation\Rules;

class Penerbit extends BaseController
{
    protected $penerbitModel;
    public function __construct()
    {
        $this->penerbitModel = new PenerbitModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Penerbit',
            'penerbit' => $this->penerbitModel->getPenerbit()
        ];

        return view('admin/penerbit/penerbitIndex', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Add | Penerbit',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/penerbit/penerbitTambah', $data);
    }

    public function save()
    {
        //input validation
        if (!$this->validate([
            'nama_penerbit' => [
                'rules' => 'required|is_unique[penerbit.nama_penerbit]',
                'errors' => [
                    'required' => '{field} coloumn must be filled',
                    'is_unique' => '{field} must be different from other'
                ]
            ]
        ])) {
            return redirect()->to('/Penerbit/create')->withInput();
        }


        $this->penerbitModel->save([
            'nama_penerbit' => $this->request->getVar('nama_penerbit'),
            'alamat_penerbit' => $this->request->getVar('alamat_penerbit'),
            'tlp_penerbit' => $this->request->getVar('tlp_penerbit'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil Ditambahkan.');

        return redirect()->to('/penerbit');
    }

    public function delete($id_penerbit)
    {
        $this->penerbitModel->delete($id_penerbit);

        session()->setFlashdata('pesan', 'Data berhasil Dihapus.');

        return redirect()->to('/Penerbit/index');
    }

    public function edit($id_penerbit)
    {
        $data = [
            'title' => 'Edit | Penerbit',
            'validation' => \Config\Services::validation(),
            'penerbit' => $this->penerbitModel->find($id_penerbit),
        ];
        return view('admin/penerbit/penerbitEdit', $data);
    }

    public function update($id_penerbit)
    {

        if (!$this->validate([
            'nama_penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} coloumn must be filled',
                    // 'is_unique' => '{field} must be different from other'
                ]
            ]

        ])) {
            return redirect()->to('/Penerbit/edit/' . $this->request->getVar('id_penerbit'))->withInput();
        }

        $this->penerbitModel->save([
            'id_penerbit' => $id_penerbit,
            'nama_penerbit' => $this->request->getVar('nama_penerbit'),
            'alamat_penerbit' => $this->request->getVar('alamat_penerbit'),
            'tlp_penerbit' => $this->request->getVar('tlp_penerbit')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil Diubah.');

        return redirect()->to('/Penerbit/index');
    }
}
