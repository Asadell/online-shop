<?php

use App\Core\BaseController;
use App\Core\Message;

class CheckoutController extends BaseController{
  private $checkoutModel;
  public function __construct() {
    $this->checkoutModel = $this->model('User/', 'CheckoutModel');
  }
  
  public function index(){
    $data = [
      'title' => 'checkout',
    ];
    $this->view('User/checkout/index', $data);
  }

  public function process() { // post
    $data = [
      'title' => 'checkout',
    ];
    $this->view('User/checkout/process', $data);
  }
}