<?php

class ProductModel extends Database {
  public function __construct()
  {
    parent::__construct();
  }

  public function getAll(){
    $query = "select p.id_product, p.name, p.description, p.price, p.stock, p.file, c.name as category 
              from products p JOIN categories c ON c.id_category = p.category_id 
              order by p.created_at desc";
    return $this->qry($query)->fetchAll();
  }

  public function insert($data){
    $query = "INSERT INTO products 
              (name, description, price, stock, file, category_id, user_id)
              VALUES (?, ?, ?, ?, ?, ?, 1)";
    return $this->qry($query, [
      $data['name'],
      $data['description'],
      $data['price'],
      $data['stock'],
      $data['file']['name'],
      $data['category'],
    ]);
  }

  public function getById($id){
    $query = "select p.id_product, p.name, p.description, p.price, p.stock, p.file, c.name as category 
            from products p JOIN categories c ON c.id_category = p.category_id 
            where p.id_product = ?";
    return $this->qry($query, [$id])->fetch();
  }

  public function update($data){
    $query = "UPDATE products
              SET name = ?, description = ?, price = ?, stock = ?, file = ?, category_id = ?
              WHERE id_product = ?";
    return $this->qry($query, [
      $data['name'],
      $data['description'],
      $data['price'],
      $data['stock'],
      $data['file']['name'],
      $data['category'],
      $data['id_product'],
    ]);
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

  public function delete($id) {
    $query = "DELETE FROM products WHERE id_product = ?";
    return $this->qry($query, [$id]);
  }

  public function productReport(){
    $query = "SELECT p.id_product, p.name AS product, c.name AS category, p.price,
                  p.stock, p.views_count, p.cart_count, p.sales_count, p.created_at,
                  u.full_name AS admin , sum(od.qty) as qty, sum(od.qty * od.price) as total_orders
              FROM products p
              JOIN categories c ON c.id_category = p.category_id
              JOIN order_details od ON od.product_id = p.id_product
              JOIN users u ON u.id_user = p.user_id
              GROUP BY p.id_product, c.id_category, u.id_user";
    return $this->qry($query)->fetchAll();
  }
}