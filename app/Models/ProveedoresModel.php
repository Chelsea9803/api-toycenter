<?php
namespace App\Models;

use CodeIgniter\Model;

class ProveedoresModel extends Model
{
    protected $table         = 'toys_bd.proveedores';
    protected $primaryKey    = 'pro_id';

    protected $allowedFields = ['pro_nit', 'pro_nombre'];

    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

}
