<?php

use App\Core\BaseController;
use App\Core\Message;

class ProductController extends BaseController{
  private $productModel;
  private $cartModel;
  public function __construct() {
    $this->productModel = $this->model('User/', 'ProductModel');
    $this->cartModel = $this->model('User/', 'CartModel');
  }
  
  public function index(){
    unset($_SESSION['category']);
    $products = $this->productModel->getAll();
    $productCount = count($products);
    $data = [
      'title' => 'Shop',
      'nav' => 'shop',
      'cart' => $this->cartModel->getCartById(),
      'allCategory' => $this->productModel->getAmountCategory(),
      'AllProduct' => $this->productModel->getAll(),
      'productCount' => $productCount
    ];
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die();
    $this->view('User/template/header', $data);
    $this->view('User/product/index', $data);
    $this->view('User/template/footer');
  }

  public function getbyCategory($category){
    $_SESSION['category'] = $category;
    $products = $this->productModel->getProductbyCategory($category);
    $productCount = count($products);
    $data = [
      'title' => 'Shop',
      'nav' => 'shop',
      'cart' => $this->cartModel->getCartById(),
      'allCategory' => $this->productModel->getAmountCategory(),
      'category' => $category,
      'AllProduct' => $products,
      'productCount' => $productCount
    ];
    $this->view('User/template/header', $data);
    $this->view('User/product/index', $data);
    $this->view('User/template/footer');
  }

  public function sortBy($index){
    $products = '';
    $category = '';
    if(isset($_SESSION['category'])) {
      $category = $_SESSION['category'];
      switch ($index) {
        case 0:
          $products = $this->productModel->getProductbyPopularityWithCategory($category);
          break;
        case 1:
          $products = $this->productModel->getProductbyLastestWithCategory($category);
          break;
        case 2:
          $products = $this->productModel->getProductbyLowtoHighWithCategory($category);
          break;
        case 3:
          $products = $this->productModel->getProductbyHightoLowWithCategory($category);
          break;
        default:
          die('index kacau');
      }
    } else {
      switch ($index) {
        case 0:
          $products = $this->productModel->getProductbyPopularity();
          break;
        case 1:
          $products = $this->productModel->getProductbyLastest();
          break;
        case 2:
          $products = $this->productModel->getProductbyLowtoHigh();
          break;
        case 3:
          $products = $this->productModel->getProductbyHightoLow();
          break;
        default:
          die('index kacau');
      }
    }
    $productCount = count($products);
    $data = [
      'title' => 'Shop',
      'nav' => 'shop',
      'cart' => $this->cartModel->getCartById(),
      'allCategory' => $this->productModel->getAmountCategory(),
      'category' => $category,
      'AllProduct' => $products,
      'productCount' => $productCount
    ];
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";
    // die();
    $this->view('User/template/header', $data);
    $this->view('User/product/index', $data);
    $this->view('User/template/footer');
  }

  public function show($id){
    $product = $this->productModel->getProductById($id);
    $products = $this->productModel->getProductExceptById($product['id_product'], $product['category_id']);
    $data = [
      'title' => 'Shop',
      'nav' => 'shop',
      'cart' => $this->cartModel->getCartById(),
      'product' => $product,
      'relatedProducts' => $products
    ];
    // if($data['cart']) echo 'ada';
    // else echo 'TDK';
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";
    // die();
    $this->view('User/template/header', $data);
    $this->view('User/product/show', $data);
    $this->view('User/template/footer');
  }

  // public function search($keyword = ''){
  //   $data = [
  //     'title' => 'Shop',
  //   ];
  //   $this->view('User/product/search', $data);
  // }
}