<?php
namespace App\Controllers;

use App\Models\AuthModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Config\Services;
use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;

class AuthController extends ResourceController
{
    use ResponseTrait;
    public function __construct()
    {
        
        helper('secure_password');
    }

    public function index()
    {
        $model = new AuthModel();

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


    public function login()
    {
        try {

            $user_email = $this->request->getVar('user_email');
            $user_pass = $this->request->getVar('user_pass');

            //print_r($user_email);

            $authmodel = new AuthModel();

            $validateusuario = $authmodel->where('user_email', $user_email)->first();
            if ($validateusuario == null) {
                return $this->failNotFound('Usuario no existe');
            }
            
            if (verifyPassword($user_pass, $validateusuario['user_pass'])) {
                return $this->generateJWT($validateusuario);
            } else {
                return $this->failValidationErrors('Contraseña Incorrecta');
            }

        } catch (\Exception$e) {
            return $this->failServerError('Algo salio mal intenta más tarde' . $e);
        }
    }

    protected function generateJWT($usuario)
    {
        $key     = Services::getSecretKey();
        $time    = time();
        $payload = [
            'aud'  => base_url(),
            'iat'  => $time,
            'exp'  => $time + 60 * 60 * 24,
            'data' => [
                'nombre'   => $usuario['user_nombre'],
                'email' => $usuario['user_email'],
                'rol'      => $usuario['rol_id']
            ]
        ];
        $jwt = JWT::encode($payload, $key);

        $response = [
            'status'   => 200,
            'error'    => false,
            'messages' => 'Login Correcto',
            'tocken'   => $jwt

        ];
        return $this->respondCreated($response);

        //return $jwt;

    }

    public function getUsuarios($id = null)
    {
        $model = new AuthModel();

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
        $model    = new AuthModel();
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

        try {

            $user_nombre = $this->request->getVar('user_nombre');
            $user_email = $this->request->getVar('user_email');
            $user_pass = $this->request->getVar('user_pass');       
            $rol_id   = '1';

            $user_pass2 = hashPassword2($user_pass);

            $data = [
                'user_nombre'   => $user_nombre,
                'user_email' => $user_email,
                'user_pass' => $user_pass2,
                'rol_id'   => $rol_id
            ];

            //print_r($data);
            $authmodel = new AuthModel();

            $authmodel->insert($data);

            $response = [
                'status'   => 201,
                'error'    => false,
                'pass'     => $user_pass2,
                'messages' => [
                    'success' => 'Usuario Creado'
                ]
            ];
            return $this->respondCreated($response);

        } catch (\Exception$e) {
            return $this->failServerError('Algo salio mal intenta mas tarde');
        }
    }

    public function updateUsuarios()
    {
        $model  = new AuthModel();
        $user_id = $this->request->getVar('user_id');

        $data = [
            'user_nombre' => $this->request->getVar('user_nombre'),
            'user_email'   => $this->request->getVar('user_email'),
            'user_pass'  => $this->request->getVar('user_pass'),            
            'rol_id'      => $this->request->getVar('rol_id')            
            
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
        $model = new AuthModel();
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
