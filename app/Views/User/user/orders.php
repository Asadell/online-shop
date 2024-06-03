      <article class="w-8/12">
        <h1 class="font-bold text-darkShade mb-4 text-xl">My Orders</h1>
        <hr class="text-gray-300">
        <div class="divide-y">
          <?php 
          foreach ($orders as $row):
          ?>
            <div class="flex justify-between items-center">
              <div class="my-3">
                <p class="text-darkShade font-semibold text-base">Order <?=$row['no_resi']?></p>
                <p class="text-lightShade text-base">Total: Rp. <?= number_format($row['total_price'], 0, ',', '.') ?></p>
                <p class="text-lightShade text-base">Ordered On: <?=date("d-m-Y", strtotime($row['order_date']))?></p>
              </div>
              <a href="<?= BASEURL . '/user/order/download/'.$row['id_order']?>"
              class="cursor-pointer">
              <i class="fa-solid fa-download text-coralRed"></i><span class="text-coralRed font-semibold"> Invoice</span>
              </a>
            </div>
          <?php endforeach;?>
        </div>
      </article>
    </section>
  </div>
</main>