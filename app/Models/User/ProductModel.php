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

  public function getDetailProductById($id){
    $query = "select id_product, name, stock, views_count, cart_count, sales_count from products where id_product = ?";
    return $this->qry($query, [$id])->fetch();
  }

  public function reduceStock($qty, $id){
    $query = "UPDATE products SET stock = ? WHERE id_product = ?";
    return $this->qry($query, [$qty, $id]);
  }
  
  public function updateSalesCountById($count, $id){
    $query = "UPDATE products SET sales_count = ? WHERE id_product = ?";
    return $this->qry($query, [$count, $id]);
  }
  
  public function updateCartCountById($count, $id){
    $query = "UPDATE products SET cart_count = ? WHERE id_product = ?";
    return $this->qry($query, [$count, $id]);
  }
  
  public function updateViewsCountById($count, $id){
    $query = "UPDATE products SET views_count = ? WHERE id_product = ?";
    return $this->qry($query, [$count, $id]);
  }

  public function getProductById($id){
    $query = "select p.id_product, p.name as product, p.description, p.price, p.file, p.category_id, c.name as category from products p join categories c on c.id_category = p.category_id where id_product = ?";
    return $this->qry($query, [$id])->fetch();
  }

  public function getProductExceptById($id_product, $id_category) {
    $query = "select id_product, name, description, price, file from products where id_product != ? and category_id = ?";
    return $this->qry($query, [$id_product, $id_category])->fetchAll();
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