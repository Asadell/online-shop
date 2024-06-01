<?php

use App\Core\BaseController;
use App\Core\Message;
use App\Controllers\ValidationController;

class HomeController extends BaseController{
  private $productModel;
  private $cartModel;
  public function __construct() {
    $this->productModel = $this->model('User/', 'ProductModel');
    $this->cartModel = $this->model('User/', 'CartModel');
  }
  
  public function index(){
    if(!(new ValidationController)->checkLogin('CUSTOMER')){
      $this->redirect('login');
    }
    $data = [
      'title' => 'Shop',
      'nav' => 'home',
      'cart' => $this->cartModel->getCartById(),
      'AllProduct' => $this->productModel->getTopProduct()
    ];
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";
    // die();
    $this->view('User/template/header', $data);
    $this->view('User/home/index', $data);
    $this->view('User/template/footer');
  }

  public function about(){
    if(!(new ValidationController)->checkLogin('CUSTOMER')){
      $this->redirect('login');
    }
    $data = [
      'title' => 'About Us',
      'nav' => 'about',
      'cart' => $this->cartModel->getCartById(),
    ];
    $this->view('User/template/header', $data);
    $this->view('User/home/about', $data);
    $this->view('User/template/footer');
  }
}