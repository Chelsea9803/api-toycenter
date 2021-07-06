<?php
namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table         = 'toys_bd.users';
    protected $primaryKey    = 'user_id';
    protected $allowedFields = ['user_id', 'user_nombre', 'user_email ', 'user_pass', 'user_active', 'user_active', 'user_active', 'user_std'];
}
