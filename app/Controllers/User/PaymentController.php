<?php

use App\Core\BaseController;
use App\Core\Message;
use App\Controllers\ValidationController;

class PaymentController extends BaseController{
  private $paymentModel;
  public function __construct() {
    $this->paymentModel = $this->model('User/', 'PaymentModel');
  }

  public function index(){
    if(!(new ValidationController)->checkLogin('CUSTOMER')){
      $this->redirect('login');
    }
    $data = [
      'title' => 'payment',
    ];
    $this->view('User/payment/index', $data);
  }

  // public function create(){
  //   $data = [
  //     'title' => 'paymentduh',
  //   ];
  //   $this->view('User/payment/create', $data);
  // }

  // public function store(){ // post
  //   $data = [
  //     'title' => 'payment',
  //   ];
  //   $this->view('User/payment/index', $data);
  // }

  
}