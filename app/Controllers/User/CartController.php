<?php

use App\Core\BaseController;
use App\Core\Message;
use App\Controllers\ValidationController;

class CartController extends BaseController{
  private $cartModel;
  public function __construct() {
    $this->cartModel = $this->model('User/', 'CartModel');
  }
  
  public function store($id){
    if(!(new ValidationController)->checkLogin('CUSTOMER')){
      $this->redirect('login');
    }
    $idUser = $_SESSION['id_user'];
    if($id != -1){
      $proc = $this->cartModel->isProductAlreadyExists($idUser, $id);
      if($proc) {
        $qty = $proc['qty'];
        $proc = $this->cartModel->updateQuantity($qty+1, $idUser, $id);
      }else {
        $proc = $this->cartModel->addProduct($idUser, $id);
      }
    }
    
    header('Content-Type: application/json');
    $result = $this->cartModel->getAmountCartById($idUser);
    echo json_encode($result['sum'],JSON_FORCE_OBJECT);
    $_SESSION['cart'] = $this->cartModel->getCartById();
  }
  
  public function delete($id){
    header('Content-Type: application/json');
    $idUser = $_SESSION['id_user'];
    $proc = $this->cartModel->deleteProduct($idUser, $id);
    $this->store(-1);
  }

  // public function add($id){
  //   if(!(new ValidationController)->checkLogin('CUSTOMER')){
  //     $this->redirect('login');
  //   }
  //   $idUser = $_SESSION['id_user'];
  //   $proc = $this->cartModel->isProductAlreadyExists($idUser, $id);
  //   if($proc) {
  //     $proc = $this->cartModel->isProductAlreadyExists($idUser, $id);
  //     $qty = $proc['qty'];
  //     $proc = $this->cartModel->updateQuantity($qty+1, $idUser, $id);
  //   }else {
  //     $proc = $this->cartModel->addProduct($idUser, $id);
  //   }
  //   $this->redirect('user/shop');
  // }

  

  // public function update(){ // post
  //   $data = [
  //     'title' => 'cart',
  //   ];
  //   $this->view('User/cart/index', $data);
  // }

  // public function delete(){ // post
  //   $data = [
  //     'title' => 'cart',
  //   ];
  //   $this->view('User/cart/index', $data);
  // }
}