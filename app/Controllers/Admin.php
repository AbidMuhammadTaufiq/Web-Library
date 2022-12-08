<?php

namespace App\Controllers;

use \Myth\Auth\Models\UserModel;
use App\Models\CopyModel;
use App\Models\GenreModel;
use App\Models\PenerbitModel;
use App\Models\ResensiModel;

class Admin extends BaseController
{

    protected $userModel;
    protected $copyModel;
    protected $genreModel;
    protected $penerbitModel;
    protected $resensiModel;
    protected $db, $builder;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->copyModel = new CopyModel();
        $this->genreModel = new GenreModel();
        $this->penerbitModel = new PenerbitModel();
        $this->resensiModel = new ResensiModel();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard Admin',
            'copy' => $this->copyModel->countAll(),
            'genre' => $this->genreModel->countAll(),
            'penerbit' => $this->penerbitModel->countAll(),
            'resensi' => $this->resensiModel->countAll()
        ];
        return view('admin/index', $data);
    }

    public function profile()
    {
        $this->builder->select('users.id as userid, username, email, fullname, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('auth_groups_users.group_id !=', '1');
        $query = $this->builder->get();

        $data = [
            'title' => 'My Profile',
            'user' => $query->getResult()
        ];

        return view('admin/profile', $data);
    }

    public function memberIndex()
    {

        $this->builder->select('users.id as userid, username, email, fullname, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('auth_groups_users.group_id !=', '1');
        $this->builder->where('users.deleted_at', null);
        $query = $this->builder->get();

        $data = [
            'title' => 'Daftar Anggota',
            'user' => $query->getResult(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/member/memberIndex', $data);
    }

    public function memberDetail($id = 0)
    {

        $this->builder->select('users.id as userid, username, email, fullname, name, no_telpon, instansi, user_image');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        $data = [
            'title' => 'Detail Anggota',
            'user' => $query->getRow(),
            'validation' => \Config\Services::validation()
        ];

        if (empty($data['user'])) {
            return redirect()->to('/admin');
        }

        return view('admin/member/memberDetail', $data);
    }

    public function memberDelete($id)
    {
        $this->userModel->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil Dihapus.');

        return redirect()->to('/admin/member/memberIndex');
    }
}
