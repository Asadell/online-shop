<main class="w-full mb-20">
    <section class=" max-container my-16">
      <article class="mb-8">
        <h2 class="text-darkShade text-3xl mb-6 font-semibold">Checkout</h2>
        <div class="block w-full bg-red-300 py-4 bg-softGray border-t-2 border-coralRed">
          <i class="fa-solid fa-gift ml-6 text-coralRed"></i>
          <span class="text-lightShade">Have a coupoun?<span class="text-coralRed cursor-pointer"> Click here to enter your code</span></span>
        </div>
      </article>
      <form action="<?= BASEURL . '/user/checkout'?>" method="POST">
      <section class="flex gap-7">
        <div class="w-7/12 h-full">
          <h4 class="font-bold text-xl my-5">Billing details</h4>
          <hr class="w-full mb-7">
          <div class="w-full">
            <div class="mb-5 w-full">
              <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Full Name</label>
              <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm block w-full p-2.5" value="<?=$user['full_name'];?>" disabled required/>
            </div>
            <div class="mb-5 w-full">
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
              <input name="" type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm block w-full p-2.5" value="<?=$user['email'];?>" disabled required/>
            </div>
            <div class="mb-5 w-full">
              <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Address<span class="text-coralRed">*</span></label>
              <input name="address" type="text" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm block w-full p-2.5" value="<?=$user['address'];?>" required/>
            </div>
            <div class="mb-5 w-full">
              <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Phone Number<span class="text-coralRed">*</span></label>
              <input name="phone" type="text" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm block w-full p-2.5" value="<?=$user['phone_number'];?>" required/>
            </div>
            <div class="mb-5 w-full">
              <label for="provider" class="block mb-2 text-sm font-medium text-gray-900">Provider<span class="text-coralRed">*</span></label>
              <select name="provider" id="provider" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm block w-full p-2.5 " required>
                <?php 
                foreach ($provider as $row):
                ?>
                  <option value="<?=$row['id_payment']?>"><?=$row['provider']?></option>
                <?php 
                endforeach;
                ?>
              </select>
            </div>
          </div>
        </div>
        <div class="w-5/12 border-2">
          <div class="m-8">
            <h3 class="text-xl font-bold mb-10">Your order</h3>
            <article class="flex flex-col divide-y">
              <div class="py-3 flex justify-between items-center font-bold text-darkShade">
                <span>Product</span>
                <span>Subtotal</span>
              </div>
              <?php 
              $total = 0;
              foreach ($cartDetail as $row):
              ?>
                <div class="py-4 flex justify-between items-center font-semibold text-lightShade">
                  <div class="flex items-center">
                    <img src="<?=BASEURL.'/img/admin/products/'.$row['file']?>" alt="<?=$row['name']?>" class="w-14 h-14 rounded-sm">
                    <div class="flex flex-col justify-evenly ml-3">
                      <span class=""><?=$row['name']?></span>
                      <span class="">x <span><?=$row['qty']?></span></span>
                    </div>
                  </div>
                  <span class=""><span><?= number_format($row['price'], 0, ',', '.') ?></span></span>
                </div>
                <input type="hidden" name="products[qty][]" value="<?=$row['qty']?>">
                <input type="hidden" name="products[idproduct][]" value="<?=$row['id_product']?>">
                <input type="hidden" name="products[price][]" value="<?=$row['price']?>">
              <?php 
              $total += $row['qty'] * $row['price'];
              endforeach;
              ?>
              <input type="hidden" name="total" value="<?=$total?>">
              <div class="py-3 flex justify-between items-center font-semibold text-lightShade">
                <span>Subtotal</span>
                <span>Rp. <span><?= number_format($total, 0, ',', '.') ?></span></span>
              </div>
              <div class="py-3 flex justify-between items-center font-bold text-darkShade">
                <span>Total</span>
                <span>Rp. <span><?= number_format($total, 0, ',', '.') ?></span></span>
              </div>
            </article>
            <button type="submit" class="bg-coralRed text-white mt-16 w-full py-3 text-center font-semibold rounded-sm <?= $provider ? ' hover:bg-accentColor':'' ?>" <?= $provider ? '':'disabled' ?>>PLACE ORDER</button>
            <?php if(!$provider){?>
            <p class="text-coralRed mx-auto text-center mt-2 w-full">Please fill in the provider in your profile</span>
            <?php }?>
          </div>
        </div>
      </section>
      </form>
    </section>
  </main>