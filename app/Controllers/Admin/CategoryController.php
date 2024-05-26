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
  }public function edit(){
    $data = [
      'title' => 'Category',
      'nav' => 'category'
    ];
    $this->view('Admin/template/header', $data);
    $this->view('Admin/category/edit', $data);
    $this->view('Admin/template/footer');
  }
  public function create(){
    $data = [
      'title' => 'Category',
      'nav' => 'category'
    ];
    $this->view('Admin/template/header', $data);
    $this->view('Admin/category/create', $data);
    $this->view('Admin/template/footer');
  }
}