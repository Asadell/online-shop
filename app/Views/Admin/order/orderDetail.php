<article class="d-flex justify-content-between">
  <div>
    <h3>Order <span class="text-xl">#<?= $orders['no_resi'] ?></span></h3>
    <p><?= $orderDate ?></p>
  </div>
  <div>
    <a href="<?= BASEURL . '/admin/orders'?>" type="button" class="btn btn-primary">Back</a>
  </div>
</article>
<article class="d-flex gap-3">
  <div class="bg-white col-8 p-4 rounded">
    <h4>Order details</h4>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">NO</th>
          <th scope="col">PRODUCTS</th>
          <th scope="col">PRICE</th>
          <th scope="col">QTY</th>
          <th scope="col">TOTAL</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no = 1;
        foreach ($orderDetails as $row):
        ?>
        <tr>
          <th class="align-middle"><?= $no++ ?></th>
          <td class="">
            <img src="<?=BASEURL.'/img/admin/products/'.$row['file'] ?>" alt="<?= $row['name'] ?>" class="rounded" style="width: 40px; height: 40px">
            <span class="mx-1"><?= $row['name'] ?></span>
          </td>
          <td class="align-middle"><?= number_format($row['odprice'], 0, ',', '.') ?></td>
          <td class="align-middle"><?= $row['qty'] ?></td>
          <td class="align-middle"><?= number_format(($row['odprice']*$row['qty']), 0, ',', '.') ?></td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
    <div class="d-flex justify-content-end ">
      <table class="">
        <tbody>
          <tr class="">
            <td class="w-10 p-1">Subtotal:</td>
            <td class="w-10 ps-2">Rp. <?= number_format($orders['total_price'], 0, ',', '.') ?></td>
          </tr>
          <tr class="">
            <td class="w-10 p-1">Discount:</td>
            <td class="w-10 ps-2">Rp. 0</td>
          </tr>
          <tr class="">
            <td class="w-10 p-1">Tax:</td>
            <td class="w-10 ps-2">Rp. 0</td>
          </tr>
          <tr class="">
            <td class="w-10 p-1">Total:</td>
            <td class="w-10 ps-2">Rp. <?= number_format($orders['total_price'], 0, ',', '.') ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-4 d-flex gap-3 flex-column h-full">
    <div class="p-4 bg-white rounded">
      <div class="">
        <h6 class="mb-3">Customer details</h6>
        <div class="d-flex align-items-center mb-3">
          <img src="<?=BASEURL.'/img/admin/products/acernitro.png'?>" style="width: 45px; height: 45px" class="rounded-circle">
          <div class="mx-3 d-flex flex-column g-0">
            <span class=""><?= $orders['full_name'] ?></span>
            <span class="">Customer ID: <?= $orders['id_user'] ?></span>
          </div>
        </div>
        <div class="d-flex align-items-center mb-3">
          <div class="d-flex align-items-center justify-content-center" style="width: 45px; height: 45px">
            <span ><i class="fa-brands fa-shopify fa-2xl" style="background-color: #e6f7d9; color: #56ca00;"></i></span>
          </div>
          <div class="mx-3 d-flex align-items-center">
            <span class=""><?= $orderCount['count'] ?> Orders</span>
          </div>
        </div>
      </div>
      <div>
        <h6>Contact info</h6>
        <span class="mb-2">Email: <?= $orders['email'] ?></span><br>
        <span>Mobile: <?= $orders['phone_number'] ?></span>
      </div>
    </div>
    <div class="p-4 bg-white rounded">
      <div class="">
        <h6 class="mb-3">Shipping Address</h6>
        <p><?= $orders['address'] ?></p>
      </div>
    </div>
    <div class="p-4 bg-white rounded">
      <div class="">
        <h6 class="mb-3">Billing Address</h6>
        <p><?= $orders['address'] ?></p>
      </div>
      <div class="">
        <h6 class="mt-4">Provider</h6>
        <p><?= $orders['provider'] ?></p>
      </div>
    </div>
  </div>
</article>