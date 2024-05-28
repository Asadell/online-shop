<?php

class DashboardModel extends Database {
  public function __construct()
  {
    parent::__construct();
  }

  public function revenueCount(){
    $query = "select SUM(total_price) from orders";
    return $this->qry($query)->fetch();
  }

  public function productCount(){
    $query = "select COUNT(*) from products";
    return $this->qry($query)->fetch();
  }

  public function orderCount(){
    $query = "select count(*) from orders";
    return $this->qry($query)->fetch();
  }

  public function customerCount(){
    $query = "select count(*) from users where role = 'CUSTOMER'";
    return $this->qry($query)->fetch();
  }

}