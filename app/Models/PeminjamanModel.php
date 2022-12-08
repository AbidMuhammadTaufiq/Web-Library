<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_copy', 'id', 'eksemplar', 'kondisi', 'id_judul', 'id_genre', 'id_penerbit', 'tanggal_pinjam', 'tanggal_kembali'];

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';


    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;



    public function getPeminjaman()
    {
        $query = $this->db->table('peminjaman')
            ->join('users', 'users.id=peminjaman.id')
            ->join('copy', 'copy.id_copy=peminjaman.id_copy')
            ->join('judul', 'judul.id_judul=copy.id_judul')
            ->join('genre', 'genre.id_genre=judul.id_genre')
            ->where('peminjaman.deleted_at', null)
            ->get()->getResultArray();

        return $query;
    }

    public function getPeminjamanRekap()
    {
        $query = $this->db->table('peminjaman')
            ->select('*, peminjaman.deleted_at')
            ->join('users', 'users.id=peminjaman.id')
            ->join('copy', 'copy.id_copy=peminjaman.id_copy')
            ->join('judul', 'judul.id_judul=copy.id_judul')
            ->where('peminjaman.deleted_at !=', null)
            ->get()->getResultArray();

        return $query;
    }

    public function getPeminjamanByUser()
    {
        $query = $this->db->table('peminjaman')
            ->join('users', 'users.id=peminjaman.id')
            ->join('copy', 'copy.id_copy=peminjaman.id_copy')
            ->join('judul', 'judul.id_judul=copy.id_judul')
            ->where('users.id', user()->id)
            ->get()->getResultArray();

        return $query;
    }

    public function search($keyword)
    {
        return $this->table('peminjaman')
            ->select('peminjaman.*, copy.*, judul.*, users.*, genre.*, penerbit.*')
            ->join('users', 'users.id=peminjaman.id', 'right')
            ->join('copy', 'copy.id_copy=peminjaman.id_copy', 'right')
            ->join('judul', 'judul.id_judul=copy.id_judul', 'right')
            ->join('genre', 'genre.id_genre=judul.id_genre')
            ->join('penerbit', 'penerbit.id_penerbit=judul.id_penerbit')
            ->where('copy.eksemplar =', '1')
            ->orderBy('peminjaman.deleted_at', 'DESC')
            ->like('judul.judul_buku', $keyword);
    }
}
