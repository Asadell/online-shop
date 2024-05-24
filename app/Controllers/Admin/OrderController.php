<?php

class OrderController extends BaseController{
  public function index(){
    $data = [
      'title' => 'Order',
      'nav' => 'order'
    ];
    $this->view('Admin/template/header', $data);
    $this->view('Admin/order/index', $data);
    $this->view('Admin/template/footer');
  }
}