<?php

class AdminController extends BaseController{
  public function index(){
    $data = [
      'title' => 'Admin',
      'nav' => 'admin'
    ];
    $this->view('Admin/template/header', $data);
    $this->view('Admin/admin/index', $data);
    $this->view('Admin/template/footer');
  }
}