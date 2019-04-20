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
}

















?>