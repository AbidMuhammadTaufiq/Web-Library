<?php

namespace App\Models;

use CodeIgniter\Model;

class ResensiModel extends Model
{
    protected $table = 'resensi';
    protected $primaryKey = 'id_resensi';
    protected $useAutoIncrement = true;
    // protected $returnType     = 'array';
    protected $allowedFields = ['judul_resensi', 'id_judul', 'id', 'isi_resensi',];
    // protected $returnType = 'array';
    // protected $useTimestamps = true;
    // protected $session;

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;



    public function getResensi()
    {
        $query = $this->db->table('resensi')
            ->join('users', 'users.id=resensi.id')
            ->join('judul', 'judul.id_judul=resensi.id_judul')
            ->join('genre', 'genre.id_genre=judul.id_genre')
            ->join('penerbit', 'penerbit.id_penerbit=judul.id_penerbit')
            ->get()->getResultArray();

        return $query;
    }

    public function getResensiByUser()
    {
        $query = $this->db->table('resensi')
            ->join('users', 'users.id=resensi.id')
            ->join('judul', 'judul.id_judul=resensi.id_judul')
            ->join('genre', 'genre.id_genre=judul.id_genre')
            ->join('penerbit', 'penerbit.id_penerbit=judul.id_penerbit')
            ->where('users.id', user()->id)
            ->get()->getResultArray();

        return $query;
    }
}
