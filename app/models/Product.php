<?php
class Product {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getProducts(){
        $this->db->query("SELECT *, 
                                            products.id as productId,
                                            categories.id as categoryId,
                                            products.created as productCreated,
                                            categories.created as categoryCreated,
                                            products.name as productName,
                                            categories.name as categoryName
                                            FROM products
                                            INNER JOIN categories
                                            ON products.category_id = categories.id
                                            ORDER BY products.created DESC
                                            ");
        $results = $this->db->resultSet();
        return $results;
    }

    public function addProduct($data) {
        $this->db->query('INSERT INTO products (name, description, price) VALUES(:name, :description, :price )');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':price' , $data['price']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getProductById($id) {
        $this->db->query('SELECT * FROM products WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
}











?>