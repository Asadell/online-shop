<?php

use App\Core\BaseController;
use App\Core\Message;

class HomeController extends BaseController{
  private $productModel;
  public function __construct() {
    $this->productModel = $this->model('User/', 'ProductModel');
  }
  
  public function index(){
    $data = [
      'title' => 'Shop',
      'nav' => 'home',
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
    $data = [
      'title' => 'About Us',
      'nav' => 'about'
    ];
    $this->view('User/template/header', $data);
    $this->view('User/home/about', $data);
    $this->view('User/template/footer');
  }
}