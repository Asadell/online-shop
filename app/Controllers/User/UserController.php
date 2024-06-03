<?php

use App\Core\BaseController;
use App\Core\Message;
use App\Controllers\ValidationController;

class UserController extends BaseController{
  private $userModel;
  private $cartModel;
  private $orderModel;
  public function __construct() {
    $this->userModel = $this->model('User/', 'UserModel');
    $this->cartModel = $this->model('User/', 'CartModel');
    $this->orderModel = $this->model('User/', 'OrderModel');
  }
  
  public function index(){
    if(!(new ValidationController)->checkLogin('CUSTOMER')){
      $this->redirect('login');
    }
    $_SESSION['cart'] = $this->cartModel->getCartById();
    
    $id = $_SESSION['id_user'];
    $data = [
      'title' => 'user',
      'nav' => 'profile',
      'sidebar' => 'personal',
      'user' => $this->userModel->getUserById($id),
      'orders' => $this->orderModel->getAllOrderById($id)
    ];
    $this->view('User/template/header', $data);
    $this->view('User/template/sidebar', $data);
    $this->view('User/user/index', $data);
    $this->view('User/template/footer');
  }
  
  public function update(){ // post
    $full_name = $_POST['fullName'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone_number = $_POST['phoneNumber'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_SESSION['id_user'];
    $proc = $this->userModel->updateUser($full_name, $email, $address, $phone_number, $username, $password, $id);
    Message::setFlash('success', 'Berhasil !', 'Data anda berhasil diubah');
    $this->redirect('user/profile');
  }

  public function order(){
    $id = $_SESSION['id_user'];
    $data = [
      'title' => 'user',
      'nav' => 'profile',
      'sidebar' => 'order',
      'user' => $this->userModel->getUserById($id),
      'orders' => $this->orderModel->getAllOrderById($id)
    ];
    $this->view('User/template/header', $data);
    $this->view('User/template/sidebar', $data);
    $this->view('User/user/orders', $data);
    $this->view('User/template/footer');
  }

  public function orderDetail(){
    $data = [
      'title' => 'user',
      'nav' => 'profile',
    ];
    $this->view('User/template/header', $data);
    $this->view('User/user/orderDetail', $data);
    $this->view('User/template/footer');
  }

  public function payment(){
    $id = $_SESSION['id_user'];
    $providerUser = $this->userModel->providerUser($id);
    $providerData = array('BCA', 'OVO', 'Midtrans', 'DANA', 'GoPay', 'LinkAja');
    $providerUserList = array_map(function($user) {
      return $user['provider'];
    }, $providerUser);
    $providerData = array_diff($providerData, $providerUserList);
    $data = [
      'title' => 'user',
      'nav' => 'profile',
      'sidebar' => 'wallet',
      'user' => $this->userModel->getUserById($id),
      'providerUser' => $providerUser,
      'providerData' => $providerData
    ];
    $this->view('User/template/header', $data);
    $this->view('User/template/sidebar', $data);
    $this->view('User/user/paymentDetail', $data);
    $this->view('User/template/footer');
  }
  
  public function store(){
    $id = $_SESSION['id_user'];
    $provider = $_POST['provider'];
    $amount = $_POST['amount'];
    $proc = $this->userModel->addPayment($amount, $provider, $id);
    Message::setFlash('success', 'Berhasil !', 'Provider berhasil ditambah');
    $this->redirect('user/profile/payment');
  }
  
  // public function delete(){ // delete
  //   $data = [
  //     'title' => 'user',
  //   ];
  //   $this->view('User/user/index', $data);
  // }
}