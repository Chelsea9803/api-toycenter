<?php namespace App\Controllers;

use App\Models\RolModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class RolController extends ResourceController
{

    use ResponseTrait;

    public function index()
    {
        $model = new RolModel();

        $data = [
            'status'   => 200,
            'error'    => false,
            'messages' => [
                'success' => 'Lista de roles'
            ]
        ];

        $data['Rol'] = $model->orderBy('rol_id ', 'DESC')->findAll();

        return $this->respond($data);
    }

    public function getRol($id = null)
    {
        $model = new RolModel();

        $response = $model->where('rol_id ', $id)->first();

        if ($response) {
            $data = [
                'status'   => 200,
                'error'    => false,
                'messages' => [
                    'success' => 'Rol Encontrado'
                ],
                'Rol'  => $response
            ];

            return $this->respond($data);
        } else {
            $data = [
                'status'   => 404,
                'error'    => true,
                'messages' => [
                    'success' => 'Rol No Existe'
                ]
            ];

            return $this->respond($data);

        }

    }

    public function getRolName($name = null)
    {
        $model    = new RolModel();
        $response = $model->where('rol_nombre', $name)->first();

        if ($response) {
            $data = [
                'status'   => 200,
                'error'    => false,
                'messages' => [
                    'success' => 'Rol Encontrado'
                ],
                'Rol'  => $response
            ];

            return $this->respond($data);
        } else {
            $data = [
                'status'   => 404,
                'error'    => true,
                'messages' => [
                    'success' => 'Rol No Existe'
                ]
            ];

            return $this->respond($data);

        }
    }

    public function create()
    {
        $model = new RolModel();
        $data  = [
            'rol_nombre' => $this->request->getVar('rol_nombre')
            
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => false,
            'messages' => [
                'success' => 'Rol Creado'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function updateRol()
    {
        $model  = new RolModel();
        $rol_id  = $this->request->getVar('rol_id');

        $data = [
            'rol_nombre' => $this->request->getVar('rol_nombre')
           
        ];

        //$dt = $this->request->getRawInput();

        // print_r($dt);
        $model->update($rol_id , $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Rol Actualizado'
            ]
        ];
        return $this->respond($response);
    }

    public function delete($rol_id  = null)
    {
        $model = new RolModel();
        $data  = $model->where('rol_id ', $rol_id )->delete($rol_id );
        if ($data) {
            $model->delete($rol_id );
            $response = [
                'status'   => 200,
                'error'    => false,
                'messages' => [
                    'success' => 'Rol Eliminado'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Rol No Existe');
        }
    }

}
