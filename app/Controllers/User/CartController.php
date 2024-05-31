<?php

use App\Core\BaseController;
use App\Core\Message;

class CartController extends BaseController{
  private $cartModel;
  public function __construct() {
    $this->cartModel = $this->model('User/', 'CartModel');
  }
  
  public function index(){
    $data = [
      'title' => 'cart',
    ];
    $this->view('User/cart/index', $data);
  }

  public function add(){ // post
    $data = [
      'title' => 'cart',
    ];
    $this->view('User/cart/index', $data);
  }

  public function update(){ // post
    $data = [
      'title' => 'cart',
    ];
    $this->view('User/cart/index', $data);
  }

  public function delete(){ // post
    $data = [
      'title' => 'cart',
    ];
    $this->view('User/cart/index', $data);
  }
}