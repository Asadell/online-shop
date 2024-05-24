<?php

class DefaultApp extends BaseController{
  public function index(){
    $data = [
      'title' => 'Dashboard Admin'
    ];
    $this->view('Admin/dashboard/index', $data);
  }
}