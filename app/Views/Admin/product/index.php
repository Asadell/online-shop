<?php
Message::flash();
?>
<h2>Product admin</h2>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque reprehenderit provident est cumque veniam voluptas?</p>
<button onclick="location.href='<?= BASEURL . '/admin/products/add' ?>'" type="button" class="btn btn-success">Add Product</button>
<table class="table align-middle mb-0 bg-white table-striped">
  <thead class="bg-light">
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>Description</th>
      <th>Price</th>
      <th>Stock</th>
      <th>Category</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $no = 1;
    foreach ($AllProduct as $row):
    ?>
    <tr>
      <td class="position-relative"><span class="position-absolute top-50 start-50 translate-middle"><?= $no++ ?></span></td>
      <td>
        <div class="d-flex align-items-center">
          <img
              src="<?=BASEURL.'/img/admin/products/'.$row['file'] ?>"
              alt=""
              style="width: 45px; height: 45px"
              class="rounded-circle"
              />
          <div class="ms-3">
            <p class="fw-bold mb-1"><?= $row['name']?></p>
          </div>
        </div>
      </td>
      <td class="col-4">
        <span><p class="mb-1 "><?= $row['description']?></p></span>
      </td>
      <td>
        <span class="">Rp. <?= number_format($row['price'], 0, ',', '.') ?></span>
      </td>
      <td>
        <span class=""><?= $row['stock']?></span>
      </td>
      <td>
        <span class=""><?= $row['category']?></span>
      </td>
      <td>
        <button type="button" class="btn btn-primary">
          Edit
        </button>
        <button type="button" class="btn btn-danger">
          Delete
        </button>
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
