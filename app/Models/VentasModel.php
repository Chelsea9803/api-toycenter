<?php 
namespace App\Models;

use CodeIgniter\Model;

class VentasModel extends Model{
    protected $table         = 'toys_bd.ventas';
    protected $primaryKey    = 'ven_id';
    protected $allowedFields = ['ven_id', 'ven_factura','ven_valor', 'ven_cant','cli_id', 'ven_tipo', 'id_user','ven_update'];
}