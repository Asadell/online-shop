<?php

use App\Core\Database;

class OrderModel extends Database {
  public function __construct()
  {
    parent::__construct();
  }

  public function getAllOrderById($id){
    $query = "select * from orders where user_id = ? order by order_date desc;";
    return $this->qry($query, [$id])->fetchAll();
  }
  
  public function getOrderById($id){
    $query = "select * from orders o join payment_details p on p.id_payment = o.payment_id where id_order = ?";
    return $this->qry($query, [$id])->fetch();
  }

  public function getOrderDetailById($id){
    $query = "select p.name, od.price, od.qty from order_details od join products p on p.id_product = od.product_id where order_id = ?";
    return $this->qry($query, [$id])->fetchAll();
  }

}