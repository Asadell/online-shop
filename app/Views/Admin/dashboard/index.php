<h1>dashboard admin</h1>
<div>
  <article class="d-flex gap-4 justify-content-between">
    <div class="bg-white flex-grow-1 rounded p-3">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h6>Total Revenue</h6>
          <h1>Rp. <?= number_format($revenueCount['sum'], 0, ',', '.') ?></h1>
        </div>
        <span style="background-color: #ff6452; width: 70px; height: 70px; color: white;" class="rounded-circle d-flex justify-content-center align-items-center"><i class="fa-solid fa-dollar-sign fa-2xl"></i></span>
      </div>
    </div>
    <div class="bg-white flex-grow-1 rounded p-3">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h6>Product in Stock</h6>
          <h1><?= $productCount['count'] ?></h1>
        </div>
        <span style="background-color: #ff6452; width: 70px; height: 70px; color: white;" class="rounded-circle d-flex justify-content-center align-items-center"><i class="fa-solid fa-box-open fa-2xl"></i></span>
      </div>
    </div>
    <div class="bg-white flex-grow-1 rounded p-3">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h6>Total Order</h6>
          <h1><?= $orderCount['count'] ?></h1>
        </div>
        <span style="background-color: #ff6452; width: 70px; height: 70px; color: white;" class="rounded-circle d-flex justify-content-center align-items-center"><i class="fa-solid fa-cart-shopping fa-2xl"></i></span>
      </div>
    </div>
    <div class="bg-white flex-grow-1 rounded p-3">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h6>Total Customer</h6>
          <h1><?= $customerCount['count'] ?></h1>
        </div>
        <span style="background-color: #ff6452; width: 70px; height: 70px; color: white;" class="rounded-circle d-flex justify-content-center align-items-center"><i class="fa-solid fa-users fa-2xl"></i></span>
      </div>
    </div>
  </article>
</div>

<?php
echo "<pre>";
print_r($data);
echo "</pre>";
?>