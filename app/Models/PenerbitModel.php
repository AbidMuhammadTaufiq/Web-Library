<?php

namespace App\Models;

use CodeIgniter\Model;

class PenerbitModel extends Model
{
    protected $table = 'penerbit';
    protected $primaryKey = 'id_penerbit';
    protected $useAutoIncrement = true;
    // protected $returnType     = 'array';
    protected $allowedFields = ['nama_penerbit', 'alamat_penerbit', 'tlp_penerbit'];
    // protected $returnType = 'array';
    // protected $useTimestamps = true;
    // protected $session;

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;



    public function getPenerbit()
    {
        $query = $this->db->table('penerbit')
            ->get()->getResultArray();

        return $query;
    }

    public function getBukuById($id)
    {
        # code...
    }

    public function search($keyword)
    {
        // return $this->table('orang')->like('nama', $keyword)->orLike('alamat', $keyword);
        return $this->db->table('judul')->like('judul_buku', $keyword);
    }
}
