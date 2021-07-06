<?php
namespace App\Models;

use CodeIgniter\Model;

class ClientesModel extends Model
{
    protected $table         = 'toys_bd.cliente';
    protected $primaryKey    = 'cli_id';
    protected $allowedFields = ['cli_id', 'cli_nombre', 'user_id', 'cli_correo', 'cli_apellido', 'cli_nit ', 'cli_std'];
}
