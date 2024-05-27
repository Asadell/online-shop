<?php
Message::flash();
?>
<h2>Order admin</h2>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque reprehenderit provident est cumque veniam voluptas?</p>
<button onclick="location.href='<?= BASEURL . '/admin/products/add' ?>'" type="button" class="btn btn-success">Add Admin</button>
<table class="table align-middle mb-0 bg-white table-striped">
  <thead class="bg-light">
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone Number</th>
      <th>Address</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $no = 1;
    foreach ($AllAdmin as $row):
    ?>
    <tr>
      <td class="position-relative"><span class="position-absolute top-50 start-50 translate-middle"><?= $no++ ?></span></td>
      <td class=""><?= $row['full_name']?></td>
      <td class=""><?= $row['email']?></td>
      <td class=""><?= $row['phone_number']?></td>
      <td class=""><?= $row['address']?></td>
      <td>
        <a href="3" class="btn btn-primary" type="button">Edit</a>
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
