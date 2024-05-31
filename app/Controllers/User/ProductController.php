<?php

use App\Core\BaseController;
use App\Core\Message;

class ProductController extends BaseController{
  private $productModel;
  public function __construct() {
    $this->productModel = $this->model('User/', 'ProductModel');
  }
  
  public function index(){
    $data = [
      'title' => 'Shop',
      'nav' => 'shop',
      'allCategory' => $this->productModel->getAmountCategory(),
      'AllProduct' => $this->productModel->getAll()
    ];
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";
    // die();
    $this->view('User/template/header', $data);
    $this->view('User/product/index', $data);
    $this->view('User/template/footer');
  }

  public function getbyCategory($category){
    $data = [
      'title' => 'Shop',
      'nav' => 'shop',
      'allCategory' => $this->productModel->getAmountCategory(),
      'category' => $category,
      'AllProduct' => $this->productModel->getProductbyCategory($category)
    ];
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";
    // die();
    $this->view('User/template/header', $data);
    $this->view('User/product/index', $data);
    $this->view('User/template/footer');
  }

  public function sortByPopularity($id){
    die($id);
    $data = [
      'title' => 'Shop',
    ];
    $this->view('User/product/popularity', $data);
  }

  public function sortByLatest(){
    $data = [
      'title' => 'Shop',
    ];
    $this->view('User/product/lastest', $data);
  }

  public function sortByPriceLowToHigh(){
    $data = [
      'title' => 'Shop',
    ];
    $this->view('User/product/lowtohigh', $data);
  }

  public function sortByPriceHighToLow(){
    $data = [
      'title' => 'Shop',
    ];
    $this->view('User/product/hightolow', $data);
  }

  public function show($id = 0){
    $data = [
      'title' => 'Shop',
    ];
    $this->view('User/product/show', $data);
  }

  public function search($keyword = ''){
    $data = [
      'title' => 'Shop',
    ];
    $this->view('User/product/search', $data);
  }
}