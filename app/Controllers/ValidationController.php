<?php

namespace App\Controllers;
use App\Core\BaseController;

class ValidationController extends BaseController{
  public function checkLogin($role){
    return isset($_SESSION['id_user']) && $_SESSION['role']==$role;
  }
}