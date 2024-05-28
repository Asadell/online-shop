<?php

class DashboardController extends BaseController{
  private $dashboardModel;
  public function __construct() {
    $this->dashboardModel = $this->model('Admin/', 'DashboardModel');
  }
  public function index(){
    $data = [
      'title' => 'Dashboard',
      'nav' => 'dashboard',
      'revenueCount' => $this->dashboardModel->revenueCount(),
      'productCount' => $this->dashboardModel->productCount(),
      'orderCount' => $this->dashboardModel->orderCount(),
      'customerCount' => $this->dashboardModel->customerCount(),
    ];
    $this->view('Admin/template/header', $data);
    $this->view('Admin/dashboard/index', $data);
    $this->view('Admin/template/footer');
  }
}