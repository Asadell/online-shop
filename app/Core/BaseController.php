<?php


class BaseController extends Filter{
  public function view($view, $data = []){
    if(count($data)){
      extract($data);
    }
    require_once '../app/Views/'.$view.'.php';
  }

  public function redirect($url){
    header('Location: '.BASEURL.'/'.$url);
    exit;
  }

  public function model($folder, $model){
    require_once '../app/Models/'.$folder.$model.'.php';
    return new $model;
  }
}