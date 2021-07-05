<?php 
namespace App\Models;

use CodeIgniter\Model;

class MarcaModel extends Model{
    protected $table         = 'toys_bd.marcas';
    protected $primaryKey    = 'ma_id';
    protected $allowedFields = ['ma_nombre', 'ma_active'];
}