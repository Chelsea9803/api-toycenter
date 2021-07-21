<?php 
namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model{
    
    protected $table      = 'toys_bd.users';
    protected $primaryKey = 'user_id';

    
    protected $allowedFields = ['user_nombre', 'user_email', 'user_pass', 'rol_id'];

    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}