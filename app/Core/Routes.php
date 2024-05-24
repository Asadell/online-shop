<?php

class Routes{
  public function run(){
    $router = new App();
    $router->setDefaultController('DefaultApp');
    $router->setDefaultMethod('index');

    // Auth

    // Admin
    $router->get('/admin', ['Admin', 'DashboardController', 'index']);
    $router->get('/admin/products', ['Admin', 'ProductController', 'index']);
    $router->get('/admin/products/add', ['Admin', 'ProductController', 'create']);
    $router->post('/admin/products/add', ['Admin', 'ProductController', 'store']);
    $router->get('/admin/products/edit', ['Admin', 'ProductController', 'edit']);
    $router->put('/admin/products/edit', ['Admin', 'ProductController', 'update']);
    $router->delete('/admin/products/delete', ['Admin', 'ProductController', 'destroy']);
    $router->get('/admin/categories', ['Admin', 'CategoryController', 'index']);
    $router->get('/admin/categories/add', ['Admin', 'CategoryController', 'create']);
    $router->post('/admin/categories/add', ['Admin', 'CategoryController', 'store']);
    $router->get('/admin/categories/edit', ['Admin', 'CategoryController', 'edit']);
    $router->put('/admin/categories/edit', ['Admin', 'CategoryController', 'update']);
    $router->delete('/admin/categories/delete', ['Admin', 'CategoryController', 'destroy']);
    $router->get('/admin/orders', ['Admin', 'OrderController', 'index']);
    $router->get('/admin/orders/download', ['Admin', 'OrderController', 'download']);
    $router->get('/admin/admins', ['Admin', 'AdminController', 'index']);
    $router->post('/admin/admins', ['Admin', 'AdminController', 'store']);
    $router->delete('/admin/admins', ['Admin', 'AdminController', 'delete']);
    
    // User
    $router->get('/user', ['User', 'HomeController', 'index']);


    $router->run();
  }
}