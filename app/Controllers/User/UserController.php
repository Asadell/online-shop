<?php

use App\Core\BaseController;
use App\Core\Message;
use App\Controllers\ValidationController;

class UserController extends BaseController{
  private $userModel;
  private $cartModel;
  public function __construct() {
    $this->userModel = $this->model('User/', 'UserModel');
    $this->cartModel = $this->model('User/', 'CartModel');
  }
  
  public function index(){
    if(!(new ValidationController)->checkLogin('CUSTOMER')){
      $this->redirect('login');
    }
    $data = [
      'title' => 'user',
      'nav' => 'profile',
      'cart' => $this->cartModel->getCartById(),
    ];
    $this->view('User/user/index', $data);
  }
  
  public function edit(){
    $data = [
      'title' => 'user',
    ];
    $this->view('User/user/edit', $data);
  }
  
  public function update(){ // post
    $data = [
      'title' => 'user',
    ];
    $this->view('User/user/index', $data);
  }
  
  public function delete(){ // delete
    $data = [
      'title' => 'user',
    ];
    $this->view('User/user/index', $data);
  }
}