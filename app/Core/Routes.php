<?php

class Routes{
  private $controllerFolder = NULL;
  private $controllerFile = 'DefaultApp';
  private $controllerMethod = 'index';
  private $parameter = [];

  public function run(){
    $url = $this->getUrl();
    if($url){                           // CEK file
      if($url[0] == 'admin'){           // role admin
        unset($url[0]);
        if($url[1] == 'product'){       // productController
          if(file_exists(__DIR__.'/../Controllers/Admin/ProductController.php')){
            $this->controllerFolder = 'Admin/';
            $this->controllerFile = 'ProductController';
            unset($url[1]);
          }
        }
      } 
      // else if($url[0] == 'user'){
  
      // }
    }

    require_once __DIR__.'/../Controllers/'.$this->controllerFolder.$this->controllerFile.'.php';
    $this->controllerFile = new $this->controllerFile();

    if(isset($url[2])){
      if(method_exists($this->controllerFile, $url[2])){ // http://online-shop.test/admin/product/edit
        $this->controllerMethod = $url[2];
        unset($url[2]);
      }
    }

    if(!empty($url)){
      $this->parameter=array_values($url);
    }
    call_user_func_array([$this->controllerFile, $this->controllerMethod], $this->parameter);
  }

  private function getUrl(){
    $url = rtrim($_SERVER['QUERY_STRING'], '/');
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $url = explode('/', $url);
    return $url;
  }
}