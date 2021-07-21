<?php
namespace App\Models;

use CodeIgniter\Model;

class RolModel extends Model
{
    protected $table         = 'toys_bd.rol';
    protected $primaryKey    = 'rol_id';

    protected $allowedFields = ['rol_nombre'];

    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
