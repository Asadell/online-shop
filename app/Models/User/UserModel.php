<?php

use App\Core\Database;

class UserModel extends Database {
  public function __construct()
  {
    parent::__construct();
  }

  public function getUserById($id){
    $query = "select id_user, full_name, email, address, phone_number from users where id_user = ?";
    return $this->qry($query, [$id])->fetch();
  }

  public function getProviderById($id){
    $query = "select p.id_payment, p.provider from payment_details p join users u on u.id_user = p.user_id where p.user_id = ?";
    return $this->qry($query, [$id])->fetchAll();
  }

}