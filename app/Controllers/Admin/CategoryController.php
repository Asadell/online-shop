<?php

use App\Core\BaseController;
use App\Core\Message;

class CategoryController extends BaseController{
  private $categoryModel;
  public function __construct() {
    $this->categoryModel = $this->model('Admin/', 'CategoryModel');
  }
  public function index(){
    $data = [
      'title' => 'Category',
      'nav' => 'category',
      'AllCategory' => $this->categoryModel->getAll()
    ];
    $this->view('Admin/template/header', $data);
    $this->view('Admin/category/index', $data);
    $this->view('Admin/template/footer');
  }
  
  public function store(){
    $name = $_POST['category'];

    $proc = $this->categoryModel->insert($name);
    
    if($proc) {
      Message::setFlash('success', 'Berhasil !', 'Category berhasil ditambahkan');
      $this->redirect('admin/categories');
    }
  }
  
  public function update(){
    $id = $_POST['id_category'];
    $name = $_POST['category'];

    $proc = $this->categoryModel->update($id, $name);
    
    if($proc) {
      Message::setFlash('success', 'Berhasil !', 'Category berhasil diubah');
      $this->redirect('admin/categories');
    }
  }

  public function destroy($id){
    $proc = $this->categoryModel->delete($id);
    if($proc){
      Message::setFlash('success', 'Berhasil !', 'Category berhasil dihapus');
      $this->redirect('admin/categories');
    } else {
      Message::setFlash('error', 'Gagal !', 'Terjadi kesalahan saat menghapus Category');
      $this->redirect('admin/categories');
    }
  }

  // public function edit(){
  //   $data = [
  //     'title' => 'Category',
  //     'nav' => 'category'
  //   ];
  //   $this->view('Admin/template/header', $data);
  //   $this->view('Admin/category/edit', $data);
  //   $this->view('Admin/template/footer');
  // }
  // public function create(){
  //   $data = [
  //     'title' => 'Category',
  //     'nav' => 'category'
  //   ];
  //   $this->view('Admin/template/header', $data);
  //   $this->view('Admin/category/create', $data);
  //   $this->view('Admin/template/footer');
  // }
}