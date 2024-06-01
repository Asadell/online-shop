<?php

use App\Core\BaseController;
use App\Core\Message;
use App\Controllers\ValidationController;

class OrderController extends BaseController{
  private $orderModel;
  public function __construct() {
    $this->orderModel = $this->model('User/', 'OrderModel');
  }
  
  public function index(){
    if(!(new ValidationController)->checkLogin('CUSTOMER')){
      $this->redirect('login');
    }
    $data = [
      'title' => 'order',
    ];
    $this->view('User/order/index', $data);
  }
  
  // public function detail(){ // mana id nya
  //   $data = [
  //     'title' => 'order',
  //   ];
  //   $this->view('User/order/orderDetail', $data);
  // }
  
  // public function download(){ // download eyy PDF
  //   $data = [
  //     'title' => 'order',
  //   ];
  //   $this->view('User/order/index', $data);
  // }
}