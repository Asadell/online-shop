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
}