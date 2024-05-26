<?php
$data = Message::getData();
$fileimage = $product['file'];
if($data) {
  $product['id_product'] = $data['id_product'];
  $product['name'] = $data['name'];
  $product['description'] = $data['description'];
  $product['price'] = $data['price'];
  $product['stock'] = $data['stock'];
  // $product['file'] = $data['file'];
  $product['category'] = $data['category'];
}
Message::flash();
?>

<h1>Edit Products</h1>
<div class="container">
  <section class="panel panel-default bg-light">
    <div class="panel-body">
      <form id="form" action="<?= BASEURL . '/admin/products/edit' ?>" class="form-horizontal d-flex p-5 gap-5 justify-content-evenly"  method="post" enctype="multipart/form-data">
      <input type="hidden" name="id_product" value="<?= $product['id_product'] ?>">
      <input type="hidden" id="mode" name="mode" value="update">
        <!-- form-group // -->
        <div class=" w-100 d-flex flex-column gap-3 order-2">
          <div class="form-group">
            <label for="name" class="col-sm-3 control-label mb-2">Name</label>
            <div class="col-sm-9">
              <input
                type="text"
                class="form-control"
                name="name"
                id="name"
                placeholder="Product Name.." value="<?= $product['name'] ?>"/>
            </div>
          </div>
          <!-- form-group // -->
          <div class="form-group">
            <label for="description" class="col-sm-3 control-label mb-2">Description</label>
            <div class="col-sm-9">
              <textarea class="form-control" name="description" id="description"><?= $product['description']?></textarea>
            </div>
          </div>
          <!-- form-group // -->
          <div class="d-flex gap-3">
            <div class="form-group">
              <label for="price" class="col-sm-3 control-label w-25 mb-2">Price</label>
              <div class="col-sm-3">
                <input
                  type="number"
                  class="form-control w-auto"
                  name="price"
                  id="price"
                  placeholder="0" min="10000" value="<?= $product['price'] ?>"/>
              </div>
            </div>
            <div class="form-group">
              <label for="stock" class="col-sm-3 control-label w-25 mb-2">Stock</label>
              <div class="col-sm-3">
                <input
                  type="number"
                  class="form-control w-auto"
                  name="stock"
                  id="stock"
                  placeholder="0" min="1" value="<?= $product['stock'] ?>"/>
              </div>
            </div>
          </div>
            <div class="form-group">
              <label for="category" class="col-sm-3 control-label w-25 mb-2">Category</label>
              <div class="col-sm-3">
                <select name="category" id="category" class="form-select">
                  <option value="1" <?= $product['category'] == 'Laptop' ? 'selected' : '' ?>>Laptop</option>
                  <option value="2" <?= $product['category'] == 'Handphone' ? 'selected' : '' ?>>Handphone</option>
                  <option value="3" <?= $product['category'] == 'Accessories' ? 'selected' : '' ?>>Accessories</option>
                </select>
              </div>
            </div>
          <!-- form-group // -->
          <hr />
          <div class="form-group d-flex gap-3">
            <div class="">
              <button onclick="edit('update')" type="button" class="btn btn-primary">Edit</button>
            </div>
            <div class="">
              <button onclick="edit('delete')" type="button" class="btn btn-danger">Delete</button>
            </div>
          </div>
        </div>
        <!-- form-group // -->
        <div class="d-flex flex-column gap-2"><img src="<?= BASEURL.'/img/admin/products/'.$fileimage?>" alt=""><input type="file" class="form-control form-control-sm" id="file" name="file"/></div>
      </form>
    </div>
    <!-- panel-body // -->
  </section>
  <!-- panel// -->
</div>
<!-- container// -->
