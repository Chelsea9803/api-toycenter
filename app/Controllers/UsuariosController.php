<?php namespace App\Controllers;

use App\Models\UsuariosModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class UsuariosController extends ResourceController
{

    use ResponseTrait;

    public function index()
    {
        $model = new UsuariosModel();

        $data = [
            'status'   => 200,
            'error'    => false,
            'messages' => [
                'success' => 'Lista de usuarios'
            ]
        ];

        $data['Usuarios'] = $model->orderBy('user_id', 'DESC')->findAll();

        return $this->respond($data);
    }

    public function getUsuarios($id = null)
    {
        $model = new UsuariosModel();

        $response = $model->where('user_id', $id)->first();

        if ($response) {
            $data = [
                'status'   => 200,
                'error'    => false,
                'messages' => [
                    'success' => 'Usuario Encontrado'
                ],
                'Usuario'  => $response
            ];

            return $this->respond($data);
        } else {
            $data = [
                'status'   => 404,
                'error'    => true,
                'messages' => [
                    'success' => 'Usuario No Existe'
                ]
            ];

            return $this->respond($data);

        }

    }

    public function getUsuariosName($name = null)
    {
        $model    = new UsuariosModel();
        $response = $model->where('user_nombre', $name)->first();

        if ($response) {
            $data = [
                'status'   => 200,
                'error'    => false,
                'messages' => [
                    'success' => 'Usuario Encontrado'
                ],
                'Usuario'  => $response
            ];

            return $this->respond($data);
        } else {
            $data = [
                'status'   => 404,
                'error'    => true,
                'messages' => [
                    'success' => 'Usuario No Existe'
                ]
            ];

            return $this->respond($data);

        }
    }

    public function create()
    {
        $model = new UsuariosModel();
        $data  = [
            'user_nombre' => $this->request->getVar('user_nombre'),
            'user_email'   => $this->request->getVar('user_email'),
            'user_pass'  => $this->request->getVar('user_pass'),
            'user_active'  => $this->request->getVar('user_active'),
            'per_id'      => $this->request->getVar('per_id'),
            'user_update'     => $this->request->getVar('user_update'),
            'user_std'   => $this->request->getVar('user_std')
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => false,
            'messages' => [
                'success' => 'Usuario Creado'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function updateUsuarios()
    {
        $model  = new UsuariosModel();
        $user_id = $this->request->getVar('user_id');

        $data = [
            'user_nombre' => $this->request->getVar('user_nombre'),
            'user_email'   => $this->request->getVar('user_email'),
            'user_pass'  => $this->request->getVar('user_pass'),
            'user_active'  => $this->request->getVar('user_active'),
            'per_id'      => $this->request->getVar('per_id'),
            'user_update'     => $this->request->getVar('user_update'),
            'user_std'   => $this->request->getVar('user_std')
        ];

        //$dt = $this->request->getRawInput();

        // print_r($dt);
        $model->update($user_id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Usuario Actualizado'
            ]
        ];
        return $this->respond($response);
    }

    public function delete($user_id = null)
    {
        $model = new UsuariosModel();
        $data  = $model->where('user_id', $user_id)->delete($user_id);
        if ($data) {
            $model->delete($user_id);
            $response = [
                'status'   => 200,
                'error'    => false,
                'messages' => [
                    'success' => 'Usuario Eliminado'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Usuario No Existe');
        }
    }

}
