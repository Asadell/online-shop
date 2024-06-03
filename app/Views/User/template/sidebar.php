<main class="w-full mb-18 pb-16">
  <div class="max-container">
    <h1 class="text-darkShade text-3xl font-bold mt-16 mb-7">My Profile</h1>
    <section class="flex flex-nowrap gap-7">
      <article class="w-4/12">
        <div class="border border-gray-300 rounded mx-4 bg-white">
          <div class="mx-7 my-4 overflow-hidden">
            <article class="flex gap-4 items-center">
            <i class="fa-regular fa-id-badge fa-3x"></i>
              <div class="flex flex-col">
                <p class="text-darkShade font-semibold"><?= $user['full_name'] ?></p>
                <p class="text-lightShade"><?= $user['email'] ?></p>
              </div>
            </article>
          </div>
          <hr>
          <article class="mx-7 mt-3 mb-4">
            <a 
            href="<?= BASEURL . '/user/profile'?>"
            class="flex gap-2 items-center w-full cursor-pointer py-2 my-3">
              <i class="fa-regular fa-user text-lightShade <?=$sidebar == 'personal' ? 'font-semibold' : ''?>"></i>
              <p class="text-lightShade <?=$sidebar == 'personal' ? 'font-semibold' : ''?>">Personal information</p>
            </a>
            <a 
            href="<?= BASEURL . '/user/profile/payment'?>"
            class="flex gap-2 items-center w-full cursor-pointer py-2 my-3">
              <i class="fa-solid fa-wallet text-lightShade <?=$sidebar == 'wallet' ? 'font-semibold' : ''?>"></i>
              <p class="text-lightShade <?=$sidebar == 'wallet' ? 'font-semibold' : ''?>">Wallet</p>
            </a>
            <a 
            href="<?= BASEURL . '/user/profile/order'?>"
            class="flex gap-2 items-center w-full cursor-pointer py-2 my-3">
              <i class="fa-solid fa-box-archive text-lightShade <?=$sidebar == 'order' ? 'font-semibold' : ''?>"></i>
              <p class="text-lightShade <?=$sidebar == 'order' ? 'font-semibold' : ''?>">My Orders</p>
            </a>
            <a 
            href="<?= BASEURL . '/user/profile/logout'?>"
            class="flex gap-2 items-center w-full cursor-pointer py-2 my-3">
              <i class="fa-solid fa-outdent text-lightShade"></i>
              <p class="text-lightShade">Logout</p>
            </a>
          </article>
        </div>
      </article>