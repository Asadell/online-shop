<?php

use App\Core\BaseController;
use App\Core\Message;

class OrderController extends BaseController{
  private $orderModel;
  public function __construct() {
    $this->orderModel = $this->model('User/', 'OrderModel');
  }
  
  public function index(){
    $data = [
      'title' => 'order',
    ];
    $this->view('User/order/index', $data);
  }
  
  public function detail(){ // mana id nya
    $data = [
      'title' => 'order',
    ];
    $this->view('User/order/orderDetail', $data);
  }
  
  public function download(){ // download eyy PDF
    $data = [
      'title' => 'order',
    ];
    $this->view('User/order/index', $data);
  }
}