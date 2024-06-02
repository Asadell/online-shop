<?php

use App\Core\Message;

Message::flash();
?>
<main class="w-full mb-20">
  <div class="max-container">
    <article class="my-10">
      <h1 class="font-semibold text-black text-4xl mb-3">Shop</h1>
      <p class="paragraph w-2/5">
        Explore our<span class="text-coralRed"> extensive collection </span
        >that includes the latest and greatest products in a variety of
        categories, from technology to lifestyle, and find the perfect
        solution for your every need.
      </p>
    </article>
    <article class="flex flex-row gap-[30px]">
      <div class="basis-1/4 flex divide-x">
        <div class="w-full">
          <div class="flex items-center mb-5">
            <h6 class="font-semibold text-darkShade text-xl">Filters</h6>
            <a href="<?= BASEURL . '/user/shop'?>"
              class="ml-3 text-lightShade text-xs border-b-2 border-lightShade cursor-pointer hover:text-darkShade hover:border-darkShade hover:scale-[1.02]"
              >Clear filters</a
            >
          </div>
          <p class="font-semibold text-base text-darkShade">Categories</p>
          <div class="flex flex-col gap-2 mt-3">
          <?php 
            foreach ($allCategory as $row):
          ?>
            <div class="flex items-center">
              <a href="<?= BASEURL . '/user/shop/category/'.$row['name']?>" class="ml-4 <?= ($category==$row['name']) ? ' font-bold text-darkShade' : ' font-medium text-lightShade' ?>"
                ><?= $row['name'] ?><span class="text-coralRed"> (<?= $row['count'] ?>)</span></a
              >
            </div>
          <?php endforeach;?>
          </div>
        </div>
        <div></div>
      </div>
      <div>
        <div class="flex justify-between items-center mb-4">
          <h5>Showing all<span class="text-coralRed font-semibold"> <?=$productCount?> </span>results</h5>
          <div class="group/dropdown relative">
            <div class="invisible absolute -top-40 right-0 z-10 w-44 divide-y divide-gray-100 rounded-lg bg-white shadow group-hover/dropdown:visible">
              <ul class="py-2 text-sm text-gray-700">
                <li>
                  <a href="<?= BASEURL . '/user/shop/sortby/0'?>" class="block px-4 py-2 hover:bg-coralRed hover:text-white">Popularity</a>
                </li>
                <li>
                  <a href="<?= BASEURL . '/user/shop/sortby/1'?>" class="block px-4 py-2 hover:bg-coralRed hover:text-white">Latest</a>
                </li>
                <li>
                  <a href="<?= BASEURL . '/user/shop/sortby/2'?>" class="block px-4 py-2 hover:bg-coralRed hover:text-white">Price: Low to High</a>
                </li>
                <li>
                  <a href="<?= BASEURL . '/user/shop/sortby/3'?>" class="block px-4 py-2 hover:bg-coralRed hover:text-white">Price: High to Low</a>
                </li>
              </ul>
            </div>
            <button class="inline-flex items-center rounded-lg border border-solid border-coralRed bg-white px-5 py-2.5 text-center text-sm font-medium text-[#FF6452] hover:bg-[#FF6452] hover:text-white">
            Sort By
              <svg class="ms-3 h-2.5 w-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
              </svg>
            </button>
          </div>
        </div>
        <div class="basis-3/4 grid grid-cols-3 grid-rows-2 gap-5">
        <?php 
          foreach ($AllProduct as $row):
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
          <div class="col-span-3 flex justify-center mt-10">
            <button
              class="bg-white max-h-12 text-coralRed border border-coralRed px-16 py-3 font-bold rounded-sm hover:text-white hover:bg-coralRed duration-100">
              Load more products
            </button>
          </div>
        </div>
      </div>
    </article>
  </div>
</main>