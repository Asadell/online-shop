<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primaryColor: '#FFFAFA',
            lightGray: '#F9F9F9',
            softGray: '#F5F5F5',
            slateGray: '#6D6D6D',
            darkGray: '7A7A7A',
            grayNeutral: '#979797',
            lightBlush: '#FFEFED',
            coralRed: '#FF6452',
            accentColor: '#e55a49',
            darkShade: '#333333',
            lightShade: '#666666',
          },
          backgroundImage: {
            'hero-home': "url('<?=BASEURL.'/img/user/home/hero-home.png' ?>')",
            'limited-msi': "url('<?=BASEURL.'/img/user/home/h-msi.jpg' ?>')",
            'ola-legion': "url('<?=BASEURL.'/img/user/home/hola-legionn.png' ?>')",
            'hero-about': "url('<?=BASEURL.'/img/user/about/hero-about.png' ?>')",
          },
        }
      }
    }
  </script>
  <style type="text/tailwindcss">
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      scroll-behavior: smooth;
      font-family: "Montserrat", sans-serif;
    }

    section,
    article {
      padding: 0;
      width: 100%;
    }
    @layer base {
      body {
        letter-spacing: 0.05em; 
        background-color: #ffffff; 
        font-optical-sizing: auto;
        font-style: normal;
      }
      section {
        padding-bottom: 1rem; 
        padding-top: 4rem; 
      }
      nav {
        border-bottom-width: 1px; 
        border-color: #E5E7EB; 
      }
      a {
        transition-duration: 100ms; 
      }
    }

    @layer components {
      .max-container {
        max-width: 1170px;
        margin-left: auto;
        margin-right: auto; 
      }
      /* .nav-link:hover {
        hover:transition hover:duration-150 hover:border-b-2 hover:border-transparent hover:border-coralRed;
      } */
    }

    @layer utilities {
      .home__title {
        font-size: 3rem;
        line-height: 1; 
        font-weight: 600; 
        color: #000000; 
      }
      .paragraph {
        font-size: 1.25rem;
        line-height: 1.75rem; 
        /* color: grayNeutral;  */
      }
      /* .button_coral_red {
        text-coralRed bg-white border border-coralRed px-8 py-4 font-semibold rounded-sm text-center hover:text-white hover:bg-coralRed;
      } */
    }
  </style>
</head>
<body>
  <header class="top-0 left-0 w-full z-50 bg-white">
    <nav
      class="max-container relative h-[75px] flex justify-between items-center">
      <div>
        <img
          src="<?=BASEURL.'/img/user/home/bg-white 1.png'?>"
          alt="logo"
          class="hover:cursor-pointer" />
      </div>
      <div>
        <ul class="flex gap-16 font-medium text-base text-coralRed">
          <li><a href="<?= BASEURL . '/user'?>" class="<?= ($nav === 'home') ? 'font-bold ': '' ?>hover:transition hover:duration-150 hover:border-b-2 hover:border-coralRed pb-1">Home</a></li>
          <li><a href="<?= BASEURL . '/user/about'?>" class="<?= ($nav === 'about') ? 'font-bold ': '' ?>hover:transition hover:duration-150 hover:border-b-2 hover:border-coralRed pb-1">About Us</a></li>
          <li><a href="<?= BASEURL . '/user/shop'?>" class="<?= ($nav === 'shop') ? 'font-bold ': '' ?>hover:transition hover:duration-150 hover:border-b-2 hover:border-coralRed pb-1">Shop</a></li>
          <li><a href="<?= BASEURL . '/user/profile'?>" class="<?= ($nav === 'profile') ? 'font-bold ': '' ?>hover:transition hover:duration-150 hover:border-b-2 hover:border-coralRed pb-1">My Profile</a></li>
        </ul>
      </div>
      <div class="flex gap-5 font-medium text-base text-coralRed">
        <!-- <i class="fa-solid fa-magnifying-glass hover:cursor-pointer"></i> -->
        <i class="fa-solid fa-cart-shopping hover:cursor-pointer btnCart" ></i>
        <div class="absolute top-2 -right-4 bg-coralRed rounded-full"><span id="countCart" class="text-white font-semibold px-2">0</span></div>
      </div>
    </nav>
    <div id="cart-menu" class="hidden absolute bg-white min-h-screen right-0 top-0 w-96 border border-l-2 z-50">
      <div class="w-full h-[60px] border-b-2">
        <div class="flex justify-between items-center h-full text-coralRed px-5">
          <span class="font-semibold">Shopping Cart</span>
          <i class="fa-solid fa-xmark fa-lg btnCart cursor-pointer"></i>
        </div>
      </div>
      <div class="w-full h-[490px] px-5 overflow-auto">
        <?php  $subtotal = 0; ?>
        <?php if(empty($_SESSION['cart'])){?>
          <div class="h-full flex justify-center items-center">
            <h4 class="font-medium text-darkShade">No products in the cart.</h4>
          </div>
        <?php } else {?>
          <div id="cart-content" class="my-2 divide-y flex flex-col">
          <?php 
          $subtotal = 0;
          foreach ($_SESSION['cart'] as $row):
          ?>
            <article class="flex justify-between py-4 flex-nowrap">
            <div class="flex flex-nowrap col-11">
              <div>
                <img src="<?=BASEURL.'/img/admin/products/'.$row['file']?>" alt="<?=$row['name']?>" class="h-16 rounded-sm">
              </div>
              <div class="ml-5 bg-white text-wrap w-52 flex justify-evenly flex-col">
                <p class="text-base text-darkShade font-semibold"><?=$row['name']?></p>
                <p class="text-sm text-lightShade"><span><?=$row['qty']?> </span>x<span> Rp. <?= number_format($row['price'], 0, ',', '.') ?></span></p>
              </div>
            </div>
            <div class="col-1 mt-[6px]">
              <a onclick="deleteCart(<?=$row['id_product']?>)"><i class="fa-solid fa-xmark fa-sm text-coralRed hover:text-accentColor cursor-pointer"></i></a>
            </div>
          </article>
          <?php 
            $subtotal += ($row['qty'] * $row['price']);
            endforeach;
          ?>
        </div>
        <?php } ?>
      </div>
      <div class="h-[144px] w-full relative">
        <div class="border-y-2">
          <div class="flex justify-between py-4 px-5">
            <span class="text-coralRed font-medium">Subtotal: </span>
            <span class="text-lightShade">Rp. <?= number_format($subtotal, 0, ',', '.') ?></span>
          </div>
        </div>
        <div class="flex justify-center items-center py-6 px-5">
          <a href="<?= BASEURL . '/user/checkout'?>" class="bg-red-400 w-full py-2 text-center font-semibold text-white hover:bg-accentColor rounded-sm">CHECKOUT</a>
        </div>
      </div>
    </div>
  </header>