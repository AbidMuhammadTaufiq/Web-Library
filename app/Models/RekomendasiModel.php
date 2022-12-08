<?php

namespace App\Models;

use CodeIgniter\Model;

class RekomendasiModel extends Model
{
    protected $table = 'rekomendasi';
    protected $primaryKey = 'id_rekomendasi';
    protected $useAutoIncrement = true;
    // protected $returnType     = 'array';
    protected $allowedFields = ['id_judul', 'judul_buku'];
    // protected $returnType = 'array';
    // protected $useTimestamps = true;
    // protected $session;

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;



    public function getRekomendasi()
    {
        $query = $this->db->table('rekomendasi')
            ->join('judul', 'judul.id_judul=rekomendasi.id_judul')
            ->join('genre', 'genre.id_genre=judul.id_genre')
            ->join('penerbit', 'penerbit.id_penerbit=judul.id_penerbit')
            ->get()->getResultArray();

        return $query;
    }
}
