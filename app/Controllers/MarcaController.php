<?php namespace App\Controllers;

use App\Models\MarcaModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class MarcaController extends ResourceController
{

    use ResponseTrait;

    public function index()
    {
        $model = new MarcaModel();

        $data = [
            'status'   => 200,
            'error'    => false,
            'messages' => [
                'success' => 'Lista de Marcas'
            ]
        ];

        $data['Marcas'] = $model->orderBy('ma_id', 'DESC')->findAll();

        return $this->respond($data);
    }

    public function getMarca($id = null)
    {
        $model = new MarcaModel();

        $response = $model->where('ma_id', $id)->first();

        if ($response) {
            $data = [
                'status'   => 200,
                'error'    => false,
                'messages' => [
                    'success' => 'Marca Encontrada'
                ],
                'Marca'  => $response
            ];

            return $this->respond($data);
        } else {
            $data = [
                'status'   => 404,
                'error'    => true,
                'messages' => [
                    'success' => 'Marca No Existe'
                ]
            ];

            return $this->respond($data);

        }

    }

    public function getMarcaName($name = null)
    {
        $model    = new MarcaModel();
        $response = $model->where('ma_nombre', $name)->first();

        if ($response) {
            $data = [
                'status'   => 200,
                'error'    => false,
                'messages' => [
                    'success' => 'Marca Encontrada'
                ],
                'Marca'  => $response
            ];

            return $this->respond($data);
        } else {
            $data = [
                'status'   => 404,
                'error'    => true,
                'messages' => [
                    'success' => 'Marca No Existe'
                ]
            ];

            return $this->respond($data);

        }
    }

    public function create()
    {
        $model = new MarcaModel();
        $data  = [
            'ma_nombre' => $this->request->getVar('ma_nombre'),
            'ma_active'   => $this->request->getVar('ma_active'),
            
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => false,
            'messages' => [
                'success' => 'Marca Creada'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function updateMarca()
    {
        $model  = new MarcaModel();
        $ma_id = $this->request->getVar('ma_id');

        $data = [
            'ma_nombre' => $this->request->getVar('ma_nombre'),
            'ma_active'   => $this->request->getVar('ma_active')
            
        ];

        //$dt = $this->request->getRawInput();

        // print_r($dt);
        $model->update($ma_id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Marca Actualizada'
            ]
        ];
        return $this->respond($response);
    }

    public function delete($id = null)
    {
        $model = new MarcaModel();
        $data  = $model->where('ma_id', $id)->delete($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => false,
                'messages' => [
                    'success' => 'Marca Eliminada'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Marca No Existe');
        }
    }

}
