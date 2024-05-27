<?php

class OrderController extends BaseController{
  private $orderModel;
  public function __construct() {
    $this->orderModel = $this->model('Admin/', 'OrderModel');
  }
  public function index(){
    $data = [
      'title' => 'Order',
      'nav' => 'order',
      'AllOrder' => $this->orderModel->getAll()
    ];
    $this->view('Admin/template/header', $data);
    $this->view('Admin/order/index', $data);
    $this->view('Admin/template/footer');
  }
}