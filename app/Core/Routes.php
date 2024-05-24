<?php

class Routes{
  public function run(){
    $router = new App();
    $router->setDefaultController('DefaultApp');
    $router->setDefaultMethod('index');

    // Auth

    // Admin
    // $router->get('/admin', ['Admin', 'Product', 'index']);
    $router->get('/admin', ['Admin', 'DashboardController', 'index']);
    $router->get('/admin/products', ['Admin', 'Product', 'index']); // apus
    $router->get('/admin/products', ['Admin', 'ProductController', 'index']);
    $router->get('/admin/products/create', ['Admin', 'ProductController', 'create']);
    $router->post('/admin/products/create', ['Admin', 'ProductController', 'store']);
    // $router->get('/admin/products/edit', ['Admin', 'ProductController', 'edit']);
    $router->get('/admin/products/edit', ['Admin', 'ProductController', 'edit']);
    $router->put('/admin/products/edit', ['Admin', 'ProductController', 'update']);
    $router->delete('/admin/products/destroy', ['Admin', 'ProductController', 'destroy']);
    
    $router->get('/admin/products/{id}', ['Admin', 'Product', 'index']);
    $router->post('/admin/products', ['Admin', 'Product', 'add']);
    $router->put('/user/products', ['Admin', 'Product', 'edit']);
    
    // User
    $router->get('/user', ['User', 'HomeController', 'index']);


    $router->run();
  }
}