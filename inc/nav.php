      <!-- Navigation-->

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container px-4 px-lg-5">
              <a class="navbar-brand" href="">EraaSoft PMS</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                      <li class="nav-item"><a class="nav-link  <?= ($current_page == 'index.php') ? 'link-primary' : '' ?>" aria-current="page" href="<?= BASE_URL ?>index.php">Home</a></li>
                      <li class="nav-item"><a class="nav-link <?= ($current_page == 'about.php') ? 'link-primary' : '' ?>" href="<?= BASE_URL ?>views/pages/about.php">About</a></li>
                      <!-- <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>views/pages/contact.php">Contact</a></li> -->
                      <?php if (isset($_SESSION['user'])) : ?>
                          <?php if (getRole()) : ?>
                              <li class="nav-item"><a class="nav-link <?= ($current_page == 'create_product.php') ? 'link-primary' : '' ?> " href="<?= BASE_URL ?>views/admin/products/create_product.php">add Product</a></li>
                              <li class="nav-item"><a class="nav-link <?= ($current_page == 'create_user.php') ? 'link-primary' : '' ?>" href="<?= BASE_URL ?>views/admin/users/create_user.php">add User</a></li>
                              <li class="nav-item"><a class="nav-link <?= ($current_page == 'orders.php') ? 'link-primary' : '' ?>" href="<?= BASE_URL ?>views/admin/orders/orders.php"> orders </a></li>
                              <li class="nav-item"><a class="nav-link <?= ($current_page == 'all_users.php') ? 'link-primary' : '' ?>" href="<?= BASE_URL ?>views/admin/users/all_users.php"> users </a></li>
                          <?php else: ?>
                              <li class="nav-item"><a class="nav-link <?= ($current_page == 'order_user.php') ? 'link-primary' : '' ?>" href="<?= BASE_URL ?>views/client/order_user.php"> order </a></li>
                          <?php endif; ?>

                      <?php else : ?>
                          <li class="nav-item"><a class="nav-link <?= ($current_page == 'register.php') ? 'link-primary' : '' ?>" href="<?= BASE_URL ?>views/auth/register.php">Register</a></li>
                          <li class="nav-item"><a class="nav-link <?= ($current_page == 'login.php') ? 'link-primary' : '' ?>" href="<?= BASE_URL ?>views/auth/login.php">Login</a></li>
                      <?php endif; ?>

                  </ul>
                  <?php if (!getRole()) : ?>

                      <form class="d-flex mt-2" action="<?= BASE_URL ?>views/client/cart.php">


                          <button type="submit" class="btn btn-primary position-relative">
                              <i class="bi-cart-fill me-1"></i>Cart
                              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                  <?= countCartItems() ?>
                                  <span class="visually-hidden">unread messages</span>
                              </span>
                          </button>
                      </form>

                  <?php endif; ?>
                  <?php if (isset($_SESSION['user'])): ?>
                      <div class="text-center">
                          <a class="btn btn-outline-primary mt-2 mx-3 " href="<?= BASE_URL ?>handleres/auth/logout.php">Logout</a>
                      </div>

                  <?php endif; ?>

              </div>
          </div>
      </nav>