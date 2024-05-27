<?php

class AdminController extends BaseController{
  private $adminModel;
  public function __construct() {
    $this->adminModel = $this->model('Admin/', 'AdminModel');
  }
  public function index(){
    $data = [
      'title' => 'Admin',
      'nav' => 'admin',
      'AllAdmin' => $this->adminModel->getAll()
    ];
    $this->view('Admin/template/header', $data);
    $this->view('Admin/admin/index', $data);
    $this->view('Admin/template/footer');
  }
}