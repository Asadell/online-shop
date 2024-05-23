<?php

class Routes{
  private $controllerFile = 'DefaultApp';
  private $controllerMethod = 'index';
  private $parameter = [];

  public function run(){
    echo '<pre>';
    $url = $this->getUrl();
    // var_dump($this->getUrl());
    var_dump($url);
    echo '</pre>';
    require_once __DIR__.'/../Controllers/'.$this->controllerFile.'.php';
    $this->controllerFile = new $this->controllerFile();
    call_user_func_array([$this->controllerFile, $this->controllerMethod], $this->parameter);
  }

  private function getUrl(){
    $url = rtrim($_SERVER['QUERY_STRING'], '/');
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $url = explode('/', $url);
    return $url;
  }
}