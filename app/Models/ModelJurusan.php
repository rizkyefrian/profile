<?php namespace App\Models;

use CodeIgniter\Model;

class ModelJurusan extends Model
{
    protected $table = 'jurusans';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'created_at' , 'updated_at'];

    public function getJurusan($id = false)
    {
        if($id == false){
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}