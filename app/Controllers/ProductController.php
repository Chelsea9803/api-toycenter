<?php namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class ProductController extends ResourceController
{

    use ResponseTrait;

    public function index()
    {
        $model = new ProductModel();

        $data = [
            'status'   => 200,
            'error'    => false,
            'messages' => [
                'success' => 'Lista de productos'
            ]
        ];

        $data['Products'] = $model->orderBy('id', 'DESC')->findAll();

        return $this->respond($data);
    }

    public function create()
    {
        $model = new ProductModel();
        $data  = [
            'name'     => $this->request->getVar('name'),
            'price'    => $this->request->getVar('price'),
            'quantity' => $this->request->getVar('quantity')
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => false,
            'messages' => [
                'success' => 'Producto Creado'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function getProduct($id = null)
    {
        $model = new ProductModel();

        $response = $model->where('id', $id)->first();

        if ($response) {
            $data = [
                'status'   => 200,
                'error'    => false,
                'messages' => [
                    'success' => 'Producto Encontrado'
                ],
                'Product'  => $response
            ];

            return $this->respond($data);
        } else {
            $data = [
                'status'   => 404,
                'error'    => true,
                'messages' => [
                    'success' => 'Producto No Existe'
                ]
            ];

            return $this->respond($data);

        }

    }

    public function getProductName($name = null)
    {
        $model    = new ProductModel();
        $response = $model->where('name', $name)->first();

        if ($response) {
            $data = [
                'status'   => 200,
                'error'    => false,
                'messages' => [
                    'success' => 'Producto Encontrado'
                ],
                'Product'  => $response
            ];

            return $this->respond($data);
        } else {
            $data = [
                'status'   => 404,
                'error'    => true,
                'messages' => [
                    'success' => 'Producto No Existe'
                ]
            ];

            return $this->respond($data);

        }
    }

    public function update($id = null)
    {
        $model = new ProductModel();
        //$id    = $this->request->getVar('id');

        $data = [
            'name'     => $this->request->getVar('name'),
            'price'    => $this->request->getVar('price'),
            'quantity' => $this->request->getVar('quantity')
        ];
        $model->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Producto Actualizado'
            ]
        ];
        return $this->respond($response);
    }

    public function delete($id = null)
    {
        $model = new ProductModel();
        $data  = $model->where('id', $id)->delete($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => false,
                'messages' => [
                    'success' => 'Producto Eliminado'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Producto No Existe');
        }
    }

}
