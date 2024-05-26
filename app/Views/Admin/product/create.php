<?php
$data = Message::getData();
$name = "";
$description = "";
$price = "";
$stock = "";
if($data) {
  $name = $data['name'];
  $description = $data['description'];
  $price = $data['price'];
  $stock = $data['stock'];
}
Message::flash();
?>

<h1>Add products</h1>
<div class="container">
  <section class="panel panel-default bg-light">
    <div class="panel-body">
      <form action="<?= BASEURL . '/admin/products/add' ?>" class="form-horizontal d-flex p-5 gap-5 justify-content-evenly"  method="post" enctype="multipart/form-data">
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
                placeholder="Product Name.." value="<?= $name ?>" required/>
            </div>
          </div>
          <!-- form-group // -->
          <div class="form-group">
            <label for="description" class="col-sm-3 control-label mb-2">Description</label>
            <div class="col-sm-9">
              <textarea class="form-control" name="description" id="description" required><?= $description ?></textarea>
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
                  placeholder="0" value="<?= $price ?>" required/>
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
                  placeholder="0" value="<?= $stock ?>" required/>
              </div>
            </div>
          </div>
            <div class="form-group">
              <label for="category" class="col-sm-3 control-label w-25 mb-2">Category</label>
              <div class="col-sm-3">
                <select name="category" id="category" class="form-select">
                  <option value="1" selected>Laptop</option>
                  <option value="2">Handphone</option>
                  <option value="3">Accessories</option>
                </select>
              </div>
            </div>
          <!-- form-group // -->
          <hr />
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <button type="submit" class="btn btn-primary">Add Product</button>
            </div>
          </div>
        </div>
        <!-- form-group // -->
        <div class="d-flex flex-column gap-2"><img src="<?= BASEURL . '/img/admin/no-img.jpg'?>" alt=""><input type="file" class="form-control form-control-sm" id="file" name="file"  required/></div>
      </form>
    </div>
    <!-- panel-body // -->
  </section>
  <!-- panel// -->
</div>
<!-- container// -->
