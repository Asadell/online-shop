<?php

class CategoryController extends BaseController{
  public function index(){
    $data = [
      'title' => 'Category',
      'nav' => 'category'
    ];
    $this->view('Admin/template/header', $data);
    $this->view('Admin/category/index', $data);
    $this->view('Admin/template/footer');
  }
}