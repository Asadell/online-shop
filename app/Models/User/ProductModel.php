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
  
  public function getProductLaptopbyPopularity(){
    $query = "select p.id_product, p.name, p.price, p.file from products p JOIN categories c ON c.id_category = p.category_id where c.name = 'Laptop' order by p.sales_count desc";
    return $this->qry($query)->fetchAll();
  }
  
  public function getProductLaptopbyLastest(){
    $query = "select p.id_product, p.name, p.price, p.file from products p JOIN categories c ON c.id_category = p.category_id where c.name = 'Laptop' order by p.created_at desc";
    return $this->qry($query)->fetchAll();
  }
  
  public function getProductLaptopbyLowtoHigh(){
    $query = "select p.id_product, p.name, p.price, p.file from products p JOIN categories c ON c.id_category = p.category_id where c.name = 'Laptop' order by p.price asc";
    return $this->qry($query)->fetchAll();
  }
  
  public function getProductLaptopbyHightoLow(){
    $query = "select p.id_product, p.name, p.price, p.file from products p JOIN categories c ON c.id_category = p.category_id where c.name = 'Laptop' order by p.price desc";
    return $this->qry($query)->fetchAll();
  }
  
  public function getProductHandphone(){
    $query = "select p.id_product, p.name, p.price, p.file from products p JOIN categories c ON c.id_category = p.category_id where c.name = 'Handphone'";
    return $this->qry($query)->fetchAll();
  }
  
  public function getProductHandphonebyPopularity(){
    $query = "select p.id_product, p.name, p.price, p.file from products p JOIN categories c ON c.id_category = p.category_id where c.name = 'Handphone' order by p.sales_count desc";
    return $this->qry($query)->fetchAll();
  }
  
  public function getProductHandphonebyLastest(){
    $query = "select p.id_product, p.name, p.price, p.file from products p JOIN categories c ON c.id_category = p.category_id where c.name = 'Handphone' order by p.created_at desc";
    return $this->qry($query)->fetchAll();
  }
  
  public function getProductHandphonebyLowtoHigh(){
    $query = "select p.id_product, p.name, p.price, p.file from products p JOIN categories c ON c.id_category = p.category_id where c.name = 'Handphone' order by p.price asc";
    return $this->qry($query)->fetchAll();
  }
  
  public function getProductHandphonebyHightoLow(){
    $query = "select p.id_product, p.name, p.price, p.file from products p JOIN categories c ON c.id_category = p.category_id where c.name = 'Handphone' order by p.price desc";
    return $this->qry($query)->fetchAll();
  }
  
  public function getProductAccessories(){
    $query = "select p.id_product, p.name, p.price, p.file from products p JOIN categories c ON c.id_category = p.category_id where c.name = 'Accessories'";
    return $this->qry($query)->fetchAll();
  }
  
  public function getProductAccessoriesbyPopularity(){
    $query = "select p.id_product, p.name, p.price, p.file from products p JOIN categories c ON c.id_category = p.category_id where c.name = 'Accessories' order by p.sales_count desc";
    return $this->qry($query)->fetchAll();
  }
  
  public function getProductAccessoriesbyLastest(){
    $query = "select p.id_product, p.name, p.price, p.file from products p JOIN categories c ON c.id_category = p.category_id where c.name = 'Accessories' order by p.created_at desc";
    return $this->qry($query)->fetchAll();
  }
  
  public function getProductAccessoriesbyLowtoHigh(){
    $query = "select p.id_product, p.name, p.price, p.file from products p JOIN categories c ON c.id_category = p.category_id where c.name = 'Accessories' order by p.price asc";
    return $this->qry($query)->fetchAll();
  }
  
  public function getProductAccessoriesbyHightoLow(){
    $query = "select p.id_product, p.name, p.price, p.file from products p JOIN categories c ON c.id_category = p.category_id where c.name = 'Accessories' order by p.price desc";
    return $this->qry($query)->fetchAll();
  }

}