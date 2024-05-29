<?php

class DashboardController extends BaseController{
  private $dashboardModel;
  public function __construct() {
    $this->dashboardModel = $this->model('Admin/', 'DashboardModel');
  }
  public function index(){
    $salesData = $this->dashboardModel->getSalesByCategory();
    $totalOrderedQty = $this->dashboardModel->totalOrderedQty();
    $totalSalesLaptop = $this->dashboardModel->getTotalSalesLaptop();
    $totalSalesHanphone = $this->dashboardModel->getTotalSalesHanphone();
    $totalSalesAccessories = $this->dashboardModel->getTotalSalesAccessories();
    $data = [
      'title' => 'Dashboard',
      'nav' => 'dashboard',
      'revenueCount' => $this->dashboardModel->revenueCount(),
      'productCount' => $this->dashboardModel->productCount(),
      'orderCount' => $this->dashboardModel->orderCount(),
      'customerCount' => $this->dashboardModel->customerCount(),
      'totalQuantity' => $this->dashboardModel->totalQuantity(),
      'totalOrderedQty' => json_encode($totalOrderedQty, JSON_NUMERIC_CHECK),
      'salesData' => json_encode($salesData, JSON_NUMERIC_CHECK),
      'totalSalesLaptop' => json_encode($totalSalesLaptop, JSON_NUMERIC_CHECK),
      'totalSalesHanphone' => json_encode($totalSalesHanphone, JSON_NUMERIC_CHECK),
      'totalSalesAccessories' => json_encode($totalSalesAccessories, JSON_NUMERIC_CHECK)
    ];
    $this->view('Admin/template/header', $data);
    $this->view('Admin/dashboard/index', $data);
    $this->view('Admin/template/footer');
  }
}