<?php

use App\Core\BaseController;
use App\Core\Message;
use App\Core\PhpXlsxGenerator;
use App\Controllers\ValidationController;

class ProductController extends BaseController{
  private $productModel;
  public function __construct() {
    $this->productModel = $this->model('Admin/', 'ProductModel');
  }
  public function index(){
    if(!(new ValidationController)->checkLogin('ADMIN')){
      $this->redirect('login');
    }
    $data = [
      'title' => 'Product', 
      'nav' => 'products',
      'AllProduct' => $this->productModel->getAll()
    ];
    $this->view('Admin/template/header', $data);
    $this->view('Admin/product/index', $data);
    $this->view('Admin/template/footer');
  }

  public function create(){
    $data = [
      'title' => 'Product', 
      'nav' => 'products',
      'menuCategory' => $this->productModel->getMenuCategory()
    ];
    $this->view('Admin/template/header', $data);
    $this->view('Admin/product/create', $data);
    $this->view('Admin/template/footer');
  }

  public function store(){
    $fields = [
      'name' => 'string | required | between: 3, 30',
      'description' => 'string | required',
      'price' => 'int | required',
      'stock' => 'int | required',
      'category' => 'int | required',
      'file' => 'string | required | fileimage'
    ];
    $message = [
      'name' => [
        'required' => 'Nama barang harus diisi',
        'between' => 'Nama barang harus diantara 3 dan 30 karakter'
      ],
      'description' =>  [
        'required' => 'Deskripsi harus diisi'
      ],
      'price' => [
        'required' => 'Harga harus diisi'
      ],
      'stock' => [
        'required' => 'Stok harus diisi'
      ],
      'category' => [
        'required' => 'Category harus diisi'
      ],
      'file' => [
        'required' => 'File image harus diisi',
        'fileimage' => 'File harus berekstensi png/jpg/jpeg'
      ]
    ];
    [$inputs, $errors] = $this->filter(array_merge($_POST, $_FILES), $fields, $message);
    if($errors) {
      Message::setFlash('error', 'Gagal !', $errors[0], $inputs);
      $this->redirect('admin/products/add');
    }
    $fileName = $inputs['file']['name'];

    $proc = $this->productModel->isPhotoAlreadyExists($fileName);
    if($proc){
      Message::setFlash('warning', 'Cannot add product !', 'Duplicate product photo');
      $this->redirect('admin/products');
    } 
    
    $proc = $this->productModel->insert($inputs);
    
    if($proc) {
      $file_tmp = $inputs['file']['tmp_name'];
      move_uploaded_file($file_tmp, __DIR__.'/../../../public/img/admin/products/'.$fileName);
      Message::setFlash('success', 'Berhasil !', 'Barang berhasil ditambahkan');
      $this->redirect('admin/products');
    }
  }
  
  public function edit($id){
    $data = [
      'title' => 'Product', 
      'nav' => 'products',
      'menuCategory' => $this->productModel->getMenuCategory(),
      'product' => $this->productModel->getById($id)
    ];
    $this->view('Admin/template/header', $data);
    $this->view('Admin/product/edit', $data);
    $this->view('Admin/template/footer');
  }
  
