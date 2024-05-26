<?php

class ProductController extends BaseController{
  private $productModel;
  public function __construct() {
    $this->productModel = $this->model('Admin/', 'ProductModel');
  }
  public function index(){
    $data = [
      'title' => 'Product', 
      'nav' => 'products',
      'AllProduct' => $this->productModel->getAll()
    ];
    $this->view('Admin/template/header', $data);
    $this->view('Admin/product/index', $data);
    $this->view('Admin/template/footer');
  }
  public function edit(){
    $data = [
      'title' => 'Product', 
      'nav' => 'products',
    ];
    $this->view('Admin/template/header', $data);
    $this->view('Admin/product/edit', $data);
    $this->view('Admin/template/footer');
  }
  public function create(){
    $data = [
      'title' => 'Product', 
      'nav' => 'products',
    ];
    $this->view('Admin/template/header', $data);
    $this->view('Admin/product/create', $data);
    $this->view('Admin/template/footer');
  }
  public function store(){
    $fields = [
      'name' => 'string | required | between: 3, 30',
      'desc' => 'string | required',
      'price' => 'int | required',
      'stock' => 'int | required',
      'fileImg' => 'string | required | fileimage'
      // 'fileImg' => 'string | required | fileimage'
    ];
    $message = [
      'name' => [
        'required' => 'Nama barang harus diisi',
        'between' => 'Nama barang harus diantara 3 dan 30 karakter'
      ],
      'desc' =>  [
        'required' => 'Deskripsi harus diisi'
      ],
      'price' => [
        'required' => 'Harga harus diisi'
      ],
      'stock' => [
        'required' => 'Stok harus diisi'
      ],
      'fileImg' => [
        'required' => 'File image harus diisi',
        'fileimage' => 'file harus berekstensi png/jpg/jpeg'
      ]
    ];
    // echo "<pre>";
    // print_r($_POST);
    // print_r($_FILES['fileImg']['name']);
    // print_r($_FILES['fileImg']['tmp_name']);
    // print_r(array_merge($_POST, $_FILES));
    // print_r($fields);
    // echo "</pre>";
    [$inputs, $errors] = $this->filter(array_merge($_POST, $_FILES), $fields, $message);
    // echo "<pre>";
    // print_r($inputs);
    // print_r($errors);
    // echo "</pre>";
    // die();
    if($errors) {
      Message::setFlash('error', 'Gagal !', $errors[0], $inputs);
      $this->redirect('admin/products/add');
    }
    // $file_tmp = $inputs['fileImg']['tmp_name'];
    // var_dump($file_tmp);
    // $fileName = $inputs['fileImg']['name'];
    // var_dump(__DIR__.'/../../../public/img/admin/products/'.$fileName);
    // die();
    
    $proc = $this->productModel->insert($inputs);
    
    if($proc) {
      $fileName = $inputs['fileImg']['name'];
      $file_tmp = $inputs['fileImg']['tmp_name'];
      move_uploaded_file($file_tmp, __DIR__.'/../../../public/img/admin/products/'.$fileName);
      Message::setFlash('success', 'Berhasil !', 'Barang berhasil ditambahkan');
      $this->redirect('admin/products');
    }
    
    
    // $proc = $this->barangModel->insertt
  }
  // public function update(){
    
  // }
} 