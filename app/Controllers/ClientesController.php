<?php namespace App\Controllers;

use App\Models\ClientesModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class ClientesController extends ResourceController
{

    use ResponseTrait;

    public function getHome()
    {
        $model = new ClientesModel();

        $data = [
            'status'   => 200,
            'error'    => false,
            'messages' => [
                'success' => 'Lista de clientes'
            ]
        ];

        $data['lista'] = $model->getHome();

        return $this->respond($data);

    }

    public function index()
    {
        $model = new ClientesModel();

        $data = [
            'status'   => 200,
            'error'    => false,
            'messages' => [
                'success' => 'Lista de clientes'
            ]
        ];

        $data['Clientes'] = $model->orderBy('cli_id', 'DESC')->findAll();

        return $this->respond($data);
    }

    public function getClientes($id = null)
    {
        $model = new ClientesModel();

        $response = $model->where('cli_id', $id)->first();

        if ($response) {
            $data = [
                'status'   => 200,
                'error'    => false,
                'messages' => [
                    'success' => 'Cliente Encontrado'
                ],
                'Cliente'  => $response
            ];

            return $this->respond($data);
        } else {
            $data = [
                'status'   => 404,
                'error'    => true,
                'messages' => [
                    'success' => 'Cliente No Existe'
                ]
            ];

            return $this->respond($data);

        }

    }

    public function getClientesName($name = null)
    {
        $model    = new ClientesModel();
        $response = $model->where('cli_nombre', $name)->first();

        if ($response) {
            $data = [
                'status'   => 200,
                'error'    => false,
                'messages' => [
                    'success' => 'Cliente Encontrado'
                ],
                'Cliente'  => $response
            ];

            return $this->respond($data);
        } else {
            $data = [
                'status'   => 404,
                'error'    => true,
                'messages' => [
                    'success' => 'Cliente No Existe'
                ]
            ];

            return $this->respond($data);

        }
    }

    public function create()
    {
        $model = new ClientesModel();
        $data  = [
            'cli_nombre' => $this->request->getVar('cli_nombre'),
            'user_id'   => $this->request->getVar('user_id'),
            'cli_correo'  => $this->request->getVar('cli_correo'),
            'cli_apellido'  => $this->request->getVar('cli_apellido'),
            'cli_nit'      => $this->request->getVar('cli_nit'),
            'cli_std'     => $this->request->getVar('cli_std')
           
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => false,
            'messages' => [
                'success' => 'Cliente Creado'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function updateClientes()
    {
        $model  = new ClientesModel();
        $cli_id = $this->request->getVar('cli_id');

        $data = [
            'cli_nombre' => $this->request->getVar('cli_nombre'),
            'user_id'   => $this->request->getVar('user_id'),
            'cli_correo'  => $this->request->getVar('cli_correo'),
            'cli_apellido'  => $this->request->getVar('cli_apellido'),
            'cli_nit'      => $this->request->getVar('cli_nit'),
            'cli_std'     => $this->request->getVar('cli_std')
            
        ];

        //$dt = $this->request->getRawInput();

        // print_r($dt);
        $model->update($cli_id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Cliente Actualizado'
            ]
        ];
        return $this->respond($response);
    }

    public function delete($cli_id = null)
    {
        $model = new ClientesModel();
        $data  = $model->where('cli_id', $cli_id)->delete($cli_id);
        if ($data) {
            $model->delete($cli_id);
            $response = [
                'status'   => 200,
                'error'    => false,
                'messages' => [
                    'success' => 'Cliente Eliminado'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Cliente No Existe');
        }
    }

}
