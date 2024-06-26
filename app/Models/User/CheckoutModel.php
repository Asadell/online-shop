<?php

use App\Core\Database;

class CheckoutModel extends Database {
  public function __construct()
  {
    parent::__construct();
  }

  public function storeToOrder($resi, $total, $iduser, $idpayment, $address, $phone){
    $query = "INSERT INTO orders (no_resi, status, total_price, user_id, payment_id, shipping_address, shipping_phone) 
              VALUES (?, 'DELIVERED', ?, ?, ?, ?, ?) RETURNING id_order;";
    return $this->qry($query, [$resi, $total, $iduser, $idpayment, $address, $phone])->fetch();
  }
  
  public function storeToOrderDetail($qty, $idOrder, $idProduct, $price){
    $query = "INSERT INTO order_details (qty, order_id, product_id, price) VALUES (?, ?, ?, ?);";
    return $this->qry($query, [$qty, $idOrder, $idProduct, $price]);
  }
  
  public function getBalanceById($id){
    $query = "select * from payment_details where id_payment = ?";
    return $this->qry($query, [$id])->fetch();
  }

  public function updateCustomerBalance($amount, $id){
    $query = "UPDATE payment_details SET amount = ? WHERE id_payment = ?";
    return $this->qry($query, [$amount, $id]);
  }

}