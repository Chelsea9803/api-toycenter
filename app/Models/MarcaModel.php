<?php 
namespace App\Models;

use CodeIgniter\Model;

class MarcaModel extends Model{

    protected $table         = 'toys_bd.marcas';
    protected $primaryKey    = 'ma_id';


    protected $allowedFields = ['ma_nombre', 'ma_active'];

    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}