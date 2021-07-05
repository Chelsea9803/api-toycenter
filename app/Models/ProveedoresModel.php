<?php
namespace App\Models;

use CodeIgniter\Model;

class ProveedoresModel extends Model
{
    protected $table         = 'toys_bd.proveedores';
    protected $primaryKey    = 'pro_id';
    protected $allowedFields = ['pro_id', 'pro_nit', 'pro_nombre'];
}
