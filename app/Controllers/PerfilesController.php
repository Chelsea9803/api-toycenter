<?php namespace App\Controllers;

use App\Models\PerfilesModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class PerfilesController extends ResourceController
{

    use ResponseTrait;

    public function index()
    {
        $model = new PerfilesModel();

        $data = [
            'status'   => 200,
            'error'    => false,
            'messages' => [
                'success' => 'Lista de perfiles'
            ]
        ];

        $data['Perfiles'] = $model->orderBy('per_id', 'DESC')->findAll();

        return $this->respond($data);
    }

    public function getPerfiles($id = null)
    {
        $model = new PerfilesModel();

        $response = $model->where('per_id', $id)->first();

        if ($response) {
            $data = [
                'status'   => 200,
                'error'    => false,
                'messages' => [
                    'success' => 'Perfil Encontrado'
                ],
                'Perfiles'  => $response
            ];

            return $this->respond($data);
        } else {
            $data = [
                'status'   => 404,
                'error'    => true,
                'messages' => [
                    'success' => 'Perfil No Existe'
                ]
            ];

            return $this->respond($data);

        }

    }

    public function getPerfilesName($name = null)
    {
        $model    = new PerfilesModel();
        $response = $model->where('per_nombre', $name)->first();

        if ($response) {
            $data = [
                'status'   => 200,
                'error'    => false,
                'messages' => [
                    'success' => 'Perfil Encontrado'
                ],
                'Perfiles'  => $response
            ];

            return $this->respond($data);
        } else {
            $data = [
                'status'   => 404,
                'error'    => true,
                'messages' => [
                    'success' => 'Perfiles No Existe'
                ]
            ];

            return $this->respond($data);

        }
    }

    public function create()
    {
        $model = new PerfilesModel();
        $data  = [
            'per_nombre' => $this->request->getVar('per_nombre')
            
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => false,
            'messages' => [
                'success' => 'Perfil Creado'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function updatePerfiles()
    {
        $model  = new PerfilesModel();
        $per_id = $this->request->getVar('per_id');

        $data = [
            'per_nombre' => $this->request->getVar('per_nombre')
           
        ];

        //$dt = $this->request->getRawInput();

        // print_r($dt);
        $model->update($per_id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Perfil Actualizado'
            ]
        ];
        return $this->respond($response);
    }

    public function delete($per_id = null)
    {
        $model = new PerfilesModel();
        $data  = $model->where('per_id', $per_id)->delete($per_id);
        if ($data) {
            $model->delete($per_id);
            $response = [
                'status'   => 200,
                'error'    => false,
                'messages' => [
                    'success' => 'Perfil Eliminado'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Perfiles No Existe');
        }
    }

}
