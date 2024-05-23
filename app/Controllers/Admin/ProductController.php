<?php

class ProductController{
  public function index(){
    echo 'hello world from product controller admin index';
  }
  public function edit($id1, $id2){
    echo 'EDIT from product controller admin index, id1: '.$id1.', id2: '.$id2;
  }
}