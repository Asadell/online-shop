<footer class="w-full bg-black mt-0">
    <div class="divide-y max-container">
      <div class="grid grid-cols-2 gap-8 py-9">
        <div>
          <h1 class="text-white text-3xl mb-6">Sign up for our newsletter</h1>
          <div class="flex rounded-lg shadow-sm">
            <input
              type="text"
              placeholder="Email Address"
              class="text-white bg-black placeholder-white py-3 px-4 block w-3/5 border border-r-0 border-gray-200 text-sm focus:z-10 outline-none focus:border-current focus:ring-0" />
            <button
              type="button"
              class="bg-black w-auto h-[2.875rem] flex-shrink-0 inline-flex justify-center items-center gap-x-2 text-sm font-semibold border border-l-0 border-gray-200 text-white disabled:opacity-50 disabled:pointer-events-none px-4">
              Sign Up
            </button>
          </div>
        </div>
        <div class="flex gap-36 text-white">
          <div class="flex flex-col gap-14">
            <h4 class="font-semibold">Links</h4>
            <div class="flex flex-col gap-11">
              <a href="#">Home</a>
              <a href="./about">About</a>
              <a href="./shop">Shop</a>
              <a href="./contact">Contact</a>
            </div>
          </div>
          <div class="flex flex-col gap-14">
            <h4 class="font-semibold">Help</h4>
            <div class="flex flex-col gap-11">
              <p>Payment Options</p>
              <p>Returns</p>
              <p>Privacy Policies</p>
            </div>
          </div>
        </div>
      </div>
      <div class="h-16 w-full flex justify-center items-center">
        <span class="text-white">© 2024 Asadeal™. All Rights Reserved.</span>
      </div>
    </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="<?=BASEURL . '/js/script.js'?>"></script>
  <script>
    $(document).ready(function () {
      // $(document).on('click', '.addToCart', addCart);
      addCart(-1);
    });

    function addCart(idProduct){
      // const idProduct = $(this).data('id');
      $.ajax({
        method: 'GET',
        url: 'http://online-shop.test/user/cart/store/'+idProduct,
        // data: {idProduct:idProduct},
        dataType: 'JSON',
        success: function(response) {
          // console.log(response);
          // $('#cart-content').html(response.cartHtml);
          // $('#countCart').text('');
          $('#countCart').text(response ?? 0);
        },
        error: function(xhr, status, error) {
            console.error('Kesalahan AJAX:', status, error);
        }
      });
    }
  </script>
</body>
</html>