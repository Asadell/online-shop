<?php

use App\Core\BaseController;
use App\Core\Message;

class UserController extends BaseController{
  private $userModel;
  public function __construct() {
    $this->userModel = $this->model('User/', 'UserModel');
  }
  
  public function index(){
    $data = [
      'title' => 'user',
      'nav' => 'profile'
    ];
    $this->view('User/user/index', $data);
  }
  
  public function edit(){
    $data = [
      'title' => 'user',
    ];
    $this->view('User/user/edit', $data);
  }
  
  public function update(){ // post
    $data = [
      'title' => 'user',
    ];
    $this->view('User/user/index', $data);
  }
  
  public function delete(){ // delete
    $data = [
      'title' => 'user',
    ];
    $this->view('User/user/index', $data);
  }
}