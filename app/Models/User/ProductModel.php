<?php

use App\Core\Database;

class ProductModel extends Database {
  public function __construct()
  {
    parent::__construct();
  }

  public function getTopProduct(){
    $query = "select id_product, name, price, file from products order by sales_count desc limit 4";
    return $this->qry($query)->fetchAll();
  }
  
  public function getAll(){
    $query = "select id_product, name, price, file from products";
    return $this->qry($query)->fetchAll();
  }
  
  public function getAmountCategory(){
    $query = "select c.name, COUNT(p.id_product) from products p JOIN categories c ON c.id_category = p.category_id group by c.id_category order by c.id_category";
    return $this->qry($query)->fetchAll();
  }
  
  public function getProductbyCategory($category){
    $query = "select p.id_product, p.name, p.price, p.file from products p JOIN categories c ON c.id_category = p.category_id where c.name = ?";
    return $this->qry($query, [$category])->fetchAll();
  }
  
  public function getProductbyPopularityWithCategory($category){
    $query = "select p.id_product, p.name, p.price, p.file from products p JOIN categories c ON c.id_category = p.category_id where c.name = ? order by p.sales_count desc";
    return $this->qry($query,[$category])->fetchAll();
  }
  
  public function getProductbyLastestWithCategory($category){
    $query = "select p.id_product, p.name, p.price, p.file from products p JOIN categories c ON c.id_category = p.category_id where c.name = ? order by p.created_at desc";
    return $this->qry($query,[$category])->fetchAll();
  }
  
  public function getProductbyLowtoHighWithCategory($category){
    $query = "select p.id_product, p.name, p.price, p.file from products p JOIN categories c ON c.id_category = p.category_id where c.name = ? order by p.price asc";
    return $this->qry($query,[$category])->fetchAll();
  }
  
  public function getProductbyHightoLowWithCategory($category){
    $query = "select p.id_product, p.name, p.price, p.file from products p JOIN categories c ON c.id_category = p.category_id where c.name = ? order by p.price desc";
    return $this->qry($query,[$category])->fetchAll();
  }
  
  public function getProductbyPopularity(){
    $query = "select p.id_product, p.name, p.price, p.file from products p JOIN categories c ON c.id_category = p.category_id order by p.sales_count desc";
    return $this->qry($query)->fetchAll();
  }
  
  public function getProductbyLastest(){
    $query = "select p.id_product, p.name, p.price, p.file from products p JOIN categories c ON c.id_category = p.category_id order by p.created_at desc";
    return $this->qry($query)->fetchAll();
  }
  
  public function getProductbyLowtoHigh(){
    $query = "select p.id_product, p.name, p.price, p.file from products p JOIN categories c ON c.id_category = p.category_id order by p.price asc";
    return $this->qry($query)->fetchAll();
  }
  
  public function getProductbyHightoLow(){
    $query = "select p.id_product, p.name, p.price, p.file from products p JOIN categories c ON c.id_category = p.category_id order by p.price desc";
    return $this->qry($query)->fetchAll();
  }

}