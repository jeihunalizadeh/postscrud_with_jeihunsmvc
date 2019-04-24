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
        if(isset($_POST['Submit'])) {
            echo "hello";
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //sanitize product info
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                // 'id' => $_POST['id'],
                'name' => trim($_POST['name']),
                'description'=> trim($_POST['description']),
                'price' => trim($_POST['price']),
                // 'category_id' => trim($_POST['category_id']),
                // 'category_name' => trim($_POST['category_name']),
                'name_err' => '',
                'desc_err' => '',
                'price_err' => '',
                'category_err' => ''
            ];
            if(empty($data['name'])){
                $data['name_err'] = 'Please, enter a name';
            }

            if(empty($data['description'])){
                $data['desc_err'] = 'Please, enter a description about product';
            }
            if(empty($data['price'])){
                $data['price_err'] = 'Please, enter a price';
            }
            if(empty($data['category_id'])){
                $data['category_err'] = 'Please, choose a category';
            }

            if(empty($data['name_err']) && empty($data['desc_err'])
            && empty($data['price_err']) && empty($data['category_err'])){
                if($this->productModel->addProduct($data)){
                    flash('product_message', 'Product added');
                    redirect('products');
                } else {
                    die("Something went wrong");
                }
            } else {
                //load view errors
                $this->view('products/add', $data);
            }
        }else {
            $data = [
                'name' => '',
                'description' => '',
                'price' => ''
            ];
            $this->view('products/add' , $data);
        
        }
    }

    public function show($id) {
        $product = $this->productModel->getProductById($id);
        $data = [
            'product' => $product
        ];
        $this->view('products/show' , $data);
    }
    

}

















?>