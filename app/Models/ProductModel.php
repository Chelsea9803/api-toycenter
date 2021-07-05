<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table         = 'toys_bd.products';
    protected $primaryKey    = 'prd_id';
    protected $allowedFields = ['prd_id', 'prd_nombre', 'prd_cost', 'prd_price', 'prd_stock', 'ma_id', 'pro_id', 'url_prod', 'prd_std'];
}
