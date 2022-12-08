<?php

namespace App\Models;

use CodeIgniter\Model;

class CopyModel extends Model
{
    protected $table = 'copy';
    protected $primaryKey = 'id_copy';
    protected $useAutoIncrement = true;
    // protected $returnType     = 'array';
    protected $allowedFields = ['id_judul', 'judul_buku', 'eksemplar', 'kondisi'];
    // protected $returnType = 'array';
    // protected $useTimestamps = true;
    // protected $session;

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;



    public function getCopy()
    {
        $query = $this->db->table('copy')
            ->join('judul', 'judul.id_judul=copy.id_judul')
            ->get()->getResultArray();

        return $query;
    }

    public function getBukuById($id_judul)
    {
        $query = $this->db->table('judul')
            ->join('genre', 'genre.id_genre=judul.id_genre')
            ->join('penerbit', 'penerbit.id_penerbit=judul.id_penerbit')
            ->where('id_judul', $id_judul)
            ->get()->getResult();

        return $query;
    }

    public function search($keyword)
    {
        return $this->table('copy')
            ->select('copy.*, judul.*, genre.nama_genre as genre, penerbit.nama_penerbit')
            ->join('judul', 'judul.id_judul=copy.id_judul')
            ->join('genre', 'genre.id_genre=judul.id_genre')
            ->join('penerbit', 'penerbit.id_penerbit=judul.id_penerbit')
            ->where('eksemplar = 1')
            ->like('judul_buku', $keyword);
    }
}
