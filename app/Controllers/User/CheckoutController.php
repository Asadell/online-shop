<?php

use App\Core\BaseController;
use App\Core\Message;
use App\Controllers\ValidationController;

class CheckoutController extends BaseController{
  private $checkoutModel;
  private $cartModel;
  private $userModel;
  private $productModel;
  public function __construct() {
    $this->checkoutModel = $this->model('User/', 'CheckoutModel');
    $this->cartModel = $this->model('User/', 'CartModel');
    $this->userModel = $this->model('User/', 'UserModel');
    $this->productModel = $this->model('User/', 'ProductModel');
  }
  
  public function index(){
    if(!(new ValidationController)->checkLogin('CUSTOMER')){
      $this->redirect('login');
    }
    $id = $_SESSION['id_user'];
    $data = [
      'title' => 'checkout',
      'nav' => 'shop',
      'user' => $this->userModel->getUserById($id),
      'cartDetail' => $_SESSION['cart'],
      'provider' => $this->userModel->getProviderById($id),
    ];
    $this->view('User/template/header', $data);
    $this->view('User/checkout/index', $data);
    $this->view('User/template/footer');
  }

  public function process() {
    if(!(new ValidationController)->checkLogin('CUSTOMER')){
      $this->redirect('login');
    }
    if(empty($_POST['products'])) $this->redirect('user/shop');
    $total = $_POST['total'];
    $idpayment = $_POST['provider'];
    $proc = $this->checkoutModel->getBalanceById($idpayment);
    if($proc['amount']<$total){
      $amount = $total-$proc['amount'];
      Message::setFlash('warning', 'Insufficient Balance!', 'You need '.number_format($amount, 0, ',', '.').' more.');
      $this->redirect('user/checkout');
    }
    $amount = $proc['amount']-$total;
    $iduser = $_SESSION['id_user'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $resi = $this->generate_serial_number();
    $proc = $this->checkoutModel->storeToOrder($resi, $total, $iduser, $idpayment, $address, $phone);
    $idOrder = $proc['id_order'];
    
    $products = $_POST['products'];
    foreach ($products['qty'] as $key => $qty) {
      $idProduct = $products['idproduct'][$key];
      $proc = $this->productModel->getDetailProductById($idProduct);
      if($qty > $proc['stock']) {
        Message::setFlash('warning', 'Stock Insufficient!', 'Not enough stock for '.$proc['name'].'');
        $this->redirect('user/checkout');
      }
    }
    foreach ($products['qty'] as $key => $qty) {
      $idProduct = $products['idproduct'][$key];
      $price = $products['price'][$key];
      $proc = $this->checkoutModel->storeToOrderDetail($qty, $idOrder, $idProduct, $price);
      $proc = $this->productModel->getDetailProductById($idProduct);
      $qtyNew = $proc['stock'] - $qty;
      $salesCount = $proc['sales_count'];
      $cartCount = $proc['cart_count'];
      $proc = $this->productModel->reduceStock($qtyNew, $idProduct);
      $proc = $this->productModel->updateSalesCountById($salesCount+1, $idProduct);
      $proc = $this->productModel->updateCartCountById($cartCount-1, $idProduct);
    }
    $this->checkoutModel->updateCustomerBalance($amount, $idpayment);
    $this->cartModel->emptyCartById($iduser);
    Message::setFlash('success', 'Order Successful!', 'Order processed. Details emailed.');
    $this->redirect('user/shop');
  }

  function generate_serial_number($length = 8) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $serial_number = '';

    for ($i = 0; $i < $length; $i++) {
      $serial_number .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $serial_number;
  }
}