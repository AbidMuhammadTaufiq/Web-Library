<?php

namespace App\Controllers;

use App\Models\PeminjamanModel;
use App\Models\ResensiModel;
use App\Models\BukuModel;
use \Myth\Auth\Models\UserModel;

class Member extends BaseController
{
    protected $peminjamanModel;
    protected $resensiModel;
    protected $userModel;
    protected $bukuModel;
    protected $db, $builder;
    public function __construct()
    {
        $this->peminjamanModel = new PeminjamanModel();
        $this->resensiModel = new ResensiModel();
        $this->userModel = new UserModel();
        $this->bukuModel = new BukuModel();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard Member',
            'resensi' => $this->resensiModel
                ->join('users', 'users.id=resensi.id')
                ->like('users.id', user()->id)->countAllResults(),
            'peminjaman' => $this->peminjamanModel
                ->join('users', 'users.id=peminjaman.id')
                ->where('users.id', user()->id)
                ->countAllResults(),
        ];

        return view('member/index', $data);
    }

    public function profile()
    {

        $data['title'] = 'My Profile';

        return view('/member/profile', $data);
    }

    //peminjaman member by user
    public function peminjamanIndex()
    {
        $data = [
            'title' => 'Riwayat Peminjaman',
            'peminjaman' => $this->peminjamanModel->getPeminjamanByUser()
        ];

        return view('/member/peminjamanIndex', $data);
    }

    //resensi member by user
    public function resensiIndex()
    {
        $data = [
            'title' => 'Daftar Resensi',
            'resensi' => $this->resensiModel->getResensiByUser()
        ];

        return view('/member/resensiIndex', $data);
    }

    public function resensiDetail($id_resensi)
    {
        $data = [
            'title' => 'Isi Resensi',
            'resensi' => $this->resensiModel
                ->join('users', 'users.id=resensi.id')
                ->join('judul', 'judul.id_judul=resensi.id_judul')
                ->join('genre', 'genre.id_genre=judul.id_genre')
                ->join('penerbit', 'penerbit.id_penerbit=judul.id_penerbit')
                ->find($id_resensi)
        ];

        // if comic didnt exist in table
        if (empty($data['resensi'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Isi resensi ' . $id_resensi . ' tidak ditemukan');
        }
        return view('member/resensiIsi', $data);
    }

    public function resensiTambah()
    {
        $this->builder->select('users.id as userid, username, email, fullname, instansi, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('auth_groups_users.group_id !=', '1');
        $query = $this->builder->get();

        // session();
        $data = [
            'title' => 'Add | Resensi',
            'buku' => $this->bukuModel->getBuku(),
            'user' => $query->getResult(),
            'validation' => \Config\Services::validation()
        ];

        return view('member/resensiTambah', $data);
    }

    public function save()
    {
        //input validation
        if (!$this->validate([
            'judul_resensi' => [
                'rules' => 'required|is_unique[resensi.judul_resensi]',
                'errors' => [
                    'required' => '{field} coloumn must be filled',
                    'is_unique' => '{field} must be different from other'
                ]
            ]

        ])) {
            return redirect()->to('/member/resensiTambah')->withInput();
        }


        $this->resensiModel->save([
            'judul_resensi' => $this->request->getVar('judul_resensi'),
            'id_judul' => $this->request->getVar('id_judul'),
            'id' => $this->request->getVar('id'),
            'isi_resensi' => $this->request->getVar('isi_resensi'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil Ditambahkan.');

        return redirect()->to('/member/resensiIndex');
    }

    public function resensiEdit($id_resensi)
    {
        $this->builder->select('users.id as userid, username, email, fullname, instansi, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('auth_groups_users.group_id !=', '1');
        $query = $this->builder->get();

        $data = [
            'title' => 'Edit | Resensi',
            'validation' => \Config\Services::validation(),
            'resensi' => $this->resensiModel->find($id_resensi),
            'buku' => $this->bukuModel->getBuku(),
            'user' => $query->getResult(),
        ];
        return view('/member/resensiEdit', $data);
    }

    public function update($id_resensi)
    {
        $this->resensiModel->save([
            'id_resensi' => $id_resensi,
            'judul_resensi' => $this->request->getVar('judul_resensi'),
            'id_judul' => $this->request->getVar('id_judul'),
            'id' => $this->request->getVar('id'),
            'isi_resensi' => $this->request->getVar('isi_resensi')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil Diubah.');

        return redirect()->to('/member/resensiIndex');
    }

    public function resensiDelete($id_resensi)
    {
        $this->resensiModel->delete($id_resensi);

        session()->setFlashdata('pesan', 'Data berhasil Dihapus.');

        return redirect()->to('/member/resensiIndex');
    }
}