  public function update(){
    if($_FILES['file']['name'] == "") {
      $fields = [
        'name' => 'string | required | between: 3, 30',
        'description' => 'string | required',
        'price' => 'int | required',
        'stock' => 'int | required',
        'category' => 'int | required',
        'id_product' => 'int | required',
        'mode' => 'string | required'
      ];
      $message = [
        'name' => [
          'required' => 'Nama barang harus diisi',
          'between' => 'Nama barang harus diantara 3 dan 30 karakter'
        ],
        'description' =>  [
          'required' => 'Deskripsi harus diisi'
        ],
        'price' => [
          'required' => 'Harga harus diisi'
        ],
        'stock' => [
          'required' => 'Stok harus diisi'
        ],
        'category' => [
          'required' => 'Category harus diisi'
        ],
        'id_product' => [
          'required' => 'ID Product harus ada'
        ],
        'mode' => [
          'required' => 'mode harus ada'
          ]
        ];
    } else {
      $fields = [
        'name' => 'string | required | between: 3, 30',
        'description' => 'string | required',
        'price' => 'int | required',
        'stock' => 'int | required',
        'category' => 'int | required',
        'id_product' => 'int | required',
        'mode' => 'string | required',
        'file' => 'string | required | fileimage'
      ];
      $message = [
        'name' => [
          'required' => 'Nama barang harus diisi',
          'between' => 'Nama barang harus diantara 3 dan 30 karakter'
        ],
        'description' =>  [
          'required' => 'Deskripsi harus diisi'
        ],
        'price' => [
          'required' => 'Harga harus diisi'
        ],
        'stock' => [
          'required' => 'Stok harus diisi'
        ],
        'category' => [
          'required' => 'Category harus diisi'
        ],
        'id_product' => [
          'required' => 'ID Product harus ada'
        ],
        'mode' => [
          'required' => 'mode harus ada'
        ],
        'file' => [
          'required' => 'File image harus diisi',
          'fileimage' => 'File harus berekstensi png/jpg/jpeg'
        ]
      ];
    }
    
    [$inputs, $errors] = $this->filter(array_merge($_POST, $_FILES), $fields, $message);
    if($errors) {
      Message::setFlash('error', 'Gagal !', $errors[0], $inputs);
      $this->redirect('admin/products/edit/'.$inputs['id_product']);
    } 
    
    if($inputs['mode'] == 'update'){
      $proc = null;
      $oldFileName = null;
      if($_FILES['file']['name'] == ""){
        $proc = $this->productModel->updateWithoutFile($inputs);
      } else {
        $oldFileData = $this->productModel->productFileName($inputs['id_product']);
        $oldFileName = $oldFileData['file'];
        $proc = $this->productModel->update($inputs);
      }
      if($proc){
        Message::setFlash('success', 'Berhasil !', 'Product berhasil diubah');
        if(!($_FILES['file']['name'] == "")){
          unlink(__DIR__.'/../../../public/img/admin/products/'.$oldFileName);
          $fileName = $inputs['file']['name'];
          $file_tmp = $inputs['file']['tmp_name'];
          move_uploaded_file($file_tmp, __DIR__.'/../../../public/img/admin/products/'.$fileName);
        }
        $this->redirect('admin/products');
      } else {
        Message::setFlash('error', 'Gagal !', 'Terjadi kesalahan saat mengupdate barang');
        $this->redirect('admin/products/edit/'.$inputs['id_product']);
      }
    } else {
      $proc = $this->productModel->isCanDeleteProduct($inputs['id_product']);
      if($proc){
        Message::setFlash('warning', 'Cannot delete product !', 'Product has been ordered');
        $this->redirect('admin/products');
      }

      $oldFileData = $this->productModel->productFileName($inputs['id_product']);
      $oldFileName = $oldFileData['file'];
      $proc = $this->productModel->delete($inputs['id_product']);
      if($proc){
        Message::setFlash('success', 'Berhasil !', 'Product berhasil dihapus');
        unlink(__DIR__.'/../../../public/img/admin/products/'.$oldFileName);
        $this->redirect('admin/products');
      } else {
        Message::setFlash('error', 'Gagal !', 'Terjadi kesalahan saat menghapus barang');
        $this->redirect('admin/products/edit/'.$inputs['id_product']);
      }
    }
  }

  public function destroy($id){
    $proc = $this->productModel->isCanDeleteProduct($id);
    if($proc){
      Message::setFlash('warning', 'Cannot delete product !', 'Product has been ordered');
      $this->redirect('admin/products');
    } 
    $oldFileData = $this->productModel->productFileName($id);
    $oldFileName = $oldFileData['file'];
    $proc = $this->productModel->delete($id);
    if($proc){
      Message::setFlash('success', 'Berhasil !', 'Product berhasil dihapus');
      unlink(__DIR__.'/../../../public/img/admin/products/'.$oldFileName);
      $this->redirect('admin/products');
    } else {
      Message::setFlash('error', 'Gagal !', 'Terjadi kesalahan saat menghapus barang');
      $this->redirect('admin/products');
    }
  }

  public function report(){
    $data = $this->productModel->productReport();
    // ======================================================

    // Excel file name for download 
    $fileName = "Product_Report_" . date('Y-m-d') . ".xlsx"; 
    $excelData[] = array('NO', 'ID', 'PRODUCT', 'CATEGORY', 'PRICE', 'STOCK', 'VIEWS COUNT', 'CART COUNT', 'SALES COUNT', 'CREATED AT', 'ADMIN', 'ORDER QUANTITY', 'TOTAL ORDERS');
    
    $no = 1;
    foreach ($data as $row){
      $lineData = array($no++, $row['id_product'], $row['product'], $row['category'], $row['price'], $row['stock'], $row['views_count'], $row['cart_count'], $row['sales_count'], $row['created_at'], $row['admin'], $row['qty'], $row['total_orders']);
      $excelData[] = $lineData;
      echo "<pre>";
      print_r($row);
      echo "</pre>";
    }
    
    // $phpXlsxGenerator = new PhpXlsxGenerator();
    $xlsx = PhpXlsxGenerator::fromArray( $excelData ); 
    $xlsx->downloadAs($fileName); 
    exit; 


    // ======================================================
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";
    // die();
  }

  private function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
  }
} 