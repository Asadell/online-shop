<?php

use App\Core\Message;

Message::flash();
?>
<h2>Category admin</h2>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque reprehenderit provident est cumque veniam voluptas?</p>
<button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#addCategory">Add New Category</button>
<table class="table align-middle mb-0 bg-white table-striped">
  <thead class="bg-light">
    <tr>
      <th>No</th>
      <th>Category</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $no = 1;
    foreach ($AllCategory as $row):
    ?>
    <tr>
      <td class="position-relative"><span class="position-absolute top-50 start-50 translate-middle"><?= $no++ ?></span></td>
      <td class="col-8">
        <span><p class="mb-1 "><?= $row['name']?></p></span>
      </td>
      <td>
        <input type="hidden" class="categoryId" value="<?= $row['id_category']?>">
        <input type="hidden" class="categoryName" value="<?= $row['name']?>">
        <button href="3" class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#editCategory" id="editCategoryBtn">Edit</button>
        <button onclick="deleteById('/admin/categories/delete/', <?= $row['id_category']?>)" type="button" class="btn btn-danger" id="btn-delete">
          Delete
        </button>
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
