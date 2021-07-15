<?php namespace App\Controllers;

use App\Models\VentasModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class VentasController extends ResourceController
{

    use ResponseTrait;

    public function getHome()
    {
        $model = new VentasModel();

        $data = [
            'status'   => 200,
            'error'    => false,
            'messages' => [
                'success' => 'Lista de ventas'
            ]
        ];

        $data['Ventas'] = $model->getHome();

        return $this->respond($data);

    }

    public function index()
    {
        $model = new VentasModel();

        $data = [
            'status'   => 200,
            'error'    => false,
            'messages' => [
                'success' => 'Lista de ventas'
            ]
        ];

        $data['Ventas'] = $model->orderBy('ven_id', 'DESC')->findAll();

        return $this->respond($data);
    }

    public function getVentas($id = null)
    {
        $model = new VentasModel();

        $response = $model->where('ven_id', $id)->first();

        if ($response) {
            $data = [
                'status'   => 200,
                'error'    => false,
                'messages' => [
                    'success' => 'Venta Encontrada'
                ],
                'Venta'  => $response
            ];

            return $this->respond($data);
        } else {
            $data = [
                'status'   => 404,
                'error'    => true,
                'messages' => [
                    'success' => 'Venta No Existe'
                ]
            ];

            return $this->respond($data);

        }

    }

    public function getVentasName($name = null)
    {
        $model    = new VentasModel();
        $response = $model->where('ven_factura', $name)->first();

        if ($response) {
            $data = [
                'status'   => 200,
                'error'    => false,
                'messages' => [
                    'success' => 'Venta Encontrado'
                ],
                'Venta'  => $response
            ];

            return $this->respond($data);
        } else {
            $data = [
                'status'   => 404,
                'error'    => true,
                'messages' => [
                    'success' => 'Venta No Existe'
                ]
            ];

            return $this->respond($data);

        }
    }

    public function create()
    {
        $model = new VentasModel();
        $data  = [
            'ven_factura' => $this->request->getVar('ven_factura'),
            'ven_valor'   => $this->request->getVar('ven_valor'),
            'ven_cant'  => $this->request->getVar('ven_cant'),
            'cli_id'  => $this->request->getVar('cli_id'),
            'ven_tipo'      => $this->request->getVar('ven_tipo'),
            'id_user'     => $this->request->getVar('id_user'),
            'ven_update'   => $this->request->getVar('ven_update')
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => false,
            'messages' => [
                'success' => 'Venta Creada'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function updateVentas()
    {
        $model  = new VentasModel();
        $ven_id = $this->request->getVar('ven_id');

        $data = [
            'ven_factura' => $this->request->getVar('ven_factura'),
            'ven_valor'   => $this->request->getVar('ven_valor'),
            'ven_cant'  => $this->request->getVar('ven_cant'),
            'cli_id'  => $this->request->getVar('cli_id'),
            'ven_tipo'      => $this->request->getVar('ven_tipo'),
            'id_user'     => $this->request->getVar('id_user'),
            'ven_update'   => $this->request->getVar('ven_update')
        ];

        //$dt = $this->request->getRawInput();

        // print_r($dt);
        $model->update($ven_id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Venta Actualizada'
            ]
        ];
        return $this->respond($response);
    }

    public function delete($ven_id = null)
    {
        $model = new VentasModel();
        $data  = $model->where('ven_id', $ven_id)->delete($ven_id);
        if ($data) {
            $model->delete($ven_id);
            $response = [
                'status'   => 200,
                'error'    => false,
                'messages' => [
                    'success' => 'Venta Eliminado'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Venta No Existe');
        }
    }

}
