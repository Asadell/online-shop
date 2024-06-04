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
    <link rel="stylesheet" href="<?= BASEURL . '/css/styleAdmin.css?version=<?= microtime() ?>'?>" />    
  </head>

  <body>
    <!-- Modal Add admin -->
    <div class="modal fade" id="addAdmin" tabindex="-1" aria-labelledby="addAdminLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered z-3">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="addAdminLabel">Add admin</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form  action="<?= BASEURL . '/admin/admins' ?>" method="post">
            <div class="modal-body">
              <div class="mb-3">
                <label for="nameAdmin" class="form-label">Full name</label>
                <input type="text" class="form-control" id="nameAdmin" name="nameAdmin" required>
              </div>
              <div class="mb-3">
                <label for="emailAdmin" class="form-label">Email</label>
                <input type="email" class="form-control" id="emailAdmin" name="emailAdmin" required>
              </div>
              <div class="mb-3">
                <label for="usernameAdmin" class="form-label">username</label>
                <input type="text" class="form-control" id="usernameAdmin" name="usernameAdmin">
              </div>
              <div class="mb-3">
                <label for="passwordAdmin" class="form-label">Password</label>
                <input type="password" class="form-control" id="passwordAdmin" name="passwordAdmin" required>
              </div>
              <div class="mb-3">
                <label for="phoneAdmin" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phoneAdmin" name="phoneAdmin" required>
              </div>
              <div class="mb-3">
                <label for="addressAdmin" class="form-label">Address</label>
                <input type="text" class="form-control" id="addressAdmin" name="addressAdmin" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    
    <!-- Modal Edit admin -->
    <div class="modal fade" id="editAdmin" tabindex="-1" aria-labelledby="editAdminLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered z-3">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="editAdminLabel">Edit admin</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form  action="<?= BASEURL . '/admin/admins/edit' ?>" method="post">
          <input type="hidden" id="id_Admin" name="id_Admin">
            <div class="modal-body">
              <div class="mb-3">
                <label for="name_Admin" class="form-label">Full name</label>
                <input type="text" class="form-control" id="name_Admin" name="name_Admin" required>
              </div>
              <div class="mb-3">
                <label for="email_Admin" class="form-label">Email</label>
                <input type="email" class="form-control" id="email_Admin" name="email_Admin" required>
              </div>
              <div class="mb-3">
                <label for="phone_Admin" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone_Admin" name="phone_Admin" required>
              </div>
              <div class="mb-3">
                <label for="address_Admin" class="form-label">Address</label>
                <input type="text" class="form-control" id="address_Admin" name="address_Admin" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    
    <!-- Modal Add Category -->
    <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered z-3">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="addCategoryLabel">Add Category</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form  action="<?= BASEURL . '/admin/categories/add' ?>" method="post">
            <div class="modal-body">
              <div class="mb-3">
                <label for="category" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="category" name="category" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Modal Edit Category -->
    <div class="modal fade" id="editCategory" tabindex="-1" aria-labelledby="editCategoryLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered z-3">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="editCategoryLabel">Edit Category</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form  action="<?= BASEURL . '/admin/categories/edit' ?>" method="post">
            <input type="hidden" id="category_Id" name="id_category">
            <div class="modal-body">
              <div class="mb-3">
                <label for="category" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="category_Name" name="category" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <header>
      <div class="logosec">
				<img src="<?= BASEURL . '/img/admin/logo.png'?>" alt="Logo" class="dpicn">
      </div>

      <!-- <div class="searchbar">
        <div><h1 class="hello">Hello, <span class="hello2"><?=$nameAdmin?></span></h1></div>
      </div> -->

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
							<a href="<?= BASEURL . '/user/profile/logout'?>" class="a-side-bar">Logout</a>
            </div>
          </div>
          <!-- <div class="nav-upper-options">
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
							<a href="<?= BASEURL . '/user/profile/logout'?>" class="a-side-bar">Logout</a>
            </div>
          </div> -->
        </nav>
      </div>
      <div class="main">