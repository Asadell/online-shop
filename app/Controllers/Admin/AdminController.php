<?php

class AdminController extends BaseController{
  private $adminModel;
  public function __construct() {
    $this->adminModel = $this->model('Admin/', 'AdminModel');
  }
  public function index(){
    $data = [
      'title' => 'Admin',
      'nav' => 'admin',
      'AllAdmin' => $this->adminModel->getAll()
    ];
    $this->view('Admin/template/header', $data);
    $this->view('Admin/admin/index', $data);
    $this->view('Admin/template/footer');
  }

  public function store(){
    $fields = [
      'nameAdmin' => 'string | required',
      'emailAdmin' => 'string | required',
      'usernameAdmin' => 'string | required',
      'passwordAdmin' => 'string | required | between: 5, 15',
      'phoneAdmin' => 'string | required | between: 10, 20',
      'addressAdmin' => 'string | required'
    ];
    $message = [
      'nameAdmin' => [
        'required' => 'Nama harus diisi'
      ],
      'emailAdmin' =>  [
        'required' => 'Email harus diisi'
      ],
      'usernameAdmin' => [
        'required' => 'Username harus diisi'
      ],
      'passwordAdmin' => [
        'required' => 'Password harus diisi',
        'between' => 'Password harus diantara 5 dan 15 karakter'
      ],
      'phoneAdmin' => [
        'required' => 'No Handphone harus diisi',
        'between' => 'No Handphone harus diantara 10 dan 20 karakter'
      ],
      'addressAdmin' => [
        'required' => 'Alamat harus diisi'
      ]
    ];
    [$inputs, $errors] = $this->filter($_POST, $fields, $message);
    if($errors) {
      Message::setFlash('error', 'Gagal !', $errors[0], $inputs);
      $this->redirect('admin/admins');
    }

    $proc = $this->adminModel->insert($inputs);

    if($proc){
      Message::setFlash('success', 'Berhasil !', 'Admin berhasil ditambahkan');
      $this->redirect('admin/admins');
    }
  }

  public function update(){
    $fields = [
      'id_Admin' => 'int | required',
      'name_Admin' => 'string | required',
      'email_Admin' => 'string | required',
      'phone_Admin' => 'string | required | between: 10, 20',
      'address_Admin' => 'string | required | between: 5, 15',
    ];
    $message = [
      'id_Admin' => [
        'required' => 'Id admin harus ada'
      ],
      'name_Admin' => [
        'required' => 'Nama harus diisi'
      ],
      'email_Admin' =>  [
        'required' => 'Email harus diisi'
      ],
      'phone_Admin' => [
        'required' => 'No Handphone harus diisi',
        'between' => 'No Handphone harus diantara 10 dan 20 karakter'
      ],
      'address_Admin' => [
        'required' => 'Alamat harus diisi'
      ]
    ];
    [$inputs, $errors] = $this->filter($_POST, $fields, $message);
    if($errors) {
      Message::setFlash('error', 'Gagal !', $errors[0], $inputs);
      $this->redirect('admin/admins');
    }

    $proc = $this->adminModel->update($inputs);

    if($proc){
      Message::setFlash('success', 'Berhasil !', 'Data admin berhasil diubah');
      $this->redirect('admin/admins');
    }
  }

}