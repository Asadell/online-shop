<?php

use App\Core\Message;

Message::flash();
?>
<h2>Order admin</h2>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque reprehenderit provident est cumque veniam voluptas?</p>
<button  type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#addAdmin">Add Admin</button>
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
        <input type="hidden" class="idAdmin" value="<?= $row['id_user']?>">
        <input type="hidden" class="nameAdmin" value="<?= $row['full_name']?>">
        <input type="hidden" class="emailAdmin" value="<?= $row['email']?>">
        <input type="hidden" class="phoneAdmin" value="<?= $row['phone_number']?>">
        <input type="hidden" class="addressAdmin" value="<?= $row['address']?>">
        <button href="3" class="btn btn-primary" type="button" data-bs-toggle="modal" id="editAdminBtn" data-bs-target="#editAdmin">Edit</button>
        <!-- <button  href="3" class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#editAdmin" id="editAdminBtn">Edit</button> -->
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>