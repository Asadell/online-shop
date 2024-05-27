<?php

class CategoryModel extends Database {
  public function __construct()
  {
    parent::__construct();
  }

  public function getAll(){
    $query = "SELECT id_category, name FROM categories";
    return $this->qry($query)->fetchAll();
  }

  public function insert($data){
    $query = "INSERT INTO categories (name) VALUES (?)";
    return $this->qry($query, [$data]);
  }

  public function delete($id) {
    $query = "DELETE FROM categories WHERE id_category = ?";
    return $this->qry($query, [$id]);
  }
  
  public function update($id, $name){
    $query = "UPDATE categories
              SET name = ?
              WHERE id_category = ?";
    return $this->qry($query, [$name, $id]);
  }


  public function getById($id){
    $query = "select p.id_product, p.name, p.description, p.price, p.stock, p.file, c.name as category 
            from products p JOIN categories c ON c.id_category = p.category_id 
            where p.id_product = ?";
    return $this->qry($query, [$id])->fetch();
  }


  public function productFileName($id) {
    $query = "select file from products where id_product = ?";
    return $this->qry($query, [$id])->fetch();
  }

  public function updateWithoutFile($data){
    $query = "UPDATE products
              SET name = ?, description = ?, price = ?, stock = ?, category_id = ?
              WHERE id_product = ?";
    return $this->qry($query, [
      $data['name'],
      $data['description'],
      $data['price'],
      $data['stock'],
      $data['category'],
      $data['id_product'],
    ]);
  }


}