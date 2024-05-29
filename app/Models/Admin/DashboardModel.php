<?php

use App\Core\Database;

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
  
  public function getSalesByCategory(){
    $query = "SELECT c.name, SUM(od.qty) FROM order_details od JOIN products p ON p.id_product = od.product_id JOIN categories c ON c.id_category = p.category_id group by c.id_category";
    return $this->qry($query)->fetchAll();
  }
  
  public function totalQuantity(){
    $query = "select sum(qty) from order_details";
    return $this->qry($query)->fetch();
  }
  
  public function totalOrderedQty(){
    $query = "SELECT p.name, SUM(od.qty) FROM order_details od JOIN products p ON p.id_product = od.product_id group by p.id_product";
    return $this->qry($query)->fetchAll();
  }
  
  public function getTotalSalesLaptop(){
    $query = "SELECT extract(epoch from DATE_TRUNC('day', o.order_date)), SUM(o.total_price) FROM orders o JOIN order_details od ON od.order_id = id_order JOIN products p ON p.id_product = od.product_id JOIN categories c ON c.id_category = p.category_id  WHERE o.order_date >= current_date - interval '7 days' AND c.name = 'Laptop' GROUP BY DATE_TRUNC('day', o.order_date)";
    return $this->qry($query)->fetchAll();
  }
  
  public function getTotalSalesHanphone(){
    $query = "SELECT extract(epoch from DATE_TRUNC('day', o.order_date)), SUM(o.total_price) FROM orders o JOIN order_details od ON od.order_id = id_order JOIN products p ON p.id_product = od.product_id JOIN categories c ON c.id_category = p.category_id  WHERE o.order_date >= current_date - interval '7 days' AND c.name = 'Handphone' GROUP BY DATE_TRUNC('day', o.order_date)";
    return $this->qry($query)->fetchAll();
  }
  
  public function getTotalSalesAccessories(){
    $query = "SELECT extract(epoch from DATE_TRUNC('day', o.order_date)), SUM(o.total_price) FROM orders o JOIN order_details od ON od.order_id = id_order JOIN products p ON p.id_product = od.product_id JOIN categories c ON c.id_category = p.category_id  WHERE o.order_date >= current_date - interval '7 days' AND c.name = 'Accessories' GROUP BY DATE_TRUNC('day', o.order_date)";
    return $this->qry($query)->fetchAll();
  }

}