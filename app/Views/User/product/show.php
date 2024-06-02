<main class="w-full bg-lightGray min-h-max py-16">
  <div class="max-container">
    <section class="divide-y">
      <article class="w-full flex mb-14">
        <div class="col-6 w-full">
          <img src="<?=BASEURL.'/img/admin/products/'.$product['file'] ?>" alt="<?=$product['product'] ?>" class="w-full">
        </div>
        <div class="col-6 w-full">
          <div class="mx-12 divide-y">
            <div class="mb-4">
              <h1 class="text-darkShade font-bold text-3xl mb-4"><?=$product['product'] ?></h1>
              <h5 class="font-bold text-lightShade text-2xl mb-1">Rp. <?= number_format($product['price'], 0, ',', '.') ?><span class="text-base font-normal"> +Free Shipping</span></h5>
              <p class="text-lightShade text-base mb-4"><?=$product['description'] ?></p>
              <div class="">
                <input type="number" name="qty" id="qty" value="1" min="1" class="w-14" class="border-transparent ">
                <a onclick="addCart(<?=$product['id_product']?>)" class="text-white bg-coralRed py-[10px] px-20 rounded ml-2 hover:bg-accentColor cursor-pointer">ADD TO CART</a>
              </div>
            </div>
            <div class="pt-2">
              <p class="text-lightShade">Category:<span class="text-coralRed font-semibold"> <?=$product['category'] ?></span></p>
            </div>
          </div>
        </div>
      </article>
      <article>
        <h6 class="py-2 text-base text-darkShade border-t-2 border-coralRed inline-block font-semibold">Description</h6>
        <h6 class="py-2 text-base text-darkShade inline-block ml-5">Reviews (0)</h6>
        <p class="text-lightShade text-base mt-4"><?=$product['description'] ?></p>
      </article>
    </section>
    <article class="mt-14">
      <h1 class="text-darkShade font-bold text-4xl">Related products</h1>
      <div class="flex justify-start mt-10 w-full flex-row gap-7">
      <?php 
      foreach ($relatedProducts as $row):
      ?>
        <div class="relative group/cart bg-white rounded overflow-hidden shadow-md cursor-pointer hover:scale-[1.02] transition-all">
            <a
              onclick="addCart(<?=$row['id_product']?>)"
              class="addToCart absolute z-50 opacity-0 group-hover/cart:opacity-85 group/bag right-4 top-4 bg-white w-8 h-8 flex justify-center items-center rounded-full hover:opacity-100 cursor-pointer"  id="uyyy">
              <i class="fa-solid fa-bag-shopping text-coralRed group-hover/bag:scale-110" id="uyy"></i>
            </a>
            <a href="<?= BASEURL . '/user/shop/product/'.$row['id_product']?>">
              <img
                src="<?=BASEURL.'/img/admin/products/'.$row['file']?>"
                alt="<?= $row['name'] ?>"
                class="w-[270px] rounded-sm border-b-[3px] hover:border-softGray border-transparent" />
            </a>
            <div class="py-3 px-2">
              <h3 class="font-bold text-base mt-2"><?= $row['name'] ?></h3>
              <p class="text-base text-coralRed">Rp. <?= number_format($row['price'], 0, ',', '.') ?></p>
            </div>
          </div>
      <?php endforeach;?>
      </div>
    </article>
  </div>
  </main>