<?php
class Product {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getProducts(){
        $this->db->query("SELECT * FROM products");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getProductById($id) {
        $this->db->query('SELECT * FROM products WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
}











?>