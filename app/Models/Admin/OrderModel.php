<?php

use App\Core\Database;

class OrderModel extends Database {
  public function __construct()
  {
    parent::__construct();
  }

  public function getAll(){
    $query = "SELECT id_order, no_resi, status, total_price, order_date, user_id, payment_id FROM orders";
    return $this->qry($query)->fetchAll();
  }
  
  public function orderById($id){
    $query = "select o.id_order, o.no_resi, o.status, o.total_price, o.order_date, u.id_user, u.full_name, u.email, u.address, u.phone_number, p.id_payment, p.provider from orders o JOIN users u ON u.id_user = o.user_id JOIN payment_details p ON p.id_payment = o.payment_id where o.id_order = ?";
    return $this->qry($query, [$id])->fetch();
  }
  
  public function orderDetailByOrderId($id){
    $query = "select  od.id_order_detail, od.qty, od.order_id, od.product_id, od.price as odprice, p.name, p.file, p.price from order_details od JOIN products p ON p.id_product = od.product_id where od.order_id = ?";
    return $this->qry($query, [$id])->fetchAll();
  }

  public function orderCountByCustomerId($id){
    $query = "select count(*) from orders where user_id = ?";
    return $this->qry($query, [$id])->fetch();
  }


  // public function insert($data){
  //   $query = "INSERT INTO products 
  //             (name, description, price, stock, file, category_id, user_id)
  //             VALUES (?, ?, ?, ?, ?, ?, 1)";
  //   return $this->qry($query, [
  //     $data['name'],
  //     $data['description'],
  //     $data['price'],
  //     $data['stock'],
  //     $data['file']['name'],
  //     $data['category'],
  //   ]);
  // }

  // public function getById($id){
  //   $query = "select p.id_product, p.name, p.description, p.price, p.stock, p.file, c.name as category 
  //           from products p JOIN categories c ON c.id_category = p.category_id 
  //           where p.id_product = ?";
  //   return $this->qry($query, [$id])->fetch();
  // }

  // public function update($data){
  //   $query = "UPDATE products
  //             SET name = ?, description = ?, price = ?, stock = ?, file = ?, category_id = ?
  //             WHERE id_product = ?";
  //   return $this->qry($query, [
  //     $data['name'],
  //     $data['description'],
  //     $data['price'],
  //     $data['stock'],
  //     $data['file']['name'],
  //     $data['category'],
  //     $data['id_product'],
  //   ]);
  // }

  // public function productFileName($id) {
  //   $query = "select file from products where id_product = ?";
  //   return $this->qry($query, [$id])->fetch();
  // }

  // public function updateWithoutFile($data){
  //   $query = "UPDATE products
  //             SET name = ?, description = ?, price = ?, stock = ?, category_id = ?
  //             WHERE id_product = ?";
  //   return $this->qry($query, [
  //     $data['name'],
  //     $data['description'],
  //     $data['price'],
  //     $data['stock'],
  //     $data['category'],
  //     $data['id_product'],
  //   ]);
  // }

  // public function delete($id) {
  //   $query = "DELETE FROM products WHERE id_product = ?";
  //   return $this->qry($query, [$id]);
  // }
}