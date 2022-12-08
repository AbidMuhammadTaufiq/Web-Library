<?php

namespace App\Models;

use CodeIgniter\Model;

class GenreModel extends Model
{
    protected $table = 'genre';
    protected $primaryKey = 'id_genre';
    protected $useAutoIncrement = true;
    // protected $returnType     = 'array';
    protected $allowedFields = ['id_genre', 'nama_genre'];
    // protected $returnType = 'array';
    // protected $useTimestamps = true;
    // protected $session;

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;



    public function getGenre()
    {
        $query = $this->db->table('genre')
            ->get()->getResultArray();

        return $query;
    }
}
