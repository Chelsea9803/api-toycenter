<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table         = 'prueba.product';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['name', 'price', 'quantity'];
}
