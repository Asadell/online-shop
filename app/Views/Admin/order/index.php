<?php
Message::flash();
?>
<h2>Order admin</h2>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque reprehenderit provident est cumque veniam voluptas?</p>
<!-- <button onclick="location.href='<?= BASEURL . '/admin/products/add' ?>'" type="button" class="btn btn-success">Order</button> -->
<table class="table align-middle mb-0 bg-white table-striped">
  <thead class="bg-light">
    <tr>
      <th>No</th>
      <th>No Resi</th>
      <th>Status</th>
      <th>Total Price</th>
      <th>Order Date</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $no = 1;
    foreach ($AllOrder as $row):
    ?>
    <tr>
      <td class="position-relative"><span class="position-absolute top-50 start-50 translate-middle"><?= $no++ ?></span></td>
      <td class=""><?= $row['no_resi']?></td>
      <td class=""><?= $row['status']?></td>
      <td class=""><?= $row['total_price']?></td>
      <td class=""><?= $row['order_date']?></td>
      <td>
        <a href="#" class="btn btn-primary" type="button">Detail</a>
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
