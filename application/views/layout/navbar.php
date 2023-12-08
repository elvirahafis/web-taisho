<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <title>Navigation Bar with Propdown Menu</title>
  </head>
  <body>
    <header id="nav-menu" aria-label="navigation bar">
      <div class="container">
        <div class="nav-start">
          <a class="logo" href="https://www.taisho.co.id/">
            <img
              src="<?php echo base_url(); ?>assets/images/logo.jpg"
              width="35"
              height="35"
              alt="Inc Logo"
            />
          </a>
          <nav class="menu">
            <ul class="menu-bar">
              <li><a class="nav-link" href="<?= site_url('ListProducts') ?>">Products</a></li>
              <li><a class="nav-link" href="<?= site_url('ListOutlet') ?>">Outlet</a></li>
              <li><a class="nav-link" href="<?= site_url('ListPurchase') ?>">Purchase</a></li>
			        <li><a class="nav-link" href="<?= site_url('ListSales') ?>">Sales</a></li>
               <li><a class="nav-link" href="<?= site_url('ListUser') ?>">Listuser</a></li>
            </ul>
          </nav>
        </div>
        <div class="nav-end">
          <div class="right-container">
            <a class="btn btn-primary" href="<?= site_url('login') ?>">Logout</a>
          </div>

          <button
            id="hamburger"
            aria-label="hamburger"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <i class="bx bx-menu" aria-hidden="true"></i>
          </button>
        </div>
      </div>
    </header>
    <script src="<?php echo base_url(); ?>assets/script.js"></script>
  </body>

</html>