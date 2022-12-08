<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'judul';
    protected $primaryKey = 'id_judul';
    protected $useAutoIncrement = true;
    // protected $returnType     = 'array';
    protected $allowedFields = ['judul_buku', 'isbn', 'id_genre', 'nama_genre', 'penulis', 'id_penerbit', 'nama_penerbit', 'tahun_terbit', 'jumlah_halaman', 'jumlah_buku', 'sampul'];
    // protected $returnType = 'array';
    // protected $useTimestamps = true;
    // protected $session;

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;



    public function getBuku()
    {
        $query = $this->db->table('judul')
            ->join('genre', 'genre.id_genre=judul.id_genre')
            ->join('penerbit', 'penerbit.id_penerbit=judul.id_penerbit')
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
        return $this->table('judul')
            ->select('judul.*, genre.nama_genre, penerbit.nama_penerbit')
            ->join('genre', 'genre.id_genre=judul.id_genre')
            ->join('penerbit', 'penerbit.id_penerbit=judul.id_penerbit')
            ->like('judul_buku', $keyword)
            ->orLike('penulis', $keyword);
    }
}
