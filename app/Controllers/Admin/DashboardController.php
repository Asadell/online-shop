<?php

class DashboardController extends BaseController{
  public function index(){
    $data = [
      'title' => 'Dashboard',
      'nav' => 'dashboard'
    ];
    $this->view('Admin/template/header', $data);
    $this->view('Admin/dashboard/index', $data);
    $this->view('Admin/template/footer');
  }
}