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
                'success' => 'Lista de toys'
            ]
        ];

        $data['lista'] = $model->getHome();    

        return $this->respond($data);

    }

    public function indexk()
    {
        $model = new ProductModel();

        $data = [
            'status'   => 200,
            'error'    => false,
            'messages' => [
                'success' => 'Lista de productos'
            ]
        ];

        $data['Productos'] = $model->orderBy('prd_id', 'DESC')->findAll();

        return $this->respond($data);
    }

    public function getProduct($id = null)
    {
        $model = new ProductModel();

        $response = $model->where('prd_id', $id)->first();

        if ($response) {
            $data = [
                'status'   => 200,
                'error'    => false,
                'messages' => [
                    'success' => 'Producto Encontrado'
                ],
                'Producto'  => $response
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
        $response = $model->where('prd_nombre', $name)->first();

        if ($response) {
            $data = [
                'status'   => 200,
                'error'    => false,
                'messages' => [
                    'success' => 'Producto Encontrado'
                ],
                'Producto'  => $response
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

    public function create()
    {
        $model = new ProductModel();
        $data  = [
            'prd_nombre' => $this->request->getVar('prd_nombre'),
            'prd_cost'   => $this->request->getVar('prd_cost'),
            'prd_price'  => $this->request->getVar('prd_price'),
            'prd_stock'  => $this->request->getVar('prd_stock'),
            'ma_id'      => $this->request->getVar('ma_id'),
            'pro_id'     => $this->request->getVar('pro_id'),
            'url_prod'   => $this->request->getVar('url_prod'),
            'prd_std'    => $this->request->getVar('prd_std')
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

    public function updateProduct()
    {
        $model  = new ProductModel();
        $prd_id = $this->request->getVar('prd_id');

        $data = [
            'prd_nombre' => $this->request->getVar('prd_nombre'),
            'prd_cost'   => $this->request->getVar('prd_cost'),
            'prd_price'  => $this->request->getVar('prd_price'),
            'prd_stock'  => $this->request->getVar('prd_stock'),
            'ma_id'      => $this->request->getVar('ma_id'),
            'pro_id'     => $this->request->getVar('pro_id'),
            'url_prod'   => $this->request->getVar('url_prod'),
            'prd_std'    => $this->request->getVar('prd_std')

        ];

        //$dt = $this->request->getRawInput();

        // print_r($dt);
        $model->update($prd_id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Producto Actualizado'
            ]
        ];
        return $this->respond($response);
    }

    public function delete($prd_id = null)
    {
        $model = new ProductModel();
        $data  = $model->where('prd_id', $prd_id)->delete($prd_id);
        if ($data) {
            $model->delete($prd_id);
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
