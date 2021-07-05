<?php namespace App\Controllers;

use App\Models\ProveedoresModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class ProveedoresController extends ResourceController
{

    use ResponseTrait;

    public function index()
    {
        $model = new ProveedoresModel();

        $data = [
            'status'   => 200,
            'error'    => false,
            'messages' => [
                'success' => 'Lista de proveedores'
            ]
        ];

        $data['Proveedores'] = $model->orderBy('pro_id ', 'DESC')->findAll();

        return $this->respond($data);
    }

    public function getProduct($id = null)
    {
        $model = new ProveedoresModel();

        $response = $model->where('pro_id ', $id)->first();

        if ($response) {
            $data = [
                'status'   => 200,
                'error'    => false,
                'messages' => [
                    'success' => 'Proveedor Encontrado'
                ],
                'Proveedores'  => $response
            ];

            return $this->respond($data);
        } else {
            $data = [
                'status'   => 404,
                'error'    => true,
                'messages' => [
                    'success' => 'Proveedor No Existe'
                ]
            ];

            return $this->respond($data);

        }

    }

    public function getProductName($name = null)
    {
        $model    = new ProveedoresModel();
        $response = $model->where('pro_nit', $name)->first();

        if ($response) {
            $data = [
                'status'   => 200,
                'error'    => false,
                'messages' => [
                    'success' => 'Proveedor Encontrado'
                ],
                'Proveedores'  => $response
            ];

            return $this->respond($data);
        } else {
            $data = [
                'status'   => 404,
                'error'    => true,
                'messages' => [
                    'success' => 'Proveedor No Existe'
                ]
            ];

            return $this->respond($data);

        }
    }

    public function create()
    {
        $model = new ProveedoresModel();
        $data  = [
            'pro_nit' => $this->request->getVar('pro_nit'),
            'pro_nombre'   => $this->request->getVar('pro_nombre')
           
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => false,
            'messages' => [
                'success' => 'Proveedor Creado'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function updateProduct()
    {
        $model  = new ProveedoresModel();
        $pro_id  = $this->request->getVar('pro_id ');

        $data = [
            'pro_nit' => $this->request->getVar('pro_nit'),
            'pro_nombre'   => $this->request->getVar('pro_nombre')
            
        ];

        //$dt = $this->request->getRawInput();

        // print_r($dt);
        $model->update($pro_id , $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Proveedor Actualizado'
            ]
        ];
        return $this->respond($response);
    }

    public function delete($pro_id  = null)
    {
        $model = new ProveedoresModel();
        $data  = $model->where('pro_id ', $pro_id )->delete($pro_id );
        if ($data) {
            $model->delete($pro_id );
            $response = [
                'status'   => 200,
                'error'    => false,
                'messages' => [
                    'success' => 'Proveedor Eliminado'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Proveedor No Existe');
        }
    }

}
