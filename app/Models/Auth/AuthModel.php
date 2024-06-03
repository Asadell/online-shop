<?php

use App\Core\Database;

class AuthModel extends Database {
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

  public function login($username, $password){
    $query = "select id_user, username, role from users where username = ? and password = ?";
    return $this->qry($query, [
      $username, $password
    ])->fetch();
  }

  public function isEmailTaken($email){
    $query = "select * from users where email = ?";
    return $this->qry($query, [$email])->fetch();
  }

  public function isUsernameTaken($username){
    $query = "select * from users where username = ?";
    return $this->qry($query, [$username])->fetch();
  }

  public function insert($data){
    $query = "INSERT INTO users (full_name, email, role, username, password, address, phone_number)
              VALUES 
              (?, ?, 'CUSTOMER', ?, ?, ?, ?) returning id_user";
    return $this->qry($query, [
      $data['fullName'],
      $data['email'],
      $data['username'],
      $data['password'],
      $data['address'],
      $data['phoneNumber'],
    ])->fetch();
  }
  
  public function providerDefault($id){
    $query = "INSERT INTO payment_details (amount, provider, user_id) VALUES  (100000000, 'BCA', ?)";
    return $this->qry($query, [$id]);
  }
}