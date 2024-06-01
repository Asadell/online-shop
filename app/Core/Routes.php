<?php
namespace App\Core;
class Routes{
  public function run(){
    $router = new App();
    $router->setDefaultController('DefaultApp');
    $router->setDefaultMethod('index');

    // Auth
    $router->get('/login', ['Auth', 'AuthController', 'index']);
    $router->post('/login', ['Auth', 'AuthController', 'login']);
    $router->get('/register', ['Auth', 'AuthController', 'register']);
    $router->post('/register', ['Auth', 'AuthController', 'registration']);
    $router->get('/logout', ['Auth', 'AuthController', 'logout']);

    // Admin
    $router->get('/admin', ['Admin', 'DashboardController', 'index']);
    $router->get('/admin/products', ['Admin', 'ProductController', 'index']);
    $router->get('/admin/products/add', ['Admin', 'ProductController', 'create']);
    $router->post('/admin/products/add', ['Admin', 'ProductController', 'store']);
    $router->get('/admin/products/edit', ['Admin', 'ProductController', 'edit']);
    $router->post('/admin/products/edit', ['Admin', 'ProductController', 'update']);
    $router->get('/admin/products/delete/{id}', ['Admin', 'ProductController', 'destroy']);
    $router->get('/admin/products/report', ['Admin', 'ProductController', 'report']);
    $router->get('/admin/categories', ['Admin', 'CategoryController', 'index']);
    // $router->get('/admin/categories/add', ['Admin', 'CategoryController', 'create']);
    $router->post('/admin/categories/add', ['Admin', 'CategoryController', 'store']);
    $router->get('/admin/categories/edit', ['Admin', 'CategoryController', 'edit']);
    $router->post('/admin/categories/edit', ['Admin', 'CategoryController', 'update']);
    $router->get('/admin/categories/delete/{id}', ['Admin', 'CategoryController', 'destroy']);
    $router->get('/admin/orders', ['Admin', 'OrderController', 'index']);
    $router->get('/admin/orders/detail/{id}', ['Admin', 'OrderController', 'detail']);
    $router->get('/admin/orders/download', ['Admin', 'OrderController', 'download']);
    $router->get('/admin/admins', ['Admin', 'AdminController', 'index']);
    $router->post('/admin/admins', ['Admin', 'AdminController', 'store']);
    $router->post('/admin/admins/edit', ['Admin', 'AdminController', 'update']);
    $router->delete('/admin/admins', ['Admin', 'AdminController', 'delete']);
    
    // User
    $router->get('/user', ['User', 'HomeController', 'index']);
    $router->get('/user/about', ['User', 'HomeController', 'about']); 
    $router->get('/user/shop', ['User', 'ProductController', 'index']); 
    $router->get('/user/shop/category/{category}', ['User', 'ProductController', 'getbyCategory']); 
    $router->get('/user/shop/sortby/{index}', ['User', 'ProductController', 'sortBy']); 
    $router->get('/user/shop/product/{id}', ['User', 'ProductController', 'show']); 
    $router->get('/user/shop/search', ['User', 'ProductController', 'search']); 
    $router->get('/user/profile', ['User', 'UserController', 'index']); 
    $router->get('/user/profile/edit', ['User', 'UserController', 'edit']); 
    $router->post('/user/profile/edit', ['User', 'UserController', 'update']); 
    $router->get('/user/profile/delete', ['User', 'UserController', 'delete']); 
    $router->get('/user/payment', ['User', 'PaymentController', 'index']); 
    $router->get('/user/payment/add', ['User', 'PaymentController', 'create']); 
    $router->post('/user/payment/add', ['User', 'PaymentController', 'store']); 
    $router->get('/user/order', ['User', 'OrderController', 'index']); 
    $router->get('/user/order/detail', ['User', 'OrderController', 'detail']); 
    $router->get('/user/order/download', ['User', 'OrderController', 'download']); 

    $router->get('/user/checkout', ['User', 'CheckoutController', 'index']); 
    $router->post('/user/checkout', ['User', 'CheckoutController', 'process']);
    // $router->get('/user/cart', ['User', 'CartController', 'index']);
    $router->get('/user/cart/add/{id}', ['User', 'CartController', 'add']);
    $router->post('/user/delete', ['User', 'CartController', 'delete']);
    $router->post('/user/update', ['User', 'CartController', 'update']);



    $router->run();
  }
}