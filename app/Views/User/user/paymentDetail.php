<?php

use App\Core\Message;

Message::flash();
?>
<article class="w-8/12">
        <h1 class="font-bold text-darkShade mb-4 text-xl">Wallet</h1>
        <hr class="text-gray-300">
        <div class="pb-10">
          <form class="w-full" action="<?= BASEURL . '/user/profile/payment'?>" method="POST">
              <div class="w-full my-6 gap-2 flex">
                <?php 
                foreach ($providerUser as $row):
                ?>
                  <div class="text-lightShade p-2 border rounded-md max-w-fit border-coralRed inline"><span class="text-coralRed font-semibold"><?=$row['provider']?></span></div>
                <?php endforeach;?>
              </div>
              <div class="flex w-full my-3 gap-4">
                <div class="w-1/2 mb-4">
                  <label for="provider" class="block text-lightShade mb-1">Add Provider</label>
                  <select name="provider" id="provider" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm w-full" required>
                  <?php 
                  foreach ($providerData as $row):
                  ?>
                    <option value="<?=$row?>"><?=$row?></option>
                    <?php endforeach;?>
                  </select>
                </div>
                <div class="w-1/2 mb-1">
                  <label for="amount" class="block text-lightShade mb-1">Amount</label>
                  <input type="number" id="amount" name="amount" class="border border-gray-300 text-gray-900 text-sm rounded-sm w-full" min="1" required>
                </div>
              </div>
              <button type="submit" class="text-white bg-coralRed hover:bg-accentColor font-medium rounded-lg text-sm w-1/5 px-5 py-2.5 text-center">Submit</button>
            </form>
        </div>
      </article>
    </section>
  </div>
</main> 