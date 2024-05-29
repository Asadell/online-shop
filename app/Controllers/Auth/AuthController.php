<?php

use App\Core\BaseController;
use App\Core\Message;

class AuthController extends BaseController{
  private $authModel;
  public function __construct() {
    $this->authModel = $this->model('Auth/', 'AuthModel');
  }
  
  public function index(){
    $data = [
      'title' => 'Login', 
    ];
    $this->view('Auth/login', $data);
  }

  // public function login(){
  //   $data = [
  //     'title' => 'auth', 
  //     'Allauth' => $this->authModel->getAll()
  //   ];
  //   $this->view('Admin/template/header', $data);
  //   $this->view('Admin/auth/index', $data);
  //   $this->view('Admin/template/footer');
  // }

  public function register(){
    $data = [
      'title' => 'Register', 
    ];
    $this->view('Auth/register', $data);
  }

  // public function registration(){
  //   $data = [
  //     'title' => 'auth', 
  //     'Allauth' => $this->authModel->getAll()
  //   ];
  //   $this->view('Admin/template/header', $data);
  //   $this->view('Admin/auth/index', $data);
  //   $this->view('Admin/template/footer');
  // }
}