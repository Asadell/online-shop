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
    ];
    $this->view('User/product/index', $data);
  }

  public function sortByPopularity(){
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