<?php
namespace App\Models;

use CodeIgniter\Model;

class PerfilesModel extends Model
{
    protected $table         = 'toys_bd.perfiles';
    protected $primaryKey    = 'per_id';
    protected $allowedFields = ['per_id','per_nombre'];
}
