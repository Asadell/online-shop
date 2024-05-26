<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, 
				initial-scale=1.0" />
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="<?= BASEURL . '/css/styleAdmin.css'?>" />    
  </head>

  <body>
    <header>
      <div class="logosec">
				<img src="<?= BASEURL . '/img/admin/logo.png'?>" alt="Logo" class="dpicn">
      </div>

      <div class="searchbar">
        <div><h1 class="hello">Hello, <span class="hello2">Asadel</span></h1></div>
      </div>

      <div class="message">
        <div class="dp">
          <img
            src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png"
            class="dpicn"
            alt="dp" />
        </div>
      </div>
    </header>

    <main class="main-container">
      <div class="navcontainer">
        <nav class="nav">
          <div class="nav-upper-options">
            <div class="nav-option <?=$nav == 'dashboard' ? 'option1' : ''?>">
						<i class="fa-solid fa-chart-line fa-2x"></i>
              <a href="<?=BASEURL.'/admin'?>" class="a-side-bar">Dashboard</a>
            </div>
						
            <div class="nav-option <?=$nav == 'products' ? 'option1' : ''?>">
							<i class="fa-solid fa-box fa-2x"></i>
							<a href="<?=BASEURL.'/admin/products'?>" class="a-side-bar">Products</a>
            </div>
						
            <div class="nav-option <?=$nav == 'category' ? 'option1' : ''?>">
							<i class="fa-solid fa-tags fa-2x"></i>
							<a href="<?=BASEURL.'/admin/categories'?>" class="a-side-bar">Categories</a>
            </div>
						
            <div class="nav-option <?=$nav == 'order' ? 'option1' : ''?>">
							<i class="fa-solid fa-cart-arrow-down fa-2x"></i>
							<a href="<?=BASEURL.'/admin/orders'?>" class="a-side-bar">Orders</a>
            </div>
						
            <div class="nav-option <?=$nav == 'admin' ? 'option1' : ''?>">
							<i class="fa-solid fa-user-shield fa-2x"></i>
							<a href="<?=BASEURL.'/admin/admins'?>" class="a-side-bar">Admins</a>
            </div>
						
            <div class="nav-option logout">
							<i class="fa-solid fa-right-from-bracket fa-2x"></i>
							<a href="<?=BASEURL.'/admin/logout'?>" class="a-side-bar">Logout</a>
            </div>
          </div>
        </nav>
      </div>
      <div class="main">