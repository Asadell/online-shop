<?php

use App\Core\Message;

$data = Message::getData();
// if($data){
//   echo "<pre>";
//   print_r($data);
//   echo "</pre>";
//   die();
// }
$regist['fullName'] = '';
$regist['email'] = '';
$regist['username'] = '';
$regist['address'] = '';
$regist['phoneNumber'] = '';
if($data) {
  $regist['fullName'] = $data['fullName'];
  $regist['email'] = $data['email'];
  $regist['username'] = $data['username'];
  $regist['address'] = $data['address'];
  $regist['phoneNumber'] = $data['phoneNumber'];
}
Message::flash();
?>
  <section class="flex w-full min-h-screen m-0 p-0">
    <div class="bg-green min-h-full w-1/2 flex justify-center items-center">
      <img src="<?=BASEURL.'/img/auth/register-hero.png' ?>" alt="Hero" class="w-3/4">
    </div>
    <div class="bg-white min-h-full w-1/2 flex justify-center items-center">
      <div class="w-3/5">
        <h1 class="text-3xl font-semibold text-darkShade">Create an account</h1>
        <div class=""><p class="text-lightShade mb-5 text-sm">Already have an account? <a href="<?= BASEURL . '/login'?>" class="underline font-semibold">Log in</a></p></div>
        <form class="max-w-sm" action="<?= BASEURL . '/register'?>" method="POST">
          <div class="mb-4">
            <label for="fullName" class="block text-lightShade mb-1">Full Name</label>
            <input type="text" id="fullName" name="fullName" class="border border-gray-300 text-gray-900 text-sm rounded-sm w-full" value="<?= $regist['fullName']; ?>" required>
          </div>
          <div class="mb-3">
            <label for="email" class="block text-lightShade mb-1">Email</label>
            <input type="email" id="email" name="email" class="border border-gray-300 text-gray-900 text-sm rounded-sm w-full" value="<?= $regist['email']; ?>" required>
          </div>
          <div class="mb-4">
            <label for="username" class="block text-lightShade mb-1">Username</label>
            <input type="text" id="username" name="username" class="border border-gray-300 text-gray-900 text-sm rounded-sm w-full" value="<?= $regist['username']; ?>" required>
          </div>
          <div class="mb-3">
            <label for="password" class="block text-lightShade mb-1">Password</label>
            <input type="password" id="password" name="password" class="border border-gray-300 text-gray-900 text-sm rounded-sm w-full" required>
          </div>
          <div class="mb-4">
            <label for="address" class="block text-lightShade mb-1">Address</label>
            <input type="text" id="address" name="address" class="border border-gray-300 text-gray-900 text-sm rounded-sm w-full" value="<?= $regist['address']; ?>" required>
          </div>
          <div class="mb-1">
            <label for="phoneNumber" class="block text-lightShade mb-1">Phone Number</label>
            <input type="text" id="phoneNumber" name="phoneNumber" class="border border-gray-300 text-gray-900 text-sm rounded-sm w-full" value="<?= $regist['phoneNumber']; ?>" required>
          </div>
          <p class="text-lightShade text-xs">By signing in, you’re agree to our<span class="text-darkShade font-semibold underline"> Terms & Condition </span>and<span class="text-darkShade font-semibold underline"> Privacy Policy</span>.*</p>
          <button type="submit" class="text-white bg-coralRed focus:bg-accentColor font-medium rounded-sm text-sm w-full px-5 py-2.5 text-center mt-5 focus:bg-accentColor">Submit</button>
        </form>
      </div>
    </div>
  </section>