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
    $this->view('Auth/template/header', $data);
    $this->view('Auth/login', $data);
    $this->view('Auth/template/footer');
  }

  public function login(){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login = $this->authModel->login($username, $password);
    if($login){
      $_SESSION['id_user'] = $login['id_user'];
      $_SESSION['username'] = $login['username'];
      $_SESSION['role'] = $login['role'];

      if($_SESSION['role'] === 'ADMIN'){
        $this->redirect('admin');
      } else if($_SESSION['role'] === 'CUSTOMER') {
        $this->redirect('user');
      }
    }else {
      Message::setFlash('warning', 'Warning !', 'Username atau password anda salah!');
      $this->redirect('login');
    }
  }

  public function register(){
    $data = [
      'title' => 'Register', 
    ];
    $this->view('Auth/template/header', $data);
    $this->view('Auth/register', $data);
    $this->view('Auth/template/footer');
  }

  public function registration(){ 
    $fields = [
      'fullName' => 'string | required',
      'email' => 'string | required',
      'username' => 'string | required | alphanumeric | between: 5, 30',
      'password' => 'string | required | between: 5, 30',
      'address' => 'string | required',
      'phoneNumber' => 'string | required',
    ];
    $message = [
      'fullName' => [
        'required' => 'Nama harus diisi',
      ],
      'email' => [
        'required' => 'Email harus diisi',
      ],
      'username' => [
        'required' => 'Username harus diisi',
        'alphanumeric' => 'Username hanya boleh terdiri huruf dan angka',
        'between' => 'Username harus diantara 5 dan 30 karakter'
      ],
      'password' => [
        'required' => 'Password harus diisi',
        'between' => 'Password harus diantara 5 dan 30 karakter'
      ],
      'address' => [
        'required' => 'Address harus diisi',
      ],
      'phoneNumber' => [
        'required' => 'Phone Number harus diisi',
      ],
    ];
    [$inputs, $errors] = $this->filter($_POST, $fields, $message);
    $isEmailTaken = $this->authModel->isEmailTaken($inputs['email']);
    if($isEmailTaken){
      Message::setFlash('warning', 'Gagal !', 'Email sudah terpakai', $inputs);
      $this->redirect('register');
    } 
    
    $isUsernameTaken = $this->authModel->isUsernameTaken($inputs['username']);
    if($isUsernameTaken){
      Message::setFlash('warning', 'Gagal !', 'Username sudah terpakai', $inputs);
      $this->redirect('register');
    } 
    
    if($errors) {
      Message::setFlash('error', 'Gagal !', $errors[0], $inputs);
      $this->redirect('register');
    }
    
    $proc = $this->authModel->insert($inputs);
    if($proc){
      $this->authModel->providerDefault($proc['id_user']);
      Message::setFlash('success', 'Berhasil !', 'User berhasil ditambahkan');
      $this->redirect('login');
    }
  }
  
  public function logout(){
    session_unset();
    session_destroy();
    $this->redirect('login');
  }
}