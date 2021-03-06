<?php
namespace App\Models;

use CodeIgniter\Model;

class ClientesModel extends Model
{
    protected $table         = 'toys_bd.cliente';
    protected $primaryKey    = 'cli_id';

    protected $allowedFields = ['cli_nombre', 'user_id', 'cli_correo', 'cli_apellido', 'cli_nit', 'cli_std'];

    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

}
