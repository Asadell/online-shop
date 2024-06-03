<?php

use App\Core\BaseController;
use App\Core\Message;
use App\Controllers\ValidationController;

class CartController extends BaseController{
  private $cartModel;
  private $productModel;
  public function __construct() {
    $this->cartModel = $this->model('User/', 'CartModel');
    $this->productModel = $this->model('User/', 'ProductModel');
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
      }else { // belum ada di cart
        $proc = $this->productModel->getDetailProductById($id);
        $cartCount = $proc['cart_count'];
        $proc = $this->productModel->updateCartCountById($cartCount+1, $id);
        $proc = $this->cartModel->addProduct($idUser, $id);
      }
    }

    // $cartData = $_SESSION['cart'];
    $_SESSION['cart'] = $this->cartModel->getCartById();
    
    header('Content-Type: application/json');
    $result = $this->cartModel->getAmountCartById($idUser);
    echo json_encode($result['sum'],JSON_FORCE_OBJECT);
  }
  
  public function delete($id){
    $idUser = $_SESSION['id_user'];
    $proc = $this->cartModel->getQuantityById($idUser, $id);
    if($proc['qty']>0){
      $proc = $this->productModel->getDetailProductById($id);
      $cartCount = $proc['cart_count'];
      if($cartCount>0) $proc = $this->productModel->updateCartCountById($cartCount-1, $id);
    }
    header('Content-Type: application/json');
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