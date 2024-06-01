<main class="w-full mb-20">
  <section
    class="bg-hero-home h-[700px] bg-no-repeat bg-cover bg-center relative">
    <div
      class="bg-white absolute w-[485px] h-[400px] top-1/4 left-32 px-10 py-10">
      <h1 class="text-[45px] font-bold leading-[60px] mb-3">
        Upgrade Your<span class="text-coralRed"> Digital </span>Lifestyle
      </h1>
      <p class="text-base mb-8">
        Enjoy a satisfying shopping experience with a wide selection of the
        latest electronic products. We provide a variety of devices from
        leading brands.
      </p>
      <a href="#" class="text-coralRed bg-white border border-coralRed px-8 py-4 font-semibold rounded-sm text-center hover:text-white hover:bg-coralRed"> Shop Now </a>
    </div>
  </section>
  <article>
    <div class="flex flex-1 justify-evenly h-36 items-center">
      <img
        src="<?=BASEURL.'/img/user/home/h-asus-1.svg'?>"
        alt="Asus"
        class="h-8 grayscale" />
      <img src="<?=BASEURL.'/img/user/home/h-hp-1.svg'?>" alt="HP" class="h-8 grayscale" />
      <img
        src="<?=BASEURL.'/img/user/home/h-lenovo-1.svg'?>"
        alt="Lenovo"
        class="h-8 grayscale" />
      <img src="<?=BASEURL.'/img/user/home/h-msi-1.svg'?>" alt="MSI" class="h-8 grayscale" />
      <img
        src="<?=BASEURL.'/img/user/home/h-realme-1.svg'?>"
        alt="Realme"
        class="h-8 grayscale" />
      <img
        src="<?=BASEURL.'/img/user/home/h-samsung-1.svg'?>"
        alt="Samsung"
        class="h-8 grayscale" />
    </div>
  </article>
  <section class="w-full">
    <div class="flex flex-col max-container items-center py-12">
      <h1 class="home__title mb-4">Categories</h1>
      <p class="paragraph mb-4 w-3/5 text-center">
        Browse our wide range of the
        <span class="text-coralRed"> best electronic product </span
        >categories, designed to meet your digital needs.
      </p>
      <a href="#" class="text-coralRed bg-white border border-coralRed px-8 py-4 font-semibold rounded-sm text-center hover:text-white hover:bg-coralRed"> Shop All </a>
      <div class="flex flex-1 mt-6 justify-between w-full">
        <div class="">
          <img
            src="<?=BASEURL.'/img/user/home/hc-pc.png'?>"
            alt="PC & Laptop"
            class="w-[370px] h-80 rounded-sm" />
          <p class="text-center mt-4 text-xl font-bold">PC & Laptop</p>
        </div>
        <div class="">
          <img
            src="<?=BASEURL.'/img/user/home/hc-handphone.png'?>"
            alt="Handphone"
            class="w-[370px] h-80 rounded-sm" />
          <p class="text-center mt-4 text-xl font-bold">Handphone</p>
        </div>
        <div class="">
          <img
            src="<?=BASEURL.'/img/user/home/hc-accessories.png'?>"
            alt="Accessories"
            class="w-[370px] h-80 rounded-sm" />
          <p class="text-center mt-4 text-xl font-bold">Accessories</p>
        </div>
      </div>
    </div>
  </section>
  <section class="w-full">
    <div class="flex flex-col max-container items-center py-12">
      <h1 class="home__title mb-4">Our Products</h1>
      <p class="paragraph mb-4 w-3/5 text-center">
        Discover our<span class="text-coralRed"> complete collection </span
        >of quality products from leading brands, with the latest
        innovations for your technology needs.
      </p>
      <a href="#" class="text-coralRed bg-white border border-coralRed px-8 py-4 font-semibold rounded-sm text-center hover:text-white hover:bg-coralRed"> Shop All </a>
      <div class="flex justify-between mt-6 w-full flex-row flex-nowrap">
      <?php 
      foreach ($AllProduct as $row):
      ?>
        <a href="<?= BASEURL . '/user/shop/product/'.$row['id_product']?>" class="relative group/cart bg-white rounded overflow-hidden shadow-md cursor-pointer hover:scale-[1.02] transition-all">
          <div
            class="absolute invisible group-hover/cart:visible group/bag right-4 top-4 bg-white w-8 h-8 flex justify-center items-center rounded-full opacity-85 hover:opacity-100 cursor-pointer">
            <i
              class="fa-solid fa-bag-shopping text-coralRed group-hover/bag:scale-110 z-50"></i>
          </div>
          <img
            src="<?=BASEURL.'/img/admin/products/'.$row['file']?>"
            alt="<?= $row['name'] ?>"
            class="w-[270px] rounded-sm border-b-[3px] hover:border-softGray border-transparent" />
          <div class="py-3 px-2">
            <h3 class="font-bold text-base mt-2"><?= $row['name'] ?></h3>
            <p class="text-base text-coralRed">Rp. <?= number_format($row['price'], 0, ',', '.') ?></p>
          </div>
        </a>
      <?php endforeach;?>
      </div>
    </div>
  </section>
  <article
    class="bg-limited-msi max-container h-96 my-20 relative px-11 py-16 bg-fixed bg-center bg-no-repeat bg-auto">
    <div>
      <h4 class="text-white font-semibold text-xl">Limited Time Offer</h4>
      <h1 class="text-white font-bold text-3xl my-3">Special Edition</h1>
      <p class="text-white w-1/2 my-3">
        The king of gaming laptops. The best solution to replace your
        desktop. Titan GT77 HX offers the best performance and design. The
        Titan GT77 HX has been reborn.
      </p>
      <div class="my-10">
        <a
          href="#"
          class="text-coralRed bg-transparent border border-coralRed px-8 py-4 font-semibold rounded-sm text-center hover:text-white hover:bg-coralRed">
          Shop Now
        </a>
      </div>
    </div>
  </article>
  <article class="max-container">
    <div class="flex flex-col items-center mb-6">
      <h1 class="home__title mb-4 text-center">Our latest arrivals</h1>
      <p class="paragraph mb-4 w-3/5 text-center">
        Get the latest insight by checking out our latest products, from
        the<span class="text-coralRed"> latest devices </span>to stylish
        accessories.
      </p>
      <a href="#" class="text-coralRed bg-white border border-coralRed px-8 py-4 font-semibold rounded-sm text-center hover:text-white hover:bg-coralRed"> Shop All </a>
    </div>
    <div class="grid grid-cols-2 grid-rows-1 gap-8">
      <div
        class="bg-ola-legion bg-object h-full w-full bg-black relative rounded-sm">
        <div class="absolute bottom-8 left-8">
          <h3 class="font-semibold text-2xl text-white my-4">
            Gaming Laptop
          </h3>
          <p class="text-white text-sm my-4 w-2/3">
            Gaming laptop with superior performance, providing an optimal
            gaming experience.
          </p>
          <a
            href="#"
            class="text-coralRed border-b-[1px] hover:border-b-2 border-coralRed pb-1"
            >Shop All</a
          >
        </div>
      </div>
      <div class="grid gap-8">
        <div class="col-span-1 relative">
          <div class="absolute bottom-8 left-8 z-10">
            <h3 class="font-semibold text-xl text-white my-2">
              RGB Keyboard
            </h3>
            <p class="text-white text-sm my-2">
              Colorful keyboard for comfort and precision.
            </p>
            <a
              href="#"
              class="text-coralRed border-b-[1px] hover:border-b-2 border-coralRed pb-1"
              >Shop All</a
            >
          </div>
          <img
            src="<?=BASEURL.'/img/user/home/hola-rgbkeyboard.png'?>"
            alt="RGB Keyboard"
            class="rounded-sm" />
        </div>
        <div class="grid grid-cols-2 gap-8">
          <div class="relative">
            <div class="absolute bottom-8 left-8 z-10">
              <h3 class="font-semibold text-xl text-white my-2">
                High Quality Pixel
              </h3>
              <p class="text-white text-sm my-2">
                Image details are perfect.
              </p>
              <a
                href="#"
                class="text-coralRed border-b-[1px] hover:border-b-2 border-coralRed pb-1"
                >Shop All</a
              >
            </div>
            <img
              src="<?=BASEURL.'/img/user/home/hola-handphone.png'?>"
              alt="Handphone"
              class="rounded-sm" />
          </div>
          <div class="relative">
            <div class="absolute bottom-8 left-8 z-10">
              <h3 class="font-semibold text-xl text-white my-2">
                High Quality Audio
              </h3>
              <p class="text-white text-sm my-2">Profound clear sound.</p>
              <a
                href="#"
                class="text-coralRed border-b-[1px] hover:border-b-2 border-coralRed pb-1"
                >Shop All</a
              >
            </div>
            <img
              src="<?=BASEURL.'/img/user/home/hola-earphone.png'?>"
              alt="Earphone"
              class="rounded-sm" />
          </div>
        </div>
      </div>
    </div>
  </article>
</main>