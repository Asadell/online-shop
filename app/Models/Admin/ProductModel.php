<?php

class ProductModel extends Database {
  public function __construct()
  {
    parent::__construct();
  }

  public function getAll(){
    $query = "select p.name, p.description, p.price, p.stock, p.file, c.name as category from products p JOIN categories c ON c.id_category = p.category_id order by p.created_at desc";
    return $this->qry($query)->fetchAll();
  }

  public function insert($data){
    $query = "INSERT INTO products 
              (name, description, price, stock, file, category_id, user_id)
              VALUES (?, ?, ?, ?, ?, ?, 1)";
    return $this->qry($query, [
      $data['name'],
      $data['desc'],
      $data['price'],
      $data['stock'],
      $data['fileImg']['name'],
      $data['category'],
    ]);
  }
}