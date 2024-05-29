<?php

use App\Core\BaseController;

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
  
  public function detail($id){
    $orders = $this->orderModel->orderById($id);
    $orderDetails = $this->orderModel->orderDetailByOrderId($orders['id_order']);
    $orderCount = $this->orderModel->orderCountByCustomerId($orders['id_user']);
    $bulanIndonesia = array(
      1 => 'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $hariIndonesia = array(
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu'
    );
    
    $orderDate = new DateTime($orders['order_date']);
    $hari = $hariIndonesia[$orderDate->format('l')];
    $tanggal = $orderDate->format('d');
    $bulan = $bulanIndonesia[(int)$orderDate->format('m')];
    $tahun = $orderDate->format('Y');
    $orderDate = $hari.', '.$tanggal.' '.$bulan.' '.$tahun;
    $data = [
      'title' => 'Order',
      'nav' => 'order',
      'orders' => $orders,
      'orderDetails' => $orderDetails,
      'orderDate' => $orderDate,
      'orderCount' => $orderCount
    ];
    $this->view('Admin/template/header', $data);
    $this->view('Admin/order/orderDetail', $data);
    $this->view('Admin/template/footer');
  }
}