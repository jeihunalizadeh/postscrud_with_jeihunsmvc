<?php
class Products extends Controller {

    public function __construct()
    {
        $this->productModel = $this->model('Product');
    }
    public function index() {
      //get products
      $products = $this->productModel->getProducts();
        $data = [
            'products' => $products
        ];

        $this->view('products/index', $data);
    }  

    public function add() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //sanitize product info
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                

            ];
        }
    }

    public function show($id) {
        $product = $this->productModel->getProductById($id);
        $data = [
            'product' => $product
        ];
        $this->view('products/show' , $data);
    }
    
    public function add() {
        
    }

}

















?>