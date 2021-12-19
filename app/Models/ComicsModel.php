<?php

namespace App\Models;

use CodeIgniter\Model;

class ComicsModel extends Model
{
    protected $table = 'comics';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['judul', 'slug', 'penulis', 'penerbit', 'sampul'];
    protected $useTimestamps = true;
    protected $session;

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;


    public function getComics($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
