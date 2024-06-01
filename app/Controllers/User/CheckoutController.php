<?php

use App\Core\BaseController;
use App\Core\Message;
use App\Controllers\ValidationController;

class CheckoutController extends BaseController{
  private $checkoutModel;
  public function __construct() {
    $this->checkoutModel = $this->model('User/', 'CheckoutModel');
  }
  
  public function index(){
    if(!(new ValidationController)->checkLogin('CUSTOMER')){
      $this->redirect('login');
    }
    $data = [
      'title' => 'checkout',
    ];
    $this->view('User/checkout/index', $data);
  }

  // public function process() { // post
  //   $data = [
  //     'title' => 'checkout',
  //   ];
  //   $this->view('User/checkout/process', $data);
  // }
}