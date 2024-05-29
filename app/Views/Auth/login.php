<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            coralRed: '#FF6452',
            accentColor: '#e55a49',
            darkShade: '#333333',
            lightShade: '#666666',
          },
          backgroundImage: {
            'hero-login': "url('<?=BASEURL.'/img/auth/hero-login.png' ?>')",
            'hero-login2': "url('<?=BASEURL.'/img/auth/bangunan.jpg' ?>')",
            'hero-register': "url('<?=BASEURL.'/img/auth/hero-register.jpg' ?>')",
            
          },
        }
      }
    }
  </script>
</head>
<body>
  <div class="absolute bg-gradient-to-r from-[#FF6452] to-[#FFB6C1] h-full w-1/2 -z-8"></div>
  <!-- <div class="absolute bg-coralRed h-full w-1/2 -z-8"></div> -->
  <section class="flex justify-center items-center h-screen bg-white -z-10">
    <div class="w-[930px] h-[620px] flex z-10">
      <div class="col-6 w-full h-full bg-white">
        <div class="my-[100px] mx-[80px]">
          <h3 class="text-4xl font-semibold text-darkShade mb-2">Welcome back</h3>
          <p class="text-lightShade mb-5">We’re so excited to see you again!</p>

          <form class="max-w-sm mx-auto">
            <div class="mb-5">
              <label for="username" class="block text-lightShade mb-2">Username</label>
              <input type="text" id="username" name="username" class="border border-gray-300 text-gray-900 text-sm rounded-lg w-full" required>
            </div>
            <div class="mb-3">
              <label for="password" class="block text-lightShade mb-2">Password</label>
              <input type="password" id="password" name="password" class="border border-gray-300 text-gray-900 text-sm rounded-lg w-full" required>
            </div>
            <div class="flex items-start mb-7">
              <div class="flex items-center h-5">
                <input id="remember" type="checkbox" value="" class="accent-pink-300 focus:accent-pink-500 w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 " />
              </div>
              <label for="remember" class="ms-2 text-sm font-medium text-darkShade">Remember me</label>
            </div>
            <button type="submit" class="text-white bg-coralRed focus:bg-accentColor font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Submit</button>
          </form>
        </div>
      </div>
      <div class="bg-hero-login col-6 w-full h-full bg-no-repeat bg-cover bg-center opacity-90 flex justify-center items-center">
        <img src="<?=BASEURL.'/img/auth/logo.png' ?>" alt="Logo" class="w-1/2">
      </div>
    </div>
    <!-- <div class="bg-hero-register w-[930px] h-[620px]">s</div> -->
  </section>
</body>
</html>