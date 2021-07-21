<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table         = 'toys_bd.products';
    protected $primaryKey    = 'prd_id';
    protected $allowedFields = ['prd_nombre', 'prd_cost', 'prd_price', 'prd_stock', 'ma_id', 'pro_id', 'url_prod', 'prd_std'];

    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


public function getHome()
    {

        $db      = db_connect();
        $builder = $db->table("toys_bd.products as p");
        $builder->join('toys_bd.proveedores pr', 'pr.pro_id=p.pro_id');
        $builder->join('toys_bd.marcas m', 'm.ma_id=p.ma_id');
        $aResult = $builder->get()->getResultArray();
        return $aResult;
    }
}