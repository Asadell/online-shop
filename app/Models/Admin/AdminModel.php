<?php

class AdminModel extends Database {
  public function __construct()
  {
    parent::__construct();
  }

  public function getAll(){
    $query = "select id_user, full_name, email, phone_number, address from users where role = 'ADMIN'";
    return $this->qry($query)->fetchAll();
  }

  // echo "<pre>";
  // print_r($data);
  // echo "</pre>";
  // die();
  public function insert($data){
    $query = "INSERT INTO users (full_name, email, role, username, password, address, phone_number)
              VALUES 
              (?, ?, 'ADMIN', ?, ?, ?, ?)";
    return $this->qry($query, [
      $data['nameAdmin'],
      $data['emailAdmin'],
      $data['usernameAdmin'],
      $data['passwordAdmin'],
      $data['addressAdmin'],
      $data['phoneAdmin'],
    ]);
  }

  public function update($data){
    $query = "UPDATE users
              SET full_name = ?, email = ?, address = ?, phone_number = ?
              WHERE id_user = ?";
    return $this->qry($query, [
      $data['name_Admin'],
      $data['email_Admin'],
      $data['address_Admin'],
      $data['phone_Admin'],
      $data['id_Admin'],
    ]);
  }

  // public function getById($id){
  //   $query = "select p.id_product, p.name, p.description, p.price, p.stock, p.file, c.name as category 
  //           from products p JOIN categories c ON c.id_category = p.category_id 
  //           where p.id_product = ?";
  //   return $this->qry($query, [$id])->fetch();
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