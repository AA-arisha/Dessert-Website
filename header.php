<?php
    session_start();
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/icomoon@1.0.0/style.min.css">

    <!-- <link rel="stylesheet" href="css/owl.carousel.min.css"> -->
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Font-->
    <!-- <link rel="stylesheet" type="text/css" href="css/sourcesanspro-font.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"> 

    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/login.css">
    <!-- index ki css -->
    <link rel="icon" type="image/png" href="images/index_images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/index_css/util.css">
	<link rel="stylesheet" type="text/css" href="css/index_css/main.css">
  <!-- menu ki css -->
  <link rel="stylesheet" href="css/cards.css">
  <!-- cart ki css -->
	<link rel="stylesheet" href="css/cart.css">

 


    <title>ice cream</title>
  </head>
  <body>


    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" style="background-color:#ffc834;" role="banner">

        <div class="container-fluid">
          <div class="row align-items-center position-relative">

            <div class="col-lg-4">
              <nav class="site-navigation text-right ml-auto " role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                  <li class="active"><a href="index.php" class="nav-link">About</a></li>
                  <li><a href="menu.php" class="nav-link">Menu</a></li>
                  <li><a href="#" class="nav-link">Services</a></li>
                </ul>
              </nav>
            </div>
            <div class="col-lg-4 text-center">
              <div class="site-logo">
                <a href="index.php">
                    <img src="images\logo_delizia_1-removebg-preview.png" class="img-fluid" alt="">
                </a>
              </div>


              <div class="ml-auto toggle-button d-inline-block d-lg-none">
                <a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black">
                  <span class="icon-menu h3 text-black"></span>
                </a>
              </div>
            </div>
            <div class="col-lg-4">
              <nav class="site-navigation text-left mr-auto " role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                  <li><a href="track.php" class="nav-link"><i class="fa-solid fa-truck-fast fa-flip-horizontal"></i> Track</a></li>
                  <?php
                    if ( isset( $_SESSION['cart'] ) ) {
                      ?>
                        <li><a href="cart.php" class="nav-link"><i class="fa-brands fa-opencart"></i> Cart</a></li>
                      <?php
                    }
                  ?>
                  <?php
                    if ( isset( $_SESSION['user'] ) ) {
                      ?>
                        <li><a href="logout.php" class="nav-link"><i class="fa-solid fa-user"></i> Logout </a></li>

                      <?php
                    }else {
                      ?>
                        <li><a href="login.php" class="nav-link"><i class="fa-solid fa-user"></i> Login </a></li>

                      <?php
                    }
                  ?>
                </ul>
              </nav>
            </div>
            

          </div>
        </div>

      </header>
     
     
    
<?php
  $connection=mysqli_connect('localhost','root','','icecream');
  if($connection -> connect_errno){
      echo"Data base not connected";
  }

  if( isset($_GET['alerts']) ){
    ?>
    <div class="alert alert-<?php echo $_GET['alert'] ?> alert-dismissible fade show" role="alert">
      <strong><?php echo strtoupper($_GET['alert']) ?>!</strong> <?php echo $_GET['message'] ?>.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
  }
?>