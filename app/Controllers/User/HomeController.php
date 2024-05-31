<?php

use App\Core\BaseController;
use App\Core\Message;

class HomeController extends BaseController{
  private $homeModel;
  public function __construct() {
    $this->homeModel = $this->model('User/', 'HomeModel');
  }
  
  public function index(){
    $data = [
      'title' => 'home',
    ];
    $this->view('User/home/index', $data);
  }

  public function about(){
    $data = [
      'title' => 'About Us',
    ];
    $this->view('User/home/about', $data);
  }
}