<?php

class ProductController extends BaseController{
  public function index(){
    $data = [
      'title' => 'Product',
      'nav' => 'products'
    ];
    $this->view('Admin/template/header', $data);
    $this->view('Admin/product/index', $data);
    $this->view('Admin/template/footer');
  }
  public function edit($id1=0, $id2=""){
    echo 'EDIT from product controller admin index, id1: '.$id1. ', id2: '.$id2;
  }
  // public function edit($id1, $id2){
  //   echo 'EDIT from product controller admin index, id1: '.$id1.', id2: '.$id2;
  // }
}