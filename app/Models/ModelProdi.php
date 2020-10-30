<?php namespace App\Models;

use CodeIgniter\Model;

class ModelProdi extends Model
{
    protected $table = 'prodis';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'id_jurusan', 'created_at' , 'updated_at'];

    
}