<?php

namespace App\Models;

use CodeIgniter\Model;

class OrangModel extends Model
{
    protected $table = 'orang';
    protected $allowedFields = ['nama', 'alamat'];
    protected $useTimestamps = true;
    protected $session;

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function search($keyword)
    {
        // $builder = $this->table('orang');
        // $builder->like('nama', $keyword);
        // return $builder;

        return $this->table('orang')->like('nama', $keyword)->orLike('alamat', $keyword);
    }
}
