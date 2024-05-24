<?php

class BaseController{
  public function view($view, $data = []){
    if(count($data)){
      extract($data);
    }
    require_once '../app/Views/'.$view.'.php';
  }

  public function redirect($url){
    header('Location: '.$url);
    exit;
  }

  public function model($model){
    require_once '../app/Models/'.$model.'.php';
    return new $model;
  }
}