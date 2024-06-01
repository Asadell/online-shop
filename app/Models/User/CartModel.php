<?php

use App\Core\Database;

class CartModel extends Database {
  public function __construct()
  {
    parent::__construct();
  }

  public function getCartById(){
    $id = $_SESSION['id_user'];
    // echo 'ya';
    // if(isset($id)) print_r($id);
    // die($id);
    $query = "select c.id_cart_item, c.qty, p.id_product, p.name, p.price, p.file from cart_items c join products p on p.id_product = c.product_id join users u on u.id_user = c.user_id where c.user_id = ?";
    return $this->qry($query, [$id])->fetchAll();
  }

  public function addProduct($isUser, $idProduct){
    $query = "INSERT INTO cart_items (user_id, product_id) VALUES (?, ?)";
    return $this->qry($query, [$isUser, $idProduct]);
  }

  public function isProductAlreadyExists($isUser, $idProduct){
    $query = "select * from cart_items where user_id = ? and product_id = ?";
    return $this->qry($query, [$isUser, $idProduct])->fetch();
  }

  public function getQuantityById($isUser, $idProduct){
    $query = "select qty from cart_items where user_id = ? and product_id = ?";
    return $this->qry($query, [$isUser, $idProduct])->fetch();
  }
  public function updateQuantity($qty, $isUser, $idProduct){
    $query = "update cart_items set qty = ? where user_id = ? and product_id = ?";
    return $this->qry($query, [$qty, $isUser, $idProduct]);
  }
}