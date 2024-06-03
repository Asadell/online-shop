<?php

use App\Core\Message;

Message::flash();
?>
<article class="w-8/12">
        <h1 class="font-bold text-darkShade mb-4 text-xl">Personal Information</h1>
        <hr class="text-gray-300">
        <div class="pb-10">
          <form class="w-full" action="<?= BASEURL . '/user/profile'?>" method="POST">
              <div class="flex w-full my-3 gap-4">
                <div class="w-1/2 mb-4">
                  <label for="fullName" class="block text-lightShade mb-1">Full Name</label>
                  <input type="text" id="fullName" name="fullName" class="border border-gray-300 text-gray-900 text-sm rounded-sm w-full" value="<?= $user['full_name']; ?>" required>
                </div>
                <div class="w-1/2 mb-3">
                  <label for="email" class="block text-lightShade mb-1">Email</label>
                  <input type="email" id="email" name="email" class="border border-gray-300 text-gray-900 text-sm rounded-sm w-full" value="<?= $user['email']; ?>" required>
                </div>
              </div>
              <div class="flex w-full my-3 gap-4">
                <div class="w-1/2 mb-4">
                  <label for="username" class="block text-lightShade mb-1">Username</label>
                  <input type="text" id="username" name="username" class="border border-gray-300 text-gray-900 text-sm rounded-sm w-full" value="<?= $user['username']; ?>" required>
                </div>
                <div class="w-1/2 mb-3">
                  <label for="password" class="block text-lightShade mb-1">Password</label>
                  <input type="password" id="password" name="password" class="border border-gray-300 text-gray-900 text-sm rounded-sm w-full" value="<?= $user['password']; ?>" required>
                </div>
              </div>
              <div class="flex w-full my-3 gap-4">
                <div class="w-1/2 mb-4">
                  <label for="address" class="block text-lightShade mb-1">Address</label>
                  <input type="text" id="address" name="address" class="border border-gray-300 text-gray-900 text-sm rounded-sm w-full" value="<?= $user['address']; ?>" required>
                </div>
                <div class="w-1/2 mb-1">
                  <label for="phoneNumber" class="block text-lightShade mb-1">Phone Number</label>
                  <input type="text" id="phoneNumber" name="phoneNumber" class="border border-gray-300 text-gray-900 text-sm rounded-sm w-full" value="<?= $user['phone_number']; ?>" required>
                </div>
              </div>
              <button type="submit" class="text-white bg-coralRed hover:bg-accentColor font-medium rounded-lg text-sm w-1/4 px-5 py-2.5 text-center">Save Changes</button>
            </form>
        </div>
      </article>
    </section>
  </div>
</main> 