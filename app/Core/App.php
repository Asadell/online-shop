<?php
namespace App\Core;
class App{
  private $controllerFolder = NULL;
  private $controllerFile = 'DefaultApp';
  private $controllerMethod = 'index';
  private $parameter = [];

  private const DEFAULT_GET = 'GET';
  private const DEFAULT_POST = 'POST';
  private const DEFAULT_PUT = 'PUT';
  private const DEFAULT_DELETE = 'DELETE';

  private $handlers = [];

  public function setDefaultController($controller){
    $this->controllerFile = $controller;
  }

  public function setDefaultMethod($method){
    $this->controllerMethod = $method;
  }

  public function get($uri, $callback){
    $this->setHandler(self::DEFAULT_GET, $uri, $callback);
  }
  
  public function post($uri, $callback){
    $this->setHandler(self::DEFAULT_POST, $uri, $callback);
  }
  
  public function put($uri, $callback){
    $this->setHandler(self::DEFAULT_PUT, $uri, $callback);
  }
  
  public function delete($uri, $callback){
    $this->setHandler(self::DEFAULT_DELETE, $uri, $callback);
  }

  private function setHandler(string $method, string $path, $handler){
    $this->handlers[$method.$path] = [
      'path'=>$path, 'method'=>$method, 'handler'=>$handler
    ];
  }

  public function run(){
    $execute = 0;
    $url = $this->getUrl();
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    foreach($this->handlers as $handler){
      $path = explode('/',ltrim(rtrim($handler['path'], '/'), '/'));
      $kurl = (isset($url[0]) ? $url[0] : '').(isset($url[1]) ? $url[1] : '').(isset($url[2]) ? $url[2] : '');
      $kpath = (isset($path[0]) ? $path[0] : '').(isset($path[1]) ? $path[1] : '').(isset($path[2]) ? $path[2] : '');
      if($kurl != "" && $kurl == $kpath && $requestMethod == $handler['method']){
        // var_dump($kurl);
        // var_dump($kpath);
        // var_dump(file_exists(__DIR__ . '/../Controllers/'.$handler['handler'][0].'/'.$handler['handler'][1].'.php'));
        // die("ya");
        // var_dump($handler['handler']);
        // if(isset($handler['handler'][0]) && file_exists(__DIR__ . '/../Controllers/'.$handler['handler'][0].'/'.$handler['handler'][1].'.php')){
        if(isset($handler['handler'][0]) && file_exists(__DIR__ . '/../Controllers/'.$handler['handler'][0].'/'.$handler['handler'][1].'.php')){
          // die("yaa");
          $this->controllerFolder = $handler['handler'][0];
          unset($url[0]);
          $this->controllerFile = $handler['handler'][1];
          unset($url[1]);
        }
        require_once __DIR__.'/../Controllers/'.$this->controllerFolder.'/'.$this->controllerFile.'.php';
        $this->controllerFile = new $this->controllerFile();
        $execute = 1;

        if(isset($handler['handler'][2]) && method_exists($this->controllerFile, $handler['handler'][2])){
            $this->controllerMethod = $handler['handler'][2];
            unset($url[2]);
          }
          // var_dump($this->controllerMethod);
          // die("loh");
        break;
      }
    }
    
    if(!$execute){
      require_once __DIR__.'/../Controllers/'.$this->controllerFolder.$this->controllerFile.'.php';
      $this->controllerFile = new $this->controllerFile();
    }
    // if($url){                           // CEK file
    //   if($url[0] == 'admin'){           // role admin
    //     unset($url[0]);
    //     if($url[1] == 'product'){       // productController
    //       if(file_exists(__DIR__.'/../Controllers/Admin/ProductController.php')){
    //         $this->controllerFolder = 'Admin/';
    //         $this->controllerFile = 'ProductController';
    //         unset($url[1]);
    //       }
    //     }
    //   } 
    //   // else if($url[0] == 'user'){
  
    //   // }
    // }

    // require_once __DIR__.'/../Controllers/'.$this->controllerFolder.$this->controllerFile.'.php';
    // $this->controllerFile = new $this->controllerFile();

    // if(isset($url[2])){
    //   if(method_exists($this->controllerFile, $url[2])){ // http://online-shop.test/admin/product/edit/1/99
    //     $this->controllerMethod = $url[2];
    //     var_dump($this->controllerMethod);
    //     unset($url[2]);
    //   }
    // }

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